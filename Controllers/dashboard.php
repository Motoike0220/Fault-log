<?php
////////////////////////////////////////////
//ユーザー管理コントローラー
///////////////////////////////////////////

//設定の読み込み
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//ユーザーモデルの読み込み
include_once('../models/users.php');

//////////////////////////////////////////////////
//ユーザーの取得
//////////////////////////////////////////////

//セッションにユーザー情報がないときはログイン画面に戻る
$user=[];
session_start();
$user = $_SESSION['USER'];
if(empty($user)){
    header('Location: '. HOME_URL . 'controllers/sign-in.php');
    exit;
}

/////////////////////////////////////////////////////////
$users = getUsers();

//登録画面のビューの読み込み
include_once('../views/dashboard.php');
