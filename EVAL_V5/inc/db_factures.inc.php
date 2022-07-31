<?php
namespace Factures;

require_once 'db_link.inc.php';
use DB\DBLink;
use PDO;

class MyFactures {
    public $fid;
    public $scan;
    public $did;
}

class FacturesRepository {

    function getFactureByFid($fid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM facture where fid = :fid");
            $stmt->bindValue(":fid", $fid);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("Factures\MyFactures");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function getFacturesByDidClass($did) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM facture where did = :did");
            $stmt->bindValue(":did", $did);
            if ($stmt->execute()) {
                $obj = $stmt->fetchAll(PDO::FETCH_CLASS, "Factures\MyFactures");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function getFactureByDid($did) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM facture where did = :did");
            $stmt->bindValue(":did", $did);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("Factures\MyFactures");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function getFacturesByDidAndScan($did, $scan) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM facture where did = :did and scan = :scan");
            $stmt->bindValue(":did", $did);
            $stmt->bindValue(":scan", $scan);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("Factures\MyFactures");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function addFacture($scan,$did) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("INSERT INTO facture (scan,did) VALUES (:scan,:did)");
            $stmt->bindValue(":scan", $scan);
            $stmt->bindValue(":did", $did);
            if ($stmt->execute()) {
                $message = "La facture a bien été ajoutée";
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $message;
    }

    function removeFactureByFid($fid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("DELETE FROM facture WHERE fid = :fid");
            $stmt->bindValue(":fid", $fid);
            if ($stmt->execute()) {
                $message = "La facture a bien été supprimée";
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $message;
    }

    function updateFactureScanByFid($fid, $scan) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("UPDATE facture SET scan = :scan WHERE fid = :fid");
            $stmt->bindValue(":fid", $fid);
            $stmt->bindValue(":scan", $scan);
            if ($stmt->execute()) {
                $message = "La facture a bien été mise à jour";
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $message;
    }

    function removeAllFacturesByDid($did) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("DELETE FROM facture WHERE did = :did");
            $stmt->bindValue(":did", $did);
            if ($stmt->execute()) {
                $message = "Les factures ont bien été supprimées";
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