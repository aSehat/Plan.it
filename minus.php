<?php

  @ $db = new mysqli('localhost', 'root', '', 'itproject');
  
  if ($db->connect_error) {
    $connectErrors = array(
      'errors' => true,
      'errno' => mysqli_connect_errno(),
      'error' => mysqli_connect_error()
    );
    echo json_encode($connectErrors);
  } else {
    if (isset($_POST["id"])) {
      $assignmentId = (int) $_POST["id"];
      
      $query = "update assignment SET completion = completion - 5 where assignmentid = ?";
      $statement = $db->prepare($query);
      $statement->bind_param("i",$assignmentId);
      $statement->execute();
      
      $success = array('errors'=>false,'message'=>'Incremented');
      echo json_encode($success);
    }
  }
?>