<?php

namespace models;

use models\Database;

require_once 'vendor/autoload.php';

class NewsletterDB
{

    public function addNewsletter($newsletter)
    {
        $db = Database::getDB();

        $content = $newsletter->getNewsletterContent();


        $query = 'INSERT INTO newsletter
                     (content)
                  VALUES
                     (:content)';
        $statement = $db->prepare($query);
        $statement->bindValue(':content', $content);
        $statement->execute();
        $statement->closeCursor();
    }

    public function getAllNewsletter()
    {
        $sql = "select * from newsletter";
        $db = Database::getDB();
        $statement = $db->prepare($sql);
        $statement->execute();

        // assign to a variable as an object
        $newsletters = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $newsletters;
    }

    public function getANewsletter($id)
    {
        $sql = "select * from newsletter where id = :id";
        $db = Database::getDB();
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        // assign to a variable as an object
        $newsletters = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $newsletters;
    }

    public function updateNewsletter($id, $content)
    {
        $db = Database::getDB();
        $sql = "UPDATE newsletter SET content = :content WHERE id = :id";
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':content', $content);
        $count = $statement->execute();
        return $count;
    }

    public function deleteNewsletter($id)
    {
        $db = Database::getDB();
        $sql = "delete FROM newsletter WHERE id = :id";
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $count = $statement->execute();
        return $count;
    }
}
