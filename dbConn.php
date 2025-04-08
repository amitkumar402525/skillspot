<?php
  /* Connection */
  $servername = "localhost:4307";
  $username = "root";
  $password = "";
  $dbname = "skillspot";

  // Create connection

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed") ;

  // Check connection
  /*if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }*/
  // echo "Connected successfully";
?>