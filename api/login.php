<?php

require_once __DIR__ . '/../php/include.php';

function loginUser($user, $password) {
  $query = "SELECT * FROM clientes WHERE usuario='$user' AND " .
         "(pass = md5('$password') OR contra = '$password') AND lvl > 0";
  $result = mysqli_query(getMyConection(), $query);
  $row = mysqli_fetch_array($result);

  if (empty($row)) {
    return null;
  } else {
    return $row['idCliente'];
  }
}

// Processing request here...
$params = getJSONParams();
if (empty($params['usuario']) || empty($params['password'])) {
  respond(422, ['success' => false, 'error' => 'No user and password provided']);
}

$userID = loginUser($params['usuario'], $params['password']);
if (empty($userID)) {
  respond(422, ['success' => false, 'error' => 'Invalid user or password']);
} else {
  $token = createApiToken($userID);
  respond(200, ['success' => true, 'token' => $token]);
}
