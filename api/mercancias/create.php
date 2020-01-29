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
$query = "INSERT INTO merca ($columns) VALUES ($values)";
$connection = getMyConection();
mysqli_query($connection, $query);

if ($error = mysqli_error($connection)) {
  respond(500, ['success' => false, 'error' => $error]);
} else {
  respond(201, ['success' => true, 'mercancia' => $params]);
}
