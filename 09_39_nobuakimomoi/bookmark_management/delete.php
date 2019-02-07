<?php
//1. POSTデータ取得
$id = $_GET["id"];


//2. DB接続(コピーして使用)
include("../funcs_new.php");
$pdo = db_conn();

//３．データ登録SQL作成
$sql = 'DELETE FROM gs_bm_table WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sqlerror($stmt);
}else{
  //５．index.phpへリダイレクト
  redirect("bm_list_view.php");
}
?>
