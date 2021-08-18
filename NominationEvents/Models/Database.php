<?php
namespace Models;
use PDO;
use PDOException;

class Database
{
    private static $user = 'masterAdmin';
    private static $password = 'bulbasaurAdmin';
    private static $dsn="mysql:host=bulbasaur-db.ckohzdqyvmzm.ca-central-1.rds.amazonaws.com;dbname=bulbasaur_db";
    private static $dbcon ;

    private function __construct()
    {
    }

    public static function getdb()
    {
        if (!isset(self::$dbcon)) {
            try {
                self::$dbcon = new PDO(self::$dsn, self::$user, self::$password);
                self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$dbcon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                $msg = $e->getMessage();
                echo $msg;
                exit();
            }
        }
        return self::$dbcon;
    }

}