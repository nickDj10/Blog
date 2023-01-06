<!-- Delete Comment -->

<?php

  if(isset($_GET['delete'])){
    $delete_user_id = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id = $delete_user_id";
    $delete_user_query = mysqli_query($connection,$query);
  }

?>

<!-- Approve/Unapprove Comment -->

<?php

  // if(isset($_GET['approve'])){
  //   $approve_comment_id = $_GET['approve'];

  //   $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve_comment_id";
  //   $approve_comment_query = mysqli_query($connection,$query);
  // } elseif(isset($_GET['unapprove'])){
  //   $unapprove_comment_id = $_GET['unapprove'];

  //   $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $unapprove_comment_id";
  //   $unapprove_comment_query = mysqli_query($connection,$query);
  // }
?>




<div class="table-responsive">
  <table class="table table-hover table-striped table-bordered text-center">
    <thead>
        <tr class="justify-center">
            <th class="text-center">Id</th>
       		  <th class="text-center">Username</th>
             <th class="text-center">Email</th>
        	  <th class="text-center">Firt Name</th>
        	  <th class="text-center">Last Name</th>
        	  <th class="text-center">Role</th>
        </tr>
      </thead>
      <tbody>

          <!-- READ Users Info  -->

          <?php

            $query = "SELECT * FROM users";
            $read_users_info = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($read_users_info)){
              $user_id = $row['user_id'];
              $user_name = $row['user_name'];
              $user_email = $row['user_email'];
              $user_firstname = $row['user_firstname'];
              $user_firstname = $row['user_firstname'];
              $user_role = ucfirst($row['user_role']);

              // Changing Date Format
              // $date = $row["comment_date"];
              // $comment_date = date('d-M-Y', strtotime($date));

              // Displaying Post Related To Comment
              // $comment_post_id = $row['comment_post_id'];

              // $query = "SELECT post_title FROM posts WHERE post_id = $comment_post_id";
              // $post_query = mysqli_query($connection,$query);
              // $row = mysqli_fetch_assoc($post_query);
              // $comment_response_to = $row['post_title'];

          ?>
              <tr>
                  <td style="vertical-align: middle;"><?=$user_id?></td>
                  <td style="vertical-align: middle;"><?=$user_name?></td>
                  <td style="vertical-align: middle;"><?=$user_email?></td>
                  <td style="vertical-align: middle;"><?=$user_firstname?></td>
                  <td style="vertical-align: middle;"><?=$user_firstname?></td>
                  <td style="vertical-align: middle;"><?=$user_role?></td>

                  <!-- <td style="vertical-align: middle;"><a href="comments.php?approve=<?=$comment_id?>">Subs</a></td>
                  <td style="vertical-align: middle;"><a href="comments.php?unapprove=<?=$comment_id?>">Unpprove</a></td> -->
                  <td style="vertical-align: middle;"><a href="users.php?source=edit_user&user_id=<?=$user_id?>">Edit</a></td>
                  <td style="vertical-align: middle;"><a href="users.php?delete=<?=$user_id?>">Delete</a></td>
              </tr>
          <?php
            
            }

          ?>
      </tbody>

  </table>
</div>