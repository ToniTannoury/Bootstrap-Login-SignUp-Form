<?php
include("connection.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Origin");

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

      // Verify the provided password
      if (password_verify($password, $hashedpassword)) {
        $response = array(
          'status' => 'logged in',
          'user_id' => $id,
          'username' => $username,
          'phone' => $phone,
          'email' => $email
        );
      } else {
        $response = array('status' => 'wrong password');
      }
    } else {
      $response = array('status' => 'user not found');
    }
  } else {
    $response = array('status' => 'email and password not provided');
  }
} else {
  $response = array('status' => 'failed', 'error' => 'Invalid request body');
}

echo json_encode($response);
?>
