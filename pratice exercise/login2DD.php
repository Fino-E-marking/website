<?php

  include("databaseCC.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER
                 ["PHP_SELF"]) ?>" method="post">
    <label for="username">username:</label><br>
    <input type="text" name="username" placeholder="username"><br>
    <label for="password">password:</label><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="submit" name="login" value="login">
    <hr>
    <button><a href="index.php">indexpage</a></button>
  </form>
</body>
</html>
<?php
  


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $username1 = $_POST["username"];
     $password1 = $_POST["password"];
     $password = `$password1`;
     echo $username1;

     $hash1 = password_hash($password1, PASSWORD_DEFAULT);
     $verif1 = password_verify($password1, $hash1);

     $sql = "SELECT * FROM users WHERE user ='$username1' ";
     $result = mysqli_query($conn, $sql);
     $find = mysqli_fetch_assoc($result);
     $hash2 = $find["password"];
     echo $hash2 . "<br>";
     echo $find["user"];
     $verif2 = password_verify($password1, $hash2);
   
     if ($verif1 == $verif2) {
       header("location: home3DD.php");
     }
  }

  mysqli_close($conn)
?>