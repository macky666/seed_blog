<p><a href="/seed_blog/blogs/add" class="btn btn-info">新規投稿</a></p>
<?php foreach($this->viewOptions as $viewOption): ?>
  <div class="msg">
    <p>
      <a href="show/<?php echo $viewOption['id']; ?>"><?php echo $viewOption['title']; ?></a>&nbsp;&nbsp;
      <?php if(!$viewOption['is_like']): ?>
        [<a href="like/<?php echo $viewOption['id']; ?>">Like <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>]
      <?php else: ?>
        [<a href="unlike/<?php echo $viewOption['id']; ?>">Unlike <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>]
      <?php endif; ?>
    </p>
    <p class="day">
      <?php echo $viewOption['created']; ?>
      <?php if($user = current_user()): ?>
        <?php if($user['id'] == $viewOption['u_id']): ?>
          [<a href="edit/<?php echo $viewOption['id']; ?>" style="color: #00994C;">編集</a>]
          [<a href="delete/<?php echo $viewOption['id']; ?>" style="color: #F33;">削除</a>]
        <?php endif; ?>
      <?php endif; ?>
    </p>
  </div>
<?php endforeach; ?>