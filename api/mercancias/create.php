<?php

require_once __DIR__ . '/variables.php';
require_once __DIR__ . '/../../php/include.php';

function getMercanciaParams() {
  $user = getUserFromRequestToken();
  $userId = getUserIdFromRequestToken();

  $originals = getJSONParams();
  $missing = [];
  $params = [
    'idCliente' => $userId,
    'Cliente'   => $user['RazonSocial']
  ];

  foreach (REQUIRED_PARAMS as $key) {
    if (array_key_exists($key, $originals)) {
      $params[$key] = $originals[$key];
    } else {
      $missing[] = $key;
    }
  }

  if (count($missing) > 0) {
    $message = 'The following required fields are missing: ' . join($missing, ', ');
    respond(422, ['success' => false, 'error' => $message]);
    exit();
  }

  return $params;
}

// Processing request here
if (!isAuthenticated()) {
  unauthorized();
  exit();
}

$params = getMercanciaParams();
$columns = join(array_keys($params), ', ');
$values = join(array_map(function($key) { return "'$key'"; }, array_values($params)), ', ');

$connection = getMyConection();
mysqli_begin_transaction($connection, MYSQLI_TRANS_START_READ_WRITE);

mysqli_query($connection, "INSERT INTO merca ($columns) VALUES ($values)");

if ($error = mysqli_error($connection)) {
  respond(500, ['success' => false, 'error' => $error]);
} else {
  $results = mysqli_query($connection, "SELECT * FROM merca WHERE idViaje = LAST_INSERT_ID()");
  respond(201, ['success' => true, 'mercancia' => mysqli_fetch_assoc($results)]);
}

if (mysqli_error($connection)) {
  mysqli_rollback($connection);
} else {
  mysqli_commit($connection);
}
