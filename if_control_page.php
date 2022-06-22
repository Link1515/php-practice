<?php
  $page_ary = [
    'index' => '首頁',
    'list' => '列表',
    'images' => '圖片' 
  ];

  $page = 'index';
  if(isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  
  if (array_key_exists($page, $page_ary)) {
    $title = $page_ary[$page];
  } else {
    $title = '404 NotFound';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title;?></title>
</head>
<body>
  <h1><?php echo $title;?></h1>
  <nav>
    <ul>
      <?php foreach($page_ary as $key => $value):?>
        <li><a href=<?php echo '?page=' . $key;?>><?php echo $value;?></a></li>
      <?php endforeach;?>
    </ul>
  </nav>

  <?php if($page === 'index'):?>
    <p>
      php if 判斷頁面
    </p>

  <?php elseif($page === 'list'):?>
    <ul>
      <li>項目 1</li>
      <li>項目 2</li>
      <li>項目 3</li>
    </ul>

  <?php elseif($page === 'images'):?>
    <img src="https://images.theconversation.com/files/443350/original/file-20220131-15-1ndq1m6.jpg?ixlib=rb-1.1.0&rect=0%2C0%2C3354%2C2464&q=45&auto=format&w=926&fit=clip" alt="images">

  <?php else:?>
    <h3>404 NotFound</h3>

  <?php endif;?>
</body>
</html>