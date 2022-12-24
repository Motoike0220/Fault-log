<!DOCTYPE html>
<html lang="ja">
<head>
<?php include_once('../views/common/head.php') ?>
    <title>ログイン画面</title>
</head>
<body>
    <!--ログインが失敗したとき-->
    <?php if (isset($view_try_login_result) && $view_try_login_result === 'false') : ?>
        <div class="alert alert-warning text-sm" role="alert">
                ログインに失敗しました。メールアドレス、パスワードが正しいかご確認ください。
        </div> 
    <?php endif; ?>
    <!--ログインフォーム-->
    <div class="container">
        <div class="sign-up">
            <form method="post" action="../controllers/sign-in.php">
                <input type="email" name="email" class="form-control" placeholder="メールアドレス" required>
                <input type="password" name="password" class="form-control" placeholder="パスワード" required>
                <input type="submit" class="btn btn-primary" value="ログイン">  
            </form>
        </div>
        <div class="">
            <p><a href="../controllers/sign-up.php">登録画面</a></p>
        </div>    
    </div>
    
    

</body>
</html>