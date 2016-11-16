<div class="msg">
          <form method="post" action="/seed_blog/blogs/create" class="form-horizontal" role="form">
            <div class="form-group">
              <label for="name" class="col-md-3 control-label">タイトル</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="title"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-md-3 control-label">本文</label>
              <div class="col-md-9">
                <textarea name="body" class="form-control" cols="30" rows="5"></textarea>
              </div>
            </div>
            <div class="form-group pull-right">
              <p>
                <a href="/seed_blog/blogs/index" class="btn btn-default">戻る</a>&nbsp;&nbsp;
                <!-- <a href="/seed_blog/blogs/create" class="btn btn-success">投稿する</a> -->
                <input type="submit" class="btn btn-success" value="投稿する"> 
              </p>
            </div>
          </form>
        </div>