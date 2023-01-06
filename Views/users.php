<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../views/common/head.php') ?>
</head>
<body>
<?php include_once('../views/common/header.php') ?>
    <?php if($user_info == null): ?>
            <p>ページが存際しません</p>
    <?php endif; ?>
    <div class="container-fluid">
        <div class='row'>
            <div class="col-12">
                <div class='user-list'>
                <form action='../Controllers/users.php' method='post'>
                    <?php foreach ($user_info as $user) :?>
                        <p><input type="text" value="<?php echo $user['name'] ?>" ></p>
                        <p><input type="text" value="<?php echo $user['nickname'] ?>" ></p>
                        <p><input type="text" value="<?php echo $user['email'] ?>" ></p>
                        <?php if ($user['user_level'] == 2): ?>
                            <input type='radio' name="user_level" value="1">
                            <label>一般ユーザー</label>
                            <input type='radio' name="user_level" value="2" checked>
                            <label>管理ユーザー</label>
                        <?php else: ?>
                            <input type='radio' name="user_level" value="1" checked>
                            <label>一般ユーザー</label>
                            <input type='radio' name="user_level" value="2" >
                            <label>管理ユーザー</label>
                        <?php endif; ?>
                        <input type='hidden' name='id' value='<?php echo $user['id']; ?>'>
                    <?php endforeach; ?>
                    <p><input type="submit" class="btn btn-primary" value="更新"></p>
                </form>
                </div>
            </div>
        </div> 
    </div> 
</body>