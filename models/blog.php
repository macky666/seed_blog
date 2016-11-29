<?php 
    // SQLを呼び出すファイル
    special_echo('Modelのblog.phpが呼ばれました');

    // Modelのクラス
    class Blog{

        // プロパティ
        private $dbconnect;

        function __construct(){
            // DB接続
            require('dbconnect.php');
            $this->dbconnect = $db;
        }

        // 一覧ページ表示アクション
        function index(){
            special_echo ('モデルのindex()が呼び出されました');
            
            // 論理削除
            // delete_flag:0→表示、1→削除 1だったら画面に表示しない
            $sql = 'SELECT * FROM `blogs` WHERE `delete_flag` = 0';
            $results = mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));

            // 戻り値（controllerへ渡すデータ）
            $rtn = array();
            while($result = mysqli_fetch_assoc($results)){
                $rtn[] = $result;
            }

            // var_dump($rtn);
            return $rtn;
        }

        // 詳細ページ表示アクション
        function show($id){
            special_echo('モデルのshowメソッド呼び出し');
            special_echo('$idは'.$id.'です(モデル内)');

            // パラメータから取得した$idをもとに記事データ１件取得
            // WHERE `id` = $id ←この条件でデータを取得
            $sql = 'SELECT * FROM `blogs` WHERE `delete_flag` = 0 AND `id` = '. $id;
            $results = mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));

            $rtn = mysqli_fetch_assoc($results);
            // １件だけ取ってくればいいのでwhileはいらない
            return $rtn;
        }

        function create($post){
            $sql = sprintf('INSERT INTO `blogs` SET `title` = "%s",
                                                     `body` = "%s",
                                                     `delete_flag` = 0,
                                                     `created` = NOW()',
                   mysqli_real_escape_string($this->dbconnect,$post['title']),
                   mysqli_real_escape_string($this->dbconnect,$post['body'])
                );
            mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
        }

        function edit($id){
            // editしたデータをまず呼び出さないとupdateできない
            $sql = 'SELECT * FROM `blogs` WHERE `delete_flag` = 0 AND `id` =' . $id;
            $results = mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));

            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }

        function update($post){
            special_echo('Modelのupdate()を呼び出しました');
            special_var_dump($post);
             $sql = sprintf('UPDATE `blogs` SET `title` = "%s", `body` = "%s"
                                            WHERE `id` = %d',
                   mysqli_real_escape_string($this->dbconnect,$post['title']),
                   mysqli_real_escape_string($this->dbconnect,$post['body']),
                   $post['id']
                   // $postはユーザーが入力しないのでインジェクション対策はいらない
                );
            mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
        }

        function delete($id){
            special_echo('Modelのdelete()を呼び出しました');
            // 物理削除
            // $sql = 'DELETE FROM `blogs` WHERE `id` = ' . $id;
            // DBから消してしまうとマーケティング上よろしくない
            
            // 論理削除
            $sql = 'UPDATE `blogs` SET `delete_flag` = 1 WHERE `id` = '. $id;
            mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
        }
    }

 ?>