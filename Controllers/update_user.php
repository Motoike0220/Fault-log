
<?php
////////////////////////////////////////////
//ユーザーアップデートコントローラー
///////////////////////////////////////////
if(session_status() === PHP_SESSION_NONE){
    //セッション開始
    session_start();
}
//設定の読み込み
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//ユーザーモデルの読み込み
include_once('../Models/users.php');
/////////////////////////////////////
//　ユーザー情報を配列に格納しておく。
$id = $_SESSION['USER']['id'];
$name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
$password = $_SESSION['USER']['password'];
$updated_at = date('Y-m-d-s');

$user =[
    'id' => $id,
    'name' => $name,
    'email' => $email,
    'password' => $password,
    'updated_at' => $updated_at,
];
///////////////////////////////////////////
//POST送信されたとき、編集関数を使う。
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($user)){
        updateUser($user);
    } 
        if(updateUser($user) == true){ //更新が成功したらセッション情報を書き換えてホームに戻る。
        $_SESSION['USER']['name'] = $user['name'];
        $_SESSION['USER']['email'] = $user['email'];
        $_SESSION['USER']['password'] = $user['password'];

        header('Location: '. HOME_URL . 'Controllers/home.php');
    }
}

include_once('../Views/update_user.php');