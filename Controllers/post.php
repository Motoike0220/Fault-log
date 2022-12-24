<?php
//設定の読み込み
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//コンテンツモデルの読み込み
include_once('../models/contents.php');
//URLパラメータからIDを取得
session_start();
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$_SESSION['POST'] = [];
$_SESSION['POST'] = detailPost($id);

$temp_id = $_SESSION['USER']['id'];
$user_id = $_SESSION['POST'][0]['user_id']; 

$post = detailPost($id);


var_dump($_SESSION['POST']);


include_once('../Views/post.php');

?>