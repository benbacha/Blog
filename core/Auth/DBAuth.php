<?php
namespace Core\Auth;
use Core\Database\MysqlDatabase;

Class DBAuth {


    /**
     * @var MysqlDatabase
     */
    private $db;

    public function __construct(MysqlDatabase $db)
    {
        $this->db = $db;
    }

    /**
     * @param $usename
     * @param $password
     * @return bool
     */
    public function login($usename, $password) :bool {
        $user = $this->db->prepare('Select * from users where username= ?',[$usename],null,true);
       var_dump($user);
    }

    /**
     * @return bool
     */
    public function logged(){
        return isset($_SESSION['auth']);
    }
}