<?php
require 'inc/db_user.inc.php';
require 'inc/db_group.inc.php';
require 'inc/db_participate.inc.php';
require 'inc/db_depense.inc.php';
require 'inc/db_tag.inc.php';
require 'inc/db_caracteriser.inc.php';

use User\UserRepository;
use Participate\ParticipateRepository;
use Group\GroupRepository;
use Depense\DepenseRepository;
use Tag\TagRepository;
use Caracteriser\CaracteriserRepository;

function displayGroup() {
    $ur = new UserRepository();
    $gr = new GroupRepository();
    $pr = new ParticipateRepository();
    $dr = new DepenseRepository();
    $tr = new TagRepository();
    $cr = new CaracteriserRepository();

    $_SESSION['message'] = "";
    $uid = $_SESSION['uid'];
    $gid = $_GET['gid'];
    $participe = $pr->getParticipateByUidAndGid($uid, $gid);
    $participantsGroupe = $pr->getParticipateByGid($gid);
    $depensesGroupe = $dr->getDepenseByGid($gid);
    $groupe = $gr->getGroupById($gid);
    $depensesTotalParGroupe =$dr->getTotalDepenseByGid($gid);
    $moyenne = $depensesTotalParGroupe / sizeof($pr->getParticipateByGidConfirmed($gid));

    if ($participe->uid == $_SESSION['uid'] && $gid == $participe->gid && $participe->estConfirme == 1) {
        $_SESSION['message'] = "";
    } else {
        header("Location: index.php");
    }
    echo '
    <main>
            <header class="titleIndex">
                <h1>Groupe "' .$groupe->nom. '"</h1>
            </header>
            <section class="groupes">
                <section class="groupeCouleur">
                    <section class="exception">
                        <section class="groupes2">
                            <h2>Dépenses par membre</h2>
                            <section class="posBoutonsGroupes">
                                <a href="invitation.php?gid=' . $groupe->gid . '" class="titleIndex">
                                    <button class="boutonPublier" type="submit">Ajouter un membre</button>
                                </a>
                                <a href="editerGroupe.php?gid=' . $groupe->gid . '" class="titleIndex">
                                    <button class="boutonPublier" type="submit">Modifier le groupe</button>
                                </a>
                                <a href="suppressionGroupe.php?gid=' . $groupe->gid . '" class="titleIndex">
                                    <button class="boutonSupprimer" type="submit">Supprimer le groupe</button>
                                </a>
                                <a href="quitterGroupe.php?gid=' . $groupe->gid . '" class="titleIndex">
                                    <button class="boutonSupprimer" type="submit">Quitter le groupe</button>
                                </a>
                            </section>
                        </section>
                        <table class="depense">
                            <thead>
                                <tr>
                                    <th>Utilisateur</th>
                                    <th>Total des dépenses</th>
                                    <th>Différence avec la moyenne</th>
                                </tr>
                                </thead>
                            <tbody>
                            ';
                            foreach ($participantsGroupe as $participantGroupe) {
                                $devise = $gr->getGroupById($gid)->devise;
                                if ($participantGroupe->estConfirme == 1) {
                                $newParticipant = $ur->getUserById($participantGroupe->uid);
                                $total = $dr->getTotalDepenseByUidAndGig($participantGroupe->uid, $gid);
                                echo '
                                <tr>
                                    <td>
                                        <section class="membres2">';
                                            if (isset($newParticipant->pdp) && $newParticipant->pdp == 1) {
                                                echo '<img src="images/profil_' . $newParticipant->uid . '.png" alt="profil" title="' . $newParticipant->prenom . ' ' . $newParticipant->nom . '" width="70px" height="70px">';
                                            } else {
                                                echo '<img src="images/profil_default.png" alt="profil" title="' . $newParticipant->prenom . ' ' . $newParticipant->nom . '" width="70px" height="70px">';
                                            }
                                            echo '
                                            <h3>'. $newParticipant->prenom . ' ' . $newParticipant->nom . '</h3>
                                        </section>
                                    </td>
                                    <td>'. round($total, 2) . $devise .'</td>';
                                    if (round($total - $moyenne, 2) > 0) {
                                        echo '<td>' . '+'. round($total - $moyenne, 2) . $devise . '</td>';
                                    } else {
                                        echo '<td>' . round($total - $moyenne, 2) . $devise . '</td>';
                                    }
                                    echo '
                                </tr>';
                                }
                            } echo '
                            </tbody>
                        </table>
                    </section>
                </section>
                <section class="groupeCouleur">
                    <section class="exception">
                        <section class="groupes2">
                            <h2>Dépenses totales: '.  round($depensesTotalParGroupe, 2) . $devise.'</h2>
                            <form class="search" action="depense.php">
                                <input type="search" id="recherche" name="recherche" placeholder="Rechercher">
                                <button>
                                    <i class="material-icons">search</i>
                                </button>
                            </form>
                            <a href="rechercheAvancee.php?gid=' . $groupe->gid . '">
                                <button class="boutonPublier" type="submit">Recherche Avancée</button>
                            </a>
                            <a href="versements.php?gid=' . $groupe->gid . '">
                                <button class="boutonPublier" type="submit">Liste des versements</button>
                            </a>
                            <a href="solder.php?gid=' . $groupe->gid . '">
                                <button class="boutonPublier" type="submit">Solder le groupe</button>
                            </a>
                            <a href="annulerSolde.php?gid=' . $groupe->gid . '">
                                <button class="boutonSupprimer" type="submit">Annuler le solde</button>
                            </a>
                        </section>
                        <table class="depense">
                            <thead>
                                <tr>
                                    <th>Utilisateur</th>
                                    <th>Date - heure</th>
                                    <th>Achat + Prix</th>
                                    <th>Tag</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($depensesGroupe as $depenseGroupe) {
                                $newDepense = $dr->getDepenseByDid($depenseGroupe->did);
                                $newParticipant = $ur->getUserById($depenseGroupe->uid);
                                $newCaracteriser = $cr->getCaracteriserByDid($depenseGroupe->did);
                                $newTag = $tr->getTagByTid($newCaracteriser->tid);
                                echo '
                                <tr>
                                    <td>
                                        <section class="membres2">';
                                if (isset($newParticipant->pdp) && $newParticipant->pdp == 1) {
                                    echo '<img src="images/profil_' . $newParticipant->uid . '.png" alt="profil" title="' . $newParticipant->prenom . ' ' . $newParticipant->nom . '" width="70px" height="70px">';
                                } else {
                                    echo '<img src="images/profil_default.png" alt="profil" title="' . $newParticipant->prenom . ' ' . $newParticipant->nom . '" width="70px" height="70px">';
                                }
                                echo '
                                            <h3>'. $newParticipant->prenom . ' ' . $newParticipant->nom . '</h3>
                                        </section>
                                    </td>
                                    <td>'. $newDepense->dateHeure .'</td>
                                    <td>'. $newDepense->libelle . ' (' .  $newDepense->montant . $devise.')'.'</td>
                                    <td>Tag: '. $newTag->tag .'</td>
                                    <td>
                                        <section>
                                            <a href="depense.php?did=' . $newDepense->did . '">
                                                <button class="boutonBlanc" type="submit">Voir la dépense</button>
                                            </a>
                                        </section>
                                    </td>
                                </tr>';
                            } echo '
                            </tbody>
                        </table>
                        <a href="ajouterDepense.php?gid=' . $groupe->gid . '" class="titleIndex">
                            <button class="boutonPublier" type="submit">Ajouter une dépense</button>
                        </a>
                    </section>
                </section>
            </section>
        </main>';
}
?>
