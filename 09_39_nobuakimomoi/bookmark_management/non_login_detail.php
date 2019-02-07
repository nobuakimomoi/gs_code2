<?php
$id = $_GET["id"];
?>
<?php
//  <!-- 以下Select.phpからコピペ -->
include "../funcs_new.php";
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
$row = $stmt->fetch();
// var_dump($row);

}
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Bookmark details</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
<!-- index.phpと同じ見た目 -->
<div class="wrapper" style ="width: 1300px">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
      <h1 style = "color: white">Bookmark collector</h1>
      <div class="navbar-header"><a id="click" class="navbar-brand" href="bm_list_view.php">Click here to go to the entire bookmark list</a></div>
      </div>
      
    </nav>
  </header>
  <!-- Head[End] -->

  <!-- Main[Start] -->
 <div style = "width: 1000px">
      <div class="jumbotron" style = "background: none; width: 100%; text-align: center">
          <dl style = "display: flex">
            <dt>Bookname:&nbsp;&nbsp;</dt>
            <dd><?php echo $row ["book_name"];?></dd>
          </dl>
          <dl style = "display: flex">
            <dt>URL:&nbsp;&nbsp;</dt>
            <dd><a href='<?php echo $row ["url"];?>'>Website</a></dd>
          </dl>
          <dl style = "display: flex">
            <dt>Comments:&nbsp;&nbsp;</dt>
            <dd style = "text-aligh:left"><?php echo $row ["comments"];?></dd>
          </dl>
      </div>
</div>
<!-- Main[End] -->


</body>
</html>
