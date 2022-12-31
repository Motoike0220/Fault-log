<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../Views/common/head.php') ?>
    <title>管理画面</title>
</head>
<body>
    <?php include_once('../Views/common/header.php') ?>
    <div class='user-list'>
            <table class='table'>
                <thead>
                <tr>
                    <th>名前</th>
                    <th>ニックネーム</th>
                    <th>メール</th>
                    <th>作成日</th>
                    <th>管理権限</th>
                    <th>詳細</th>
                </tr>
                </thead>                
                <tbody>
                    <?php foreach($users as $user) :?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['nickname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['created_at']; ?></td>
                        <td>
                        <?php if ($user['user_level'] == 2): ?>
                            <p>管理者</p>
                            <?php else: ?>
                            <p>一般ユーザー</p>
                            <?php endif; ?>
                        </td>
                        <td><a href='../Controllers/users.php?id=<?php echo $user['id']; ?>'>管理</a></td>
                    </tr>
                    <tr>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>             
    </div>

    <div class='post-list'> 
        
    </div>
</body>