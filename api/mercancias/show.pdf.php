<?php

require_once __DIR__ . '/../../php/include.php';

// Processing request here
if (!isAdminAuthenticated()) {
  unauthorized();
  exit();
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (empty($id)) {
  respond(422, ['success' => false, 'error' => 'Missing required "id" parameter']);
  exit();
}

$row = mysqli_fetch_assoc(query("SELECT idViaje FROM merca WHERE idViaje = $id"));
if (empty($row)) {
  respond(404, ['success' => false, 'error' => "Record with id $id not found"]);
  exit();
}

# Reuses code that builds PDF
include __DIR__ . '/../../poliza.php';
