<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../Views/common/head.php') ?>
    <title>記事一覧</title>
</head>
<body>
    <?php include_once('../Views/common/header.php') ?>
<div class="container-fluid">
    <!--main-area-->
    <div class="row">
            <div class="head-line">
                <!--post-area-->
            </div>
            <div class='col-md-2'>
                <div class='search'>
                    <select name=''>
                        <option>投稿内容</option>
                    </select>
                    <form method='post' action='../Controllers/archive.php'>
                        <input type='text' name='keyword' placeholder='検索' required>
                        <input type='submit' value='検索'>
                    </form>
                    <div class ='search-list'>
                        <?php if(isset($posts)):?>
                        <?php foreach ($posts as $post): ?>
                            <a href='../Controllers/post.php?id=<?php echo $post['id'] ?>'><p><?php echo $post['title'] ?></p></a>
                        <?php endforeach; ?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class='col-md-8'>
                <div class="contents">
                    <div class="main">
                        <h6>記事一覧</h6>
                        <?php foreach($contents as $content): ?> 
                        <div class='posts'>
                            <span><a href='../Controllers/post.php?id=<?php echo $content['id']?>'><p><?php echo $content['title'] ?></p></a></span>
                        </div>
                        <?php endforeach; ?>
                        <div class='paginate'>
                            <!--最初のページ-->
                            <?php if($page > 1): ?>
                            <span><a href='?page=<?php echo $page-1; ?>'><?php echo $page-1; ?>ページ目へ | </a></span>
                            <?php endif; ?> 
                            <!--最終ページ-->
                            <?php if($maxpage > $page): ?>
                            <span><a href='?page=<?php echo $page+1; ?>'><?php echo $page+1; ?>ページ目へ</a></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>         
</div>
</body>

</html>