<?php
namespace Core\Database;

use \PDO;

class MysqlDatabase extends Database
{
    /**
     * @var null
     */
    private static $instance = null;

    /**
     * @return PDO
     */
    public static function getPDO(): PDO
    {

        if (self::$instance === null) {
            self::$instance = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', 'Root1234!', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        return self::$instance;
    }

    public function query($statement, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->query($statement);

        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS,$class_name);
        }

        if($one){
            $res = $req->fetch();
        }else{
            $res = $req->fetchAll();
        }
        return $res;
    }

    public function prepare($statemnt, $attribute,$class_name = null, $one = false)
    {
        $pdo = self::getPDO();
        $req = $pdo->prepare($statemnt);
        $req->execute($attribute);
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS,$class_name);
        }
        if($one){
            $res = $req->fetch();
        }else{
            $res = $req->fetchAll();
        }


        return $res;
    }
}