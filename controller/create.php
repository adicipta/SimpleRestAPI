<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include once '../database.php';
include once '../atjemployee.php';
$database = new Database();
$db = $database->getConnection();
$item = new AtjEmployee($db);

$item->nama = $_GET['nama'];
$item->tgl_lahir = $_GET['tgl_lahir'];
$item->gaji = $_GET['gaji'];
$item->status = $_GET['status'];

if($item->createAtjEmployee()){
    echo 'Employee created successfully.';
} else {
    echo 'Employee could not be created.';   
}
?>