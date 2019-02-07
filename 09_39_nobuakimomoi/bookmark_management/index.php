<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
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
      <h1 style = "color: white">Bookmark collector</h1>
      <div class="navbar-header"><a id="click" class="navbar-brand" href="bm_list_view.php">Click here to go to the bookmark list</a></div>
      </div>
    </nav>
  </header>
  <!-- Head[End] -->

  <!-- Main[Start] -->
  <form method="post" action="insert.php">
    <div class="jumbotron" style = "background: none">
    <fieldset style = "margin: 0 0 0 26px">
      <legend>Bookmark your favorite book</legend>
      <label>Bookname：<input type="text" name="book_name" require></label><br>
      <label>URL：<input type="text" name="url"></label><br>
      <label><textArea name="comments" rows="4" cols="40" placeholder="Write comments.."></textArea></label><br>
      <input type="submit" value="Submit">
      </fieldset>
    </div>
  </form>
</div>
<!-- Main[End] -->


</body>
</html>
