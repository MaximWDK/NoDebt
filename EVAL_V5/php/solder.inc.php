<?php

require 'inc/db_user.inc.php';
require 'inc/db_group.inc.php';
require 'inc/db_participate.inc.php';
require 'inc/db_depense.inc.php';
require 'inc/db_tag.inc.php';
require 'inc/db_caracteriser.inc.php';
require 'inc/db_versement.inc.php';

use User\UserRepository;
use Participate\ParticipateRepository;
use Group\GroupRepository;
use Depense\DepenseRepository;
use Tag\TagRepository;
use Caracteriser\CaracteriserRepository;
use Versement\MyVersement;
use Versement\VersementRepository;

function displaySolder() {
    $ur = new UserRepository();
    $gr = new GroupRepository();
    $pr = new ParticipateRepository();
    $dr = new DepenseRepository();
    $tr = new TagRepository();
    $cr = new CaracteriserRepository();
    $vr = new VersementRepository();

    $uid = $_SESSION['uid'];
    $gid = $_GET['gid'];
    $participe = $pr->getParticipateByUidAndGid($uid, $gid);
    $participantsGroupe = $pr->getParticipateByGid($gid);
    $depensesGroupe = $dr->getDepenseByGid($gid);
    $groupe = $gr->getGroupById($gid);
    $depensesTotalParGroupe =$dr->getTotalDepenseByGid($gid);
    $moyenne = $depensesTotalParGroupe / sizeof($pr->getParticipateByGidConfirmed($gid));
    $allVersements = $vr->getVersementsByGid($gid);
    $diffArray = array();
    $versements = array();

    if ($participe->uid == $_SESSION['uid'] && $gid == $participe->gid && $participe->estConfirme == 1) {
        echo '';
    } else {
        header("Location: index.php");
    }

    foreach ($participantsGroupe as $participantGroupe) {
        if ($participantGroupe->estConfirme == 1) {
            $total = $dr->getTotalDepenseByUidAndGig($participantGroupe->uid, $gid);
            $diff = round($total - $moyenne, 2);
            $diffArray[$participantGroupe->uid] = $diff;
        }
    }

    if ($participe->uid == $_SESSION['uid'] && $gid == $participe->gid && $participe->estConfirme == 1) {
        echo '';
    } else {
        header("Location: index.php");
    }
    echo '
    <main>
            <section class="inscription">';
                echo '
                <header>';
                if(isset($_SESSION['message'])) echo $_SESSION['message'];
                echo '
                    <h1>Voulez-vous vraiment solder le groupe '. $groupe->nom .' ?</h1>
                </header>';
                        while (max($diffArray) != 0) {
                            $max = max($diffArray);
                            $min = min($diffArray);
                            $newMax = $max + $min;
                            $newMin = 0;

                            $argent = abs($min);

                            $key1 = array_search($min, $diffArray);
                            $key2 = array_search($max, $diffArray);

                            $donneur = $ur->getUserById($key1);
                            $receveur = $ur->getUserById($key2);

                            $versement = new Versement\MyVersement();
                            $versement->uid1 = $donneur->uid;
                            $versement->uid2 = $receveur->uid;
                            $versement->gid = $gid;
                            $versement->dateHeure = date("Y-m-d H:i:s");
                            $versement->montant = $argent;
                            $versement->estConfirme = 0;

                            $versements[] = $versement;

                            echo '
                            <section class="membres3">
                                <section class="membres4">';
                                    if (isset($donneur->pdp) && $donneur->pdp == 1) {
                                                echo '<img src="images/profil_' . $donneur->uid . '.png" alt="profil" title="' . $donneur->prenom . ' ' . $donneur->nom . '" width="70px" height="70px">';
                                            } else {
                                                echo '<img src="images/profil_default.png" alt="profil" title="' . $donneur->prenom . ' ' . $donneur->nom . '" width="70px" height="70px">';
                                            }
                                    echo '
                                    <h3>'. $donneur->prenom . ' ' . $donneur->nom .' devra '. $argent .'€ à '. $receveur->prenom . ' ' . $receveur->nom.'</h3>
                                </section>
                            </section>';
                            $diffArray[array_search($max, $diffArray)] = $newMax;
                            $diffArray[array_search($min, $diffArray)] = $newMin;
                        }

                        if (isset($_POST['noSubmit'])) {
                            header('Location:groupe.php?gid=' . $gid);
                        }

                        if (isset($_POST['submit'])) {
                            if ($allVersements != null) {
                                $_SESSION['message'] = "<h1>Ce groupe est déjà soldé !</h1>";
                            } else {
                                $_SESSION['message'] = "<h1>Le groupe a été soldé avec succès !</h1>";
                                foreach ($versements as $versement) {
                                    $vr->addVersementByAll($versement->uid1, $versement->uid2, $versement->gid, $versement->dateHeure, $versement->montant, $versement->estConfirme);
                                }
                            }
                        }

                        echo '
            <section class="suppression">
                <form method="post">
                        <button class="boutonPublier" name="submit" id="supprimer" type="submit">Solder</button>
                        <button class="boutonSupprimer" name="noSubmit" id="garder" type="submit">Annuler</button>
                    </form>
            </section>
        </section>
    </main>';
}
?>
