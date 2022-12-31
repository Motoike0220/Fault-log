<?php
//設定の読み込み
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//コンテンツモデルの読み込み
include_once('../models/contents.php');
//セッションから情報を取得
session_start();
$user=[];
$user = $_SESSION['USER'];
if(empty($user)){
    header('Location: '. HOME_URL . 'controllers/sign-in.php');
    exit;
}

$id = null;
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

deletePost($id);

