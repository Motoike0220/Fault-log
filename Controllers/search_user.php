<?php
//設定の読み込み
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//コンテンツモデルの読み込み
include_once('../models/contents.php');
//セッションから情報を取得

////////////////////////////////////////////////////////
//ユーザー検索
////////////////////////////////////////////////////////


$user=[];
session_start();
$user = $_SESSION['USER'];
if(empty($user)){
    header('Location: '. HOME_URL . 'controllers/sign-in.php');
    exit;
}