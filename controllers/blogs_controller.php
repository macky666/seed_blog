<?php 
    // 制御ファイル
    require('models/blog.php');
    // require('models/user.php');
    special_echo ('blogs_controller.phpが呼び出されました');

    // インスタンス化
    $controller = new BlogsController();

    // アクションに入る文字によって呼び出すメソッドを変える
    switch($action){
        case 'index';
        $controller->index();
        break;

        case 'show';
        $controller->show($option);
        break;

        case 'add';
        $controller->add();
        break;

        case 'create';
        if(!empty($post['title']) && !empty($post['body'])){
            $controller->create($post);
            // titleとbodyに入力があればcreateメソッドに進む
        }else{
            $controller->add();
        }
        break;

        case 'edit';
        $controller->edit($option);
        break;

        case 'update';
        $controller->update($post);
        break;

        case 'delete';
        $controller->delete($option);
        break;

        case 'like':
        $controller->like($option);
        break;

        case 'unlike':
        $controller->unlike($option);
        break;

        default;

        break;
    }

    // コントローラのクラス
    class BlogsController{

        private $blog;
        // Blogクラスに接続するため
        private $resource; 
        // リソース名
        private $action;
        // アクション名
        private $viewOptions;
        // オプション テーブルのカラムを配列に格納

        // private $user;

        function __construct(){
            $this->blog = new Blog();
            $this->resource = 'blogs';
            $this->action = 'index';
            $this->viewOptions = array();

            // $this->user = new User();
        }

        // 一覧ページ表示アクション
        function index(){
            special_echo('Controllerのindex()が呼び出されました');
            // モデルを呼び出してデータを返り値として取得
            $this->viewOptions = $this->blog->index();
            $this->display();

        }

        // 詳細ページ表示アクション
        function show($option){
            // ログイン判定
            // $user = $this->user->is_login();
            special_echo('Controllerのshow()が呼び出されました。');
            special_echo('$idは' . $option . 'です。');
            // special_var_dump($user);
            $this->viewOptions = $this->blog->show($option);
            $this->action = 'show';
            $this->display();
        }

        function add(){
            special_echo('Controllerのadd()が呼び出されました');
            $this->action = 'add';
            $this->display();
        }

        function create($post){
            special_echo('Controllerのcreate()が呼び出されました');
            $this->blog->create($post);
            header('Location: index');
        }

        function edit($option){
            special_echo('Controllerのedit()が呼び出されました');

            // model処理
            $this->viewOptions = $this->blog->edit($option);
            $this->action = 'edit';
            $this->display();
        }

        function update($post){
            special_echo('controllerのupdate()が呼び出されました');
            $this->blog->update($post);
            // header('Location: index');
        }

        function delete($option){
            special_echo('controllerのdelete()が呼び出されました');
            $this->blog->delete($option);
            // header('Location: ../index');
        }

        function like($option) {
            is_login();
            special_echo('Controllerのlike()が呼び出されました。');
            $this->blog->like($option);
            header('Location: ../index');
        }

        function unlike($option) {
            is_login();
            special_echo('Controllerのunlike()が呼び出されました。');
            $this->blog->unlike($option);
            header('Location: ../index');
          }

        // Viewを表示するメソッド
        function display(){
            require('views/layouts/application.php');
        }

    }

 ?>