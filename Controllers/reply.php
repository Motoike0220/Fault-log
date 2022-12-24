<?php 
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//コンテンツモデルの読み込み
include_once('../Models/contents.php');
//URLパラメータからIDを取得
session_start();

$_SESSION['POST'];

var_dump($_SESSION['POST']);


include_once('../Views/reply.php');
