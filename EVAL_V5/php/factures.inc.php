<?php
require 'inc/db_user.inc.php';
require 'inc/db_group.inc.php';
require 'inc/db_participate.inc.php';
require 'inc/db_depense.inc.php';
require 'inc/db_tag.inc.php';
require 'inc/db_caracteriser.inc.php';
require 'inc/db_factures.inc.php';

use User\UserRepository;
use Participate\ParticipateRepository;
use Group\GroupRepository;
use Depense\DepenseRepository;
use Tag\TagRepository;
use Caracteriser\CaracteriserRepository;
use Factures\FacturesRepository;

function displayFactures() {
    $ur = new UserRepository();
    $gr = new GroupRepository();
    $pr = new ParticipateRepository();
    $dr = new DepenseRepository();
    $tr = new TagRepository();
    $cr = new CaracteriserRepository();
    $fr = new FacturesRepository();

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
    $factures = $fr->getFacturesByDidClass($did);

    if ($participe->uid == $_SESSION['uid'] && $gid == $participe->gid && $participe->estConfirme == 1) {
        $_SESSION['message'] = "";
    } else {
        header("Location: index.php");
    }
    echo '
    <main>
            <section class="titleIndex">
                <header>
                    <h1>Facture(s) de la dépense "'.$depense->libelle.'"</h1>
                </header>
            </section>
            <header class="groupes">
                <article class="exception">
                    <table class="depense">
                        <thead>
                            <tr>
                                <th>Afficher Facture</th>
                                <th>Supprimer Facture</th>
                            </tr>
                        </thead>
                        <tbody>';
                        if($factures) {
                            foreach ($factures as $facture) {
                                echo '
                        <tr>
                            <td>
                                <a href="uploads/factures/'. $facture->scan .'">
                                    <button class="boutonBlanc" type="submit">Afficher La Facture</button>
                                </a>
                            </td>
                           
                            <td>
                                <a href="suppressionFacture.php?fid=' . $facture->fid . '" class="titleIndex">
                                    <button class="boutonBlanc" type="submit">Supprimer</button>
                                </a>
                            </td>
                        </tr>';
                            }
                        } else {
                            echo '<h3>Aucune facture n\'a été ajoutée pour cette dépense !</h3>';
                        }
                        echo '
                        </tbody>
                    </table>
                    <a href="ajouterFacture.php?did=' . $did . '" class="titleIndex">
                            <button class="boutonPublier" type="submit">Ajouter une facture</button>
                    </a>
                </article>
            </header>
        </main>';
}
?>
