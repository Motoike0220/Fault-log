<?php
/**
 * 投稿の作成
 * 
 * @param array $data
 * @return bool
 */
function createContents(array $data){
    try{
        $db = new PDO('mysql:host=localhost;dbname=fault-log', DB_USER, DB_PASSWORD);
        $query = 'INSERT INTO contents (user_id,user_name,post,categoly,image_path,title) VALUES (?,?,?,?,?,?)';
        $stmt = $db->prepare($query);

        $stmt->bindParam(1, $data['user_id'],PDO::PARAM_INT);
        $stmt->bindParam(2, $data['user_name'],PDO::PARAM_STR);
        $stmt->bindParam(3, $data['post'],PDO::PARAM_STR);
        $stmt->bindParam(4, $data['categoly'],PDO::PARAM_STR);
        $stmt->bindParam(5, $data['image_path'],PDO::PARAM_INT);
        $stmt->bindParam(6, $data['title'],PDO::PARAM_STR);

        $response = $stmt->execute();

        if($response === false){
        echo 'エラーメッセージ' . $db->error . "\n";
        die();
        }
        $db=null;
        header('Location: '. HOME_URL . 'controllers/home.php');
        exit;
        return $response;
    } catch (PDOException $e) { // PDOExceptionをキャッチする
        print "エラー!: " . $e->getMessage() . "<br/gt;";
        die();
    }
    
}

/**
 * 投稿内容の表示 ページネーション
 *@param int $page
 *@return array $contents
 *@return int $max
 */
function showContents($page){
    try {
        // MySQLへの接続
        $db = new PDO('mysql:host=localhost;dbname=fault-log', DB_USER, DB_PASSWORD);
        //ページの開始地点を制御
        $start = intval(($page-1)*5); 
        $query = 'SELECT * FROM contents WHERE active = 1  ORDER BY id DESC limit ?, 5 ';
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $start,PDO::PARAM_INT);
        $res = $stmt->execute();
        //失敗したときエラーメッセージ
        if($res == false){
            echo 'エラーメッセージ';
            // DB接続を解放
            $db=null;
            die();
            }
        $contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //最大ページ数を求める
            $query = 'SELECT count(*) as cnt FROM contents WHERE active = 1'; //cntとしてレコード数を取得
            $num = $db->query($query); //クエリの実行
            $counts = $num->fetch();//cntをキーとして連想配列で取得
            $max = intval(($counts['cnt'] - 1 )/5) + 1;
        // DB接続を解放
            $db = null;
            return [$contents,$max];
    } catch (PDOException $e) { // PDOExceptionをキャッチする
        print "エラー!: " . $e->getMessage() . "<br/gt;";
        die();
    }
}

/**
 * 投稿の詳細を取得する
 * 
 * @param int $id
 * @return array $result
 */
function detailPost($id){
    try {
        // MySQLへの接続
        $db = new PDO('mysql:host=localhost;dbname=fault-log', DB_USER, DB_PASSWORD);
        // 接続を使用する
        $query = 'SELECT * FROM contents WHERE id = ?';
        $stmt = $db->prepare($query);
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
        // 接続を閉じる
        $db = null;
        return $res;
        //例外処理
    } catch (PDOException $e) { // PDOExceptionをキャッチする
        print "エラー!: " . $e->getMessage() . "<br/gt;";
        die();
    }
}

/**
 * 投稿の検索
 * 
 * @param string $keyword
 * @return array $result
 */
function searchPosts($keyword){
    try {
        // MySQLへの接続
        $db = new PDO('mysql:host=localhost;dbname=fault-log', DB_USER, DB_PASSWORD);
        // 接続を使用する
        $sql ='SELECT * FROM contents WHERE title LIKE ?';
        $stmt = $db->prepare($sql);
        $word[] = '%'.$keyword.'%';
        $stmt->execute($word);
        $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
        // 接続を閉じる
        $db = null;
        return $res;
        //例外処理
    } catch (PDOException $e) { // PDOExceptionをキャッチする
        print "エラー!: " . $e->getMessage() . "<br/gt;";
        die();
    }
}

/**
 * 投稿を削除する
 * 
 * @param int $id
 * @return void
 */

function deletePost($id){
    try {
        // MySQLへの接続
        $db = new PDO('mysql:host=localhost;dbname=fault-log', DB_USER, DB_PASSWORD);
        $query = 'DELETE contents,comments FROM contents LEFT JOIN comments ON contents.id = comments.post_id
                    WHERE contents.id = ? ' ;
        $stmt = $db->prepare($query);
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $res = $stmt->execute();
        //失敗したときエラーメッセージ
        if($res == false){
            echo 'エラーメッセージ';
            // DB接続を解放
            $db=null;
            die();
            }
        header('Location: '. HOME_URL . 'Controllers/home.php');
        $db = null;
        exit;
}catch (PDOException $e) { // PDOExceptionをキャッチする
        print "エラー!: " . $e->getMessage() . "<br/gt;";
        die();
    }
}

/** 
 * 返信の作成   
 * @param array $data
 * @return void
*/

function createReply(array $data){
    try{
        $db = new PDO('mysql:host=localhost;dbname=fault-log', DB_USER, DB_PASSWORD);
        $query ='INSERT INTO comments (comment,user_name,post_id,user_id) VALUES (?,?,?,?)';
        
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $data['comment'],PDO::PARAM_STR);
        $stmt->bindParam(2, $data['user_name'],PDO::PARAM_STR);
        $stmt->bindParam(3, $data['post_id'],PDO::PARAM_INT);
        $stmt->bindParam(4, $data['user_id'],PDO::PARAM_INT);
        
        $res = $stmt->execute();
        
        if($res == false){
            echo 'エラーメッセージ';
            // DB接続を解放
            $db=null;
            die();
            }
                    // 接続を閉じる
        $db = null;
    } catch (PDOException $e){
        print "エラー!: " . $e->getMessage() . "<br/gt;";
        die();
    }
}

/**
 * 返信の表示
 * 
 * @param int $post_id
 * @return array $comments
 */

function getComments($post_id){
    try{
        $db = new PDO('mysql:host=localhost;dbname=fault-log', DB_USER, DB_PASSWORD);
        $query = 'SELECT *  FROM comments WHERE post_id = ?';
        $stmt = $db->prepare($query);
        $stmt->bindParam(1,$post_id,PDO::PARAM_INT);
        $res = $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($res == false){
            echo 'エラーメッセージ';
            // DB接続を解放
            $db=null;
            die();
            }

        // 接続を閉じる
        $db = null;
        return $comments;

    } catch (PDOException $e){
        print "エラー!: " . $e->getMessage() . "<br/gt;";
        die();
    }
}


?>

