<?php

require('db.php');

$db = new Database();
$conn = $db->getConnection();

$qry = $conn->prepare('SELECT * FROM users');
$qry->execute();

if($qry){
  echo json_encode($qry->fetchAll());
}

$qry = null;
$conn = null;