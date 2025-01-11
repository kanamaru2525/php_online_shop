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
    //**************************************************
// 変数取得
//**************************************************
    $sItem_Id = isset($_POST['item_id']) ? $_POST['item_id'] : "";

    $sItem_name =  isset($_POST['item_name']) ? $_POST['item_name'] : "";

    $sItem_price =  isset($_POST['item_price']) ? $_POST['item_price'] : "";

    $sItem_exp = isset($_POST['item_exp']) ? $_POST['item_exp'] : "";

    $sCategory_id = isset($_POST['category_id']) ? $_POST['category_id'] : "";

    $sItem_stock =  isset($_POST['item_stock']) ? $_POST['item_stock'] : "";

    $sSales_Stop = isset($_POST['sales_stop']) ? $_POST['sales_stop'] : null;

    $null = null;
    
    //処理ステップ
    $nStepFlg = isset($_POST['step']) ? $_POST['step'] : "";

//**************************************************
// STEP0（検索処理）
//**************************************************
if ($nStepFlg == "") {
    // 初期ステップ：商品情報を取得してフォームに表示
    $arrResult =  AdminSelectItem($sItem_name, $sItem_Id, $null);
    $sItem_name = $arrResult[0]['item_name'];
    $sItem_price = $arrResult[0]['item_price'];
    $sItem_exp = $arrResult[0]['item_exp'];
    $sCategory_id = $arrResult[0]['category_id'];
    $sItem_stock = $arrResult[0]['item_stock'];
    $sSales_Stop = isset($arrResult[0]['sales_stop']) ? $arrResult[0]['sales_stop'] : "";
} 
 

//**************************************************
// STEP1（確認画面）
//**************************************************
if($nStepFlg == 1 || $nStepFlg == 2){

    // 商品名
    if($sItem_name == ""){
        $arrErr['item_name'] = "商品名を入力してください";
    }
    else if(mb_strlen($sItem_name, "UTF-8") > 50) {
        $arrErr['item_name'] = "商品名は20文字以内で入力してください";
    }

    // 商品価格
    if ($sItem_price == "") { 
        $arrErr['item_price'] = "商品価格を入力してください"; 
    } 
    else if (!preg_match('/^\d+$/', $sItem_price)) { 
        $arrErr['item_price'] = "商品価格は半角数字で入力してください"; 
    }

    // 商品説明
    if($sItem_exp == ""){
        $arrErr['item_exp'] = "商品名を入力してください";
    }
    else if(mb_strlen($sItem_exp, "UTF-8") > 500) {
        $arrErr['item_exp'] = "商品名は500文字以内で入力してください";
    }

    // 商品カテゴリー
    if($sCategory_id == ""){
        $arrErr['category_id'] = "カテゴリーは選択必須です";
    } 

    // 商品数
    if ($sItem_stock == "") { 
        $arrErr['item_stock'] = "商品在庫を入力してください"; 
    } 
    else if (!preg_match('/^\d+$/', $sItem_stock)) {  
        $arrErr['item_stock'] = "販売停止は半角英数字で入力してください";  
    }

    echo "sSales_Stopの確認<br>";
    echo $sSales_Stop;

    // 販売管理 
    if ($sSales_Stop == "") { 
        $arrErr['sales_stop'] = "販売状態を選択してください（値が空です）。";
    } else if (!in_array($sSales_Stop, ["0", "1"])) { 
        $arrErr['sales_stop'] = "無効な販売状態です（送信された値: $sSales_Stop）。";
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
        $bRet = updateItem(
            $sItem_Id,
            $sItem_name,
            $sItem_price,
            $sItem_exp,
            $sCategory_id,
            $sItem_stock,
            $sSales_Stop
        );

        //DB登録エラーがある場合は最初のステップに戻す
        if($bRet == false){
            $nStepFlg = "";
        }
    }

//**************************************************
// HTMLを出力
//**************************************************
    if($nStepFlg == ""){
        require_once(__DIR__ .'/../../view/admin/i_update.html');
    } else if ($nStepFlg == 1) {
        require_once(__DIR__ .'/../../view/admin/i_updateCheck.html');
    } else if ($nStepFlg == 2) {
        require_once(__DIR__ .'/../../view/admin/i_updateOK.html');
    }
?>
