<?php 
/**
 * 登録アドレスの判定
 * 
 * @param $email
 * @return　boolean|false
 */
//既に登録されているアドレスか判定する
function duplicationCheck($email){
    //DBに接続
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  
    //DBへの接続に失敗したとき
    if($mysqli->connect_errno){
        echo 'データベースへの接続に失敗しました。' . $mysqli->connect_errno . "\n";
        exit;
    }
    //入力されたemailがすでに登録されていれば1が返ってくる
    $stmt = $mysqli->prepare('SELECT count(*) FROM users WHERE email = ?');
    $stmt->bind_param('s',$email);
    $success = $stmt->execute();
    if(!$success){
        echo 'データベースへの接続に失敗しました。' . $mysqli->connect_errno . "\n";
        exit;
    }
    $stmt->bind_result($cnt);
    $stmt->fetch();
    if($cnt > 0){
        return false;
    }
}

/**
 * メールアドレスの判定
 * 
 * @param $email
 * @return　boolean
*/
//メールアドレスが正しい形で入力されているか確認する。
function checkMailAddress($email){
    if (!preg_match('|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|', $email)) {
        return false;
    } 
}

/**
 * ユーザーの登録
 * 
 * @param array $user
 * @return array $user
 */
//ユーザ―を登録する関数
function createUser(array $data) {
    //DBに接続
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  
    //DBへの接続に失敗したとき
    if($mysqli->connect_errno){
        echo 'データベースへの接続に失敗しました。' . $mysqli->connect_errno . "\n";
        exit;
    }
    $query = 'INSERT INTO users (name,nickname,email,password) VALUES (?,?,?,?)';
    $stmt = $mysqli->prepare($query);
    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
    $stmt->bind_param('ssss',$data['name'],$data['nickname'],$data['email'],$data['password']);
    $response = $stmt->execute();
    if($response === false){
        echo 'エラーメッセージ' . $mysqli->error . "\n";
    }

    // DB接続を解放
    $stmt->close();
    $mysqli->close();

    return $response;
}

/**
 * ログイン関数
 * 
 * @pram string $email
 * @param string $password
 * @return array|false
 */
//ログインチェック関数 (メールとアドレスが存在しているか確かめ、照合する)
//ユーザーが不存在、パスワードが違う際はfalseを返す、それ以外はarrayでユーザー情報を返す。
function loginCheck(string $email, string $password){
        //DBに接続
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  
        //DBへの接続に失敗したとき
        if($mysqli->connect_errno){
            echo 'データベースへの接続に失敗しました。' . $mysqli->connect_errno . "\n";
            exit;
        }

    //メールの入力値のエスケープ処理（セキュリティ対策）
    $email = $mysqli->real_escape_string($email);
    //SQLのクエリの作成
    //外部からの入力は必ずエスケープして、クォートで囲む必要がある
    //入力されたメールが存在するか確認
    $query = 'SELECT * FROM users WHERE email = "' . $email . '"';
    $result = $mysqli->query($query);
    //クエリの実行に失敗したとき
    if(!isset($result)){
        // MySQL処理中にエラー発生
        echo 'エラーメッセージ：' . $mysqli->error . "\n";
        $mysqli->close();
        return $error['login'] = false;
    }

    //ユーザー情報を取得 ->fetch_arrayで配列として取得、$userに格納している
    $user = $result->fetch_array(MYSQLI_ASSOC);
    //ユーザーが存在しない場合
    if(!$user){
        $mysqli->close();
        return $error['login'] = false;
    }
    //パスワードが違うとき
    if(!password_verify($password, $user['password'])){
        $mysqli->close();
        return $error['login'] = false;
    }
    
    //ユーザーが存在し、パスワードがあっているとき

    // DB接続を解放
    $mysqli->close();
    return $user;
}

/**
 * ユーザー編集関数
 * 
 * @param array $user
 * @return bool
 */

function updateUser(array $user){

    try{
  //ユーザーの編集
    $db = new PDO('mysql:host=localhost;dbname=fault-log', DB_USER, DB_PASSWORD);
    $query  = 'UPDATE users SET name = ?, email = ?, password = ?, updated_at = ? WHERE id = ?';
    
    $stmt = $db->prepare($query);

    $stmt->bindParam(1,$user['name'],PDO::PARAM_STR);
    $stmt->bindParam(2,$user['email'],PDO::PARAM_STR);
    $stmt->bindParam(3,$user['password'],PDO::PARAM_STR);
    $stmt->bindParam(4,$user['updated_at'],PDO::PARAM_INT);
    $stmt->bindParam(5,$user['id'],PDO::PARAM_INT);

    $res = $stmt->execute();
    return $res;
    if($res === false){
        echo 'エラーメッセージ' . $db->error . "\n";
        exit;
    }
    } catch (PDOException $e){
        print "エラー!: " . $e->getMessage() . "<br/gt;";
        die();
    }
}


/**
 * ユーザーレベルの取得関数
 * 
 * @param void
 * @return int $user_level
 */

function getUserLevel(){
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  
    //DBへの接続に失敗したとき
    if($mysqli->connect_errno){
        echo 'データベースへの接続に失敗しました。' . $mysqli->connect_errno . "\n";
        exit;
    }
    //ログイン中のユーザーのユーザーレベルの確認
    $user_level = $_SESSION['USER']['user_level'];
    $mysqli->close();
    return $user_level;
}

/**
 * プロフィールの取得
 * @param $id
 * @return array $user
 */

function getUserProfile($id){
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  
    //DBへの接続に失敗したとき
    if($mysqli->connect_errno){
        echo 'データベースへの接続に失敗しました。' . $mysqli->connect_errno . "\n";
        exit;
    }
    $query = 'SELECT id,body,created_at FROM contents WHERE user_id = "' . $id . '" ORDER BY id DESC' ;
    $res = $mysqli->query($query);
    if($res === false){
        echo 'エラーメッセージ' . $mysqli->error . "\n";
        exit;
    }
    $result = $res->fetch_all(MYSQLI_ASSOC);
    $mysqli->close();
    return $result;
}

/**
 * ユーザーの取得関数
 * @param void
 * @return array $users
 */
function getUsers(){
    try{
        //ユーザーの編集
        $db = new PDO('mysql:host=localhost;dbname=fault-log', DB_USER, DB_PASSWORD);
    
        $query = 'SELECT * FROM users ';
        $res = $db->query($query);
    
        return $res;
        if($res === false){
            echo 'エラーメッセージ' . $db->error . "\n";
            exit;
        }
        $db = null;
        return $res;
    
        } catch (PDOException $e){
            print "エラー!: " . $e->getMessage() . "<br/gt;";
            die();
        }
    
}



