<?php

/**
 * Sends back a response to the browser using JSON.
 *
 * @param $status_code
 * @param $data
 */
function respond($status_code, $data) {
  http_response_code($status_code);
  header('Content-Type: application/json');
  echo json_encode($data);
}

function unauthorized() {
  respond(401, ['success' => false, 'error' => 'Unauthorized']);
}
