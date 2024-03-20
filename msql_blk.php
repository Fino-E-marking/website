<?php
  session_start();
  include_once("databaseCC.php");
  $msg = '';
  //error_reporting(E_ERROR | E_PARSE);


  if ($_SERVER["REQUEST_METHOD"] = "POST") {

  
    function getIpAddr() {
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipAddr = $_SERVER['HTTP_CLIENT_IP'];
      }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipAddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }else {
        $ipAddr = $_SERVER['REMOTE_ADDR'];
      }
      return $ipAddr;
    }
  
    $time = time() - 20;
    $ip_address = getIpAddr();
    
    $sql = "SELECT count(*) AS total_count FROM loginlogs
            WHERE  TryTime > $time and IpAddress = '$ip_address'";
    $query = mysqli_query($conn, $sql);
    $check_login_row = mysqli_fetch_assoc($query);
    $total_count = $check_login_row['total_count']; 
  
    if ($total_count == 3) {
      $msg = "To many failed aogin attempts.Please login after 30 sec";
    }else{
      $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
      $removespace_username = str_replace(" ", "_", $username);
      $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
      
      if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit ;
      }
  
      $sql = "SELECT * FROM user WHERE
              username = ? and password = ? ";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ss", $removespace_username, $password);
      $stmt->execute();
      $result = $stmt->get_result();
      $data = $result->fetch_assoc();
      if ($conn->affected_rows == 0) {
        $total_count ++;
        $rem_attm = 3 - $total_count;
        if ($rem_attm == 0) {
          $msg = "To many login attempts. Please login after 30 sec";
        }else {
          $msg = "Please enter valid login details. <br/>
                  $rem_attm attempts remaining";
        }
  
        $try_time = time();
        $sq = "INSERT INTO loginlogs (IpAddress, TryTime) 
               VALUES ('$ip_address', '$try_time')";
        mysqli_query($conn, $sq);
      }else {
        $_SESSION['IS_LOGIN'] = 'yes';
        $sqli = "DELETE FROM loginlogs WHERE 
                 IpAddress = '$ip_address' ";
        mysqli_query($conn, $sqli);
        echo "you are login"; 
        //echo "<script>window.location.href = '.php;'</script>";
      }
      
    }
    
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>msql blk</title>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
    <label for="username">User Name:</label>
    <input type="text" name="username" id="username" placeholder="enter username"><br>
    <label for="username">Password:</label>
    <input type="password" name="password" id="password" placeholder="enter password"><br>
    <a href="change_password.php">forgot password</a><br>
    <a href="index.php">create an acount</a>
    <button type="submit" name="submit" id="submit">commet</button>
    <div>
      <?php echo $msg; ?>
    </div>
  </form>
</body>
</html>

<?php 
  
 


  mysqli_close($conn);
?>