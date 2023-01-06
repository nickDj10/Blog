<?php 
  session_start();
?>

<?php
  include "db.php";
?>

<?php
  if(isset($_POST['login_submit'])){
    $username = mysqli_real_escape_string($connection,$_POST['login_username']);
    $password = $_POST['login_password'];

    $query = "SELECT * FROM users WHERE user_name = '$username'";
    $user_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($user_query)){
      $user_id = $row['user_id'];
      $user_name = $row['user_name'];
      $user_password = $row['user_password'];
      $user_email = $row['user_email'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_role = $row['user_role'];
    }

    if($user_password === $password){
      $_SESSION['user_id'] = $user_id;
      $_SESSION['username'] = $user_name;
      $_SESSION['password'] = $user_hash_password;
      $_SESSION['email'] = $user_email;
      $_SESSION['firstname'] = $user_firstname;
      $_SESSION['lastname'] = $user_lastname;
      $_SESSION['role'] = $user_role;

      if($_SESSION['role'] === 'admin'){
        header("Location: ../admin/index.php");
      }else {
        header("Location: ../subscriber/index.php");
      }

    }else {
      header("Location: ../index.php");
    }

  }
?>