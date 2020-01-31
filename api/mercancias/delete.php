<?php

require_once __DIR__ . '/../../php/include.php';

// Processing request here
if (!isAdminAuthenticated()) {
  unauthorized();
  exit();
}

$id = getParam('id');
$connection = getMyConection();
mysqli_query($connection, "DELETE FROM merca WHERE idViaje = $id");

if ($error = mysqli_error($connection)) {
  respond(500, ['success' => false, 'error' => "Cannot delete. Error: $error"]);
} else {
  respond(200, ['success' => true]);
}
