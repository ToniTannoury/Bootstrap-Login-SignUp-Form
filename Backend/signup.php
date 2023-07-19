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

    $check_username = $mysqli->prepare("SELECT username FROM users WHERE username = ?");
    $check_username->bind_param('s', $username);
    $check_username->execute();
    $check_username->store_result();
    $username_exists = $check_username->num_rows();

    $check_email = $mysqli->prepare("SELECT email FROM users WHERE email = ?");
    $check_email->bind_param('s', $email);
    $check_email->execute();
    $check_email->store_result();
    $email_exists = $check_email->num_rows();

    $check_phone = $mysqli->prepare("SELECT phone FROM users WHERE phone = ?");
    $check_phone->bind_param('s', $phone);
    $check_phone->execute();
    $check_phone->store_result();
    $phone_exists = $check_phone->num_rows();
  }else {
      $response['status'] = 'failed';
      $response['error'] = 'Missing required fields.';
    }

}else {
  $response['status'] = 'failed';
  $response['error'] = 'Invalid request method.';
}