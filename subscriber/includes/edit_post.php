<!-- UPDATE Post Data -->

  <?php
    $message = "";
    if(isset($_POST['edit_post'])){
      $post_id = $_GET['post_id'];
      $post_title = $_POST['post_title'];
      $post_category_id = $_POST['post_category'];
      $post_author = $_POST['post_author'];
      $post_tags = $_POST['post_tags'];
      $post_content = $_POST['post_content'];

      $post_image = $_FILES['post_image']['name'];
      $post_image_temp = $_FILES['post_image']['tmp_name'];
      move_uploaded_file($post_image_temp,"../media/$post_image");

      if(empty($post_image)){
        $query = "SELECT post_image FROM posts WHERE post_id = $post_id";
        $image_query = mysqli_query($connection,$query);
        
        $row = mysqli_fetch_assoc($image_query);
        $post_image = $row['post_image'];  
      }

      $query = "UPDATE posts SET post_title = '$post_title', post_category_id = '$post_category_id', post_author = '$post_author',post_status = 'drafted', post_tags = '$post_tags', post_content = '$post_content', post_image = '$post_image' WHERE post_id = $post_id";
      $edit_post_query = mysqli_query($connection,$query);

      $message = "
        <div class='alert alert-success alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>Success!</strong> Post has been edited.
          <br>
          <a href='posts.php'>View All Posts</a><span style='padding-left: 15px;'><a href='../post.php?post_id=$post_id'>View Post Page</a></span>
        </div> 
      ";

    }

  ?>

<!-- READ Post Data -->

  <?php

    if(isset($_GET['post_id'])){
      $post_id =  $_GET['post_id'];

      $query = "SELECT * FROM posts WHERE post_id = $post_id";
      $post_info_query = mysqli_query($connection,$query);
      $row = mysqli_fetch_assoc($post_info_query);

      $post_title = $row['post_title'];
      $post_category_id = $row['post_category_id'];
      $post_author = $row['post_author'];
      $post_status = $row['post_status'];
      $post_image = $row['post_image'];
      $post_tags = $row['post_tags'];
      $post_content = $row['post_content'];    

  ?>

  <?=$message?>
  <form action="" method="POST" enctype="multipart/form-data"> 

    <div class="form-group">
      <label for="">Post Title</label>
      <input type="text" name="post_title" class="form-control" value="<?=$post_title?>">
    </div>

    <div class="form-group">
      <select name="post_category" id="">
        <?php
          $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
          $category_query = mysqli_query($connection,$query);
          $row = mysqli_fetch_assoc($category_query);

          $cat_title = $row['cat_title'];
          $cat_id = $row['cat_id'];
        ?>
            <option value="<?=$cat_id?>"><?=$cat_title?></option>
        <?php
          $query = "SELECT * FROM categories WHERE cat_id != $post_category_id";
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
      <input type="text" name="post_author" class="form-control" value="<?=$post_author?>">
    </div>
 
    <div class="form-group">
      <label for="">Post Image</label>
      <div class="form-group">
            <img src="../media/<?=$post_image?>" alt="" style="width:350px;">
      </div>
      <input type="file" name="post_image" >
    </div>

    <div class="form-group">
      <label for="">Post Tags</label>
      <input type="text" name="post_tags" class="form-control" value="<?=$post_tags?>">
    </div>


    <div class="form-group">
      <label for=" ">Post Content</label>
      <textarea name="post_content" class="form-control"  cols="" rows="20" id="summernote"><?=$post_content?></textarea>
    </div>

    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="edit_post" value="Edit Post">
    </div>
  </form>

<?php
  }
?>
