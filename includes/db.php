<?php
  
  $db_connection_array["host"] = "localhost";
  $db_connection_array["username"] = "root";
  $db_connection_array["password"] = "";
  $db_connection_array["db_name"] = "blog";

  foreach($db_connection_array as $key => $value){
    define(strtoupper($key),$value);
  }

  $connection = mysqli_connect(HOST,USERNAME,PASSWORD,DB_NAME);

?>
