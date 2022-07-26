<?php
namespace Depense;

require_once 'db_link.inc.php';
use DB\DBLink;

class MyDepense {
    public $did;
    public $dateHeure;
    public $montant;
    public $libelle;
    public $uid;
    public $gid;
}

class DepenseRepository {

    function getDepenseByDid($did) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM depense WHERE did = :did");
            $stmt->bindValue(":did", $did);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("Depense\MyDepense");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }
    
    function getDepenseByGroupId($gid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM depense WHERE gid = :gid");
            $stmt->bindValue(":gid", $gid);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("Depense\MyDepense");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function addDepense($dateHeure, $montant, $libelle, $uid, $gid) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("INSERT INTO depense (dateHeure, montant, libelle, uid, gid) VALUES (:dateHeure, :montant, :libelle, :uid, :gid)");
        if (!$stmt->execute(array(":dateHeure" => $dateHeure, ":montant" => $montant, ":libelle" => $libelle, ":uid" => $uid, ":gid" => $gid))) {
            $_SESSION['message'] = "<h1>Erreur !</h1>";
        } else {
            $_SESSION['message'] = "<h1>Dépense a été ajoutée avec succès !</h1>";
        }
        DBLink::disconnect($pdo);
    }

    function removeDepense($did)
    {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("DELETE FROM depense where did = :did");
        $stmt->bindParam(':did', $did);
        if(!$stmt->execute()) {
            $_SESSION['message'] = "<h1>Erreur !</h1>";
        } else {
            $_SESSION['message'] = "<h1>Dépense supprimée avec succès !</h1>";
        }
        DBLink::disconnect($pdo);
    }

    function modifyDepense($did, $dateHeure, $montant, $libelle, $uid) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("UPDATE depense set dateHeure = :dateHeure, montant = :montant, libelle = :libelle, uid = :uid where did = :did");
        if ($stmt->execute(array(":did" => $did, ":dateHeure" => $dateHeure, ":montant" => $montant, ":libelle" => $libelle, ":uid" => $uid))) {
            $_SESSION['message'] = "<h1>Votre dépense a été modifiée avec succès !</h1>";
        } else {
            $_SESSION['message'] = "<h1>Erreur !</h1>";
        }
        DBLink::disconnect($pdo);
    }
}
?>