<?php 
  session_start();

  if(isset($_SESSION['login']) && $_SESSION['login']) {
    header('Location: backendpage.php');
  }
;?>

<form action="backendpage.php" method="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>登入資訊</legend>
    帳號: <input type="text" name="userId"><br />
    密碼: <input type="password" name="password">
  </fieldset>

  <fieldset>
    <legend>個人資訊</legend>
    姓名: <input type="text" name="name"><br />
    照片: <input type="file" name="photo">
  </fieldset>

  <button type="submit">送出</button>
</form>