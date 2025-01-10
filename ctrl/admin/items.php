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
    //itemID
    $sItem_name = isset($_POST['name']) ? $_POST['name'] : "";    
    //ID
    $sItemId = isset($_POST['id']) ? $_POST['id'] : "";
    //ID
    $sSales_Stop = isset($_POST['sales_stop']) ? $_POST['sales_stop'] : null;

    if ($sSales_Stop === '' || $sSales_Stop === null) {
        $sSales_Stop = null; // 明確にnullとして扱う
    }
    

//**************************************************
// 検索処理
//**************************************************
    //値を取得
    $arrResult = AdminSelectItem($sItem_name, $sItemId,$sSales_Stop);

//**************************************************
// HTMLを出力
//**************************************************
    //画面へ表示
    if(count($arrResult) > 0){
        require_once(__DIR__ . '/../../view/admin/item.html');
    } else {
        require_once(__DIR__ . '/../../view/admin/i_none.html');
    }

?>