<?php
class AtjEmployee{
    // dbection
    private $db;
    // table
    private $db_table = "tb_atj";
    // columns
    public $id;
    public $nama;
    public $tgl_lahir;
    public $gaji;
    public $status;
    public $result;

    // Db dbection
    public function __construct($db){
        $this->db = $db;
    }

    // Get list of all user
    public function getAtjEmployees(){
        $sqlQuery = "SELECT id, nama, tgl_lahir, gaji, status FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
}
?>