<?php
namespace Versement;

require_once 'db_link.inc.php';
use DB\DBLink;
use PDO;

class MyVersement {
    public $uid1;
    public $uid2;
    public $gid;
    public $dateHeure;
    public $montant;
    public $estConfirme;
}

class VersementRepository {

    function addVersementByAll($uid1, $uid2, $gid, $dateHeure, $montant, $estConfirme) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("INSERT INTO versement (uid, uid_1, gid, dateHeure, montant, estConfirme) VALUES (:uid,:uid_1,:gid,:dateHeure,:montant,:estConfirme)");
        if ($stmt->execute(array(":uid"=>$uid1,":uid_1"=>$uid2,":gid"=>$gid,":dateHeure"=>$dateHeure,":montant"=>$montant,":estConfirme"=>$estConfirme))) {
            $_SESSION['message'] = "<h1>Le groupe a été soldé avec succès !</h1>";
        } else {
            $_SESSION['message'] = "<h1>Erreur !</h1>";
        }
        DBLink::disconnect($pdo);
    }

    function getVersementsByGid($gid) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("SELECT * FROM versement WHERE gid = :gid");
        $stmt->execute(array(":gid"=>$gid));
        $versements = $stmt->fetchAll(PDO::FETCH_CLASS, 'Versement\MyVersement');
        DBLink::disconnect($pdo);
        return $versements;
    }

    function confirmVersement($uid1, $uid2, $gid, $montant) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("UPDATE versement SET estConfirme = 1 WHERE uid = :uid AND uid_1 = :uid_1 AND gid = :gid AND montant = :montant");
        if ($stmt->execute(array(":uid"=>$uid1,":uid_1"=>$uid2,":gid"=>$gid,":montant"=>$montant))) {
            $_SESSION['message'] = "<h1>Votre versement a été confirmé avec succès !</h1>";
        } else {
            $_SESSION['message'] = "<h1>Erreur !</h1>";
        }
        DBLink::disconnect($pdo);
    }

    function deleteVersementByGid($gid) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("DELETE FROM versement WHERE gid = :gid");
        if ($stmt->execute(array(":gid"=>$gid))) {
            $_SESSION['message'] = "<h1>Le solde a été annulé avec succès !</h1>";
        } else {
            $_SESSION['message'] = "<h1>Erreur !</h1>";
        }
        DBLink::disconnect($pdo);
    }
}
?>