<?php
//1.  DB接続します
include("../funcs_new.php");
$pdo = db_con();
session_start();
sessChk();
adminChk();//管理者でない場合は、エラー表示

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    // $view .= "<tr><td>".$res["id"].",".$res["name"].",".$res["email"].",".$res["naiyou"]."</td></tr>";//.=は、前入っているデータを上書きでなく追加していく。JSでいう*=みたいなイメージ
    $view .= "<tr><td style = 'border: 2px #808080 solid; padding: 8px''>";
    $view .= '<a href ="detail.php?id='.$res["id"].'">';
    $view .= $res["id"]."</a>"."</td>";
    $view .= "<td style = 'border: 2px #808080 solid; padding: 8px''>".$res["name"];
    $view .= "<td style = 'border: 2px #808080 solid; padding: 8px''>".$res["lid"]."</td>";
    $view .= "<td style = 'border: 2px #808080 solid; padding: 8px''>".$res["lpw"]."</td>";
    $view .= "<td style = 'border: 2px #808080 solid; padding: 8px''>".$res["kanri_flg"]."</td>";
    $view .= "<td style = 'border: 2px #808080 solid; padding: 8px''>".$res["life_flg"]."</td>";
    $view .= "<td style = 'border: 2px #808080 solid; padding: 8px''>".'<a href="delete.php?id='.$res["id"].'">'. ' [Delete]'."</a></td></tr>";//削除動作
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User list</title>

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
        <h1 style = "color: white">User list</h1>
        <a class="navbar-brand" href="index.php">Click here to go back to the input page</a>

        </div>
      </div>
    </nav>
  </header>
  <!-- Head[End] -->

  <!-- Main[Start] -->
  <div class="table_wrapper" style = "margin: 0 10% 0 10%">
      <table style ="withdh: 100%">
        <tr>
          <th style = "border: 2px #808080 solid; padding: 8px" >#</th><th style = "border: 2px #808080 solid; padding: 8px">Name</th>
          <th style = "border: 2px #808080 solid; padding: 8px">Login ID</th>
          <th style = "border: 2px #808080 solid; padding: 8px">Login PW</th>
          <th style = "border: 2px #808080 solid; padding: 8px">Kanri Flag</th>
          <th style = "border: 2px #808080 solid; padding: 8px">Life Flag</th
          ><th style = "border: 2px #808080 solid; padding: 8px">Delete</th>
        </tr style = "border: 2px #808080 solid; padding: 8px"><?=$view?>
      </table>
  </div>
  <!-- Main[End] -->
</div>
</body>
</html>

<!-- 



 -->