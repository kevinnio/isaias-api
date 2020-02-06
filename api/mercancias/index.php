<?php

require_once __DIR__ . '/../../php/include.php';

function loadMercancias($page, $per_page) {
  $id = getUserIdFromRequestToken();
  $offset = ($page - 1) * $per_page;
  $query = "SELECT * FROM merca WHERE idCliente = $id ORDER BY folio DESC " .
           "LIMIT $per_page OFFSET $offset";
  $results = query($query);

  return mysqli_fetch_all($results, MYSQLI_ASSOC);
}

// Processing request here
if (!isAuthenticated()) {
  unauthorized();
  exit();
}

$page = getParam('page', 1);
$per_page = getParam('per_page', 15);
respond(200, [
  'success'    => true,
  'mercancias' => loadMercancias($page, $per_page),
  'page'       => $page,
  'per_page'   => $per_page
]);
