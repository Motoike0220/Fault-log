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
            
            $res = $stmt->execute();

            if($res === false){
                die();
            }
            
            return $res;
            $db = null;
        } catch (PDOException $e){
            print "エラー!: " . $e->getMessage() . "<br/gt;";
            die();
        }
    }


?>