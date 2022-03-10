<?php
class Database {
    public $db;
    public function getConnection(){
        $this->db = null;
        try{
            $this->db = new mysqli('localhost','root','','apj_test');
        }catch(Exception $e){
            echo "Cannot connect to database: " . $e->getMessage();
        }
        return $this->db;
    }
}
?>