<?php

require_once __DIR__ . '/variables.php';
require_once __DIR__ . '/../../php/include.php';

function getMercanciaParams() {
  $originals = getJSONParams();
  $params = [];

  foreach (REQUIRED_PARAMS as $key) {
    if (array_key_exists($key, $originals)) {
      $params[$key] = $originals[$key];
    }
  }

  return $params;
}

// Processing request here
if (!isAuthenticated()) {
  unauthorized();
  exit();
}

$id = getParam('id');
$params = getMercanciaParams();
$values = join(
  array_map(
    function($key) use ($params) { return "$key = '$params[$key]'"; },
    array_keys($params)
  ),
  ', '
);

$connection = getMyConection();
mysqli_begin_transaction($connection, MYSQLI_TRANS_START_READ_WRITE);

$userId = getUserIdFromRequestToken();
$query = "SELECT idViaje FROM merca WHERE idCliente = $userId AND idViaje = $id";
$row = mysqli_fetch_assoc(query($query));
if (empty($row)) {
  respond(404, ['success' => false, 'error' => "Record with id $id not found"]);
  exit();
}

mysqli_query($connection, "UPDATE merca SET $values WHERE idCliente = $userId AND idViaje = $id");

if ($error = mysqli_error($connection)) {
  respond(500, ['success' => false, 'error' => $error]);
} else {
  $results = mysqli_query($connection, "SELECT * FROM merca WHERE idViaje = $id");
  respond(200, ['success' => true, 'mercancia' => mysqli_fetch_assoc($results)]);
}

if (mysqli_error($connection)) {
  mysqli_rollback($connection);
} else {
  mysqli_commit($connection);
}
