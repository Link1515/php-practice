<?php 
  // setcookie(key, value, expire)
  // setcookie 要寫在任何輸出前(echo print_r)
  setcookie('aaa', 'im cookie', time() + 60*60*24);

  if(isset($_COOKIE['aaa'])) {
    echo $_COOKIE['aaa'];
  }
;?>