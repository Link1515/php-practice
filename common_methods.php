<?php
  echo '<h1>字串</h1>';
  echo '測試變數: <br />';
  echo '$str = "aabbcc" <br />';
  echo '$str_chinese = "中文" <br />';
  $str = "aabbcc";
  $str_chinese = "中文";

  echo '<hr />';

  // strlen() 返回字串長度，中文一個字元佔3
  echo '<h1>strlen()</h1>';
  echo 'aabbcc($str) 長度: ' . strlen($str). '<br />'; // 6
  echo '中文($str_chinese) 長度: ' . strlen($str_chinese) . '<br />'; // 6
  
  echo '<hr />';

  // mb_strlen() 返回字串長度，中文一個字元算 1
  echo '<h1>mb_strlen()</h1>';
  echo 'aabbcc($str) 長度: ' . strlen($str). '<br />'; // 6
  echo '中文($str_chinese) 長度: ' . strlen($str_chinese) . '<br />'; // 2

  echo '<hr />';

  // substr(string, start_index, length) 提取指定字串，中文要每三個為一單位取，不然會出現亂碼
  echo '<h1>substr()</h1>';
  echo 'aabbcc($str) 從索引 2 取 3 個: ' . substr($str, 2, 3). '<br />'; // bbc
  echo '中文($str_chinese) 從索引 3 取 5 個: ' . substr($str_chinese, 3, 5). '<br />'; // 文

  echo '<hr />';

  // mb_substr(string, start_index, length) 提取指定字串，中文可以以一個單位取
  echo '<h1>mb_substr()</h1>';
  echo 'aabbcc($str) 從索引 2 取 3 個: ' . mb_substr($str, 2, 3). '<br />'; // bbc
  echo 'aabbcc($str) 從索引 1 往後取到最尾: ' . mb_substr($str_chinese, 1). '<br />'; // 文

  echo '<hr />';

  // str_replace(find, replace, string, [count]) 替換指定字串
  echo '<h1>str_replace()</h1>';
  echo 'str_replace($str) bb 換 dd: ' . str_replace('bb', 'dd', $str). '<br />'; // aaddcc
  echo 'aabbcc($str) 從索引 1 往後取到最尾: ' . str_replace('文', '央', $str_chinese). '<br />'; // 中央

  echo '<hr />';

  // strtoupper() 變成大寫
  echo '<h1>strtoupper()</h1>';
  echo 'aaa 改大寫: ' . strtoupper('aaa');

  // strtolower() 變成大寫
  echo '<h1>strtolower()</h1>';
  echo 'BBB 改小寫: ' . strtolower('bbb');

  echo '<hr />';

  // strpos(string, target) 字串中的位置
  echo '<h1>strpos()</h1>';
  echo 'l 在 apple 中的索引為 ' . strpos('apple', 'l');

  echo '<hr />';
  echo '<hr />';

  echo '<h1>Number</h1>';

  // round() 四捨五入
  echo '<h1>round()</h1>';
  echo '4.9 四捨五入為 ' . round(4.9);

  echo '<hr />';

  // rand(min, max) 取亂數
  echo '<h1>rand()</h1>';
  echo '0 ~ 100 隨機亂數: ' . rand(0, 100);

  echo '<hr />';
  echo '<hr />';

  echo '<h1>Array</h1>';

  // array_push(array, element)
  echo '<h1>array_push()</h1>';
  $ary = array();
  array_push($ary, '測試 array_push');
  // 類似於 
  $ary[] = '測試 $ary[]';
  print_r($ary);

  echo '<h1>count()</h1>';
  $ary2 = array('aaa', 'bbb', 'ccc');
  echo 'array("aaa", "bbb", "ccc") 長度為' . count($ary2);

  echo '<h1>sort()</h1>';
  $ary3 = array(5, 6, 1, 4, 3, 2);
  // 會改變原陣列
  sort($ary3);
  echo 'array(5, 6, 1, 4, 3, 2) 排序小到大為 ';
  print_r($ary3);

  echo '<h1>rsort()</h1>';
  rsort($ary3);
  echo 'array(5, 6, 1, 4, 3, 2) 排序大到小為 ';
  print_r($ary3);

  echo '<h1>join()</h1>';
  echo '6 5 4 3 2 1 加入 、: ' . join('、',$ary3);
?>