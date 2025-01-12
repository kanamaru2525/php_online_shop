<?php
####################################################################################
### ユーザ関連
####################################################################################
/****************************************
 * ログインチェック
 * $sLoginId　：ログインID（未指定は空白）
 * $sLoginPass：ログインパスワード（未指定は空白）
 ****************************************/
function loginCheck($sLoginId = "", $sLoginPass = ""){

    //初期化
    $arrUser = array();

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //変数の準備
        $sSql  = "";

        //データ検索のSQLを作成
        $sSql = "SELECT * FROM member WHERE login_id = :login_id AND login_pass = :login_pass";

        //ステートメントハンドラを作成
        $stmh = $pdo->prepare($sSql);
        $stmh->bindValue(':login_id',   $sLoginId,   PDO::PARAM_STR);
        $stmh->bindValue(':login_pass', $sLoginPass, PDO::PARAM_STR);

        //SQL文の実行
        $stmh->execute();

        //実行結果を取得
        $arrUser = $stmh->fetch(PDO::FETCH_ASSOC);

        //ログイン情報の有無を判定
        if($arrUser !== false){
            return true;
        }

    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }

    return false;

}

/****************************************
 * ログインユーザのユーザIDを取得
 * $sLoginId　：ログインID
 * $sLoginPass：ログインパスワード
 ****************************************/
function getUserId($sLoginId = "", $sLoginPass = ""){

    //初期化
    $arrUser = array();
    $sUserId = "";

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //変数の準備
        $sSql  = "";

        //データ検索のSQLを作成
        $sSql .= "SELECT ";
        $sSql .= "   id ";
        $sSql .= "FROM ";
        $sSql .= "   member ";
        $sSql .= "WHERE ";
        $sSql .= "  login_id = :login_id AND ";
        $sSql .= "  login_pass = :login_pass ";


        //ステートメントハンドラを作成
        $stmh = $pdo->prepare($sSql);
        $stmh->bindValue(':login_id',   $sLoginId,   PDO::PARAM_STR);
        $stmh->bindValue(':login_pass', $sLoginPass, PDO::PARAM_STR);

        //SQL文の実行
        $stmh->execute();

        //実行結果を取得
        $arrUser = $stmh->fetch(PDO::FETCH_ASSOC);

        //ユーザID取得
        $sUserId = $arrUser["id"];


    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }

    return $sUserId;

}

/****************************************
 * ログインユーザ名取得
 * $sLoginId　：ログインID
 * $sLoginPass：ログインパスワード
 ****************************************/
function getUserName($sLoginId = "", $sLoginPass = ""){

    //初期化
    $arrUser = array();
    $sUserName = "";

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //変数の準備
        $sSql  = "";

        //データ検索のSQLを作成
        $sSql .= "SELECT ";
        $sSql .= "   last_name, ";
        $sSql .= "   first_name ";
        $sSql .= "FROM ";
        $sSql .= "   member ";
        $sSql .= "WHERE ";
        $sSql .= "  login_id = :login_id AND ";
        $sSql .= "  login_pass = :login_pass ";


        //ステートメントハンドラを作成
        $stmh = $pdo->prepare($sSql);
        $stmh->bindValue(':login_id',   $sLoginId,   PDO::PARAM_STR);
        $stmh->bindValue(':login_pass', $sLoginPass, PDO::PARAM_STR);

        //SQL文の実行
        $stmh->execute();

        //実行結果を取得
        $arrUser = $stmh->fetch(PDO::FETCH_ASSOC);

        //ユーザ名取得
        $sUserName = $arrUser["last_name"] . " " . $arrUser["first_name"];


    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }

    return $sUserName;

}

####################################################################################
### ユーザ関連
####################################################################################
/****************************************
 * ログインチェック
 * $sLoginId　：ログインID（未指定は空白）
 * $sLoginPass：ログインパスワード（未指定は空白）
 ****************************************/
