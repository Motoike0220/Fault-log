<?php 
///////////////////////////////
//便利な関数
////////////////////////////////

/**
 * ユーザーとエラー情報をセッションに保存
 * 
 * @param array $user $error
 * @return bool
 */
function saveSession(array $user,array $error){
    //セッションを開始してない場合
    if(session_status() === PHP_SESSION_NONE){
        //セッション開始
        session_start();
    }
    //セッション変数名'USER'値は配列の$userを記録する
    $_SESSION['USER'] = $user;
    $_SESSION['ERROR'] = $error;

} 

/**
 * セッションの削除
 * 
 * @return void
 */
function deleteSession(){
    //セッションを開始してない場合
    if(session_status() === PHP_SESSION_NONE){
        //セッション開始
        session_start();
    }
    //セッションのユーザー情報を削除
    unset($_SESSION['USER']);
    unset($_SESSION['ERROR']);
}

/**
 * セッションの情報を取得する関数
 * 
 * @return array $user
 * @return array $error
 */
function useSession(){
     //セッションを開始してない場合
    if(session_status() === PHP_SESSION_NONE){
        //セッション開始
        session_start();
    }
    //$userにセッションUSERの情報を格納
    $user = $_SESSION['USER'];
    $error = $_SESSION['ERROR'];
}

/**
 * htmlspecialcharsの省略
 * 
 * @return string
 */
function h($data){
    return htmlspecialchars($data);
}

?>