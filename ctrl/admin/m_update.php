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

    //エラーメッセージ用
    $arrErr = array();

//**************************************************
// 変数取得
//**************************************************
    //ID
    $sMemberId = isset($_POST['id']) ? $_POST['id'] : "";

    //名前
    $sName = isset($_POST['name']) ? $_POST['name'] : "";

    //年齢  
    $sAge = isset($_POST['age']) ? $_POST['age'] : "";


    //郵便番号
    $sPostcode = isset($_POST['postcode']) ? $_POST['postcode'] : "";

    //住所
    $sAddress = isset($_POST['address']) ? $_POST['address'] : "";

    //メールアドレス
    $sMail = isset($_POST['mail']) ? $_POST['mail'] : "";

    //電話番号
    $sTelephone = isset($_POST['telephone']) ? $_POST['telephone'] : "";

        //log in id
    $sLogin_Id = isset($_POST['login_id']) ? $_POST['login_id'] : ""; 

    //log in pass
    $sLogin_Pass = isset($_POST['login_pass']) ? $_POST['login_pass'] : ""; 

    //処理ステップ
    $nStepFlg = isset($_POST['step']) ? $_POST['step'] : "";


//**************************************************
// STEP0（検索処理）
//**************************************************
    if($nStepFlg == ""){
        //メンバー情報の取得
        $arrResult = selectMember($sMemberId);

        //苗字
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
// STEP1（確認画面）
//**************************************************
    if($nStepFlg == 1 || $nStepFlg == 2){

        // 苗字チェック
        if($sName == ""){
            $arrErr['name'] = "名前を入力してください";
        }
        else if(mb_strlen($sName, "UTF-8") > 20) {
            $arrErr['name'] = "名前は20文字以内で入力してください";
        }

        // 年齢チェック
        if($sAge == ""){
            $arrErr['age'] = "年齢を入力してください";
        }
        else if(!is_numeric($sAge)){
            $arrErr['age'] = "年齢は数値で入力してください";
        }
        else if($sAge < 0 || $sAge > 150){
            $arrErr['age'] = "年齢は0～150の範囲で入力してください";
        }

        // 郵便番号チェック
        if ($sPostcode == "") {
             $arrErr['postcode'] = "郵便番号を入力してください";
        } else if (!preg_match("/^[0-9]{7}$/", $sPostcode)) { // ハイフンなしで7桁の数字のみ
            $arrErr['postcode'] = "郵便番号は7桁の数字で入力してください";
        }

        // 住所チェック
        if($sAddress == ""){
            $arrErr['address'] = "住所を入力してください";
        }
        else if(mb_strlen($sAddress, "UTF-8") > 100){
            $arrErr['address'] = "住所は100文字以内で入力してください";
        }

        // メールアドレスチェック
        if($sMail == ""){
            $arrErr['mail'] = "メールアドレスを入力してください";
        }
        else if(!preg_match("/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9_\-\.]+\.[a-zA-Z]+$/", $sMail)){
            $arrErr['mail'] = "メールアドレスの形式が正しくありません";
        }

        // 電話番号チェック
        if ($sTelephone == "") {
            $arrErr['telephone'] = "電話番号を入力してください";
        } else if (!preg_match("/^[0-9]{10,11}$/", $sTelephone)) { // ハイフンなしで10桁または11桁の数字のみ
            $arrErr['telephone'] = "電話番号は10桁または11桁の数字で入力してください";
        }
        
        //log in idチェック
        if($sLogin_Id == ""){
            $arrErr['login_id'] = "ログインIDを入力してください";
        }
        else if(mb_strlen($sLogin_Id, "UTF-8") > 20){
            $arrErr['login_id'] = "ログインIDは20文字以内で入力してください";
        }

        //log in passチェック
        if($sLogin_Pass == ""){
            $arrErr['login_pass'] = "ログインパスワードを入力してください";
        }
        else if(mb_strlen($sLogin_Pass, "UTF-8") > 20){
            $arrErr['login_pass'] = "ログインパスワードは20文字以内で入力してください";
        }

        //入力エラーがある場合は最初のステップに戻す
        if(count($arrErr) > 0){
            $nStepFlg = "";
        }
    }

//**************************************************
// STEP2（完了画面）
//**************************************************
    if($nStepFlg == 2 && count($arrErr) == 0){

        //データ登録
        $bRet = updateMember($sMemberId,
                             $sName,
                             $sAge, 
                             $sTelephone,
                             $sPostcode, 
                             $sMail, 
                             $sAddress, 
                             $sLogin_Id, 
                             $sLogin_Pass);

        //DB登録エラーがある場合は最初のステップに戻す
        if($bRet == false){
            $nStepFlg = "";
        }
    }

//**************************************************
// HTMLを出力
//**************************************************
    if($nStepFlg == ""){
        require_once(__DIR__ .'/../../view/admin/m_update.html');
    } else if ($nStepFlg == 1) {
        require_once(__DIR__ .'/../../view/admin/m_updateCheck.html');
    } else if ($nStepFlg == 2) {
        require_once(__DIR__ .'/../../view/admin/m_updateOK.html');
    }
?>
