<?php

$serverName = "localhost";
$user = "root";
$password = "";
$database = "practical-exam-interview";
$port = 3306;

$conn = new mysqli($serverName, $user, $password, $database, $port);

if ($conn->connect_error) {
  echo "Connection Failed $conn->connect_error";
  exit();
  // die();
} 
