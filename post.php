<!DOCTYPE html>
<html lang="en">
   <!-- Header -->

   <?php include "includes/header.php" ?>

   <body>
      <div class="container">

      <!-- Reading Post Data -->

      <?php

         if(isset($_GET['post_id'])){
            $post_id = $_GET['post_id'];

            $query = "SELECT * FROM posts WHERE post_id = $post_id";
            $post_query = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($post_query)){
               $post_image = $row['post_image'];
               $post_author = $row['post_author'];
               $post_content = $row['post_content'];
               $post_date = $row['post_date'];
               $post_title = $row['post_title'];
      
      ?>

         <header
            style="
               background-image: linear-gradient(
                     rgba(16, 29, 44, 0.7),
                     rgba(16, 29, 44, 0.7)
                  ),
                  url(media/<?=$post_image?>);
            "
         >
            <nav class="head-nav" id="mynav">
               <ul class="head-nav__ul">
                  <li><a class="link-nav" href="index.php">Logo</a></li>

                  <?php
                     if(isset($_SESSION['username'])){
                        if($_SESSION['role'] == "admin"){
                     ?>
                        <li><a href="admin" class="link-nav">Profile</a></li>
                     <?php
                        }else{
                     ?>
                        <li><a href="subscriber" class="link-nav">Profile</a></li>
                     <?php
                        }
                        ?>
                  <?php
                     }else {
                  ?>
                     <li id="myButton">Profile</li>
                  <?php
                     }
                  ?>
               </ul>
            </nav>
            <div class="head-title">
               <h1><?=$post_title?></h1>
            </div>
         </header>

         <!-- Login & Signup -->
         
         <?php include "includes/log-sign-form.php" ?>


         <section class="content">
            <div class="posts">
               <div class="single-post">
                  <div class="single-post__info">
                     <div class="author-div">
                        <h2>by <?=$post_author?></h2>
                        <img src="media/blank-profile.png" alt="" />
                     </div>
                     <p>
                        <i class="fa-regular fa-calendar"></i> Posted on <?=$post_date?>
                     </p>
                  </div>
                  <div class="single-post__content">
                     <?=$post_content?>
                  </div>
                  <hr class="divide" />
                  <!-- Comment Section -->

                  <div class="comment">

                     <!-- Sending Comment to DB -->

                     <?php
                        if(isset($_POST['send_message'])){
                           $user_name = mysqli_real_escape_string($connection,$_POST['user_name']);
                           $user_email = $_POST['user_email'];
                           $user_comment = mysqli_real_escape_string($connection,$_POST['user_comment']);

                           if(!empty($user_name) && !empty($user_email) && !empty($user_comment)){

                              $query = "INSERT INTO comments(comment_author, comment_email, comment_content, comment_status, comment_date, comment_post_id) VALUES ('$user_name', '$user_email', '$user_comment', 'unapproved', now(), $post_id)";
                              $comment_query = mysqli_query($connection,$query);
                           }
                        }

                     ?>
                     <div class="single-post__comment-section">
                        <div>
                           <h4>Leave a Comment</h4>
                           <i class="fa-solid fa-circle-plus"></i>
                        </div>
                        <div>
                           <form action="" method="POST" class="comment-form">
                              <input
                                 type="text"
                                 placeholder="Name"
                                 name="user_name"
                                 required
                              />
                              <input
                                 type="email"
                                 placeholder="Email"
                                 name="user_email"
                                 required
                              />
                              <textarea
                                 name="user_comment"
                                 id=""
                                 cols="30"
                                 rows="10"
                                 placeholder="Comment"
                                 required
                              ></textarea>
                              <input type="submit" value="Send Message" name="send_message"/>
                           </form>
                        </div>
                     </div>
                     <hr class="divide" />
                     <div class="view-comment">
                        
                     <!-- Displaying Comments -->

                        <?php
                           $post_id = $_GET['post_id'];
                           $query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status = 'approved'";
                           $comment_section = mysqli_query($connection,$query);
                           while($row = mysqli_fetch_assoc($comment_section)){
                              $comment_author = $row['comment_author'];
                              $comment_content = $row['comment_content'];

                              // Changing Date Format
                              $date = $row["comment_date"];
                              $comment_date = date('d-M-Y', strtotime($date));
                        ?>
                              <div class="single-comment">
                                 <a class="" href="#">
                                    <img
                                       class="media-object"
                                       src="https://via.placeholder.com/64x64"
                                       alt=""
                                    />
                                 </a>
                                 <div class="">
                                    <h5 class="">
                                       <?=$comment_author?>
                                       <small><?=$comment_date?></small>
                                    </h5>
                                    <?=$comment_content?>
                                 </div>
                              </div> 
                        <?php
                           }                        
                        ?>
                     </div>
                  </div>
               </div>
            </div>

            <!-- Sidebar -->

            <?php
                  }
               }
            ?>

            <?php include "includes/sidebar.php" ?>

         </section>

         <!-- Footer -->

         <?php include "includes/footer.php" ?>
      </div>
   </body>
</html>
