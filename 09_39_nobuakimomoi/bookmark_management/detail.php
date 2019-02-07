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
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
<!-- index.phpと同じ見た目 -->
<div class="wrapper" style ="width: 100%">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
      <h1 style = "color: white">Bookmark collector - edit page</h1>
      <div class="navbar-header"><a id="click" class="navbar-brand" href="bm_list_view.php">Click here to go to the bookmark list</a></div>
      </div>
    </nav>
  </header>
  <!-- Head[End] -->

  <!-- Main[Start] -->
  <form method="post" action="bm_update.php">
    <div class="jumbotron" style = "background: none">
      <fieldset style = "margin: 0 0 0 26px">
        <legend>Edit the bookmark</legend>
        <label>Bookname：<input type="text" name="book_name" value="<?php echo $row ["book_name"];?>"></label><br>
        <label>URL：<input type="text" name="url" value="<?php echo $row ["url"]; ?>"></label><br>
        <label><textArea name="comments" rows="4" cols="40" ><?php echo $row ["comments"]; ?></textArea></label><br>
        <input type="hidden" name="id" value = "<?=$row["id"]?>">
        <input type="submit" value="Submit">
        </fieldset>
      </div>
    </form>





</div>
<!-- Main[End] -->


</body>
</html>
