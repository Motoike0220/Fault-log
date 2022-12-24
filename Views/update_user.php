<!DOCTYPE html>
<html lang="ja">
<head>
<?php include_once('../views/common/head.php') ?>
    <title>ユーザー編集画面</title>
</head>
<body>
    <!--ユーザー更新フォーム-->
    <?php include_once('../views/common/header.php') ?>
    <div class="container">
        <div class="sign-up">
            <form method="post" action="../controllers/update_user.php">
                <input type="text" name="name" class="form-control" value='<?php echo $_SESSION['USER']['name'] ?>' placeholder="名前">
                <input type="email" name="email" class="form-control" value='<?php echo $_SESSION['USER']['email'] ?>' placeholder="メールアドレス">
                <input type="submit" class="btn btn-primary" value="更新">  
            </form>
        </div>
        <div class="">
            <p><a href="../controllers/sign-up.php">登録画面</a></p>
        </div>    
    </div>
    
    

</body>
</html>