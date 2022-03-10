<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include once '../database.php';
include once '../atjemployee.php';
$database = new Database();
$db = $database->getConnection();
$item = new AtjEmployee($db);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingleAtjEmployee();
if($item->nama != null){
    
    // create array
    $atjemp_arr = array(
        "id" => $item->id,
        "nama" => $item->nama,
        "tgl_lahir" => $item->tgl_lahir,
        "gaji" => $item->gaji,
        "status" => $item->status,
    );

    http_response_code(200);
    echo json_encode($atjemp_arr);
    }
    else{
        http_response_code(404);
        echo json_encode("Employee not found.");
    }
}
?>