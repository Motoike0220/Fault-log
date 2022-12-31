const data = [{
    "user_id" : $_SESSION['USER']['user_id'],

}]

const ajax = new XMLHttpRequest();
ajax.open('post', 'http://localhost/Controllers/like.php');
ajax.responseType = 'json';

ajax.send();
ajax.onreadystatechange = function(){
if(ajax.readyState === 4 && ajax.status === 200){
    
    }
} 
