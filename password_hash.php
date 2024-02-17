<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>hashing</title>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["SELF_PHP"])?> method="post">">
    <input type="text" id="password" name="password"><br>
    <button type="submit">check</button>
  </form>
</body>
</html>
<?php
  $password = "12345fino";
  $hash = password_hash($password, PASSWORD_DEFAULT);
  if (condition) {
    # code...
  }
  if (password_verify("12345fino", $hash)) {
    echo "you are login";
  }else{
    echo "incorrect password";
  }
?>