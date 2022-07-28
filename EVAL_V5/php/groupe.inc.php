<?php
require 'inc/db_user.inc.php';
require 'inc/db_group.inc.php';
require 'inc/db_participate.inc.php';
require 'inc/db_depense.inc.php';

use User\UserRepository;
use Participate\ParticipateRepository;
use Group\GroupRepository;
use Depense\DepenseRepository;

function displayGroup() {
    $ur = new UserRepository();
    $gr = new GroupRepository();
    $pr = new ParticipateRepository();
    $dr = new DepenseRepository();

    $_SESSION['message'] = "";
    $uid = $_SESSION['uid'];
    $gid = $_GET['gid'];
    $participe = $pr->getParticipateByUidAndGid($uid, $gid);
    $participantsGroupe = $pr->getParticipateByGid($gid);
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
                            <h2>Dépenses totales: '. $depensesTotalParGroupe . $devise.'</h2>
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
                                    <th>Date</th>
                                    <th>Achat + Prix</th>
                                    <th>Tags</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_3.png" alt="image profil" width="80" height="80">
                                            <h3>Slyway</h3>
                                        </section>
                                    </td>
                                    <td>23/10/2021</td>
                                    <td>KFC (35€)</td>
                                    <td>Tags: Kfc, Resto, Slyway</td>
                                    <td>
                                        <section>
                                            <form action="depense.php">
                                                <button class="boutonBlanc" type="submit">Voir la dépense</button>
                                            </form>
                                        </section>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_1.png" alt="image profil" width="80" height="80">
                                            <h3>Maxim Léonet</h3>
                                        </section>
                                    </td>
                                    <td>27/10/2021</td>
                                    <td>3 planches de surf (600€)</td>
                                    <td>Tags: Surf, Planches, Maxim</td>
                                    <td>
                                        <section>
                                            <form action="depense.php">
                                                <button class="boutonBlanc" type="submit">Voir la dépense</button>
                                            </form>
                                        </section>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_2.png" alt="image profil" width="80" height="80">
                                            <h3>Rb_NewPokeaS</h3>
                                        </section>
                                    </td>
                                    <td>02/11/2021</td>
                                    <td>2 vestes (150€)</td>
                                    <td>Tags: Vestes, Vêtements, RB</td>
                                    <td>
                                        <section>
                                            <form action="depense.php">
                                                <button class="boutonBlanc" type="submit">Voir la dépense</button>
                                            </form>
                                        </section>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_3.png" alt="image profil" width="80" height="80">
                                            <h3>Slyway</h3>
                                        </section>
                                    </td>
                                    <td>05/11/2021</td>
                                    <td>Spa (90€)</td>
                                    <td>Tags: Spa, Piscine, Slyway</td>
                                    <td>
                                        <section>
                                            <form action="depense.php">
                                                <button class="boutonBlanc" type="submit">Voir la dépense</button>
                                            </form>
                                        </section>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_1.png" alt="image profil" width="80" height="80">
                                            <h3>Maxim Léonet</h3>
                                        </section>
                                    </td>
                                    <td>10/11/2021</td>
                                    <td>Saut en parachute (200€)</td>
                                    <td>Tags: Saut, Élastique, Maxim</td>
                                    <td>
                                        <section>
                                            <form action="depense.php">
                                                <button class="boutonBlanc" type="submit">Voir la dépense</button>
                                            </form>
                                        </section>
                                    </td>
                                </tr>
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
