<?php
////////////////////////////////////////////
//サインアップコントローラー
///////////////////////////////////////////

//設定の読み込み
include_once('../config.php');
//関数の読み込み
include_once('../util.php');
//ユーザーモデルの読み込み
include_once('../models/users.php');
session_start();
////////////////////////////////////////////
//バリデーション
///////////////////////////////////////////

//ユーザー情報を格納する配列
if (isset($_GET['action']) && $_GET['action'] === 'rewrite' && isset($_SESSION['USER'])){ //urlパラメータがある時は書き直しの時　sessionに記録された値を再現する
    $user = $_SESSION['USER']; 
    } else {        
        $user = [
            'name' => '',
            'nickname' => '',
            'email' => '',
            'password' => '',
        ]; 
}

//エラー情報を格納する配列
$error = [];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //POSTされた値を格納
    $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nickname = filter_input(INPUT_POST,'nickname',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
        //内容が未入力の時
        if($name === ''){
            $error['name'] = 'blank';
        }
        //内容が未入力の時
        if($nickname === ''){
            $error['nickname'] = 'blank';
        }
        //内容未入力、登録済み、メールアドレスの形式か　
        if($email === ''){
            $error['email'] = 'blank';
        } else if(duplicationCheck($email) == '0'){
            $error['email'] = 'duplicate';
        } else if(checkMailAddress($email) == '0'){
            $error['email'] = 'notAddress';
        }

        //パスワードが空欄か4文字以下の時(エラー内容の切り替え)
        if($password === ''){
            $error['password'] = 'blank';
        } else if(strlen($password) < 4){
            $error['password'] = 'length';
        }
    //入力された値を配列に保存
    $user['name'] = $name;
    $user['nickname'] = $nickname;
    $user['email'] = $email;
    $user['password'] = $password;
    //セッションに入力値とエラー情報を保存する
    saveSession($user,$error);

    if(empty($error)){
        header('Location: '. HOME_URL . 'controllers/check.php');
    }
}
//登録画面のビューの読み込み
include_once('../views/sign-up.php');
?>