function AdminCheck($sLoginId = "", $sLoginPass = ""){

    //初期化
    $arrUser = array();

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //変数の準備
        $sSql  = "";

        //データ検索のSQLを作成
        $sSql = "SELECT * FROM admin WHERE id = :login_id AND pass = :login_pass";

        //ステートメントハンドラを作成
        $stmh = $pdo->prepare($sSql);
        $stmh->bindValue(':login_id',   $sLoginId,   PDO::PARAM_STR);
        $stmh->bindValue(':login_pass', $sLoginPass, PDO::PARAM_STR);

        //SQL文の実行
        $stmh->execute();

        //実行結果を取得
        $arrUser = $stmh->fetch(PDO::FETCH_ASSOC);

        //ログイン情報の有無を判定
        if($arrUser !== false){
            return true;
        }

    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }

    return false;

}

/****************************************
 * ログインユーザのユーザIDを取得
 * $sLoginId　：ログインID
 * $sLoginPass：ログインパスワード
 ****************************************/
function getAdminId($sLoginId = "", $sLoginPass = ""){

    //初期化
    $arrUser = array();
    $sUserId = "";

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //変数の準備
        $sSql  = "";

        //データ検索のSQLを作成
        $sSql .= "SELECT ";
        $sSql .= "   id ";
        $sSql .= "FROM ";
        $sSql .= "   admin ";
        $sSql .= "WHERE ";
        $sSql .= "  id = :login_id AND ";
        $sSql .= "  pass = :login_pass ";


        //ステートメントハンドラを作成
        $stmh = $pdo->prepare($sSql);
        $stmh->bindValue(':login_id',   $sLoginId,   PDO::PARAM_STR);
        $stmh->bindValue(':login_pass', $sLoginPass, PDO::PARAM_STR);

        //SQL文の実行
        $stmh->execute();

        //実行結果を取得
        $arrUser = $stmh->fetch(PDO::FETCH_ASSOC);

        //ユーザID取得
        $sUserId = $arrUser["id"];


    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }

    return $sUserId;

}

/****************************************
 * ログインユーザ名取得
 * $sLoginId　：ログインID
 * $sLoginPass：ログインパスワード
 ****************************************/
function getAdminName($sLoginId = "", $sLoginPass = ""){

    //初期化
    $arrUser = array();
    $sUserName = "";

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //変数の準備
        $sSql  = "";

        //データ検索のSQLを作成
        $sSql .= "SELECT ";
        $sSql .= "   * ";
        $sSql .= "FROM ";
        $sSql .= "   admin ";
        $sSql .= "WHERE ";
        $sSql .= "  id = :login_id AND ";
        $sSql .= "  pass = :login_pass ";


        //ステートメントハンドラを作成
        $stmh = $pdo->prepare($sSql);
        $stmh->bindValue(':login_id',   $sLoginId,   PDO::PARAM_STR);
        $stmh->bindValue(':login_pass', $sLoginPass, PDO::PARAM_STR);

        //SQL文の実行
        $stmh->execute();

        //実行結果を取得
        $arrUser = $stmh->fetch(PDO::FETCH_ASSOC);

        //ユーザ名取得
        $sUserName = $arrUser["id"];


    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }

    return $sUserName;

}


####################################################################################
### 商品関連
####################################################################################
/****************************************
 * 商品一覧取得
 ****************************************/
function selectItem($keyword, $categoryId){

    //初期化
    $arrItem = array();
    $sWhere = "";

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //データ検索のSQLを作成
        $sSql  = "";
        $sSql .= "SELECT ";
        $sSql .= "   A.item_id, ";
        $sSql .= "   A.item_name, ";
        $sSql .= "   A.item_exp, ";
        $sSql .= "   A.item_price, ";
        $sSql .= "   A.item_stock, ";
        $sSql .= "   A.category_id, ";
        $sSql .= "   B.category_name ";
        $sSql .= "FROM ";
        $sSql .= "   item A ";
        $sSql .= "LEFT JOIN ";
        $sSql .= "   category B ";
        $sSql .= "ON ";
        $sSql .= "   A.category_id = B.category_id ";

        //データ検索の条件
        if($keyword != ""){
            //キーワード
            $sWhere .= ($sWhere == "") ? "WHERE " : "AND ";
            $sWhere .= "A.item_name LIKE :item_name ";
        }
        if($categoryId != ""){
            //カテゴリID
            $sWhere .= ($sWhere == "") ? "WHERE " : "AND ";
            $sWhere .= "A.category_id = :category_id ";
        }

        //ステートメントハンドラを作成
        $stmh = $pdo->prepare($sSql.$sWhere);

        //バインドの実行
        if($keyword != ""){
            //キーワード
            $stmh->bindValue(':item_name',  "%".$keyword."%", PDO::PARAM_STR);
        }
        if($categoryId != ""){
            //カテゴリID
            $stmh->bindValue(':category_id',  $categoryId, PDO::PARAM_INT);
        }

        //SQL文の実行
        $stmh->execute();

        //実行結果を取得
        $arrItem = $stmh->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }

    return $arrItem;

}

