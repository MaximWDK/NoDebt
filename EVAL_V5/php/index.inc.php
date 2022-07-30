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

function displayGroups() {
    $ur = new UserRepository();
    $gr = new GroupRepository();
    $pr = new ParticipateRepository();
    $dr = new DepenseRepository();
    $tr = new TagRepository();
    $cr = new CaracteriserRepository();

    $_SESSION['message'] = "";
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
                            <section class="profilsGroupes">';
                            if (isset($createur->pdp) && $createur->pdp == 1) {
                        echo '<img src="images/profil_' . $createur->uid . '.png" alt="profil" title="' . $createur->prenom . ' ' . $createur->nom . '" width="70px" height="70px">';
                    } else {
                        echo '<img src="images/profil_default.png" alt="profil" title="' . $createur->prenom . ' ' . $createur->nom . '" width="70px" height="70px">';
                    } echo'    
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
                                    <th>Date - heure</th>
                                    <th>Achat + Prix</th>
                                    <th>Tag</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>';
                            $depensesGroupe = $dr->getDepenseByGid($groupe['gid']);
                            $devise = $gr->getGroupById($groupe['gid'])->devise;
                            $i = 0;
                            foreach ($depensesGroupe as $depenseGroupe) {
                                if($i == 3) {
                                    break;
                                }
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
                                            </tr>'; $i++;
                            } echo '
                            </tbody>
                            </table>
                            ';
                            $devise = $gr->getGroupById($groupe['gid'])->devise;
                            $depensesTotalParGroupe = $dr->getTotalDepenseByGid($groupe['gid']);
                            echo '
                            <h2>Dépenses totales: ' . round($depensesTotalParGroupe, 2) . $devise . '</h2>
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
