<div class="modal" id="myModal">
  <div class="modal-content">
      <div class="modal-close">
        <span class="close">&times;</span>
      </div>
      <div class="modal-form">
        <div class="modal-form__style login">

            <!-- Log In Form Section -->

            <div class="login-form">
              <form action="includes/login_form.php" method="POST" class="form-class">
                  <input
                    type="text"
                    name="login_username"
                    placeholder="Username"
                    required
                  />
                  <input
                    type="password"
                    name="login_password"
                    placeholder="Password"
                    required
                  />
                  <input type="submit" name="login_submit" value="Log In" />
              </form>
            </div>

            <div class="login-message">
              <span>Don't have an account yet?</span>
              <span class="message m-link">Sign Up</span>
            </div>
        </div>

        <!-- Registration Section -->

        <div class="modal-form__style signup">
            <div class="signup-form">
              <form class="form-class" action="" method="POST">
                  <input
                    type="text"
                    name="firstname"
                    placeholder="First Name"
                    required
                  />
                  <input
                    type="text"
                    name="lastname"
                    placeholder="Second Name"
                    required
                  />
                  <input
                    type="text"
                    name="user_name"
                    placeholder="Username"
                    required
                  />
                  <input
                    type="email"
                    name="email"
                    placeholder="Email Address"
                    required
                  />
                  <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                  />
                  <input type="submit" name="registration" value="Sign Up" />
              </form>
            </div>
            <div class="signup-message">
              <span> Already registered? </span>
              <span class="message_two m-link">Log In</span>
            </div>
        </div>
      </div>
  </div>
</div>

<!-- FORM - REGISTRATION -->

<?php

  $message = "";

  if(isset($_POST['registration'])){
    $user_name = mysqli_real_escape_string($connection,$_POST['user_name']);
    $user_password = $_POST['password'];
    $user_firstname = mysqli_real_escape_string($connection,$_POST['firstname']);
    $user_lastname = mysqli_real_escape_string($connection,$_POST['lastname']);
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    if(!empty($user_name) && !empty($user_password) && !empty($user_firstname) && !empty($user_lastname) && !empty($user_email) && !empty($user_password)){
      $query = "INSERT INTO users(user_name, user_password, user_firstname, user_lastname, user_email, user_role) VALUES ('$user_name', '$user_password', '$user_firstname', '$user_lastname', '$user_email', 'subscriber')";
      $registration_query = mysqli_query($connection,$query);
    }else {
      $message = "Fields can not be empty!";
    }
  }

?>