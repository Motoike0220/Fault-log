<?php

/**
 * いいねの作成
 * @param array $data
 * @return int $like_id
 */

function createLikes(array $data){
    try{
        $db = new PDO('mysql:host=localhost;dbname=fault-log', DB_USER, DB_PASSWORD);
        $query = 'INSERT INTO likes (user_id,tweet_id) VALUES (?,?)';
        $stmt = $db->prepare($query);
        $stmt->bindParam(1,$data['user_id'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['tweet_id'],PDO::PARAM_INT);
        $res = $stmt->execute();

        if($res === false){
            die();
        } else {
            $like_id = $db->insert_id;
        }
        return $like_id;
        $db = null;
    } catch (PDOException $e){
        print "エラー!: " . $e->getMessage() . "<br/gt;";
        die();
    }
}

/**
 * いいねの取り消し
 * @param array $data
 * @return bool
 */

function deleteLike(array $data){

    try{

        $db = new PDO('mysql:host=localhost;dbname=fault-log', DB_USER, DB_PASSWORD);
        $query = 'UPDATE likes SET status = "deleted" WHERE id = ? AND user_id =?';
        $stmt = $db->prepare($query);

        $stmt->bindParam(1,$data['like_id'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['user_id'],PDO::PARAM_INT);
        
        $db = null;
    } catch (PDOException $e){
        print "エラー!: " . $e->getMessage() . "<br/gt;";
        die();
    }
    }


     // DB接続
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) {
        echo 'MySQLの接続に失敗しました。：' . $mysqli->connect_error . "\n";
        exit;
    }

     // ------------------------------------
     // SQLクエリを作成
     // ------------------------------------
     // 論理削除のクエリを作成
    $query = 'UPDATE likes SET status ="deleted" WHERE id = ? AND user_id = ?';
    $statement = $mysqli->prepare($query);

     // プレースホルダに値をセット
    $statement->bind_param('ii', $data['like_id'], $data['user_id']);

     // ------------------------------------
     // 戻り値を作成
     // ------------------------------------
    $response = $statement->execute();

     // SQLエラーの場合->エラー表示
    if ($response === false) {
        echo 'エラーメッセージ：' . $mysqli->error . "\n";
    }

     // ------------------------------------
     // 後処理
     // ------------------------------------
     // DB接続を開放
    $statement->close();
    $mysqli->close();

    return $response;
}

?>