<!DOCTYPE html>
<html lang="en">

   <!-- Header -->

   <?php include "includes/header.php" ?>
   <body>
      <div class="container">

         <!-- Heading Section -->
         
         <?php include "includes/heading-section.php" ?>

         <!-- Login & Signup -->
         
         <?php include "includes/log-sign-form.php" ?>

         <section class="content">

            <!-- Content -->

            <!-- Data download from User Search -->

               <?php

                if(isset($_GET['category_id'])){
                  $category_id = $_GET['category_id'];

                  $query = "SELECT * FROM posts WHERE post_category_id = $category_id AND post_status = 'published' ORDER BY post_id DESC";
                  $posts_data = mysqli_query($connection,$query);

                  $num_rows = mysqli_num_rows($posts_data);
                }

               ?>

               <div class="posts">
                  <h3>Latest Posts :</h3>
                  <div class="posts-container">


                  <?php
                  if($num_rows != 0){
                     while($row = mysqli_fetch_assoc($posts_data)){
                        $post_id = $row['post_id'];
                        $post_title = $row["post_title"];
                        $post_image = $row["post_image"];
                        $post_author = $row["post_author"];
                        $post_cat_id = $row["post_category_id"]; 
                        // Changing Date Format
                        $date = $row["post_date"];
                        $post_date = date('d-M-Y', strtotime($date));
                        // Reducing  
                        $post_content = $row["post_content"];   
                        $post_content_preview =  substr($post_content,0,300);

                        // Displaying category title
                        $query = "SELECT * FROM categories WHERE cat_id = $post_cat_id";
                        $cat_title_query = mysqli_query($connection,$query);
                        $row = mysqli_fetch_assoc($cat_title_query);
                        $cat_title = $row['cat_title'];
                  ?>     
                        <!-- Card - FULL PAGE -->
                        <div class="card">
                           <!-- Card - front page -->
                           <div class="post-card">
                              <img src="media/<?= $post_image?>" alt="" />
                              <div class="post-card__cat">
                                 <p class="post-card__cat-info"><?=$cat_title?></p>
                              </div>
                              <div class="post-card__content">
                                 <h4><?= $post_title?></h4>
                                 <div class="post-card__button">
                                    <button class="btn-type type__one">
                                       <a href="post.php?post_id=<?=$post_id?>">Read More</a>
                                    </button>
                                    <button class="btn-type type__two">
                                       More Info
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <!-- Card - back page -->
                           <div class="post-card back">
                              <div class="additional-info">
                                 <div class="post-info">
                                    <p>Author : <span><?= $post_author?></span></p>
                                    <p>Published : <?= $post_date?></p>
                                 </div>
                                 <div class="post-preview">
                                    <p>Content Preview :</p>
                                    <p>
                                    <?= $post_content_preview?>...
                                    </p>
                                 </div>
                                 <div class="post-card__button">
                                    <button class="btn-type type__one">
                                       <a href="post.php?post_id=<?=$post_id?>">Read More</a>
                                    </button>
                                    <button class="btn-type type__two">Return</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                  <?php
                     }}else {
                        echo "<img width='100%' height='100%' src='media/no_results.jpg' />"; 
                     }
                  ?>

                  </div>
               </div>

            <!-- Sidebar -->

            <?php include "includes/sidebar.php" ?>

         </section>

         <!-- Footer -->

         <?php include "includes/footer.php" ?>
      </div>
   </body>
</html>
