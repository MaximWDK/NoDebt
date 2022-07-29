<?php
namespace Tag;

require_once 'db_link.inc.php';
use DB\DBLink;

class MyTag {
    public $tid;
    public $tag;
    public $gid;
}

class TagRepository {

    function getTagByTid($tid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM tag where tid = :tid");
            $stmt->bindValue(":tid", $tid);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("Tag\MyTag");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function getTagByTagNameAndGid($tag, $gid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("SELECT * FROM tag where tag = :tag and gid = :gid");
            $stmt->bindValue(":tag", $tag);
            $stmt->bindValue(":gid", $gid);
            if ($stmt->execute()) {
                $obj = $stmt->fetchObject("Tag\MyTag");
            } else {
                $message .= "Erreur !";
            }
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($pdo);
        return $obj;
    }

    function addTag($tag, $gid) {
        try {
            $message = "";
            $pdo = DBLink::connect2db(MYDB, $message);
            $stmt = $pdo->prepare("INSERT INTO tag (tag, gid) VALUES (:tag, :gid)");
            $stmt->bindValue(":tag", $tag);
            $stmt->bindValue(":gid", $gid);
            if ($stmt->execute()) {
                $message .= "Tag ajouté !";
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