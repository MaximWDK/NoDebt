<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['dateHeure'], $_POST['montant'], $_POST['libelle'])) {
        $dateHeure = trim($_POST['dateHeure']);
        $montant = trim($_POST['montant']);
        $libelle = trim($_POST['libelle']);
        $uid = $_SESSION['uid'];
        $gid = $_GET['gid'];

        $dr->addDepense($dateHeure, $montant, $libelle, $uid, $gid);
    }
}
?>