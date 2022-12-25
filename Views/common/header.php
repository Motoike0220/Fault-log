<div class='title'>
    <h1>失敗のスペシャリストたち</h1>
</div>

<div class="header">
    <ul>
        <li><a href ="../controllers/home.php">ホーム</a></li>
        <li><a href ="../Controllers/archive.php">アーカイブ</a></li>
        <?php if ($_SESSION['USER']['user_level'] == 2): ?>
        <li><a href ="../Controllers/user_list.php">管理画面</a> 
        <?php endif;?>           
    </ul>        
</div>