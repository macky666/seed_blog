<div class="msg">
  <form method="post" action="/seed_blog/users/create" class="orm-horizontal" role="form">
    <div class="form-group">
     <label for="name" class="col-md-3 control-label">名前</label>
     <div class="col-md-9">
       <?php echo $this->viewOptions['name']; ?>
       <input type="hidden" class="form-control" name="name" value="<?php echo $this->viewOptions['name']; ?>">
      </div>
   </div>
   <div class="form-group">
     <label for="email" class="col-md-3 control-label">メールアドレス
      <div class="col-md-9">
       <?php echo $this->viewOptions['email']; ?>
       <input type="hidden" class="form-control" name="email" value="<?php echo $this->viewOptions['email']; ?>">
      </div>
   </div>
   <div class="form-group">
     <label for="password" class="col-md-3 control-label">パスワード
      <div class="col-md-9">
       ●●●●●●●●
       <input type="hidden" class="form-control" name="password" value="<?php echo $this->viewOptions['password']; ?>">
      </div>
   </div>
   <div class="form-group pull-right">
     <p>
       <a href="/seed_blog/users/signup/rewrite" class="btn tn-default">戻る</a>&nbsp;&nbsp;
        <input type="submit" class="btn btn-success" value="ユーザー登録">
      </p>
   </div>
 </form>
 </div>