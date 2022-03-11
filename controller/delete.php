<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include once '../database.php';
include once '../atjemployee.php';

$database = new Database();
$db = $database->getConnection();
$item = new AtjEmployee($db);

$item->id = isset($_GET['id']) ? $_GET['id'] : die();

if($item->deleteAtjEmployee()){
    echo json_encode("Success delete Employee.");
} else{
    echo json_encode("Data could not be deleted.");
}
?>