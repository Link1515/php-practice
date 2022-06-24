<?php 
  require './connect.php';

  $result = mysqli_query($db, 'select * from user');

  $data = array();

  if($result) {
    // 查詢到的資料數
    if(mysqli_num_rows($result) > 0) {
      for($i = 0; $i < mysqli_num_rows($result); $i++) {
        // 每次調用都提取查詢到的資料中的一筆資料
        $data[] = mysqli_fetch_assoc($result);
      }

      print_r($data);

      // 釋放資料庫查詢到的記憶體空間
      mysqli_free_result($result);
    } else {
      echo '無資料';
    }
  }

  // 關閉 db 連線
  mysqli_close($db);
;?>