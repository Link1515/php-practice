<?php 
  session_start();

  $userId = 'aaaa';
  $password = '1234';

  if(!isset($_SESSION['login'])) {
    if($_POST['userId'] === $userId && $_POST['password'] === $password) {
      $_SESSION['login'] = true;
    } else {
      header('Location: login.php');
    }
  }


  $photo = '';

  /** 
   * $_FILES[name]['name'] 原檔名
   * $_FILES[name]['tmp_name'] server 上的暫存檔名
   * $_FILES[name]['type'] 檔案類型
   * $_FILES[name]['size'] 檔案大小
   * $_FILES[name]['error'] 錯誤代碼
  */
  if(isset($_FILES['photo'])) {
    if(file_exists($_FILES['photo']['tmp_name'])){
      $targeFolder = './files/';

      move_uploaded_file($_FILES['photo']['tmp_name'], $targeFolder . $_FILES['photo']['name']);
    } else {
      echo "上傳失敗，暫存檔不在";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台</title>
</head>
<body>
  姓名: <?php echo $_POST['name'];?><br />
  圖片: <img src=<?php echo $targeFolder . $_FILES['photo']['name'];?> alt=""><br />

  <a href="logout.php">登出</a>
</body>
</html>