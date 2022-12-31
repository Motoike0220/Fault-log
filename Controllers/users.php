<?php
//設定の読み込み
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//ユーザーモデルの読み込み
include_once('../Models/users.php');
//コンテンツモデルの読み込み
include_once('../Models/contents.php');
//セッションから情報を取得
session_start();
$user=[];
$user = $_SESSION['USER'];
if(empty($user)){
    header('Location: '. HOME_URL . 'Controllers/sign-in.php');
    exit;
}
//ユーザー情報の取得
$id = null;
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$user_info = getUser($id);


//ユーザー情報の管理
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $data = $_POST["user_level"];
    $user = changeUserLevel($data,$id);

    if($user === true){
        header('Location: '. HOME_URL . 'Controllers/dashboard.php');
    }

    
}

include_once('../Views/users.php');