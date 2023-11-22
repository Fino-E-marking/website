
<?php
  $password = "12345fino";
  $hash = password_hash($password, PASSWORD_DEFAULT);
  if (password_verify("12345fino", $hash)) {
    echo "you are login";
  }else{
    echo "incorrect password";
  }
?>