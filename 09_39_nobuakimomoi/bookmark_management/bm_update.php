<?php

$id     = $_POST["id"];
$book_name = $_POST["book_name"];
$url = $_POST["url"];
$comments = $_POST["comments"];



//2. DB接続します
include "../funcs_new.php";
$pdo = db_conn();

//３．データ登録SQL作成
$sql ="UPDATE gs_bm_table SET book_name=:book_name, url=:url, comments=:comments WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR); 
$stmt->bindValue(':comments', $comments, PDO::PARAM_STR); 
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: bm_list_view.php");
    exit;
}
?>
