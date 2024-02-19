
<?php
  $db_server = "localhost";
  $db_user = "root";
  $db_pass = "lV0KDxnpSwsRyA)W";
  $db_name = "e_provision_users"; 
  $conn = "";
 try{
  $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
 }
 catch(mysqli_sql_exception){
  echo"can't connect to site". "<br>";
 }  
?>