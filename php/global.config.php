<?php

session_start();
if (!isset($_SESSION['token'])) {
  // Generate token
  $token = md5(rand(1000,9999)); // you can use any encryption
  $_SESSION['token'] = $token; // store it as session variable
}

echo json_encode($_SESSION);

?>