/****************************************
 * 商品一覧取得
 ****************************************/
function selectItemDetail($id){

    //初期化
    $arrItem = array();
    $sWhere = "";

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //データ検索のSQLを作成
        $sSql  = "";
        $sSql .= "SELECT ";
        $sSql .= "   A.item_id, ";
        $sSql .= "   A.item_name, ";
        $sSql .= "   A.item_exp, ";
        $sSql .= "   A.item_price, ";
        $sSql .= "   A.item_stock, ";
        $sSql .= "   A.category_id, ";
        $sSql .= "   B.category_name ";
        $sSql .= "FROM ";
        $sSql .= "   item A ";
        $sSql .= "LEFT JOIN ";
        $sSql .= "   category B ";
        $sSql .= "ON ";
        $sSql .= "   A.category_id = B.category_id ";
        $sSql .= "WHERE ";
        $sSql .= "   A.item_id = :item_id ";

        //ステートメントハンドラを作成
        $stmh = $pdo->prepare($sSql.$sWhere);

        //商品ID
        $stmh->bindValue(':item_id',  $id, PDO::PARAM_INT);

        //SQL文の実行
        $stmh->execute();

        //実行結果を取得
        $arrItem = $stmh->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }

    return $arrItem;

}

/****************************************
 * カテゴリ取得
 ****************************************/
function getCategory(){

    //初期化
    $arrCategory = array();

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //変数の準備
        $sSql  = "";

        //データ検索のSQLを作成
        $sSql .= "SELECT ";
        $sSql .= "   * ";
        $sSql .= "FROM ";
        $sSql .= "   category ";


        //ステートメントハンドラを作成
        $stmh = $pdo->prepare($sSql);

        //SQL文の実行
        $stmh->execute();

        //実行結果を取得
        $arrCategory = $stmh->fetchAll(PDO::FETCH_ASSOC);


    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }

    return $arrCategory;

}

####################################################################################
### カート関連
####################################################################################
/****************************************
 * カート一覧取得
 * $nUserId：ユーザID
 ****************************************/
function selectCart($nUserId = ""){

    //ユーザID未指定の場合は×
    if($nUserId == ""){
        return false;
    }

    //初期化
    $arrCart = array();

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //データ検索のSQLを作成
        $sSql  = "";
        $sSql .= "SELECT ";
        $sSql .= "   A.item_id, ";
        $sSql .= "   A.item_num, ";
        $sSql .= "   B.item_name, ";
        $sSql .= "   B.item_exp, ";
        $sSql .= "   B.item_price, ";
        $sSql .= "   B.item_stock ";
        $sSql .= "FROM ";
        $sSql .= "   cart A ";
        $sSql .= "LEFT JOIN ";
        $sSql .= "   item B ";
        $sSql .= "ON ";
        $sSql .= "   A.item_id = B.item_id ";
        $sSql .= "WHERE ";
        $sSql .= "  A.user_id = :user_id ";
        $sSql .= "ORDER BY ";
        $sSql .= "  A.item_id ";

        //SQLを実行～取得
        $stmh = $pdo->prepare($sSql);
        $stmh->bindValue(':user_id', $nUserId, PDO::PARAM_INT);
        $stmh->execute();
        $arrCart = $stmh->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }

    return $arrCart;

}

/****************************************
 * カート内件数を取得
 * $nUserId：ユーザID
 ****************************************/
