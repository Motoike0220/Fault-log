<div class='title'>
    <h1>学習記録</h1>
</div>

<div class="header">
    <ul>
        <li><a href ="../controllers/home.php">ホーム</a></li>
        <li><a href ="../Controllers/archive.php">アーカイブ</a></li>
        <?php if ($_SESSION['USER']['user_level'] == 2): ?>
        <li><a href ="../Controllers/dashboard.php">管理画面</a> 
        <?php endif;?>           
    </ul>        
</div>