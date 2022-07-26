<?php
namespace User;

require_once 'db_link.inc.php';
use DB\DBLink;

class MyUser {
    public $uid;
    public $courriel;
    public $nom;
    public $prenom;
    public $motPasse;
    public $estActif;
    public $pdp;
}

class UserRepository {
    function getUser($courriel) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM users where courriel = :courriel");
            $stmt->bindValue(":courriel", $courriel);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("User\MyUser");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function getUserById($uid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM users where uid = :uid");
            $stmt->bindValue(":uid", $uid);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("User\MyUser");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function addUser($courriel, $nom, $prenom, $motPasse) {
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("INSERT INTO users (courriel, nom, prenom, motPasse, estActif) VALUES (:courriel,:nom,:prenom,:motPasse,'1')");
            if ($stmt->execute(array(":courriel"=>$courriel,":nom"=>$nom,":prenom"=>$prenom,":motPasse"=>$motPasse))) {
                $_SESSION['message'] = "<h1>Votre compte a été créé avec succès !</h1>";
            } else {
                $_SESSION['message'] = "<h1>Erreur !</h1>";
            }
        DBLink::disconnect($pdo);
    }

    function removeUser($uid) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("DELETE FROM users where uid = :uid");
        $stmt->bindParam(':uid', $uid);
        $stmt->execute();
        DBLink::disconnect($pdo);
    }

    function modifyUser($courriel, $nom, $prenom, $uid, $pdp) {
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("UPDATE users set courriel = :courriel, nom = :nom, prenom = :prenom where uid = :uid");
        if($stmt->execute(array(":courriel"=>$courriel,":nom"=>$nom,":prenom"=>$prenom,":uid"=>$uid))) {
            $_SESSION['message'] = "<h1>Votre compte a été modifié avec succès !</h1>";
            $_SESSION['courriel'] = $courriel;
            $_SESSION['uid'] = $uid;
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['pdp'] = $pdp;
        } else {
            $_SESSION['message'] = "<h1>Erreur !</h1>";
        }
        DBLink::disconnect($pdo);
    }

    function modifyPassword($motPassePasHash, $uid) {
        $motPasse = hash("sha512", $motPassePasHash);
        $pdo = DBLink::connect2db(MYDB, $message);
        $stmt = $pdo->prepare("UPDATE users set motPasse = :motPasse where uid = :uid");
        if($stmt->execute(array(":motPasse"=>$motPasse,":uid"=>$uid))) {
            $_SESSION['message'] = "<h1>Votre mot de passe a été modifié avec succès !</h1>";
        } else {
            $_SESSION['message'] = "<h1>Erreur !</h1>";
        }
        DBLink::disconnect($pdo);
    }
}
?>