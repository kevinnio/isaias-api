<?php

require_once __DIR__ . '/../conexion.php';

/**
 * Creates a new API token for the given user.
 *
 * @param $userID
 */
function createApiToken($userID) {
  $token = generateNewApiToken($userID);
  $connection = conexion();
  mysqli_query($connection, "INSERT INTO api_tokens (user_id, token) VALUES ($userID, '$token')");

  if (mysqli_error($connection)) {
    die('Error while generating new token.');
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
  $header = getallheaders()['Authorization'];

  return str_replace('Bearer ', '', $header);
}
