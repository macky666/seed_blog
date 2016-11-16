 <div class="msg">
          <form method="post" action="/seed_blog/blogs/update" class="form-horizontal" role="form">
            <div class="form-group">
              <label for="name" class="col-md-3 control-label">タイトル</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="title" value="<?php echo $this->viewOptions['title']; ?>"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-md-3 control-label">本文</label>
              <div class="col-md-9">
                <textarea name="body" class="form-control" cols="30" rows="5"><?php echo $this->viewOptions['body']; ?></textarea>
              </div>
            </div>
            <div class="form-group pull-right">
              <p>
                <a href="/seed_blog/blogs/index" class="btn btn-default">戻る</a>&nbsp;&nbsp;
                <!-- <a href="index.html" class="btn btn-danger">更新する</a> -->
                <input type="hidden" name="id" value="<?php echo $this->viewOptions['id']; ?>">
                <input type="submit" class="btn btn-danger" value="更新する">
              </p>
            </div>
          </form>
        </div>