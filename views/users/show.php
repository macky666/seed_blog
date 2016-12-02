<div class="msg">
   <form method="post" action="" class="form-horizontal" role="form">
     <div class="form-group">
       <label for="name" class="col-md-3 control-label">タイトル</label>
       <div class="col-md-9">
         <?php echo $this->viewOptions['title']; ?>
       </div>
     </div>
     <div class="form-group">
       <label for="name" class="col-md-3 control-label">本文</label>
       <div class="col-md-9">
         <?php echo $this->viewOptions['body']; ?>
       </div>
     </div>
     <div class="form-group">
       <p>
         <a href="/seed_blog/blogs/index" class="btn btn-default">戻る</a>&nbsp;&nbsp;
       </p>
     </div>
   </form>
 </div>