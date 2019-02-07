<?php
//1.  DB接続します
include("../funcs_new.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sqlError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<tr><td style = 'border: 2px #808080 solid; padding: 8px''>";
    $view .= '<a href ="non_login_detail.php?id='.$res["id"].'">';
    $view .= $res["id"];
    $view .= "</td><td style = 'border: 2px #808080 solid; padding: 8px''>";
    $view .= $res["book_name"]."</td><td style = 'border: 2px #808080 solid; padding: 8px''>"."<a"." href = ".$res["url"].">"."Website"."</a>"."</td><td style = 'border: 2px #808080 solid; padding: 8px''>";
    $view .= $res["comments"]."</td><td style = 'border: 2px #808080 solid; padding: 8px''>".$res["indate"]."</td></tr>";
    }
  }

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bookmark list</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/range.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main"  style = "background:#efe7dd url('https://cloud.githubusercontent.com/assets/398893/15136779/4e765036-1639-11e6-9201-67e728e86f39.jpg') repeat;">
<!-- Head[Start] -->
<header>

<div class="wrapper" style ="width: 100%">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
        <p class="navbar-brand">Hi guest</p><br><br>
        <h1 style = "color: white">Bookmark list</h1>
        <a class="navbar-brand" href="../Login/login.php">Login</a><br>
        </div>
      </div>
    </nav>
  </header>
  <!-- Head[End] -->

  <!-- Main[Start] -->
  <div class="table_wrapper" style = "margin: 0 10% 0 10%">
      <table style ="withdh: 100%"><tr><th style = "border: 2px #808080 solid; padding: 8px" >#</th>
      <th style = "border: 2px #808080 solid; padding: 8px">Book name</th>
      <th style = "border: 2px #808080 solid; padding: 8px">URL</th>
      <th style = "border: 2px #808080 solid; padding: 8px">Comments</th>
      <th style = "border: 2px #808080 solid; padding: 8px">Time stamp</th>
      </tr style = "border: 2px #808080 solid; padding: 8px"><?=$view?></table>
  </div>
  <!-- Main[End] -->
</div>
</body>
</html>