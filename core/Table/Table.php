<?php


namespace Core\Table;

use Core\Database\Database;

class Table
{
    /**
     * @var string
     */
    protected $table;

    /**
     * @var Database
     */
    private $db;

    public function __construct(Database $db)
       {
           if((is_null($this->table))){
               $parts =  explode('\\',get_class($this));
               $class_name = end($parts);
               $this->table = strtolower(str_replace('Table','',$class_name));
           }
           $this->db = $db;
       }

       public function all()
       {
           return $this->db->query('select * from '.$this->table);
       }

       public function query($statement,$attributes = null,$one =null){

          if($attributes){

             return $this->db->prepare(
                  $statement,
                  $attributes,
                  str_replace('Table','Entity',get_class($this),
              $one)
              );
          }else{
              return $this->db->query(
                  $statement,
                  str_replace('Table','Entity',get_class($this),
                      $one)
              );
          }
       }

       public function find($id){
            return $this->query("SELECT * FROM {$this->table} where id = ?",[$id],true);
       }
}
