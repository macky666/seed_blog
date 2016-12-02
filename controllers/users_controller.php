<?php
    require('models/user.php');
    special_echo('users_controller.phpが呼び出されました。');

    // インスタンス化
    $controller = new UsersController();

    // アクションによって呼び出すメソッドを変える
    switch ($action) {
         case 'signup':
           $controller->signup($post, $option);
           break;

        case 'check':
          $controller->check();
          break;

        case 'create':
          $controller->create($post);
          break;

        case 'thanks':
          $controller->thanks();
          break;

        case 'login':
          $controller->login();
          break;

        case 'auth':
          if (!empty($post['email']) && !empty($post['password'])) {
              $controller->auth($post);
          } else {
              header('Location: login');
              exit();
          }
          break;

          case 'logout':
            $controller->logout();
            break;

          default:
          # code...
          break;
    }

    // コントローラのクラス
    class UsersController {

        // プロパティ
        private $user;
        private $resource;
        private $action;
        private $viewOptions;
        private $viewErrors;

        function __construct() {
            $this->user = new User();
            $this->resource = 'users';
            $this->action = 'signup';
            $this->viewOptions = array('name' => '', 'email' => '', 'password' => '',);
        }

        function signup($post, $option) {
            special_echo('Controllerのsignup()が呼び出されました。');

            if (!empty($post)) {
                // 確認画面ボタンが押されたとき
                $error = $this->user->signup_valid($post); // バリデーション用メソッド
                if (!empty($error)) {
                    // エラーがあった場合
                    $this->viewOptions = $post;
                    $this->viewErrors = $error;
                    $this->display();
                } else {
                    // エラーがなかった場合
                    $_SESSION['users'] = $post;
                    header('Location: check');
                    exit();
                }
            } else {
                // 通常遷移のとき
                if ($option == 'rewrite') {
                    // checkから戻るボタンが押されたとき
                    $this->viewOptions = $_SESSION['users'];
                }

                $this->display();
            }

        }

        function check() {
            special_echo('Controllerのcheck()が呼び出されました。');
            $this->viewOptions = $_SESSION['users'];
            $this->action = 'check';
            $this->display();
        }

        function create($post) {
            special_echo('Controllerのcreate()が呼び出されました。');
            $this->user->create($post);
            header('Location: thanks');
            exit();
        }

        function thanks() {
            special_echo('Controllerのthanks()が呼び出されました。');

            $this->action = 'thanks';
            $this->display();
        }

        function login() {
            special_echo('Controllerのlogin()が呼び出されました。');

            $this->action = 'login';
            $this->display();
        }

        function auth($post) {
            special_echo('Controllerのauth()が呼び出されました。');
            $login_flag = $this->user->auth($post);
            if ($login_flag) {
                header('Location: ../blogs/index');
                exit();
            } else {
                header('Location: login');
                exit();
            }
        }

        function logout() {
            special_echo('Controllerのlogout()が呼び出されました。');

            // セッション変数を全て解除する
            $_SESSION = array();

            // セッションを切断するにはセッションクッキーも削除する。
            // Note: セッション情報だけでなくセッションを破壊する。
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // 最終的に、セッションを破壊する
            session_destroy();

            header('Location: /seed_blog/users/login');
            exit();
        }

        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }
 ?>




