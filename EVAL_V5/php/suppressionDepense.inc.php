<?php
require 'inc/db_depense.inc.php';
use Depense\DepenseRepository;
$dr = new DepenseRepository();
$_SESSION['message'] = "";

if (isset($_POST['noSubmit'])) {
    header('Location:depense.php');
}

if (isset($_POST['submit'])) {
    $did = '1';
    $depense = $dr->checkDepense($did);

    if(!$depense) {
        $_SESSION['message'] = "<h1>Cette dépense a déjà été supprimée !</h1>";
    } else {
        $dr->removeDepense($did);
    }
}
?>