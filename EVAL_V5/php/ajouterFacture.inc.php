<?php
if (isset($_POST['submit'])) {
    if(isset($_FILES['facture'])){
        $_SESSION['message'] = "";
        $erreurs= array();
        $file_name = $_FILES['facture']['name'];
        $file_size = $_FILES['facture']['size'];
        $file_tmp = $_FILES['facture']['tmp_name'];
        $file_type = $_FILES['facture']['type'];
        $file_ext = strtolower(end(explode('.',$_FILES['facture']['name'])));
        $typesAutorises = array("jpeg","jpg","png", "gif", "pdf");
        $did = $_GET['did'];
        $gid = $dr->getDepenseByDid($did)->gid;
        $scan = $file_name;
        $newFacture = $fr->addFacture($scan,$did);
        $getNewFacture = $fr->getFacturesByDidAndScan($did, $scan);
        $fid = $getNewFacture->fid;

        if(in_array($file_ext,$typesAutorises)=== false){
            $_SESSION['message'] = "<h1>Ce type de fichier est interdit !</h1>";
            $erreurs[] = "Ce type de fichier est interdit !";
            $fr->removeFactureByFid($fid);

        }

        if($file_size > 5242880){
            $_SESSION['message'] = "<h1>Le fichier doit faire au maximum 5MB !</h1>";
            $erreurs[] = "Le fichier doit faire au maximum 5MB !";
            $fr->removeFactureByFid($fid);

        }

        if(!$erreurs) {
            move_uploaded_file($file_tmp,"./uploads/factures/".$gid.'_'.$fid.'_'.$file_name);
            $_SESSION['message'] = "<h1>Facture ajoutée avec succès !</h1>";
            $scan = $gid.'_'.$fid.'_'.$file_name;
            $fr->updateFactureScanByFid($fid, $scan);
        } else {
            $_SESSION['message'] = "<h1>Erreur lors de l'ajout de la facture !</h1>";
            $fr->removeFactureByFid($fid);
        }
    }
}
?>