function countCart($nUserId = ""){

    //ユーザID未指定の場合は×
    if($nUserId == ""){
        return 0;
    }

    //初期化
    $nCartCnt = 0;

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //データ検索のSQLを作成
        $sSql  = "";
        $sSql .= "SELECT ";
        $sSql .= "   COUNT(*) AS CNT ";
        $sSql .= "FROM ";
        $sSql .= "   cart ";
        $sSql .= "WHERE ";
        $sSql .= "  user_id = :user_id ";

        //SQLを実行～取得
        $stmh = $pdo->prepare($sSql);
        $stmh->bindValue(':user_id', $nUserId, PDO::PARAM_INT);
        $stmh->execute();
        $arrCart = $stmh->fetch(PDO::FETCH_ASSOC);

        //件数を取得
        $nCartCnt = isset($arrCart['CNT']) ? $arrCart['CNT'] : 0;

    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }

    return $nCartCnt;

}

/****************************************
 * カートへ入れる
 * $nItemId ：商品ID
 * $nItemNum：商品数量
 * $nUserId ：ユーザID
 ****************************************/
function addCart($nItemId, $nItemNum, $nUserId){

    //初期化
    $result = false;

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //既にデータがあるかどうかを確認するSQL
        $sSql  = "";
        $sSql .= "SELECT ";
        $sSql .= "   * ";
        $sSql .= "FROM ";
        $sSql .= "   cart ";
        $sSql .= "WHERE ";
        $sSql .= "  item_id = :item_id AND ";
        $sSql .= "  user_id = :user_id ";

        //SQL実行～取得
        $stmh = $pdo->prepare($sSql);
        $stmh->bindValue(':item_id', $nItemId, PDO::PARAM_INT);
        $stmh->bindValue(':user_id', $nUserId, PDO::PARAM_INT);
        $stmh->execute();
        $arrItem = $stmh->fetch(PDO::FETCH_ASSOC);

        //登録されていない場合はINSERT
        if($arrItem === false){
            //INSERT文作成
            $sSql  = "";
            $sSql .= "INSERT INTO cart ";
            $sSql .= "  (user_id, item_id, item_num) ";
            $sSql .= "VALUES ";
            $sSql .= "  (:user_id, :item_id, :item_num)";
        }
        //登録されている場合はUPDATE
        else {
            //UPDATE文作成
            $sSql  = "";
            $sSql .= "UPDATE cart SET ";
            $sSql .= "  item_num = item_num + :item_num ";
            $sSql .= "WHERE";
            $sSql .= "  item_id = :item_id AND ";
            $sSql .= "  user_id = :user_id ";
        }

        //SQL実行～取得
        $stmh = $pdo->prepare($sSql);
        $stmh->bindValue(':user_id',     $nUserId,          PDO::PARAM_INT);
        $stmh->bindValue(':item_id',     $nItemId,          PDO::PARAM_INT);
        $stmh->bindValue(':item_num',   $nItemNum,         PDO::PARAM_INT);
        $result = $stmh->execute();//成功したらtrueが入る


    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }

    return $result;

}

/****************************************
 * 数量変更
 * $nItemId ：商品ID
 * $nItemNum：商品数量
 * $nUserId ：ユーザID
 ****************************************/
function changeCart($nItemId, $nItemNum, $nUserId){

    //初期化
    $result = false;

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //数量変更の場合
        if($nItemNum > 0){
            //UPDATE文作成
            $sSql  = "";
            $sSql .= "UPDATE cart SET ";
            $sSql .= "  item_num = :item_num ";
            $sSql .= "WHERE";
            $sSql .= "  item_id = :item_id AND ";
            $sSql .= "  user_id = :user_id ";

            //SQL実行～取得
            $stmh = $pdo->prepare($sSql);
            $stmh->bindValue(':user_id',  $nUserId,  PDO::PARAM_INT);
            $stmh->bindValue(':item_id',  $nItemId,  PDO::PARAM_INT);
            $stmh->bindValue(':item_num', $nItemNum, PDO::PARAM_INT);
            $result = $stmh->execute();
        }
        //数量が0の場合は削除
        else {
            //DELETE文作成
            $sSql  = "";
            $sSql .= "DELETE FROM cart ";
            $sSql .= "WHERE";
            $sSql .= "  item_id = :item_id AND ";
            $sSql .= "  user_id = :user_id ";

            //SQL実行～取得
            $stmh = $pdo->prepare($sSql);
            $stmh->bindValue(':user_id',  $nUserId,  PDO::PARAM_INT);
            $stmh->bindValue(':item_id',  $nItemId,  PDO::PARAM_INT);
            $result = $stmh->execute();
        }

    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }
    return $result;
}

