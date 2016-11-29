<?php
    // 総合窓口的ファイル
    require('functions.php');
    special_echo('routes.phpを通りました');

    // http://192.168.33.10/seed_blog
    // ⬇︎
    // http://192.168.33.10/seed_blog/routes.php?url=
    // .htaccessファイルがURLを書き換える


    // explode()関数:第二引数の文字列を、第一引数の文字で分割し、配列で返す
    $parameters = explode('/', $_GET['url']);
    // $_GET['url'] = 'blogs/index'(初期画面);
    // $parameters = array('blogs','index');


    // GETパラメータで指定されたリソース名とアクション名を取得
    $resource = $parameters[0];
    $action = $parameters[1];
    $id = 1;
    $post = array();
    
    // オプションの定義 $idがオプションとなる 引数として使用
    if(isset($parameters[2])){
        $id = $parameters[2];
    }

    if(!empty($_POST)){
        // $post = array('title =>タイトル','body' =>'本文');
        $post = $_POST;
    }

    // Controller内のリソース名にふさわしいcontrollerファイルを呼び出し
    require('controllers/' .$resource. '_controller.php');

?>