<?php

require('db.php');

$db = new Database();
$conn = $db->getConnection();

$qry = $conn->prepare('INSERT INTO users (name, status) VALUES (:name, :status)');
  $qry->execute([
    ':name' => $_POST['name'],
    ':status' => $_POST['status']
  ]);

  if($qry){
    echo json_encode([
      'status' => 'success',
      'message' => 'data saved successfully'
    ]);
  }

$qry = null;
$conn = null;