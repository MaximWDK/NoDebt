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

function displayVersements() {
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

    if ($participe->uid == $_SESSION['uid'] && $gid == $participe->gid && $participe->estConfirme == 1) {
        echo '';
    } else {
        header("Location: index.php");
    }

    if ($participe->uid == $_SESSION['uid'] && $gid == $participe->gid && $participe->estConfirme == 1) {
        echo '';
    } else {
        header("Location: index.php");
    }
    echo'<main>
            <section class="inscription">';
    if(isset($_SESSION['message'])) echo $_SESSION['message'];
    foreach ($allVersements as $versement) {
        if ($versement->estConfirme != 1) {
            $secondUser = $ur->getUserById($versement->uid_1);
            $firstUser = $ur->getUserById($versement->uid);
            $montant = $versement->montant;
            echo '
                <header>
                    <h1>Confirmez-vous avoir reçu ces versements ?</h1>
                </header>
                <section class="membres3">
                    <section class="membres4">';
            if (isset($firstUser->pdp) && $firstUser->pdp == 1) {
                echo '<img src="images/profil_' . $firstUser->uid . '.png" alt="profil" title="' . $firstUser->prenom . ' ' . $firstUser->nom . '" width="70px" height="70px">';
            } else {
                echo '<img src="images/profil_default.png" alt="profil" title="' . $firstUser->prenom . ' ' . $firstUser->nom . '" width="70px" height="70px">';
            }
            echo '
                        <h3>'.$firstUser->prenom .' '. $firstUser->nom .' a versé '. $montant .'€ à '.$secondUser->prenom. ' ' .$secondUser->nom.'</h3>
                    </section>
                </section>
                <section class="suppression">
                    <form method="post">
                        <button class="boutonPublier" name="submit" type="submit">Confirmer</button>
                    </form>
                </section>';
                if (isset($_POST['submit'])) {
                    if ($_SESSION['uid'] == $secondUser->uid) {
                        if ($versement->estConfirme != 0) {
                            $_SESSION['message'] = "<h1>Ce versement a déjà été accepté !</h1>";
                        } else {
                            $vr->confirmVersement($firstUser->uid, $secondUser->uid, $groupe->gid, $montant);
                            $_SESSION['message'] = "<h1>Le versement a été accepté avec succès !</h1>";
                        }
                    } else {
                        $_SESSION['message'] = "<h1>Seule la personne recevant ce versement peut l'accepter !</h1>";
                    }
                }
            }
        }
            echo '
            </section>
        </main>';
}
?>
