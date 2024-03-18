<?php
$sql = "CREATE TABLE loginlogs (
        id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        IpAddress VARBINARY(20) NOT NULL,
        TryTime BIGINT(16) NOT NULL
        ) ENGINE= InnoDB DEFAULT CHARSET= LATIN1";
  mysqli_query($con, $sql);

  function getipadress(){
    if (!empty($_SERVER["http_client_ip"])) {
      $Adrr = $_SERVER["http_client_ip"];
    }elseif (!empty($_SERVER["http_x_forworded_for"])) {
      $Adrr  = $_SERVER["http_x_forworded_for"];
    }else {
      $Adrr = $_SERVER["remote_addr"];
    }
    return $Adrr;
  }
   
  $address = $Adrr;
  $time = time()-30;

  $sqli = "SELECT COUNT(*) AS total_count FROM loginlogs
           WHERE TryTime > $time and IpAddress = $address";
  $query = mysqli_query($con,$query);
  $check_num_row = mysqli_fetch_assoc($query);
  $count_time = $check_num_row["total_count"];

  if ($count_time == 3) {
    $msg = "too many fail login attempts please login after 30 sec";
  }else {
    
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $removespace_username = str_replace(" ", "_", $username);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    if (mysqli_connect_error()) {
      echo mysqli_connect_error();
      exit;
    }

    $sq = "SELECT * FROM user 
            WHERE username = ?";
    
    $stmt = $con->prepare($sq);
    $tmt->bind_param("s", $removespace_username);

    $stmt->execute();

    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($con->affected_row !== 0) {
      $db_password = $data["passwordd"];
      if (password_verify($password , $db_password)) {
        $_SERVER["IS_LOGIN"] = "YES";
        header("location: home.php");
        echo "<script>windows.location.href='home.php'</script>";
        mysqli_query($con, "DELETE FROM loginlogs 
                            WHERE IpAddress = $ipaddress");
      }else {
        $count_time ++;
        $trytime = time();
        $rema_attem = 3 - $count_time;
        if ($rema_attem == 0) {
          $msg = "too many fail login attempts please login after 30 sec";
        }else {
          $msg = "Please enter a valid username. <br/> $rema_attem is remaining.";
        }
        $sl = "INSERT INTO loginlogs (IpAddress, TryTime)
               VALUES ('$ipaddress', '$trytime')" ;
      
      }
    }
    
  }

?>