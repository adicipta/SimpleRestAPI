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

    // Create one Employee
    public function createAtjEmployee(){
        $this->nama=html_specialchars(strip_tags($this->nama));
        $this->tgl_lahir=html_specialchars(strip_tags($this->tgl_lahir));
        $this->gaji=html_specialchars(strip_tags($this->gaji));
        $this->status=html_specialchars(strip_tags($this->status));
        $sqlQuery = "INSERT INTO
        ". $this->db_table ." SET nama = '".$this->nama."',
        tgl_lahir = '".$this->tgl_lahir."',
        gaji = '".$this->gaji."',status = '".$this->status."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // Update a employee
    public function updateAtjEmployee(){
        $this->nama=htmlspecialchars(strip_tags($this->nama));
        $this->tgl_lahir=htmlspecialchars(strip_tags($this->tgl_lahir));
        $this->gaji=htmlspecialchars(strip_tags($this->gaji));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $sqlQuery = "UPDATE ". $this->db_table ."SET nama = '".$this->nama."',
        tgl_lahir = '".$this->tgl_lahir."',
        gaji = '".$this->gaji."',status = '".$this->status."'
        WHERE id = ".$this->id;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>