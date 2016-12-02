<!-- 共通部分をapplication.phpに移した残りの部分 -->
      <p><a href="/seed_blog/blogs/add" class="btn btn-info">新規投稿</a></p>
      <?php foreach($this->viewOptions as $viewOption): ?>
        <div class="msg">
          <p>
              <a href="show/<?php echo $viewOption['id']; ?>"><?php echo $viewOption['title']; ?></a>&nbsp;&nbsp;
                 <?php if(!$viewOption['is_like']): ?>
                   [<a href="like/<?php echo $viewOption['id']; ?>">いいね！ <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>]
                 <?php else: ?>
                   [<a href="unlike/<?php echo $viewOption['id']; ?>">いいねを取り消す <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>]
                 <?php endif; ?>
          </p>
          <p class="day">
            <?php echo $viewOption['created']; ?>
           <!--  [<a href="edit/<?php echo $viewOption['id']; ?>" style="color: #00994C;">編集</a>]
            [<a href="delete/<?php echo $viewOption['id']; ?>" style="color: #F33;">削除</a>] -->
         <?php if($user = current_user()): ?>
          <!-- usersテーブルから取ってきた値がオプションと等しければ登録、削除ボタン表示 -->
             <?php if($user['id'] == $viewOption['u_id']): ?>
               [<a href="edit/<?php echo $viewOption['id']; ?>" style="color: #00994C;">編集</a>]
               [<a href="delete/<?php echo $viewOption['id']; ?>" style="color: #F33;">削除</a>]
             <?php endif; ?>
        <?php endif; ?>

          </p>
        </div>
       <?php endforeach; ?>

