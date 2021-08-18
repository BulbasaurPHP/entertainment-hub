<?php

class dbitems {
    //properties

    public function getitems($db){
        $sql="SELECT * FROM top_ten";


        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $items = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $items;
    }


    public function getitemsorder($db){
        $sql="SELECT * FROM top_ten ORDER BY votes desc";


        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $items = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $items;
    }

    public function voteTopTen($movieID, $db){


        $sql = "UPDATE top_ten 
            SET votes = votes + 1
            WHERE movieID = :movieID;";

        $pdostm = $db->prepare($sql);

        $pdostm->bindParam(':movieID', $movieID);

        $count = $pdostm->execute();
        return $count;
    }

}
?>