<?php
require 'inc/db_user.inc.php';
require 'inc/db_group.inc.php';
require 'inc/db_participate.inc.php';
require 'inc/db_depense.inc.php';

use User\UserRepository;
use Participate\ParticipateRepository;
use Group\GroupRepository;
use Depense\DepenseRepository;
$_SESSION['message'] = "";

function displayGroups() {
    $ur = new UserRepository();
    $pr = new ParticipateRepository();
    $gr = new GroupRepository();
    $dr = new DepenseRepository();
    $groupes = $gr->getAllGroups();
    $participates = $pr->getParticipateByUid($_SESSION['uid']);
    while ($groupe = $groupes->fetch(PDO::FETCH_ASSOC)) {
        foreach ($participates as $participate) {
            if ($participate->uid == $_SESSION['uid'] && $groupe['gid'] == $participate->gid && $participate->estConfirme) {
                $createur = $ur->getUserById($groupe['uid']);
                $participantsGroupe = $pr->getParticipateByGidAndUidClass($groupe['gid'], $groupe['uid']);
                echo '
                    <section class="groupeCouleur">
                        <a href="groupe.php?gid=' . $groupe['gid'] . '">
                            <h2>Groupe "' . $groupe['nom'] . '"</h2>
                        </a>
                        <section class="infosGroupes">
                            <a href="groupe.php?gid=' . $groupe['gid'] . '">
                                <img src="images/groupes.png" alt="image groupe" width="900px">
                            </a>
                            <h2>Créateur:</h2>
                            <section class="profilsGroupes">
                                <img src="images/profil_' . $groupe['uid'] . '.png" alt="profil" title="' . $createur->prenom . ' ' . $createur->nom . '" width="70px" height="70px">
                            </section>
                            <h2>Participants confirmés:</h2>
                            <section class="profilsGroupes">';
                foreach ($participantsGroupe as $participantGroupe) {
                    if ($participantGroupe->estConfirme == 1) {
                        $newParticipant = $ur->getUserById($participantGroupe->uid);
                        if (isset($newParticipant->pdp) && $newParticipant->pdp == 1) {
                            echo '<img src="images/profil_' . $newParticipant->uid . '.png" alt="profil" title="' . $newParticipant->prenom . ' ' . $newParticipant->nom . '" width="70px" height="70px">';
                        } else {
                            echo '<img src="images/profil_default.png" alt="profil" title="' . $newParticipant->prenom . ' ' . $newParticipant->nom . '" width="70px" height="70px">';
                        }
                    }
                }
                echo '
                            </section>
                            <h2>Participants invités:</h2>
                            <section class="profilsGroupes">';
                foreach ($participantsGroupe as $participantGroupe) {
                    if ($participantGroupe->estConfirme == 0) {
                        $newParticipant = $ur->getUserById($participantGroupe->uid);
                        if (isset($newParticipant->pdp) && $newParticipant->pdp == 1) {
                            echo '<img src="images/profil_' . $newParticipant->uid . '.png" alt="profil" title="' . $newParticipant->prenom . ' ' . $newParticipant->nom . '" width="70px" height="70px">';
                        } else {
                            echo '<img src="images/profil_default.png" alt="profil" title="' . $newParticipant->prenom . ' ' . $newParticipant->nom . '" width="70px" height="70px">';
                        }
                    }
                }
                echo '
                            </section>
                            <table class="depense">
                                <thead>
                                <tr>
                                    <th>Utilisateur</th>
                                    <th>Date</th>
                                    <th>Achat + Prix</th>
                                    <th>Tags</th>
                                    <th>Voir Dépense</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_3.png" alt="image profil" width="80px" height="80px">
                                            <h3>Slyway</h3>
                                        </section>
                                    </td>
                                    <td>23/10/2021</td>
                                    <td>KFC (35€)</td>
                                    <td>Kfc, Resto, Slyway</td>
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
                                            <img src="images/profil_1.png" alt="image profil" width="80px" height="80px">
                                            <h3>Maxim Léonet</h3>
                                        </section>
                                    </td>
                                    <td>27/10/2021</td>
                                    <td>3 planches de surf (600€)</td>
                                    <td>Surf, Planches, Maxim</td>
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
                                            <img src="images/profil_2.png" alt="image profil" width="80px" height="80px">
                                            <h3>Rb_NewPokeaS</h3>
                                        </section>
                                    </td>
                                    <td>02/11/2021</td>
                                    <td>2 vestes (150€)</td>
                                    <td>Vestes, Vêtements, RB</td>
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
                            ';
                            $devise = $gr->getGroupById($groupe['gid'])->devise;
                            $depensesTotalParGroupe = $dr->getTotalDepenseByGid($groupe['gid']);
                            echo '
                            <h2>Dépenses totales: '.round($depensesTotalParGroupe, 2) . $devise . '</h2>
                            <a href="groupe.php?gid=' . $groupe['gid'] . '" class="titleIndex">
                                <button class="boutonPublier">Consulter le groupe</button>
                            </a>
                        </section>
                    </section>';
            }
        }
    }
}

function displayInvitations() {
    $ur = new UserRepository();
    $pr = new ParticipateRepository();
    $gr = new GroupRepository();
    $groupes = $gr->getAllGroups();
    $participates = $pr->getParticipateByUid($_SESSION['uid']);
    while ($groupe = $groupes->fetch(PDO::FETCH_ASSOC)) {
        foreach ($participates as $participate) {
            if ($participate->uid == $_SESSION['uid'] && $groupe['gid'] == $participate->gid && !$participate->estConfirme) {
                $createur = $ur->getUserById($groupe['uid']);
                echo '
                <section class="posInvit">
                    <table class="depense">
                        <thead>
                        <tr>
                            <th>Créateur</th>
                            <th>Intitulé</th>
                            <th>Choix</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <section class="membres2">';
                    if (isset($createur->pdp) && $createur->pdp == 1) {
                        echo '<img src="images/profil_' . $createur->uid . '.png" alt="profil" title="' . $createur->prenom . ' ' . $createur->nom . '" width="70px" height="70px">';
                    } else {
                        echo '<img src="images/profil_default.png" alt="profil" title="' . $createur->prenom . ' ' . $createur->nom . '" width="70px" height="70px">';
                    } echo'
                                    <h3>' . $createur->prenom . ' ' . $createur->nom . '</h3>
                                </section>
                            </td>
                            <td>Invitation pour rejoindre le groupe "' . $groupe['nom'] . '"</td>
                            <td>
                                <section>
                                <a href="./accepterInvitation.php?gid=' . $groupe['gid'] . '" class="titleIndex">
                                    <button class="boutonBlanc" name="submit" type="submit">Accepter</button>
                                </a>
                                <a href="./refuserInvitation.php?gid=' . $groupe['gid'] . '" class="titleIndex">
                                    <button class="boutonBlanc" name="noSubmit" type="submit">Refuser</button>
                                </a>
                                </section>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                </section>';
            }
        }
    }
}

?>
