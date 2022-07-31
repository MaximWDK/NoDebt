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

function displayDepense() {
    $ur = new UserRepository();
    $gr = new GroupRepository();
    $pr = new ParticipateRepository();
    $dr = new DepenseRepository();
    $tr = new TagRepository();
    $cr = new CaracteriserRepository();

    $_SESSION['message'] = "";
    $uid = $_SESSION['uid'];
    $did = $_GET['did'];
    $depense = $dr->getDepenseByDid($did);
    $gid = $depense->gid;
    $participe = $pr->getParticipateByUidAndGid($uid, $gid);
    $newUid = $depense->uid;
    $newParticipant = $ur->getUserById($newUid);
    $devise = $gr->getGroupById($gid)->devise;
    $newCaracteriser = $cr->getCaracteriserByDid($did);
    $newTag = $tr->getTagByTid($newCaracteriser->tid);

    if ($participe->uid == $_SESSION['uid'] && $gid == $participe->gid && $participe->estConfirme == 1) {
        $_SESSION['message'] = "";
    } else {
        header("Location: index.php");
    }
    echo '
    <main>
            <section class="titleIndex">
                <header>
                    <h1>Afficher une dépense</h1>
                </header>
            </section>
            <header class="groupes">
                <article class="exception">
                    <section class="groupes3">
                        <h2>Dépense sélectionnée</h2>
                    </section>
                    <table class="depense">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Date- heure</th>
                                <th>Achat + Prix</th>
                                <th>Tag</th>
                                <th>Gérer Factures</th>
                                <th>Modifier Dépense</th>
                                <th>Supprimer Dépense</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>';
                                if (isset($newParticipant->pdp) && $newParticipant->pdp == 1) {
                                    echo '<img src="images/profil_' . $newParticipant->uid . '.png" alt="profil" title="' . $newParticipant->prenom . ' ' . $newParticipant->nom . '" width="70px" height="70px">';
                                } else {
                                    echo '<img src="images/profil_default.png" alt="profil" title="' . $newParticipant->prenom . ' ' . $newParticipant->nom . '" width="70px" height="70px">';
                                } echo '
                                <h3>'. $newParticipant->prenom . ' ' . $newParticipant->nom . '</h3>
                            </td>
                            <td>'. $depense->dateHeure .'</td>
                            <td>'. $depense->libelle . ' (' .  $depense->montant . $devise.')'.'</td>
                            <td>Tag: '. $newTag->tag .'</td>
                            <td>
                                <a href="factures.php?did=' . $did . '" class="titleIndex">
                                    <button class="boutonBlanc" type="submit">Factures</button>
                                </a>
                            </td>
                            <td>
                                <a href="modifierDepense.php?did=' . $did . '"  class="titleIndex">
                                    <button class="boutonBlanc" type="submit">Modifier</button>
                                </a>
                            </td>
                            <td>
                                <a href="suppressionDepense.php?did=' . $did . '" class="titleIndex">
                                    <button class="boutonBlanc" type="submit">Supprimer</button>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </article>
            </header>
        </main>';
}
?>
