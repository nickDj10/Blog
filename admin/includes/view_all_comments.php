<!-- Delete Comment -->

<?php

  if(isset($_GET['delete'])){
    $delete_comment_id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = $delete_comment_id";
    $delete_comment_query = mysqli_query($connection,$query);
  }

?>

<!-- Approve/Unapprove Comment -->

<?php

  if(isset($_GET['approve'])){
    $approve_comment_id = $_GET['approve'];

    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve_comment_id";
    $approve_comment_query = mysqli_query($connection,$query);
  } elseif(isset($_GET['unapprove'])){
    $unapprove_comment_id = $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $unapprove_comment_id";
    $unapprove_comment_query = mysqli_query($connection,$query);
  }
?>




<div class="table-responsive">
  <table class="table table-hover table-striped table-bordered text-center">
    <thead>
        <tr class="justify-center">
            <th class="text-center">Id</th>
            <th class="text-center">Author</th>
            <th class="text-center">Email</th>
            <th class="text-center">Comment</th>
            <th class="text-center">Status</th>
            <th class="text-center">In Response to</th>
            <th class="text-center">Date</th>
        </tr>
      </thead>
      <tbody>

          <!-- READ Comments Info  -->

          <?php

            $query = "SELECT * FROM comments";
            $read_comments_info = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($read_comments_info)){
              $comment_id = $row['comment_id'];
              $comment_author = $row['comment_author'];
              $comment_email = $row['comment_email'];
              $comment_content = $row['comment_content'];
              $comment_status = ucfirst($row['comment_status']);

              // Changing Date Format
              $date = $row["comment_date"];
              $comment_date = date('d-M-Y', strtotime($date));

              // Displaying Post Related To Comment
              $comment_post_id = $row['comment_post_id'];

              $query = "SELECT post_title FROM posts WHERE post_id = $comment_post_id";
              $post_query = mysqli_query($connection,$query);
              $row = mysqli_fetch_assoc($post_query);
              $comment_response_to = $row['post_title'];

          ?>
              <tr>
                  <td style="vertical-align: middle;"><?=$comment_id?></td>
                  <td style="vertical-align: middle;"><?=$comment_author?></td>
                  <td style="vertical-align: middle;"><?=$comment_email?></td>
                  <td style="vertical-align: middle;"><?=$comment_content?></td>
                  <td style="vertical-align: middle;"><?=$comment_status?></td>
                  <td style="vertical-align: middle;"><a href="../post.php?post_id=<?=$comment_post_id?>"><?=$comment_response_to?></a></td>
                  <td style="vertical-align: middle;"><?=$comment_date?></td>

                  <td style="vertical-align: middle;"><a href="comments.php?approve=<?=$comment_id?>">Approve</a></td>
                  <td style="vertical-align: middle;"><a href="comments.php?unapprove=<?=$comment_id?>">Unpprove</a></td>
                  <td style="vertical-align: middle;"><a href="comments.php?delete=<?=$comment_id?>">Delete</a></td>
              </tr>
          <?php
            
            }

          ?>
      </tbody>

  </table>
</div>