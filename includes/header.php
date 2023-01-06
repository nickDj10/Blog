<?php
    include "includes/db.php";
    ob_start();
    session_start();
?>

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <!-- Font Style -->
      <link
         href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&family=Roboto&display=swap"
         rel="stylesheet"
      />
      <!-- Font Awesome -->
      <link
         rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
         integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
         crossorigin="anonymous"
         referrerpolicy="no-referrer"
      />
      <!-- Custom Style -->
      <link rel="stylesheet" href="style.css" />
      <title>Blog</title>
  </head>