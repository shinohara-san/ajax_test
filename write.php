<?php
// var_dump($_POST);
// exit();
$txt = $_POST["text"];
$str = [];
//書き込み
if($txt == ""){
  // header("Location: index.php");
} else {
  $file = fopen('data/data.csv', 'a');
  flock($file, LOCK_EX);
  fwrite($file, $txt . "\n");
  flock($file, LOCK_UN);
  fclose($file);
};

// 読み込み(データ送り返す)
$file = fopen('data/data.csv', 'r');

flock($file, LOCK_EX);
if ($file) {
  while ($line = fgets($file)) {
    $str[] = $line;
  }
}
flock($file, LOCK_UN);
fclose($file);


echo json_encode($str); //送り返す

?>