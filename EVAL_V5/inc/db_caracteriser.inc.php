<?php
namespace Caracteriser;

require_once 'db_link.inc.php';
use DB\DBLink;

class MyCaracteriser {
    public $did;
    public $tid;
}

class CaracteriserRepository {

    function getCaracteriserByDid($did) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM caracteriser where did = :did");
            $stmt->bindValue(":did", $did);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("Caracteriser\MyCaracteriser");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function addCaracteriserByDidAndTid($did, $tid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("INSERT INTO caracteriser (did, tid) VALUES (:did, :tid)");
            $stmt->bindValue(":did", $did);
            $stmt->bindValue(":tid", $tid);
            if ($stmt->execute()) {
                $message .= "Caractériser ajouté !";
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $message;
    }

    function removeCaracteriserByDid($did) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("DELETE FROM caracteriser WHERE did = :did");
            $stmt->bindValue(":did", $did);
            if ($stmt->execute()) {
                $message .= "Caractériser supprimé !";
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $message;
    }

    function updateCaracteriserByDidAndTid($did, $tid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("UPDATE caracteriser SET tid = :tid WHERE did = :did");
            $stmt->bindValue(":did", $did);
            $stmt->bindValue(":tid", $tid);
            if ($stmt->execute()) {
                $message .= "Caractériser mis à jour !";
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $message;
    }
}
?>