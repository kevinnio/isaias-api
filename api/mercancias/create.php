<?php

require_once __DIR__ . '/../../php/include.php';

const REQUIRED_PARAMS = [
  'cdestino',
  'Cliente',
  'Coberturas1',
  'Coberturas2',
  'Coberturas3',
  'Coberturas4',
  'corigen',
  'cuota',
  'detalles',
  'edestino',
  'eorigen',
  'FechaAlta',
  'FechaLlegada',
  'FechaSalida',
  'folio',
  'gastosexp',
  'idCliente',
  'importe',
  'iva',
  'mercancia',
  'moneda',
  'pdestino',
  'porigen',
  'poliza',
  'prima',
  'rfc',
  'TipoOperacion',
  'TipoTransporte',
  'total'
];

function getMercanciaParams() {
  $params = getJSONParams();
  $missing = [];

  foreach (REQUIRED_PARAMS as $key) {
    if (!array_key_exists($key, $params)) {
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
if (!isAdminAuthenticated()) {
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
