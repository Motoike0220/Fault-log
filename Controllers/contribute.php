<?php
////////////////////////////////////////////
//投稿コントローラー
///////////////////////////////////////////

//設定の読み込み
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//ユーザーモデルの読み込み
include_once('../models/contents.php');
///////////////////////////////////////////////////////////////////////
$user=[];
session_start();
$user = $_SESSION['USER'];
if(empty($user)){
    header('Location: '. HOME_URL . 'controllers/sign-in.php');
    exit;
}

/////////////////////////////////////////////////////////////////////////////////////////////

    // //コンテンツテーブルに値を送信
    // if(isset($_POST['body']) && isset($user) && !empty($_FILES) && $_FILES['image']['error'] == 0){
    //     $filename = $_FILES['image']['name'];
    //     //ファイル名生成
    //     $file_name = date('Ymdis')  . '_' . $_FILES['image']['name'];
    //     //パスの生成
    //     $path="http://localhost/fault-log/image/post_image/$file_name";
    //     //画像フォルダへファイルを移行
    //     move_uploaded_file($_FILES['image']['tmp_name'],'../image/post_image/' . $file_name);
    if(isset($_POST['title']) && isset($user)){
        $data=[
            'user_id' => $user['id'],
            'user_name' => $user['name'],
            'title' => $_POST['title'],
            'post' => $_POST['post'],
            'categoly' => $_POST['categoly'],
        ];
        //コンテンツの作成
        createContents($data);
    }


//ビューの読み込み
include_once('../views/contribute.php');