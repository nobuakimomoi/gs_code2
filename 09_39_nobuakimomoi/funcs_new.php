<?php
//共通に使う関数を記述
function h($a){
    return htmlspecialchars($a, ENT_QUOTES);
}

function db_con(){
    try {
        $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
        return $pdo;
    } catch (PDOException $e) {
        exit('DB-Connection-Error:'.$e->getMessage());
      }      
}

function db_conn(){
    try {
        $pdo = new PDO('mysql:dbname=class07hw_db;charset=utf8;host=localhost','root','');
        return $pdo;
    } catch (PDOException $e) {
        exit('DB-Connection-Error:'.$e->getMessage());
      }      
}

function redirect($page){
    header("Location: ".$page);
    exit;
}

function sqlError($stmt){ 
    $error = $stmt->errorInfo();
    exit("ErrorSQL:".$error[2]);
  }

  function sessChkBM(){
    if(!isset($_SESSION["chk_ssid"])||
        $_SESSION["chk_ssid"]!=session_id()){
        header("Location: non_login_bm_list_view.php");            
        exit;
    }else{
        session_regenerate_id(true);//Trueにしなければ、RegenerateされたIDが残り続けてしまうのでTrueは常に記述
        $_SESSION["chk_ssid"]=session_id();
        }
    }


  function sessChk(){
    if(!isset($_SESSION["chk_ssid"])||
        $_SESSION["chk_ssid"]!=session_id()){
        exit("Error");
    }else{
        session_regenerate_id(true);//Trueにしなければ、RegenerateされたIDが残り続けてしまうのでTrueは常に記述
        $_SESSION["chk_ssid"]=session_id();
        }
    }
    
    function adminChk(){
        if($_SESSION["kanri_flg"]=="0"){
            exit("Error");
            session_regenerate_id(true);//Trueにしなければ、RegenerateされたIDが残り続けてしまうのでTrueは常に記述
            $_SESSION["chk_ssid"]=session_id();
        }
    }