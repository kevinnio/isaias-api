<?php

require_once __DIR__ . '/../../php/include.php';

// Processing request here
if (!isAuthenticated()) {
  unauthorized();
  exit();
}

$id = getParam('id');
if (empty($id)) {
  respond(422, ['success' => false, 'error' => 'Missing required "id" parameter']);
  exit();
}

$userId = getUserIdFromRequestToken();
$query = "SELECT idViaje FROM merca WHERE idCliente = $userId AND idViaje = $id";
$row = mysqli_fetch_assoc(query($query));
if (empty($row)) {
  respond(404, ['success' => false, 'error' => "Record with id $id not found"]);
  exit();
}

$_COOKIE['idUsuario'] = $userId;

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename=poliza-se.pdf');
# Reuses code that builds PDF
include __DIR__ . '/../../poliza-mercancia.php';

unset($_COOKIE['idUsuario']);
