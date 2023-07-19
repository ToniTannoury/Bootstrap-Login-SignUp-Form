<?php
include("connection.php");


$response = array();
$json_data = file_get_contents('php://input');

if ($json_data) {
  $data = json_decode($json_data, true);
  if (isset($data['email']) && isset($data['password'])) {
    $email = $data['email'];
    $password = $data['password'];
    $query = $mysqli->prepare('SELECT id, username, password, email, phone FROM users WHERE email = ?');
    $query->bind_param('s', $email);
    $query->execute();
    $query->store_result();
    if ($query->num_rows() === 1) {
      $query->bind_result($id, $username, $hashedpassword, $email, $phone);
      $query->fetch();
    } else {
      $response = array('status' => 'user not found');
    }
  } else {
    $response = array('status' => 'email and password not provided');
  }
} else {
  $response = array('status' => 'failed', 'error' => 'Invalid request body');
}
