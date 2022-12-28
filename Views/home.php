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
            <div class='col-md-8'>
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
            <div class='col-md-4'>
                <div class='profile'>
                    <?php include_once('../Views/common/user.php') ?>
                </div>
            </div>
    </div>         
</div>
</body>

</html>