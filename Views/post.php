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
                        <p><img src="<?php echo $posts['image_path'] ?>" alt="投稿画像"width='50px' height='50px'></p>
                        <p><?php echo $posts['created_at'] ?></p>
                        <p><?php echo $posts['post'] ?></p>
                        <?php if($temp_id == $user_id): ?>
                            <span><a href ='../Controllers/delete.php?id=<?php echo $posts['id'] ?>"'>削除  |  </a></span>
                            <span><a href ='#'>更新</a></span>
                            <span><a href='../Controllers/reply.php' >返信</a></span>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <div class='reply'>
                    <?php foreach($post as $posts): ?>
                        <p><a href='../Controllers/post.php'>>></a></p>
                        <p><img src="<?php echo $posts['image_path'] ?>" alt="投稿画像"width='50px' height='50px'></p>
                        <p><?php echo $posts['created_at'] ?></p>
                        <p><?php echo $posts['post'] ?></p>
                        <?php if($temp_id == $user_id): ?>
                            <span><a href ='../Controllers/delete.php?id=<?php echo $posts['id'] ?>"'>削除  |  </a></span>
                            <span><a href ='#'>更新</a></span>
                            <span><a href='../Controllers/reply.php'>返信</a></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>