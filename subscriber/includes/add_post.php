<?php
  // CREATE Post

  $message = "";

  if(isset($_POST['create_post'])){
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_author_id = $_POST['post_author_id'];
    $post_status = "drafted";
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    move_uploaded_file($post_image_temp,"../media/$post_image");


    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_author_id, post_date, post_image, post_content, post_tags, post_status) VALUES ('$post_category_id', '$post_title', '$post_author', '$post_author_id', now(), '$post_image', '$post_content', '$post_tags', '$post_status')";
    $create_post_query = mysqli_query($connection,$query);

    $post_id = mysqli_insert_id($connection);

    $message = "
        <div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Success!</strong> Post has been created.
            <br>
            <a href='posts.php'>View All Posts</a><span style='padding-left: 15px;'><a href='../post.php?post_id=$post_id'>View Post Page</a></span>
        </div> 
    ";
  }

?>
<?=$message?>
<form action="" method="POST" enctype="multipart/form-data"> 

  <div class="form-group">
    <label for="">Post Title</label>
    <input type="text" name="post_title" class="form-control">
  </div>

  <div class="form-group">
    <select name="post_category" id="">
      <?php
        $query = "SELECT * FROM categories";
        $category_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($category_query)){
          $cat_title = $row['cat_title'];
          $cat_id = $row['cat_id'];
      ?>
          <option value="<?=$cat_id?>"><?=$cat_title?></option>
      <?php
        }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="">Post Author</label>
    <input type="text" name="post_author" class="form-control" value="<?=$_SESSION['firstname'] . ' ' . $_SESSION['lastname']?>">
    <input type="hidden" name="post_author_id" class="form-control" value=<?=$_SESSION['user_id']?>> 
  </div>

  <div class="form-group">
    <label for="">Post Image</label>
    <input type="file" name="post_image" >
  </div>

  <div class="form-group">
    <label for="">Post Tags</label>
    <input type="text" name="post_tags" class="form-control">
  </div>

  <div class="form-group">
    <label for=" ">Post Content</label>
    <textarea name="post_content" class="form-control"  cols="" rows="20" id="summernote"></textarea>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
  </div>
</form>