<?php

/**
 * Fetchs params from an incoming JSON request
 *
 * @return array
 */
function getJSONParams() {
  $json = file_get_contents('php://input');
  $decoded = json_decode($json, true);

  $error = json_last_error();
  if ($error == JSON_ERROR_NONE) {
    return $decoded;
  } else {
    die("Error while decoding JSON. Error code: $error");
  }
}
