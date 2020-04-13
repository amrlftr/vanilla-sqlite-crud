<?php

require('db.php');

$db = new Database();
$conn = $db->getConnection();

$qry = $conn->prepare('DELETE FROM users WHERE id = :id');
  $qry->execute([
    ':id' => $_POST['delete_id']
  ]);

  if($qry){
    echo json_encode([
      'status' => 'success',
      'message' => 'data deleted successfully'
    ]);
  }

$qry = null;
$conn = null;