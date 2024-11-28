<?php
  $dbHost = "localhost";
  $dbUser = "root";
  $dbPass = "";
  $dbName = "iSchool_db";

// create connnection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// check connection
if ($conn->connect_error) {
  die("connection failed");
}
?>