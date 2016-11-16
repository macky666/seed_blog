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
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html">
                <span class="strong-title"><i class="fa fa-pencil-square-o"></i> Seed Blog</span>
              </a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-4 content-margin-top">
          <?php 
            include('views/' . $this->resource . '/' . $this->action . '.php');
           ?>

           </div>
          </div>
        </div>

          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script src="js/bootstrap.min.js"></script>
        </body>
      </html>