/****************************************
 * カート内クリア
 * $nUserId ：ユーザID
 ****************************************/
function clearCart($nUserId){

    //初期化
    $result = false;

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //DELETE文作成
        $sSql  = "";
        $sSql .= "DELETE FROM cart ";
        $sSql .= "WHERE";
        $sSql .= "  user_id = :user_id ";

        //SQL実行～取得
        $stmh = $pdo->prepare($sSql);
        $stmh->bindValue(':user_id',  $nUserId,  PDO::PARAM_INT);
        $result = $stmh->execute();

    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }
    return $result;
}

####################################################################################
### 注文関連
####################################################################################
/****************************************
 * 注文確定
 * $nUserId ：ユーザID
 ****************************************/
function compOrder($nUserId){

    //初期化
    $result = false;
    $orderDate = date("Y-m-d");

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {

        //カート内の商品情報を取得する
        $arrCart = selectCart($nUserId);

        //注文テーブルへデータを入れるSQL
        $sSql  = "";
        $sSql .= "INSERT INTO orders ";
        $sSql .= "  (user_id, item_id, item_num, sales_price, order_date) ";
        $sSql .= "VALUES ";
        $sSql .= "  (:user_id, :item_id, :item_num, :sales_price, :order_date) ";

        //SQL実行～取得
        foreach($arrCart as $arr){
            $stmh = $pdo->prepare($sSql);
            $stmh->bindValue(':user_id',     $nUserId,           PDO::PARAM_INT);
            $stmh->bindValue(':item_id',     $arr["item_id"],    PDO::PARAM_INT);
            $stmh->bindValue(':item_num',    $arr["item_num"],   PDO::PARAM_INT);
            $stmh->bindValue(':sales_price', $arr["item_price"], PDO::PARAM_INT);
            $stmh->bindValue(':order_date',  $orderDate,         PDO::PARAM_STR);
            $stmh->execute();
        }

        //カート内クリア
        clearCart($nUserId);


    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー（' . __FUNCTION__."）：".$Exception->getMessage()."<br />");

    }
}
####################################################################################
### admin関係
####################################################################################
/****************************************
 * メンバー取得
 * $sMemberId：メンバーID（未指定は空白）
 * $sLastName：苗字（未指定は空白）
 ****************************************/
function selectMember($sMemberId = "", $sName = "", $sMail = "",$sAddress=""){

	//初期化
	$arrResult = array();

	//データベース接続関数の呼び出し
	$pdo = db_connect();

	try {
		//変数の準備
		$sSql  = "";
		$sWhere = "";
	
		//データ検索のSQLを作成
		$sSql .= "SELECT ";
		$sSql .= "	 * ";
		$sSql .= "FROM ";
		$sSql .= "	 member ";
		
		//データ検索の条件
		if($sMemberId != ""){
			//ID
			$sWhere .= ($sWhere == "") ? "WHERE " : "AND ";
			$sWhere .= "id = :id ";
		}
		if($sName != ""){
			//苗字
			$sWhere .= ($sWhere == "") ? "WHERE " : "AND ";
			$sWhere .= "name LIKE :name ";
		}
        
        if($sMail != ""){
            $sWhere .= ($sWhere == "") ? "WHERE " : "AND ";
			$sWhere .= "mail_address LIKE :mail_address ";
        }

        if($sAddress != ""){
            $sWhere .= ($sWhere == "") ? "WHERE " : "AND ";
			$sWhere .= "user_address LIKE :user_address ";
        }
		
		//ステートメントハンドラを作成
		$stmh = $pdo->prepare($sSql.$sWhere);
		
		// バインドの実行
        if ($sMemberId != "") {
            // ID
            $stmh->bindValue(':id', $sMemberId, PDO::PARAM_INT);
        }
        if ($sName != "") {
            // 苗字
            $stmh->bindValue(':name', "%" . $sName . "%", PDO::PARAM_STR);
        }
        if ($sMail != "") {
            // メールアドレス
            $stmh->bindValue(':mail_address', "%" . $sMail . "%", PDO::PARAM_STR);
        }
        if ($sAddress != "") {
            // 住所
            $stmh->bindValue(':user_address', "%" . $sAddress . "%", PDO::PARAM_STR);
        }

		//SQL文の実行
		$stmh->execute();
		
		//実行結果を取得
		$arrResult = $stmh->fetchAll(PDO::FETCH_ASSOC);
	
	} catch (PDOException $Exception) {
	
		//例外が発生したらエラーを出力
		die('実行エラー :' . $Exception->getMessage()."<br />");
	
	}
	
	return $arrResult;

}

