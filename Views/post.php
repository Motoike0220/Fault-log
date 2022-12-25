<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../views/common/head.php') ?>
</head>
<body>
<?php include_once('../views/common/header.php') ?>
    <?php if($post == null): ?>
            <p>ページが存際しません</p>
    <?php endif; ?>
    <div class="container-fluid">
        <div class='row'>
            <div class="col-12">
                <div class='article'>
                    <?php foreach($post as $posts): ?>
                        <h1><?php echo $posts['title'] ?></h1>
                        <span><?php echo $posts['user_name'] ?></span>
                        <p><img src="<?php echo $posts['image_path'] ?>" alt="投稿画像"width='50px' height='50px'></p>
                        <p><?php echo $posts['created_at'] ?></p>
                        <div class='js-likes' data-post_id='1' data-user_id='1'>
                        <span><img src="http://localhost/Fault-log/Views/img/post/likes.svg" alt='ハート' height='20px' width='20px'></span>
                        </div>
                        <p><?php echo $posts['post'] ?></p>
                        <?php if($temp_id == $user_id): ?>
                            <span><a href ='../Controllers/delete.php?id=<?php echo $posts['id'] ?>"'>削除  |  </a></span>
                            <span><a href ='#'>更新</a></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <span><a href='../Controllers/reply.php'>返信</a></span>
                        
                    <div class='reply'>
                        <?php foreach($comments as $comment): ?>
                        <p><a href='../Controllers/post.php?id=<?php echo $posts['id'] ?>"'>>></a></p>
                        <!-- <p><img src="<?php echo $comment['image_path'] ?>" alt="投稿画像"width='50px' height='50px'></p> -->
                        <p><?php echo $comment['created_at'] ?></p>
                        <p><?php echo $comment['comment'] ?></p>
                        <span>発信者：</span><span><?php echo $comment['user_name'] ?></span>
                        <?php if($temp_id == $user_id): ?>
                            <span><a href ='../Controllers/delete.php?id=<?php echo $posts['id'] ?>"'>削除  |  </a></span>
                            <span><a href ='#'>更新</a></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
</body>
</html>