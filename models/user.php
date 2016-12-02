<?php
    special_echo('Modelのuser.phpが呼ばれました');

    // Modelのクラス
    class User {
        // プロパティ
        private $dbconnect;

        function __construct() {
            //DB接続
            require('dbconnect.php');
            $this->dbconnect = $db;
        }

        function signup_valid($post) {
            $error = array();
            // バリデーション
            if ($post['name'] == '') {
                $error['name'] = 'blank';
            }

            if ($post['email'] == '') {
                $error['email'] = 'blank';
            }

            if ($post['password'] == '') {
                $error['password'] = 'blank';
            } elseif (strlen($post['password']) < 4) {
                $error['password'] = 'length';
            }

            return $error;
        }

        function create($post) {
            $sql = sprintf('INSERT INTO `users` SET `name` = "%s", `email` = "%s", `password` = "%s", `created` = NOW()',
                        mysqli_real_escape_string($this->dbconnect,$post['name']),
                        mysqli_real_escape_string($this->dbconnect,$post['email']),
                        mysqli_real_escape_string($this->dbconnect, sha1($post['password']))
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }

        function auth($post) {
            special_echo('モデルのauth()が呼び出されました。');

            // ログイン処理
            $sql = sprintf('SELECT * FROM `users` WHERE `email`="%s" AND `password`="%s"',
                           mysqli_real_escape_string($this->dbconnect,$post['email']),
                           mysqli_real_escape_string($this->dbconnect, sha1($post['password']))
                  );
            $record = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($db));

            $login_flag = false;
            if ($table = mysqli_fetch_assoc($record)) {
                // ログイン成功
                $_SESSION['id'] = $table['id'];
                $_SESSION['time'] = time();
                $login_flag = true;
            } else {
                $login_flag = false;
            }

            return $login_flag;
        }

        function edit($option) {
            $sql = 'SELECT * FROM `users` WHERE `id` = ' . $option;
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }

        function update($post) {
            $user = current_user();
            $sql = sprintf('UPDATE `users` SET `name` = "%s", `email` = "%s"
                                           WHERE `id` = %d',
                        mysqli_real_escape_string($this->dbconnect,$post['name']),
                        mysqli_real_escape_string($this->dbconnect,$post['email']),
                        $user['id']
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }

        // // ログイン判定
        // function is_login() {
//     if (isset($_SESSION['id']) && $_SESSION['time']  3600 > time()) {
        //         // ログインしていると判定し、idを元にログインユーザーの情報を取得
        //         $_SESSION['time'] = time();

        //         $sql = sprintf('SELECT * FROM `users` WHERE `id`=%d',
        //                        mysqli_real_escape_string($this->dbconnect, $_SESSION['id'])
        //                        );
        //         $record = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        //         $user = mysqli_fetch_assoc($record);
        //         return $user;
        //     } else {
        //         // ログインしていないと判定し、強制的に別ページへ遷移
        //         header('Location: /seed_blog/users/login');
        //         exit();
        //     }
        // }
    }
 ?>