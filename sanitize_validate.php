<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=b, initial-scale=1.0">
  <title></title>
</head>
<body>
  <hr>
  <form action="index.php" method="post">
    <label for="username">username:</label><br>
    <input type="text" name="username" placeholder="username"><br>
    <label for="age">age:</label><br>
    <input type="text" name="age" placeholder="age"><br>
    <label for="email">email:</label><br>
    <input type="text" name="email" placeholder="email"><br>
    

    <input type="submit" name="login" value="login">
  </form>
  
</body>
</html>
<br>
<?php
  if (isset($_POST["login"])) {

    $username = filter_input(INPUT_POST,"username",                    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST,"age", FILTER_VALIDATE_INT);
    $email = filter_input(INPUT_POST,"email",                    FILTER_VALIDATE_EMAIL);

    if (empty($email)) {
      echo "that was not a valid email";
    }else{
      echo "your age is {$email}";
    }
  }
  
 
?>
