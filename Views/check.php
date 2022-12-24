<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../views/common/head.php') ?>
    <title>登録画面</title>
</head>
<body>
    <div class="container">
        <div class="sign-up">
            <form action="../controllers/check.php" method="post">
                <h1>この情報を登録します、いい？</h1>

                <h6>名前</h6>
                <p><?php echo h($user['name']) ?></p>
                <h6>ニックネーム</h6>
                <p><?php echo h($user['nickname']) ?></p>
                <h6>メールアドレス</h6>
                <p><?php echo h($user['email']) ?></p>
                <h6>パスワード</h6>
                <p>ここでは表示しません</p>

                <a href="sign-up.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <button  class="btn btn-primary" type="submit">会員登録</button>
            </form>
        </div>    
    </div>
</body>
</html>