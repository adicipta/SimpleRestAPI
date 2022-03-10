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

    // Get list of all Employee
    public function getAtjEmployees(){
        $sqlQuery = "SELECT id, nama, tgl_lahir, gaji, status FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

    // Get one Employee
    public function getSingleAtjEmployee(){
        $sqlQuery = "SELECT id, nama, tgl_lahir, gaji, status FROM
        ". $this->db_table ."WHERE id = ".$this->id;
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->nama = $dataRow['nama'];
        $this->tgl_lahir = $dataRow['tgl_lahir'];
        $this->gaji = $dataRow['gaji'];
        $this->status = $dataRow['status'];
    }
}
?>