/****************************************
 * メンバー登録
 * $sFirstName：名前
 * $sLastName：苗字
 ****************************************/
function insertMember($sName, $sAge,$sTelephone,$sPostcode,$sMail,$sAddress,$sLogin_Id,$sLogin_Pass){

	//データベース接続関数の呼び出し
	$pdo = db_connect();

	try {
		//データ検索の条件
		$sql = "INSERT INTO member (name, age, telephone, postcode, mail_address, user_address, login_id, login_pass)
				VALUES (:name, :age, :telephone, :postcode, :mail_address, :user_address, :login_id, :login_pass)";
		
		//ステートメントハンドラを作成
		$stmh = $pdo->prepare($sql);
		
		//バインドの実行
		$stmh->bindValue(':name',  $sName,  PDO::PARAM_STR);
		$stmh->bindValue(':age', $sAge, PDO::PARAM_INT);
        $stmh->bindValue(':telephone', $sTelephone, PDO::PARAM_STR);
        $stmh->bindValue(':postcode', $sPostcode, PDO::PARAM_STR);
        $stmh->bindValue(':mail_address', $sMail, PDO::PARAM_STR);
        $stmh->bindValue(':user_address', $sAddress, PDO::PARAM_STR);
        $stmh->bindValue(':login_id', $sLogin_Id, PDO::PARAM_STR);
        $stmh->bindValue(':login_pass', $sLogin_Pass, PDO::PARAM_STR);        

		//SQL文の実行
		$stmh->execute();

		//登録成功を返却
		return true;

	
	} catch (PDOException $Exception) {
	
		//例外が発生したらエラーを出力
		die('実行エラー :' . $Exception->getMessage()."<br />");
	
	}

}

/****************************************
 * メンバー更新
 * $sMemberId：メンバーID
 * $sFirstName：名前
 * $sLastName：苗字
 ****************************************/
function updateMember($sMemberId, $sFirstName, $sLastName){

	//データベース接続関数の呼び出し
	$pdo = db_connect();

	try {

		//データ検索の条件
		$sql = "UPDATE member 
				SET
					last_name = :last_name, 
				    first_name = :first_name
				WHERE
					id = :id
		";
		
		//ステートメントハンドラを作成
		$stmh = $pdo->prepare($sql);
		
		//バインドの実行
		$stmh->bindValue(':id',         $sMemberId,  PDO::PARAM_INT);
		$stmh->bindValue(':last_name',  $sLastName,  PDO::PARAM_STR);
		$stmh->bindValue(':first_name', $sFirstName, PDO::PARAM_STR);
		
		//SQL文の実行
		$stmh->execute();
		
		//登録成功を返却
		return true;
	
	} catch (PDOException $Exception) {
	
		//例外が発生したらエラーを出力
		die('実行エラー :' . $Exception->getMessage()."<br />");
	
		//登録失敗を返却
		return false;

	}

}

/****************************************
 * メンバー削除
 * $sMemberId：メンバーID
 ****************************************/
