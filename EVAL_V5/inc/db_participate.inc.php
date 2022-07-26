<?php
namespace Participate;

require_once 'db_link.inc.php';
use DB\DBLink;
use PDO;

class MyParticipate {
    public $uid;
    public $gid;
    public $estConfirme;
}

class ParticipateRepository {

    function checkIfExistsParticipate($uid, $gid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM participer WHERE uid = :uid AND gid = :gid");
            $stmt->bindValue(":uid", $uid);
            $stmt->bindValue(":gid", $gid);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("Participate\MyParticipate");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function getParticipateByUidAndGid($uid, $gid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM participer WHERE uid = :uid AND gid = :gid");
            $stmt->bindValue(":uid", $uid);
            $stmt->bindValue(":gid", $gid);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("Participate\MyParticipate");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function getParticipateByUid($uid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM participer WHERE uid = :uid");
            $stmt->bindValue(":uid", $uid);
            if ($stmt->execute()){
                $obj = $stmt->fetchAll(PDO::FETCH_CLASS, "Participate\MyParticipate");
            } else {
                $message .= "Erreur !";
            }
        } catch(Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($bdd);
        return $obj;
    }

    function addParticipate($uid, $gid, $estConfirme) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("INSERT INTO participer (uid, gid, estConfirme) VALUES (:uid, :gid, :estConfirme)");
        if (!$stmt->execute(array(":uid" => $uid, ":gid" => $gid, ":estConfirme" => $estConfirme))) {
            $_SESSION['message'] = "<h1>Erreur !</h1>";
        }
        DBLink::disconnect($pdo);
    }

    function removeParticipate($gid, $uid) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("DELETE FROM participer where gid = :gid AND uid = :uid");
        $stmt->bindParam(':gid', $gid);
        $stmt->bindParam(':uid', $uid);
        $stmt->execute();
        DBLink::disconnect($pdo);
    }

    function removeAllParticipate($gid) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("DELETE FROM participer where gid = :gid");
        $stmt->bindParam(':gid', $gid);
        if(!$stmt->execute()) {
            $_SESSION['message'] = "<h1>Erreur !</h1>";
        } else {
            $_SESSION['message'] = "<h1>Groupe supprimé avec succès !</h1>";
        }
        DBLink::disconnect($pdo);
    }
}
?>