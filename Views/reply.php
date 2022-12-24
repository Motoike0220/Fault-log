<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../views/common/head.php') ?>
    <title>reply</title>
</head>
<body>
<?php include_once('../views/common/header.php') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form action="../Controllers/reply.php" method="post">
                <textarea name='comment' value='コメント'></textarea>
                <button class="btn btn-primary" type="sumbit">返信する</button>
            </form>
        </div>
    </div>
</div>