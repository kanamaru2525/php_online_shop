<?php
//**************************************************
// 初期処理
//**************************************************
    //SESSIONスタート
    session_start();

    //データベース接続関数の定義ファイルを読み込み
    require_once('../../model/dbconnect.php');

    //データベース操作関数の定義ファイルを読み込み
    require_once('../../model/dbfunction.php');


//**************************************************
// 変数取得
//**************************************************
    //ログインID
    $sLoginId = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : "";

    //ログインパスワード
    $sLoginPass = isset($_SESSION['login_pass']) ? $_SESSION['login_pass'] : "";

//**************************************************
// 検索処理
//**************************************************
    //ログインチェックを取得
    $loginOk = loginCheck($sLoginId, $sLoginPass);

    //ログインOKならユーザIDとユーザ名を取得
    if($loginOk === true){
        $userId   = getUserId($sLoginId, $sLoginPass);
        $userName = getUserName($sLoginId, $sLoginPass);
    }


//**************************************************
// HTMLを出力
//**************************************************
    //画面へ表示
    require_once(__DIR__ . '/../../view/user/help.html');

?>