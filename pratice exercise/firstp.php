<?php
  include("databaseCC.php");
  $username = "Fino";
  $password = "12345fino";
  $hash = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (user, password)
          VALUES ('$username', '$hash')";
  try {
    mysqli_query($conn, $sql);
  } catch (mysqli_sql_exception) {
    echo "<br>the username have been taken";
  }

  

  mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
 <button> <a href="login2DD.php">login</a></button> <br>
 <button> <a href="home3DD.php">HOME</a></button> <br>
</body>
</html>