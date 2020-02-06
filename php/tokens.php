<?php

require_once __DIR__ . '/../inc/functions.php';

/**
 * Creates a new API token for the given user.
 *
 * @param $userID
 */
function createApiToken($userID) {
  $token = generateNewApiToken($userID);
  $connection = getMyConection();
  mysqli_query($connection, "INSERT INTO api_tokens (user_id, token) VALUES ($userID, '$token')");

  if ($error = mysqli_error($connection)) {
    respond(500, ['success' => false, 'error' => "Error while generating new token: $error"]);
    exit();
  }

  return $token;
}

/**
 * Returns a new random generated token
 *
 * @param $userID
 * @return string
 */
function generateNewApiToken($userID) {
  $date = date('U');

  return md5(uniqid("$userID:$date", true));
}

/**
 * Gets API token from current request headers
 */
function getApiTokenFromRequest() {
  $headers = getallheaders();
  $header = isset($headers['Authorization']) ? $headers['Authorization'] : null;

  if (empty($header)) {
    unauthorized();
    exit();
  }

  return str_replace('Bearer ', '', $header);
}

function isAuthenticated() {
  return getUserFromRequestToken()['lvl'] == 10;
}

function getUserIdFromRequestToken() {
  return getUserFromRequestToken()['idCliente'];
}

function getUserFromRequestToken() {
  $token = getApiTokenFromRequest();
  $results = query("SELECT user_id FROM api_tokens WHERE token = '$token'");
  $row = mysqli_fetch_assoc($results);


  if (empty($row)) {
    return null;
  } else {
    $results = query('SELECT * FROM clientes WHERE idCliente = ' . $row['user_id']);
    $row = mysqli_fetch_assoc($results);

    return empty($row) ? null : $row;
  }
}
