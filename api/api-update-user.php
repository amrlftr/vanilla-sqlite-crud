<?php

require('db.php');

$db = new Database();
$conn = $db->getConnection();

$qry = $conn->prepare('UPDATE users SET name = :name, status = :status
  WHERE id = :id');

  $qry->execute([
    ':name' => $_POST['name'],
    ':status' => $_POST['status'],
    ':id' => $_POST['id']
  ]);

  if($qry){
    echo json_encode([
      'status' => 'success',
      'message' => 'data saved successfully'
    ]);
  }

$qry = null;
$conn = null;