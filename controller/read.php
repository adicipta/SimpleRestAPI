<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include '../database.php';
include '../atjemployee.php';
$database = new Database();

$db = $database->getConnection();
$items = new AtjEmployee($db);
$records = $items->getAtjEmployees();
$itemCount = $records->num_rows;
echo json_encode($itemCount);
if($itemCount >0){
    $atjemployeArr = array();
    $atjemployeArr["body"] = array();
    $atjemployeArr["itemCount"] = $itemCount;
    while ($row = $records->fetch_assoc())
    {
        array_push($atjemployeArr["body"], $row);
    }
    echo json_encode($atjemployeArr);
}
else {
    http_response_code(404);
    echo_json_encode(
        array("message" => "Employee not found.")
    );
}
?>