<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=b, initial-scale=1.0">
  <title>folder</title>
</head>
<body>
  <hr>
  <form action="index.php" method="post">
    <label for="username">username:</label><br>
    <input type="text" name="username" placeholder="username"><br>

    <label for="password">password</label><br>
    <input type="password" name="password" placeholder="password"><br>

    <input type="submit" value="log in">
  </form>
</body>
</html>
<br>
<?php
  
  echo $_POST["username"] . "<br>";
  echo $_POST["password"] ."<br>";
?>
