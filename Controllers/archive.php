<?php
//設定の読み込み
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//コンテンツモデルの読み込み
include_once('../models/contents.php');
//セッションから情報を取得
$user=[];
session_start();
$user = $_SESSION['USER'];
if(empty($user)){
    header('Location: '. HOME_URL . 'controllers/sign-in.php');
    exit;
}

////////////////////////////////////////////
//あいまい検索
///////////////////////////////////////////
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
    $keyword = filter_input(INPUT_POST,'keyword',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $posts = searchPosts($keyword);
}

////////////////////////////////////////////
//ページネーション
///////////////////////////////////////////
$page = filter_input(INPUT_GET,'page',FILTER_SANITIZE_NUMBER_INT);//URLからパラメータを取得
$page = ($page ?: 1);
$contents = showContents($page)[0];
$maxpage = showContents($page)[1];

include_once('../views/archive.php');
