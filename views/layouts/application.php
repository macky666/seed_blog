<!-- 共通テンプレートとしてindex.phpから分離 -->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Seed Blog</title>

    <!-- Bootstrap -->
    <link href="/seed_blog/webroot/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/seed_blog/webroot/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/seed_blog/webroot/assets/css/form.css" rel="stylesheet">
    <link href="/seed_blog/webroot/assets/css/timeline.css" rel="stylesheet">
    <link href="/seed_blog/webroot/assets/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a href="/seed_blog/blogs/index" class="navbar-brand">Seed Blog</a>
          </div>
          <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <?php if($user = current_user()): ?>
                  <li><a href="/seed_blog/blogs/likes_index">Like記事一覧</a></li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <span class="glyphicon glyphicon-user"></span> 
                          <strong><?php echo $user['name']; ?></strong>
                          <span class="glyphicon glyphicon-chevron-down"></span>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <div class="navbar-login">
                                  <div class="row">
                                      <div class="col-lg-4">
                                          <p class="text-center">
                                              <span class="glyphicon glyphicon-user icon-size"></span>
                                          </p>
                                      </div>
                                      <div class="col-lg-8">
                                          <p class="text-left"><strong><?php echo $user['name']; ?></strong></p>
                                          <p class="text-left small"><?php echo $user['email']; ?></p>
                                          <p class="text-left">
                                              <a href="/seed_blog/users/edit/<?php echo $user['id']; ?>" class="btn btn-primary btn-block btn-sm">Profile設定</a>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <li class="divider"></li>
                          <li>
                              <div class="navbar-login navbar-login-session">
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <p>
                                              <a href="/seed_blog/users/logout" class="btn btn-danger btn-block">Logout</a>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </li>
                <?php else: ?>
                  <li><a href="/seed_blog/users/login">Login</a></li>
                <?php endif; ?>
              </ul>
          </div>
      </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2 content-margin-top">
        <?php
            include('views/' . $this->resource . '/' . $this->action . '.php');
         ?>
      </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/seed_blog/webroot/assets/js/bootstrap.js"></script>
  </body>
</html>