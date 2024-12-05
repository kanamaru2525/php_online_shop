<?php
/****************************************
 * ログインチェック
 * $sLoginId　：ログインID（未指定は空白）
 * $sLoginPass：ログインパスワード（未指定は空白）
 ****************************************/
function selectMember($sMemberId = "", $sLastName = ""){

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
		$sSql .= "	 webapp09 ";
		
		//データ検索の条件
		if($sMemberId != ""){
			//ID
			$sWhere .= ($sWhere == "") ? "WHERE " : "AND ";
			$sWhere .= "id = :id ";
		}
		if($sLastName != ""){
			//苗字
			$sWhere .= ($sWhere == "") ? "WHERE " : "AND ";
			$sWhere .= "last_name LIKE :last_name ";
		}
		
		//ステートメントハンドラを作成
		$stmh = $pdo->prepare($sSql.$sWhere);
		
		//バインドの実行
		if($sMemberId != ""){
			//ID
			$stmh->bindValue(':id',  $sMemberId, PDO::PARAM_INT);
		}
		if($sLastName != ""){
			//苗字
			$stmh->bindValue(':last_name',  "%".$sLastName."%", PDO::PARAM_STR);
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
function insertMember($sFirstName, $sLastName){

	//データベース接続関数の呼び出し
	$pdo = db_connect();

	try {
		//データ検索の条件
		$sql = "INSERT INTO webapp09 (last_name, first_name)
				VALUES (:last_name, :first_name)";
		
		//ステートメントハンドラを作成
		$stmh = $pdo->prepare($sql);
		
		//バインドの実行
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
		$sql = "UPDATE webapp09 
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
		$sql = "DELETE FROM webapp09 
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
function loginCheck($sLoginId = "", $sLoginPass = ""){

    //初期化
    $arrUser = array();

    //データベース接続関数の呼び出し
    $pdo = db_connect();

    try {
        //変数の準備
        $sSql  = "";

        //データ検索のSQLを作成
        $sSql .= "SELECT ";
        $sSql .= "   * ";
        $sSql .= "FROM ";
        $sSql .= "   webapp09 ";
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

        //ログイン情報の有無を判定
        if($arrUser !== false){
            return true;
        }

    } catch (PDOException $Exception) {

        //例外が発生したらエラーを出力
        die('実行エラー :' . $Exception->getMessage()."<br />");

    }

    return false;

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
        $sSql .= "   webapp09 ";
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
        die('実行エラー :' . $Exception->getMessage()."<br />");

    }

    return $sUserName;

}


?>