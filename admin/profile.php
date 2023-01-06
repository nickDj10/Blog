<!-- HEADER -->
<?php include "includes/admin-header.php" ?>

<body>

    <div id="wrapper">

        <!-- NAVIGATION -->

        <?php include "includes/admin-navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile
                            <small>Admin / <?=$_SESSION['username']?></small>
                        </h1>

                        <!-- UPDATE User Data -->

                        <?php
                            $message = "";
                            if(isset($_POST['edit_user'])){
                              $user_id = $_SESSION['user_id'];

                              $user_firstname = $_POST['user_firstname'];
                              $user_lastname = $_POST['user_lastname'];
                              $user_role = $_POST['user_role'];
                              $user_name = $_POST['user_name'];
                              $user_email = $_POST['user_email'];
                              $user_password = $_POST['user_password'];

                              $query = "UPDATE users SET user_firstname = '$user_firstname', user_lastname = '$user_lastname', user_role = '$user_role', user_name = '$user_name', user_email = '$user_email', user_password = '$user_password'  WHERE user_id = $user_id";
                              $edit_user_query = mysqli_query($connection,$query);

                              $message = "
                                <div class='alert alert-success alert-dismissible'>
                                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                  <strong>Success!</strong> User has been edited.
                                  <br>
                                  <a href='users.php'>View All Posts</a>
                                </div> 
                              ";

                            }

                          ?>

                        <!-- READ User Data -->

                          <?php

                            if(isset($_SESSION['user_id'] )){
                              $user_id =  $_SESSION['user_id'] ;

                              $query = "SELECT * FROM users WHERE user_id = $user_id";
                              $user_info_query = mysqli_query($connection,$query);
                              $row = mysqli_fetch_assoc($user_info_query);

                              $user_firstname = $row['user_firstname'];
                              $user_lastname = $row['user_lastname'];
                              $user_role = $row['user_role'];
                              $user_name = $row['user_name'];
                              $user_email = $row['user_email'];
                              $user_password = $row['user_password'];

                          ?>

                          <?=$message?>
                          <form action="" method="POST" enctype="multipart/form-data"> 

                            <div class="form-group">
                              <label for="">First Name</label>
                              <input type="text" name="user_firstname" class="form-control" value="<?=$user_firstname?>">
                            </div>

                            <div class="form-group">
                              <label for="">Last Name</label>
                              <input type="text" name="user_lastname" class="form-control" value="<?=$user_lastname?>">
                            </div>

                            <div class="form-group">
                              <select name="user_role" id="">
                                <option value="<?=$user_role?>"><?=ucfirst($user_role)?></option>
                                <?php
                                  if($user_role == 'admin'){
                                    echo "<option value='subscriber'>Subscriber</option>";
                                  }else{
                                    echo "<option value='admin'>Admin</option>";
                                  }
                                ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="">Username</label>
                              <input type="text" name="user_name" class="form-control" value="<?=$user_name?>">
                            </div>

                            <div class="form-group">
                              <label for="">Email Address</label>
                              <input type="email" name="user_email" class="form-control" value="<?=$user_email?>">
                            </div>

                            <div class="form-group">
                              <label for="">Password</label>
                              <input type="password" name="user_password" class="form-control" value="<?=$user_password?>">
                            </div>

                            <div class="form-group">
                              <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
                            </div>
                          </form>

                        <?php
                          }
                        ?>


                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER -->

    <?php include "includes/admin-footer.php" ?>

</body>


