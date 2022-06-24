<?php 
  require './connect.php';

  mysqli_query($db, 
    "INSERT INTO user
      (id, username, password, name) 
    VALUES 
      (NULL, 'aaaa6464', 'aaaa1234', '六六')");

  print_r($db);

  // 更新的欄位數大於 0
  if(mysqli_affected_rows($db) > 0) {
    // 取出一筆更新的 ID
    $new_id = mysqli_insert_id($db);
    echo "新增的資料 ID 為: $new_id";
  } else {
    echo "無資料更新";
  }

  mysqli_close($db)
;?>