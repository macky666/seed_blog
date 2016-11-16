<?php 
    // DB接続ファイル
    $db = mysqli_connect('localhost','root','mysql','seed_blog') or die(mysqli_connect_error());

      mysqli_set_charset($db,'utf8');

      
 ?>