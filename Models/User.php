<?php


namespace Model;


class User
{
    public function adduser($db,$name,$email,$phone,$passhash,$role){
        $sql = "INSERT into Users(name,email,phone,passhash,role)
            VALUES(:name,:email,:phone,:passhash,:role)";

        $pst = $db->prepare($sql);
        $pst->bindParam(':name',$name);
        $pst->bindParam(':email',$email);
        $pst->bindParam(':phone',$phone);
        $pst->bindParam(':passhash',$passhash);
        $pst->bindParam(':role',$role);

        return $pst->execute();

    }

    public function finduser($db,$email){
        $sql = "Select * FROM user where email = :email";

        $pst = $db->prepare($sql);
        $pst->bindParam(':email',$email);

        return $pst->execute();

    }


}