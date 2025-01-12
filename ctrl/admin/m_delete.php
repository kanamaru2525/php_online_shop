<?php
//**************************************************
// 初期処理
//**************************************************
    //データベース接続関数の定義ファイルを読み込み
    require_once('../../model/dbconnect.php');

    //データベース操作関数の定義ファイルを読み込み
    require_once('../../model/dbfunction.php');

//**************************************************
// 変数定義
//**************************************************
    //エラー検知用
    $bRet = false;

//**************************************************
// 変数取得
//**************************************************
    //ID
    $sMemberId = isset($_POST['id']) ? $_POST['id'] : "";

    //処理ステップ
    $nStepFlg = isset($_POST['step']) ? $_POST['step'] : "";

//**************************************************
// STEP0（検索処理）
//**************************************************
    if($nStepFlg == ""){
        //メンバー情報の取得
        $arrResult = selectMember($sMemberId);

       //名前
       $sName = $arrResult[0]['name'];

       //年齢
       $sAge = $arrResult[0]['age'];
       
       //郵便番号
       $sPostcode = $arrResult[0]['postcode'];
       
       //住所
       $sAddress = $arrResult[0]['user_address'];

       //メールアドレス
       $sMail = $arrResult[0]['mail_address'];
       
       //電話番号
       $sTelephone = $arrResult[0]['telephone'];

       //ログインID
       $sLogin_Id = $arrResult[0]['login_id'];

       //ログインパスワード
       $sLogin_Pass = $arrResult[0]['login_pass'];

    }

//**************************************************
// STEP1（削除処理）
//**************************************************
    if ($nStepFlg == "1"){
        //確認画面でOKなら削除
        $bRet = deleteMember($sMemberId);

        //DB登録エラーがある場合は最初のステップに戻す
        if($bRet == false){
            $nStepFlg = "";
        }
    }

//**************************************************
// HTMLを出力
//**************************************************
    if($nStepFlg == ""){
        require_once(__DIR__ .'/../../view/admin/m_delete.html');
    } else if ($nStepFlg == 1) {
        require_once(__DIR__ .'/../../view/admin/m_deleteOK.html');
    }

?>
