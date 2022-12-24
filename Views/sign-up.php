<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../views/common/head.php') ?>
    <title>登録画面</title>
</head>
<body>
    <div class="container">
        <div class="sign-up">
            <form method="post" action="../controllers/sign-up.php">
                
                <input type="text" name="name" class="form-control" value ="<?php echo h($user['name']) ?>" placeholder="名前を入力してください">
                <?php if(isset($error['name']) && $error['name'] === 'blank') : ?>
                    <p>名前は必須の入力項目です。</p>
                <?php endif; ?>

                <input type="text" name="nickname" class="form-control" value ="<?php echo h($user['nickname']) ?>" placeholder="ニックネームを入力してください">
                <?php if(isset($error['nickname']) && $error['nickname'] === 'blank') : ?>
                    <p>ニックネームは必須の入力項目です。</p>
                <?php endif; ?>
                
                <input type="text" name="email" class="form-control" value ="<?php echo h($user['email']) ?>" placeholder="メールアドレスを入力してください">
                <?php if(isset($error['email']) && $error['email'] === 'blank') : ?>
                    <p>メールアドレスは必ず入力してください</p>
                <?php endif; ?>

                <?php if(isset($error['email']) && $error['email'] === 'duplicate') : ?>
                    <p>すでに登録されたメールアドレスです。</p>
                <?php endif; ?>

                <?php if(isset($error['email']) && $error['email'] === 'notAddress') : ?>
                    <p>正しい形で入力してください。</p>
                <?php endif; ?>

                <input type="password" name="password" class="form-control" placeholder="パスワード">
                <?php if(isset($error['password']) && $error['password'] === 'blank') : ?>
                    <p>パスワードは必ず入力してください</p>
                <?php endif; ?>
                <?php if(isset($error['password']) && $error['password'] === 'length') : ?>
                    <p>パスワードは4文字以上で設定してください</p>
                <?php endif; ?>

                <button  class="btn btn-primary" type="submit">確認<span></button><p><a href="../controllers/sign-in.php">ログイン画面</a></p></span>
            </form>
        </div>    
    </div>

</body>
</html>