<?php
require 'inc/db_depense.inc.php';

use Depense\DepenseRepository;
$dr = new DepenseRepository();
$_SESSION['message'] = "";

if (isset($_POST['submit'])) {
    if (isset($_POST['dateHeure'], $_POST['montant'], $_POST['libelle'])) {
        $dateHeure = trim($_POST['dateHeure']);
        $montant = trim($_POST['montant']);
        $libelle = trim($_POST['libelle']);
        $uid = $_SESSION['uid'];
        $gid = '1';

        $dr->addDepense($dateHeure, $montant, $libelle, $uid, $gid);
    }
}
?>