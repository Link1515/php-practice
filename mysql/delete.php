<?php 
  require './connect.php';

  try {
    mysqli_query($db, 
    "DELETE FROM user
    WHERE 
      id=5
    ");

    if(mysqli_affected_rows($db)) {
      echo "刪除成功";
    } else {
      echo "無刪除";
    }
  }

  catch(Exception $e) {
    echo "錯誤: $e";
  }
;?>