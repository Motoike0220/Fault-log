<?php
////////////////////////////////////////////
//サインアップコントローラー
///////////////////////////////////////////

//設定の読み込み
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//ユーザーモデルの読み込み
include_once('../models/users.php');

////////////////////////////////////////////
//ユーザーの登録
///////////////////////////////////////////

//セッションから値を取得
session_start();

$user = $_SESSION['USER'];
$error = $_SESSION['ERROR'];

//エラーがなければ$dataに連想配列として値を登録
if(empty($error)){
    $data = [
        'name' => $user['name'],
        'nickname' => $user['nickname'],
        'email' => $user['email'],
        'password' => $user['password'],
    ];
}


//POST送信されたとき、ユーザーを作成
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    createUser($data);
    //セッションの破棄
    deleteSession();
    //ログイン画面に遷移
    header('Location: '. HOME_URL . 'controllers/sign-in.php');
}

//ビューの読み込み
include_once('../views/check.php');