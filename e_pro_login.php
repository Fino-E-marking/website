<?php
  include("databaseCC.php");
  error_reporting(E_ERROR / E_PARSE);
?>
<?php /*
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $removespace_user_name = str_replace(" ", "_", $user_name);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $input_verification = password_verify($password, $hash);

    $sql = "SELECT * FROM users_infor
          WHERE user_name = '$removespace_user_name'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $find = mysqli_fetch_assoc($result);
      $db_hash = $find["password"];
      $db_verification = password_verify($password, $db_hash);
      echo $db_verification . "<br>";
      echo $input_verification . "<br>";
      echo $removespace_user_name . "<br>";

      if ($input_verification == $db_verification) {
        echo "you are login";
      //  header("location: index.php");
      }else {
        echo "incorrect password";
      }
    }else {
      echo "invalid user name";
      echo $password ;
    }
      
  }   */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>log in test</title>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
    <label for="user_name">User Name:</label>
    <input type="text" name="user_name" id="user_name" placeholder="enter user name"><br>
    <label for="password">Password:</label>
    <input type="text" name="password" id="password" placeholder="enter password"><br>
    <button type="submit" name="login" id="login">login</button>
  </form>
</body>
</html>

<?php
  
  
  mysqli_close($conn);
?>