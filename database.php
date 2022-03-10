<?php
class Database {
    public $db;
    public function getConnection(){
        $this->db = null;
        try{
            $this->db = new mysqli('localhost','root','','apj_test'); // connect to database
        }catch(Exception $e){
            echo "Cannot connect to database: " . $e->getMessage(); // message error can't connect to database
        }
        return $this->db;
    }
}
?>