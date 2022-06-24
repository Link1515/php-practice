<?php 
  require './connect.php';

  try {
    mysqli_query($db, 
    "UPDATE user
    SET
      username='aaaa789789'
    WHERE
      id=6
    ");

    if (mysqli_affected_rows($db)){
      echo "更新成功";
    } else {
      echo "無更新";
    }
  }

  catch(Exception $e) {
    echo '更新失敗，錯誤訊息: ' .$e->getMessage();
  }

  mysqli_close($db);
;?>