function deleteMember($sMemberId){

	//データベース接続関数の呼び出し
	$pdo = db_connect();

	try {

		//データ検索の条件
		$sql = "DELETE FROM member 
				WHERE  id = :id
		";
		
		//ステートメントハンドラを作成
		$stmh = $pdo->prepare($sql);
		
		//バインドの実行
		$stmh->bindValue(':id', $sMemberId,  PDO::PARAM_INT);
		
		//SQL文の実行
		$stmh->execute();
		
		//登録成功を返却
		return true;
	
	} catch (PDOException $Exception) {
	
		//例外が発生したらエラーを出力
		die('実行エラー :' . $Exception->getMessage()."<br />");
	
		//登録失敗を返却
		return false;
	}

}
/**************************************** 
 * admin商品一覧取得 
 * $keyword, 
 * $sItem_Id, 
 * $salesStop
 ****************************************/ 
function AdminSelectItem($keyword, $sItem_Id, $sSales_Stop) { 
 
    //初期化 
    $arrItem = array(); 
    $sWhere = ""; 
 
    //データベース接続関数の呼び出し 
    $pdo = db_connect(); 
 
    try { 
        //データ検索のSQLを作成 
        $sSql  = "";  
        $sSql .= "SELECT ";  
        $sSql .= "   item_id, ";  
        $sSql .= "   item_name, ";  
        $sSql .= "   item_exp, ";  
        $sSql .= "   item_price, ";  
        $sSql .= "   item_stock, ";  
        $sSql .= "   category_id, ";  
        $sSql .= "   sales_stop, ";  
        $sSql .= "   item_image ";  
        $sSql .= "FROM ";  
        $sSql .= "   item  ";
        
 
        //データ検索の条件 
        if ($keyword != "") { 
            // キーワード検索 
            $sWhere .= ($sWhere == "") ? "WHERE " : "AND "; 
            $sWhere .= "item_name LIKE :item_name "; 
        } 
        if ($sItem_Id != "") { 
            // 商品ID検索 
            $sWhere .= ($sWhere == "") ? "WHERE " : "AND "; 
            $sWhere .= "item_id = :item_id "; 
        } 

        if ($sSales_Stop !== null) {  
            $sWhere .= ($sWhere == "") ? "WHERE " : "AND ";  
            $sWhere .= "sales_stop = :sales_stop ";  
        } else {
            // null の場合は 0 または 1 を検索
            $sWhere .= ($sWhere == "") ? "WHERE " : "AND ";  
            $sWhere .= "(sales_stop = 0 OR sales_stop = 1) ";
        }
        
 
        // ステートメントハンドラを作成 
        $stmh = $pdo->prepare($sSql . $sWhere); 
 
        // バインドの実行 
        if ($keyword != "") { 
            $stmh->bindValue(':item_name', "%" . $keyword . "%", PDO::PARAM_STR); 
        } 

        if ($sItem_Id != "") { 
            $stmh->bindValue(':item_id', $sItem_Id, PDO::PARAM_INT); 
        } 

        if ($sSales_Stop !== null) { 
            $stmh->bindValue(':sales_stop', $sSales_Stop, PDO::PARAM_INT); 
        } 
 
        // SQL文の実行 
        $stmh->execute(); 
 
        // 実行結果を取得 
        $arrItem = $stmh->fetchAll(PDO::FETCH_ASSOC); 
 
    } catch (PDOException $Exception) { 
        // 例外が発生したらエラーを出力 
        die('実行エラー（' . __FUNCTION__ . "）：" . $Exception->getMessage() . "<br />"); 
    } 
 
    return $arrItem; 
}


/****************************************
 * itemの登録  
 ****************************************/
