<?php
  include("databaseCC.php");
  error_reporting(E_ERROR | E_PARSE)

?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = filter_input(INPUT_POST, "First_name", FILTER_SANITIZE_STRING);
  $Last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_STRING);
  $user_name = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
   
  $hash = password_hash($password, PASSWORD_DEFAULT);
  if (isset($_POST["submit"])) {
    if (empty($_POST["First_name"])) {
       echo "please enter first name";
    }elseif (empty($_POST["Last_name"])) {
        echo "please enter last name";
    }elseif (empty($_POST["user_name"])) {
        echo "please enter user name";
    }elseif (empty($_POST["email"])) { 
        echo "please enter an email";
    }elseif (empty($_POST["password"])) {
        echo "please enter a password";
    }
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .test{
      padding-left: 100px;
      color: red;
    }
  </style>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
    <label for="First_name">First name:</label>
    <input type="text" name="First_name" id="First_name" placeholder="enter first name"><br>
    <div class="test"><?php "<br>";?></div><br>
    <label for="Last_name">Last name:</label>
    <input type="text" name="Last_name" id="Last_name" placeholder="enter Last name"><br>
    <div class="test"><?php  "<br>";?></div><br>
    <label for="user_name">User name:</label>
    <input type="text" name="user_name" id="user_name" placeholder="enter user name"><br>
    <div class="test"><?php  "<br>";?></div><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" placeholder="enter email"><br>
    <div class="test"><?php "<br>";?></div><br>
    <label for="password">password:</label>
    <input type="password" name="password" id="password" placeholder="enter a password"><br>
    <div class="test"><?php "<br>";?></div><br>

    <button type="submit"  name="submit">register</button>
  </form>
</body>
</html>


<?php 

mysqli_close($conn);
?>