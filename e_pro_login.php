<?php
  include("databaseCC.php");
  session_start();
  //error_reporting(E_ERROR / E_PARSE);

 if ( isset($_COOKIE["locktime"]) ) {
   $difference = time() - $_COOKIE["locktime"];
   if ($_COOKIE["locktime"] == 4) {
      unset($_SESSION["locked"]);
      unset($_SESSION["longin_attempts"]);
   }
   
    echo $_COOKIE["locktime"] ."ffffff<br>";
  }else {
    echo $_COOKIE["locktime"] ."ssssss<br>";
  }
  echo $_COOKIE["locktime"] ."<br>";
  
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
  /*
  if (isset($_SESSION["locked"])) {
    $difference = time() - $_SESSION["time_locked"];
    echo $_SESSION["longin_attempts"] . "mmmmm<br>";
    if ($difference > 10) {
      unset($_SESSION["locked"]);
      unset($_SESSION["longin_attempts"]);
      echo $_SESSION["longin_attempts"] . "sssssss<br>";
    }
  }
  echo $_SESSION["longin_attempts"] . "sssssss<br>";
  */
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   /* $username = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $remove_space = str_replace(" ", "_", $username);
    $sql = "SELECT * FROM users_infor
           WHERE user_name = '$remove_space' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_object($result);
      if (password_verify($password, $row->password)) {
        unset($_SESSION["longin_attempts"]);
        echo "you are login";
      }else {
        $_SESSION["login_attempts"] += 1;
        $_SESSION["error"] = "incorrect password";
        
      }
    }else {
      $_SESSION["login_attempts"] += 1;
      $_SESSION["error"] = "invalid user";
      
    }
    echo $_SESSION["login_attempts"];
   */

   if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
  }

  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
  $username = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
  $removespace_username = str_replace(" ", "_", $username);

    $sqls = "SELECT * FROM users_infor 
           WHERE user_name = ? ";
    
    $stmts = $conn->prepare($sqls);
    $stmts->bind_param("s", $removespace_username);
    
    $stmts->execute();

    $result = $stmts->get_result();
    $data = $result->fetch_assoc();

    if ($conn->affected_rows == 0) {
      echo "invalid user" . "<br>";
      $_SESSION["login_attempts"] += 1;
    }else {
      $db_password = $data["password"];
      if (password_verify($password, $db_password)) {
        echo "you are login" . "<br>";
        
      }else {
        echo "incorrect password";
        $_SESSION["login_attempts"] += 1;
      }
      echo $_SESSION["login_attempts"];
      
    }
    $stmts->close();
    

    
  }
  
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
    <h3>login page</h3>
    <?php 
    /* if (isset($_SESSION["error"])) { ?>
      <div style="color:red;"><?= $_SESSION["error"]; ?></div>
      <div><?php echo $_SESSION["login_attempts"];  ?></div>
    <?php unset($_SESSION["error"]); }
    */?>
    <label for="user_name">user_name:</label>
    <input type="text" name="user_name" id="user_name" placeholder="enter user name"><br>
    <label for="password">Password:</label>
    <input type="text" name="password" id="password" placeholder="enter password"><br>
    <?php 
     if ($_SESSION["login_attempts"] >= 2) {
        if ($_SESSION["login_attempts"] == 2) {
          $locked = 4;
        }
          setcookie("locktime", $locked, time()+ 20 );
        
       ?>
        <button id="uuuu" name="eiiei">loginx</button>
      <?php
       echo "<br> you are block do to many unsucessfull attempts, <br> please wait for 30 minute before any attempt";
      }else{
     
      ?>
        <button type="submit" name="login" id="login">login</button>
      <?php
        }
      ?>
      
    

    <?php  ?>
  </form>
</body>
</html>

<?php
  
  
  mysqli_close($conn);
?>