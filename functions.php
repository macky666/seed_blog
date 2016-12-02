<?php 

    define('DEBUG',true);

    function special_echo($val){
      if(DEBUG){
        echo $val;
        echo '<br>';
      }
    }

    // ログイン判定
    function is_login() {
       require('dbconnect.php');
       if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
           // ログインしていると判定し、idを元にログインユーザーの情報を取得
           $_SESSION['time'] = time();

           $sql = sprintf('SELECT * FROM `users` WHERE `id`=%d',
                          mysqli_real_escape_string($db, $_SESSION['id'])
                          );
           $record = mysqli_query($db, $sql) or die(mysqli_error($db));
           $user = mysqli_fetch_assoc($record);
           return $user;
       } else {
           // ログインしていないと判定し、強制的に別ページへ遷移
           header('Location: /seed_blog/users/login');
           exit();
       }
    }

     // ログインユーザー情報取得
     function current_user() {
         require('dbconnect.php');
         if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
             // ログインしていると判定し、idを元にログインユーザーの情報を取得
             $_SESSION['time'] = time();
 
             $sql = sprintf('SELECT * FROM `users` WHERE `id`=%d',
                            mysqli_real_escape_string($db, $_SESSION['id'])
                            );
             $record = mysqli_query($db, $sql) or die(mysqli_error($db));
             $user = mysqli_fetch_assoc($record);
             return $user;
         } else {
             // nullを返す
             return null;
         }
     }

    function special_var_dump($val){
      if(DEBUG){
        echo '<pre>';
        var_dump($val);
        echo '</pre>';
      }
    }

    

 ?>