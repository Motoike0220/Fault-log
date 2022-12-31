<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../Views/common/head.php') ?>
    <title>投稿画面</title>
</head>
<body>
<?php include_once('../Views/common/header.php') ?>
<div class="container-fluid">
    <div class="row">
        <div class = "col-lg-12">
            <div class="post-area">
                <form class="contribute" method="post" action="../controllers/contribute.php" enctype="multipart/form-data">
                    <select name='categoly'>
                            <option>生活</option>
                            <option>仕事</option>
                            <option>学習</option>
                        </select>
                        <input type='text' name='title' placeholder='タイトル'>
                    <div class="post-body">
                        <textarea name="post" placeholder="投稿"  required ></textarea>
                    </div>
                    <p class="submit"><input class="form-btn" type="submit" accept="image/jpeg, image/png"></p>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
