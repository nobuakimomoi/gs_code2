<?php
$id = $_GET["id"];
session_start();
include "../funcs_new.php";
sessChk();
?>
<?php
//  <!-- 以下Select.phpからコピペ -->
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
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
  <title>Edit bookmark</title>
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
      <div class="navbar-header"><a id="click" class="navbar-brand" href="user_list_view.php">Click here to go to the bookmark list</a></div>
      </div>
    </nav>
  </header>
  <!-- Head[End] -->

  <!-- Main[Start] -->
  <form method="post" action="insert.php" class="form_wrapper">
    <div class="jumbotron" style = "background: none">
      <fieldset style = "margin: 0 0 0 26px">
        
      <legend>User info</legend>
      <dl>
          <dt style="margin-bottom: 4px">Name：</dt><dd><input type="text" name="name" value= "<?php echo $row ["name"];?>" require></dd>
          <dt style="margin-bottom: 4px">Login ID：</dt><dd><input type="text" name="lid" value="<?php echo $row ["lid"];?>"></dd>
          <dt style="margin-bottom: 4px">Password：</dt><dd><input type="text" name="lpw"value="<?php echo $row ["lpw"];?>"></dd>
          <dt style="margin-bottom: 4px">System admin type：</dt>
          <dt>Admin type：</dt><dd><input type="text" name="kanri_flg" value="<?php echo $row ["kanri_flg"];?>"></dd>
          <dt>User status：</dt><dd><input type="text" name="life_flg" value="<?php echo $row ["life_flg"];?>"></dd>
          <input type="submit" value="Submit">
      </dl>
      </fieldset>
    </div>
  </form>

</div>
<!-- Main[End] -->

</body>
</html>
