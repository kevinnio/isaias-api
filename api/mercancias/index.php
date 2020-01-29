<?php

require_once __DIR__ . '/../../php/include.php';

function loadMercancias($page, $per_page) {
  $offset = $page * $per_page;
  $results = query("SELECT * FROM merca ORDER BY folio DESC LIMIT $per_page OFFSET $offset");

  return mysqli_fetch_all($results, MYSQLI_ASSOC);
}

// Processing request here
if (!isAdminAuthenticated()) {
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
