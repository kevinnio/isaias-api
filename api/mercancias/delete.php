<?php

require_once __DIR__ . '/../../php/include.php';

// Processing request here
if (!isAuthenticated()) {
  unauthorized();
  exit();
}

$id = getParam('id');
$userId = getUserIdFromRequestToken();
$query = "SELECT idViaje FROM merca WHERE idCliente = $userId AND idViaje = $id";
$row = mysqli_fetch_assoc(query($query));
if (empty($row)) {
  respond(404, ['success' => false, 'error' => "Record with id $id not found"]);
  exit();
}

$connection = getMyConection();
mysqli_query($connection, "DELETE FROM merca WHERE idCliente = $userId AND idViaje = $id");

if ($error = mysqli_error($connection)) {
  respond(500, ['success' => false, 'error' => "Cannot delete. Error: $error"]);
} else {
  respond(200, ['success' => true]);
}
