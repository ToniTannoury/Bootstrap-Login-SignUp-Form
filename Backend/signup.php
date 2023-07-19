<?php
include("connection.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Origin");

$response = array();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $json_data = file_get_contents('php://input');
  $data = json_decode($json_data, true);
}else {
  $response['status'] = 'failed';
  $response['error'] = 'Invalid request method.';
}