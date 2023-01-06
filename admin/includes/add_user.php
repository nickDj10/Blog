<?php
  // CREATE User

  $message = "";

  if(isset($_POST['create_user'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = "subscriber";
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // $post_image = $_FILES['post_image']['name'];
    // $post_image_temp = $_FILES['post_image']['tmp_name'];

    // move_uploaded_file($post_image_temp,"../media/$post_image");


    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, user_name, user_email, user_password) VALUES ('$user_firstname', '$user_lastname', '$user_role', '$user_name', '$user_email', '$user_password')";
    $create_user_query = mysqli_query($connection,$query);

    $message = "
        <div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Success!</strong> User has been created.
            <br>
            <a href='users.php'>View All Users</a>
        </div> 
    ";
  }

?>
<?=$message?>
<form action="" method="POST" enctype="multipart/form-data"> 

  <div class="form-group">
    <label for="">First Name</label>
    <input type="text" name="user_firstname" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Last Name</label>
    <input type="text" name="user_lastname" class="form-control">
  </div>

  <!-- Only Admin Can see this part -->
  <!-- <div class="form-group">
    <select name="user_role" id="">
        <option value="">User Role</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
    </select>
  </div> -->

  <div class="form-group">
    <label for="">Username</label>
    <input type="text" name="user_name" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Email Address</label>
    <input type="email" name="user_email" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Password</label>
    <input type="password" name="user_password" class="form-control">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
  </div>
</form>