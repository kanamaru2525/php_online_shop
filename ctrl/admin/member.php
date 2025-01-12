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
    $loginOk = AdminCheck($sLoginId, $sLoginPass);

    //ログインOKならユーザ名を取得
    if($loginOk === true){
        $userName = getAdminName($sLoginId, $sLoginPass);
    }

//-------------------------------------------------------------------------------
// ↑ここまでは top.php と一緒

//**************************************************
// 変数取得
//**************************************************
    //ID
    $sMemberId = isset($_POST['id']) ? $_POST['id'] : "";
    //苗字
    $sName = isset($_POST['name']) ? $_POST['name'] : "";

    $sMail = isset($_POST['mail']) ? $_POST['mail'] : "";

    $sAddress = isset($_POST['address']) ? $_POST['address'] : "";


//**************************************************
// 検索処理
//**************************************************
    //値を取得
    $arrResult = selectMember($sMemberId,$sName,$sMail,$sAddress);


//**************************************************
// HTMLを出力
//**************************************************
    //画面へ表示
    if(count($arrResult) > 0){
        require_once(__DIR__ . '/../../view/admin/member.html');
    } else {
        require_once(__DIR__ . '/../../view/admin/m_none.html');
    }

?>