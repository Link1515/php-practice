<?php
  echo "<h1>表單收集結果</h1>";
  echo "姓名: {$_GET['name']} <br />";
  echo "性別: {$_GET['gender']} <br />";
  echo "職業: {$_GET['job']} <br />";
  echo "技能: " . join(', ', $_GET['skill']) . "<br />";
?>