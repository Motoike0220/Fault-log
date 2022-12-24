<?php 
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//コンテンツモデルの読み込み
include_once('../Models/contents.php');
//URLパラメータからIDを取得

//ログインしていない場合はログイン画面に戻る
session_start();
$user=[];
$user = $_SESSION['USER'];
if(empty($user)){
    header('Location: '. HOME_URL . 'Controllers/sign-in.php');
    exit;
}
$_SESSION['POST'];
$id = $_SESSION['POST'][0]['id'];

var_dump($id);

    if(isset($_POST['comment']) && isset($user)){
        $reply = [
            'comment' => $_POST['comment'],
            'user_name' => $user['name'],
            'post_id' => $_SESSION['POST'][0]['id'],
            'user_id' => $_SESSION['POST'][0]['user_id'],
        ];
        createReply($reply);
        header('Location: '. HOME_URL . 'Controllers/post.php?id='.$id.'');
    }

include_once('../Views/reply.php');
