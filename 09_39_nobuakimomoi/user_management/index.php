<?php
//1.  DB接続します
include("../funcs_new.php");
$pdo = db_con();
session_start();
sessChk();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>User registration</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/range.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body style ="background:#efe7dd url('https://cloud.githubusercontent.com/assets/398893/15136779/4e765036-1639-11e6-9201-67e728e86f39.jpg') repeat;">

<!-- Head[Start] -->
<header>
<div class="wrapper" style ="width: 100%">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
      <h1 style = "color: white">Bookmark collector - user information registration</h1>
      <div class="navbar-header"><a id="click" class="navbar-brand" href="user_list_view.php">Click here to go to the user   info</a></div>
      <!-- ユーザーがこのページから自分で登録する場合は、上記一覧リストへのリンクは削除 -->
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
          <dl style="margin-bottom: 4px">Name：</dl><dd><input type="text" name="name" require></dd>
          <dl style="margin-bottom: 4px">Login ID：</dl><dd><input type="text" name="lid"></dd>
          <dl style="margin-bottom: 4px">Password：</dl><dd><input type="text" name="lpw"></dd>
          <dl style="margin-bottom: 4px">System admin type：</dl>
            <dd>
              <select name="kanri_flg">
                <option value="0">Admin</option>
                <option value="1">Super admin</option>
              </select>
            </dd>
          <dl style="margin-bottom: 4px">User status</dl>
          <dd style="margin-bottom:16px">
            <input type="radio" name="life_flg" value="0"> Active<br>
            <input type="radio" name="life_flg" value="1"> Not active<br>
          </dd>
          <input type="submit" value="Submit">
      </dl>
      </fieldset>
    </div>
  </form>
</div>
<!-- Main[End] -->


</body>
</html>
