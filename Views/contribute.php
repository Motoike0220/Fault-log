
<div class="container-fluid">
    <div class="row">
        <div class = "col-lg-12">
            <div class="post-area">
                <form class="contribute" method="post" action="../controllers/contribute.php" enctype="multipart/form-data">
                    <div class="post-image">
                        <input type="file" name="image">
                    </div>
                    <select name='categoly'>
                            <option>生活</option>
                            <option>仕事</option>
                            <option>学習</option>
                        </select>
                    <div class="post-body">
                        <input type='text' name='title' placeholder='タイトル' required>
                        <textarea class='body-area' name="post" placeholder="投稿" required></textarea>
                    </div>
                    <p class="submit"><input class="form-btn" type="submit" accept="image/jpeg, image/png"></p>
                </form>
            </div>
        </div>
    </div>
</div>

