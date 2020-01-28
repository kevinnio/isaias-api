<?php

require_once __DIR__ . '/../conexion.php';
require_once __DIR__ . '/../php/server.php';
require_once __DIR__ . '/../php/params.php';
require_once __DIR__ . '/../php/tokens.php';

function logoutUser($token) {
  $query = "DELETE FROM api_tokens WHERE token='$token'";
  $connection = conexion();
  $result = mysqli_query($connection, $query);

  if ($error = mysqli_error($connection)) {
    respond(500, ['success' => false, 'error' => 'An error ocurred during logout']);
    exit();
  }
}

// Processing request here...
$token = getApiTokenFromRequest();
logoutUser($token);
respond(200, ['success' => true]);
