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

    <input type="submit" value="login">
  </form>
</body>
</html>
<br>
<?php
  if (isset($_POST["login"])) {

    $username = $_POST["username"];
    echo "hello {$username}";
  }
 
?>
