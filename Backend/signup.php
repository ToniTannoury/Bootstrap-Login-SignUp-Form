<?php
include("connection.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Origin");

$response = array();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $json_data = file_get_contents('php://input');
  $data = json_decode($json_data, true);
  if (
    isset($data['username']) &&
    isset($data['password']) &&
    isset($data['email']) &&
    isset($data['phone'])
    ) {
    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $phone = $data['phone'];
  }else {
      $response['status'] = 'failed';
      $response['error'] = 'Missing required fields.';
    }

}else {
  $response['status'] = 'failed';
  $response['error'] = 'Invalid request method.';
}