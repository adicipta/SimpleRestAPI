<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include once '../database.php';
include once '../atjemployee.php';

$database = new Database();
$db = $database->getConnection();
$item = new AtjEmployee($db);

$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->nama = $_GET['nama'];
$item->tgl_lahir = $_GET['tgl_lahir'];
$item->gaji = $_GET['gaji'];
$item->status = $_GET['status'];

if($item->updateAtjEmployee()){
    echo json_encode("Success update Employee.");
} else{
    echo json_encode("Data could not be updated");
}
?>