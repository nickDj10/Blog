<div class="table-responsive">
  <table class="table table-hover table-striped table-bordered text-center">
    <thead>
        <tr class="justify-center">
          <th class="text-center">Id</th>
          <th class="text-center">Author</th>
          <th class="text-center">Title</th>
          <th class="text-center">Category</th>
          <th class="text-center">Status</th>
          <th class="text-center">Image</th>
          <th class="text-center">Tags</th>
          <th class="text-center">Comments</th>
          <th class="text-center">Date</th>
        </tr>
      </thead>
      <tbody>

          <!-- READ Posts Info  -->

          <?php
            $user_id = $_SESSION['user_id'];
            $query = "SELECT * FROM posts WHERE post_author_id = $user_id";
            $read_posts_info = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($read_posts_info)){
              $post_id = $row['post_id'];
              $post_category_id = $row['post_category_id'];
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_image = $row['post_image'];
              $post_tags = $row['post_tags'];
              $post_status = $row['post_status'];

              // Changing Date Format
              $date = $row["post_date"];
              $post_date = date('d-M-Y', strtotime($date));

              // Displaying comment count
              $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
              $comment_count_query = mysqli_query($connection,$query);
              $post_comment_count  = mysqli_num_rows($comment_count_query);
              //$post_comment_count = $row['post_comment_count'];

              // Displaying category title
              $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
              $cat_title_query = mysqli_query($connection,$query);
              $row = mysqli_fetch_assoc($cat_title_query);
              $cat_title = $row['cat_title'];
          ?>
              <tr>
                  <td style="vertical-align: middle;"><?=$post_id?></td>
                  <td style="vertical-align: middle;"><?=$post_author?></td>
                  <td style="vertical-align: middle;"><?=$post_title?></td>
                  <td style="vertical-align: middle;"><?=$cat_title?></td>
                  <td style="vertical-align: middle;"><?=$post_status?></td>
                  <td style="vertical-align: middle;"><img src='../media/<?=$post_image?>' style="width:150px;"/></td>
                  <td style="vertical-align: middle;"><?=$post_tags?></td>
                  <td style="vertical-align: middle;"><?=$post_comment_count?></td>
                  <td style="vertical-align: middle;"><?=$post_date?></td>
                  <td style="vertical-align: middle;"><a href="../post.php?post_id=<?=$post_id?>">View Post</a></td>
                  <td style="vertical-align: middle;"><a href="posts.php?source=edit_post&post_id=<?=$post_id?>">Edit</a></td>
              </tr>
          <?php
            
            }

          ?>
      </tbody>

  </table>
</div>

<!-- Delete Post -->

<?php

  if(isset($_GET['delete'])){
    $delete_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = $delete_post_id";
    $delete_post_query = mysqli_query($connection,$query);

    header("Location: posts.php");
  }
?>

<!-- Publish Post -->
<?php
  if(isset($_GET['publish'])){
    $post_id = $_GET['publish'];
    
    $query = "UPDATE posts SET post_status = 'published' WHERE post_id = '$post_id'";
    $publish_post_query = mysqli_query($connection,$query);

    header("Location: posts.php");
  }
?> 