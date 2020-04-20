<?php
  // include_once('clases/config.php');
  session_start();
  $dsn = 'mysql:host=127.0.0.1;dbname=e-commerce-hassen;port=3306';
  $db_user = 'root';
  $db_pass = '';
  $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
  $db = new PDO($dsn, $db_user, $db_pass, $opt);

 ?>
