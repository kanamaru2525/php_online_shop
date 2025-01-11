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
    $sItem_Id = isset($_POST['item_id']) ? $_POST['item_id'] : "";

    //処理ステップ
    $nStepFlg = isset($_POST['step']) ? $_POST['step'] : "";

//**************************************************
// STEP0（検索処理）
//**************************************************
    if($nStepFlg == ""){
    //メンバー情報の取得
        $arrResult =  AdminSelectItem("", $sItem_Id, "");
        $sItem_name = $arrResult[0]['item_name'];
        $sItem_price = $arrResult[0]['item_price'];
        $sItem_exp = $arrResult[0]['item_exp'];
        $sCategory_id = $arrResult[0]['category_id'];
        $sItem_stock = $arrResult[0]['item_stock'];
        $sSales_Stop = isset($arrResult[0]['sales_stop']) ? $arrResult[0]['sales_stop'] : "";
    }


//**************************************************
// STEP1（削除処理）
//**************************************************
    if ($nStepFlg == "1"){
        //確認画面でOKなら削除
        echo "削除する item_id: " . htmlspecialchars($sItem_Id, ENT_QUOTES) . "<br />";
        $sItem_Id = (int)$sItem_Id;
        echo "削除する item_id: " . htmlspecialchars($sItem_Id, ENT_QUOTES) . "<br />";
        $bRet = deleteItem($sItem_Id);

        //DB登録エラーがある場合は最初のステップに戻す
        if($bRet == false){
            $nStepFlg = "";
        }
    }

//**************************************************
// HTMLを出力
//**************************************************
    if($nStepFlg == ""){
        require_once(__DIR__ .'/../../view/admin/i_delete.html');
    } else if ($nStepFlg == 1) {
        require_once(__DIR__ .'/../../view/admin/i_deleteOK.html');
    }

?>
