<?php

  // Conexões com o banco de dados PHPmyAdmin

  $servername = "127.0.0.1"; // ou localhost:80
  $username = "desenvolvedor";
  $password = "Bes@2022#";
  $dbname = "projeto";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }  
?>