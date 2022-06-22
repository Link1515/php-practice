<?php 
  session_start();
  $_SESSION['aaa'] = 'mySession';

  // session_unset();
  // session_destroy();

  echo $_SESSION['aaa'];
;?>