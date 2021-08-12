<?php
namespace Model;


use PDO;

class trivia
{
    public function listtrivias($db)
    {
        $sql = 'SELECT * FROM trivias';
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchall(PDO::FETCH_OBJ);

    }
    public function triviadetails($db,$id)
    {
        $sql = "SELECT * FROM trivias WHERE id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->BindParam(':id',$id);
        $pdostm->execute();

        return $pdostm->fetch(PDO::FETCH_OBJ);
    }
    public function deletetrivia($db,$id)
    {
        $sql = "DELETE FROM trivias WHERE id = :id";

        $pst = $db->prepare($sql);
        $pst->bindParam(':id',$id);
        return $pst->execute();
    }
    public function updatetrivia($db,$name,$about,$content,$id)
    {
        $sql = "UPDATE trivias
        SET name = :name,
            about = :prize,
            content = :winner
            WHERE id = :id";

        $pst = $db->prepare($sql);

        $pst->bindParam(':name',$name);
        $pst->bindParam(':prize',$about);
        $pst->bindParam(':winner',$content);
        $pst->bindParam(':id',$id);

        return $pst->execute();
    }
    public function addtrivia($db,$name,$about,$content)
    {
        $sql = "INSERT into trivias (name,about,content)
            VALUES (:name,:about,:content)";
        $pst = $db->prepare($sql);

        $pst->bindParam(':name' , $name);
        $pst->bindParam(':about' , $about);
        $pst->bindParam(':content' , $content);

        return $pst->execute();
    }
}