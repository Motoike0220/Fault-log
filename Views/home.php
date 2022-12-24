<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../views/common/head.php') ?>
    <title>ホーム画面</title>
</head>
<body>
<?php include_once('../views/common/header.php') ?>
<div class="container-fluid">
    <!--main-area-->
    <div class="row">
        <div class="col-12">
            <div class="contents">
                <div class="head-line">
                <h1>連絡</h1>
                    <p>ようこそ、<?php echo $_SESSION['USER']['name'] ?>さん</p>
                    <h6><?php echo date('Y年m月d日') ?></h6>
                    <!--post-area-->
                </div>

                <?php foreach($contents as $content): ?>
                    <div class="grid-item">
                        <p><img src='<?php echo $content['image_path'] ?>' alt='投稿画像' width='50px' height='50px'></p>
                        <a href='../Controllers/post.php?id=<?php echo $content['id']?>'><p><?php echo $content['title'] ?></p></a>
                        <p><?php echo $content['categoly'] ?></p>
                        <span>発信者:<a href ='../controllers/profile.php?id=<?php echo $content['user_id']?>'><?php echo $content['user_name'] ?><span> : </span></a>
                        <span>投稿日<a href='../controllers/post.php?id=<?php echo $content['id'] ?>'></a>
                        <p><?php echo $content['created_at'] ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!--最初のページ-->
                <?php if($page > 1): ?>
                <span><a href='?page=<?php echo $page-1; ?>'><?php echo $page-1; ?>ページ目へ | </a></span>
                <?php endif; ?> 
                <!--最終ページ-->
                <?php if($maxpage > $page): ?>
                <span><a href='?page=<?php echo $page+1; ?>'><?php echo $page+1; ?>ページ目へ</a></span>
                <?php endif; ?>
                <!--投稿-->
                <div>
                    <a href="../controllers/contribute.php" >投稿</a>
                </div>
            </div>
                <?php if ($_SESSION['USER']['user_level'] ==2): ?>
                    <p><a href ="../controllers/user_list.php">管理画面</a></p>
                <?php endif; ?>
        </div>         
    </div>
</div>
</body>

</html>