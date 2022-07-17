<?php
namespace Group;

require_once 'db_link.inc.php';
use DB\DBLink;

class MyGroup {
    public $gid;
    public $nom;
    public $devise;
    public $uid;
}

class GroupRepository {
    function getGroup($nom) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM groupe where nom = :nom");
            $stmt->bindValue(":nom", $nom);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("Group\MyGroup");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function getGroupById($gid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM groupe where gid = :gid");
            $stmt->bindValue(":gid", $gid);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("Group\MyGroup");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function addGroup($nom, $devise, $uid) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("INSERT INTO groupe (nom, devise, uid) VALUES (:nom, :devise, :uid)");
        if ($stmt->execute(array(":nom" => $nom, ":devise" => $devise, ":uid" => $uid))) {
            $_SESSION['message'] = "<h1>Votre groupe a été créé avec succès !</h1>";
        } else {
            $_SESSION['message'] = "<h1>Erreur !</h1>";
        }
        DBLink::disconnect($pdo);
    }

    function removeGroup($gid) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("DELETE FROM groupe where gid = :gid");
        $stmt->bindParam(':gid', $gid);
        $stmt->execute();
        DBLink::disconnect($pdo);
    }

    function modifyGroup($gid, $nom, $devise) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("UPDATE groupe set nom = :nom, devise = :devise where gid = :gid");
        if ($stmt->execute(array(":nom" => $nom, ":devise" => $devise, ":gid" => $gid))) {
            $_SESSION['message'] = "<h1>Votre groupe a été modifié avec succès !</h1>";
        } else {
            $_SESSION['message'] = "<h1>Erreur !</h1>";
        }
        DBLink::disconnect($pdo);
    }
}
?>