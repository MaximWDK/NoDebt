<?php
if (isset($_POST['noSubmit'])) {
    header('Location:groupe.php?gid=' . $gid);
}

if (isset($_POST['submit'])) {
    $toutGroupe = $gr->getGroupById($gid);
    if($_SESSION['uid'] == $toutGroupe->uid) {
        $_SESSION['message'] = "<h1>Si vous souhaitez quitter ce groupe alors que vous en êtes le créateur, vous devez alors passer par le bouton supprimer !</h1>";
    } else {
        $_SESSION['message'] = "<h1>Vous avez quitté le groupe avec succès !</h1>";
        $pr->removeParticipate($_SESSION['uid'], $gid);
    }

}
?>