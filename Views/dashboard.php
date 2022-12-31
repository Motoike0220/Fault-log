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
                    <th>ユーザーレベル</th>
                    <th></th>
                </tr>
                </thead>                
                <tbody>
                    <?php foreach($users as $user) :?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['nickname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['user_level']; ?></td>
                        <td>更新</td>
                        <td>削除</td>
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