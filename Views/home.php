<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../Views/common/head.php') ?>
    <title>ホーム画面</title>
</head>
<body>
    <?php include_once('../Views/common/header.php') ?>
<div class="container-fluid">
    <!--main-area-->
    <div class="row">
            <div class="head-line">
                <!--post-area-->
            </div>
            <div class='col-md-10'>
            <div class="contents">
                <div class="main">
                    <h6>新着記事</h6>
                    <?php foreach($contents as $content): ?> 
                    <div class='posts'>
                        <span><a href='../Controllers/post.php?id=<?php echo $content['id']?>'><p><?php echo $content['title'] ?></p></a></span>
                        <span><?php echo $content['categoly'] ?></span>
                        <span><?php echo $content['created_at'] ?></span>
                    </div>
                    <?php endforeach; ?>
            </div>
            </div>
            </div>
            <div class='col-md-2'>
                <div class='profile'>
                    <ul>
                        <?php echo $_SESSION['USER']['nickname']?>
                        <li><a href="../controllers/update_user.php">ユーザー情報更新</a></li>
                        <li><a href ="../controllers/sign-out.php">ログアウト</a></li>
                        <li><a href="../Controllers/contribute.php" >投稿</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
</body>

</html>