function insertItem($sItem_Id,$sItem_name,$sItem_price,$sItem_exp,$sCategory_id,$sItem_stock,$sSales_Stop){

	//データベース接続関数の呼び出し
	$pdo = db_connect();

	try {
		//データ検索の条件
		$sql = "INSERT INTO item (item_name, item_exp, item_price, item_stock, category_id, sales_stop, item_image)
				VALUES (:item_name, :item_exp,:item_price,:item_stock,:category_id,:sales_stop,:item_image)";
		
		//ステートメントハンドラを作成
		$stmh = $pdo->prepare($sql);
		
        // 画像ファイル名を生成
        $imageFileName = "temp.png";

        // バインドの実行
        $stmh->bindValue(':item_name',  $sItem_name,  PDO::PARAM_STR); 
        $stmh->bindValue(':item_exp',   $sItem_exp,   PDO::PARAM_STR); 
        $stmh->bindValue(':item_price', $sItem_price, PDO::PARAM_INT); 
        $stmh->bindValue(':item_stock', $sItem_stock, PDO::PARAM_INT); 
        $stmh->bindValue(':category_id', $sCategory_id, PDO::PARAM_INT); 
        $stmh->bindValue(':sales_stop', $sSales_Stop, PDO::PARAM_INT);
        $stmh->bindValue(':item_image', $imageFileName, PDO::PARAM_STR);
		
		//SQL文の実行
		$stmh->execute();

        // 登録した商品のIDを取得
        $itemId = $pdo->lastInsertId();

        // 画像ファイル名を商品IDベースに更新
        $imageFileName = $itemId . ".png";

        //登録成功を返却
        return true;
	
	} catch (PDOException $Exception) {
	
		//例外が発生したらエラーを出力
		die('実行エラー :' . $Exception->getMessage()."<br />");
	
		//登録失敗を返却
		return false;
	}
}

/****************************************
 * itemの変更
 ****************************************/
function updateItem($sItem_Id, $sItem_name, $sItem_price, $sItem_exp, $sCategory_id, $sItem_stock, $sSales_Stop){ 
 
    //データベース接続関数の呼び出し 
    $pdo = db_connect(); 
 
    try { 
 
        //データ検索の条件 
        $sql = "UPDATE item  
                SET 
                    item_name = :item_name,  
                    item_exp = :item_exp, 
                    item_price = :item_price, 
                    item_stock = :item_stock, 
                    category_id = :category_id,  
                    sales_stop = :sales_stop 
                WHERE 
                    item_id = :id
        "; 
 
        //ステートメントハンドラを作成 
        $stmh = $pdo->prepare($sql); 
 
        //バインドの実行 
        $stmh->bindValue(':id', $sItem_Id, PDO::PARAM_INT); 
        $stmh->bindValue(':item_name', $sItem_name, PDO::PARAM_STR); 
        $stmh->bindValue(':item_price', $sItem_price, PDO::PARAM_STR); 
        $stmh->bindValue(':item_exp', $sItem_exp, PDO::PARAM_STR); 
        $stmh->bindValue(':item_stock', $sItem_stock, PDO::PARAM_STR); 
        $stmh->bindValue(':category_id', $sCategory_id, PDO::PARAM_STR); 
        $stmh->bindValue(':sales_stop', $sSales_Stop ? 1 : 0, PDO::PARAM_INT);
 
        //SQL文の実行 
        $stmh->execute(); 
        
        //登録成功を返却 
        return true; 
 
    } catch (PDOException $Exception) { 
 
        //例外が発生したらエラーを出力 
        die('実行エラー :' . $Exception->getMessage() . "<br />"); 
 
        //登録失敗を返却 
        return false; 
 
    } 
 
}

function deleteItem($sItem_Id){

	//データベース接続関数の呼び出し
	$pdo = db_connect();

	try {

		//データ検索の条件
		$sql = "DELETE FROM item 
				WHERE  item_id = :item_id
		";
		
		//ステートメントハンドラを作成
		$stmh = $pdo->prepare($sql);

        
        echo "削除する item_id: " . htmlspecialchars($sItem_Id, ENT_QUOTES) . "<br />";
		
		//バインドの実行
		$stmh->bindValue(':item_id', $sItem_Id,  PDO::PARAM_INT);
		
		//SQL文の実行
		$stmh->execute();
		
		//登録成功を返却
        echo "削除成功<br />";
		return true;
	
	} catch (PDOException $Exception) {
        echo '実行エラー :' . $Exception->getMessage() . "<br />";
        echo 'エラーコード :' . $Exception->getCode() . "<br />";
        echo 'トレース情報 :' . $Exception->getTraceAsString() . "<br />";
        return false;
    }

}


?>