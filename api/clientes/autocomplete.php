<?php

require_once __DIR__ . '/../../php/include.php';

// Processing request here
if (!isAdminAuthenticated()) {
  unauthorized();
  exit();
}

$name = getParam('name');
$query = "SELECT idCliente, RazonSocial FROM clientes WHERE RazonSocial LIKE '$name%' LIMIT 10";
$connection = getMyConection();
$results = mysqli_query($connection, $query);

if ($error = mysqli_error($connection)) {
  respond(500, ['success' => false, 'error' => "Can't autocomplete. Error: $error"]);
} else {
  respond(200, ['success' => true, 'clientes' => mysqli_fetch_all($results, MYSQLI_ASSOC)]);
}
