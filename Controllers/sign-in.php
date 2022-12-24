<?php
////////////////////////////////////////////
//ログインコントローラー
///////////////////////////////////////////
if(session_status() === PHP_SESSION_NONE){
    //セッション開始
    session_start();
}
//設定の読み込み
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//ユーザーモデルの読み込み
include_once('../models/users.php');

$error['login'] = '';

$user = [
    'name' => '',
    'email' => '',
    'password' => '',
    'user_level' => '',
];

$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);

if(isset($email) && isset($password) ){
    $user = loginCheck($email,$password);
    if ($user){
        //ログインに成功したら、ユーザー情報をセッションに保存
        $_SESSION['USER'] = $user;
        header('Location: '. HOME_URL . 'controllers/home.php');
    } else {
        //ログインに失敗したときは、false 
        $error['login'] = 'false';
    }
}

//try_login_resulの初期値はnull　ログインに失敗すると、falseが入る
$view_try_login_result = $error['login'];

include_once('../views/sign-in.php');
?>