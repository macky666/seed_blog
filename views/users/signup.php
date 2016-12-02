<div class="msg">
   <form method="post" action="/seed_blog/users/signup" class="form-horizontal" role="form">
     <div class="form-group">
       <label for="name" class="col-md-3 control-label">名前</label>
       <div class="col-md-9">
         <input type="text" class="form-control" name="name" value="<?php echo $this->viewOptions['name']; ?>">
         <?php if(isset($this->viewErrors['name']) && $this->viewErrors['name'] == 'blank'): ?>
           <p style="color:red;">* 名前を入力してください</p>
         <?php endif; ?>
       </div>
     </div>
     <div class="form-group">
       <label for="email" class="col-md-3 control-label">メールアドレス</label>
       <div class="col-md-9">
         <input type="text" class="form-control" name="email" value="<?php echo $this->viewOptions['email']; ?>">
         <?php if(isset($this->viewErrors['email']) && $this->viewErrors['email'] == 'blank'): ?>
           <p style="color:red;">* メールアドレスを入力してください</p>
         <?php endif; ?>
       </div>
     </div>
     <div class="form-group">
       <label for="password" class="col-md-3 control-label">パスワード</label>
       <div class="col-md-9">
         <input type="password" class="form-control" name="password" value="<?php echo $this->viewOptions['password']; ?>">
         <?php if(isset($this->viewErrors['password']) && $this->viewErrors['password'] == 'blank'): ?>
           <p style="color:red;">* パスワードを入力してください</p>
         <?php endif; ?>
         <?php if(isset($this->viewErrors['password']) && $this->viewErrors['password'] == 'length'): ?>
           <p style="color:red;">* パスワードは４文字以上で入力してください</p>
         <?php endif; ?>
       </div>
     </div>
     <div class="form-group pull-right">
       <p>
         <a href="/seed_blog/users/login" class="btn btn-default">ログイン画面へ</a>&nbsp;&nbsp;
         <input type="submit" class="btn btn-success" value="確認画面へ">
       </p>
     </div>
   </form>
 </div>