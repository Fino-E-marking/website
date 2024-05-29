<?php
  session_start();
  include_once("databaseCC.php");
  $msg = '';
  //error_reporting(E_ERROR | E_PARSE);


  if ($_SERVER["REQUEST_METHOD"] = "POST") {

    if (isset($_POST["submit"])) {
      $password = $_POST["resultpassword"];
      $username = $_POST["username"];

      if (empty($username)) {
        $msgs = "Please enter a 'username'";
      }elseif (empty($password)) {
        $msgs = "Please enter a ' password'";
      }else {

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
        
          $time = time() - 30;
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
            $password = filter_input(INPUT_POST, "resultpassword", FILTER_SANITIZE_STRING);
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
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>msql blk</title>
  <style>
    *{
      margin: 0;
      padding: 0;
    }
    .description{
      width: 400px;
      height: 180px;
      padding: 15px;
      background-color: gray;
      text-align: center;
      border-radius: 4px;
      margin: 0px 10px 0px 0px;
    }
    h2{
      color: brown;
      text-align: center;
      font-size: 40px;
      font-weight: bold;
    }
    .description-text{
      font-weight: bold;
      font-size: 17px;
      padding-left: 10px;
    }

    .eyeicon,.iconB{
      width: 100%;
      height: 100%;
      border: none;
    }
    .eyeicon1,.iconB1{
      width: 100%;
      height: 100%;
      border: none;
    }
    .hinden-input-holder1,.hinden-input-holder2{
      margin-bottom: 15px;
    }
    .icon-holder,.holderB{
      width: 20px;
      height: 20px;
      cursor: pointer;
      position: absolute;
      right: 0;
      bottom: 0;
    }
    .hide-icon{
      display: none;
    }
    .hinden-input,.hinden-input2{
      height: 22px;
      width: 200px;
      position: relative;
    }
    #old-password2,#old-password,#new-passwordB,#new-password2B{
      width: 100%;
      height: 100%;
    }
    .eyeicon,.iconB{
        width: 100%;
        height: 18px;
        border: none;
      }
      .eyeicon1,.iconB1{
        width: 100%;
        height: 18px;
        border: none;
      }

      .icon-holder,.holderB{
        width: 20px;
        height: 13px;
        border: solid;
      }
      .hinden-input-holder1{
        height: 50px;
      }
      body{
        background-image:url(all-icon/background.jpg);
        height: 100vh;
        background-repeat: no-repeat;
        background-size: cover;
        background-color: transparent;
      }
      .formholder{
        border: solid;
        border-width: 1px;
        width: 350px;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
        background-color: black;
        border-radius: 4px;
        height: 170px;
      }
      .hinden-input,.hinden-input2{
        width: 100%;
        background-color: transparent;
      }
      .name-holder{
        width: 100%;
      }
      #username{
        width: 100%;
      }
      .hinden-input,.hinden-input2,#username{
        height: 22px;
        margin-bottom: 10px;
      }
      ::placeholder{
        padding-left: 5px;
      }
      .submit-holder{
        height: 25px;
        display: flex;
        justify-content: center;
      }
      #submit{
        height: 100%;
        min-width: 90%;
        background-color: blue;
        color: white;
        border: none;
        border-radius: 3px;
        font-weight: bold;

      }
      .main-holder{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }
      .message-holder{
        color: red;
        font-weight: bold;
        max-width: 350px;
        font-size: 17px;
      }
      .contain-holder{
        display: flex;
        flex-direction: row;
        align-items: center;
      }
      @media only screen and (max-width: 880px){
        .contain-holder{
          flex-direction: column;
          align-items: center;
        }
        .description{
          margin: 10px 0px;
        }
        .formholder{
          width: 400px;
        }
      }
     
      @media only screen and (max-width: 485px) {
        .formholder{
          width: 350px;
          height: 150px;
        }
        .description{
          margin: 10px 0px;
          width: 350px;
          height: 180px;
          padding: 10px;
        }
      }
      @media only screen and (max-width: 395px) {
        .formholder{
          width: 280px;
          height: 150px;
        }
        .description{
          margin: 10px 0px;
          width: 295px;
          height: 180px;
          padding: 10px;
        }
      }
  </style>
</head>
<body>
  <div class="main-holder">
    <div class="contain-holder">
      <div class="description">
        <h2>E Provision</h2>
          <p class="description-text">
          E provision is an online provision store <br>
          that provide public with good and <br>
          servers at good and affordable price. <br>
          To get started, Please log in to your <br> 
          account or <a href="registration.php">create an acount</a></p>
      </div>
      <div class="form-mainholder">
        <div>
          <?php echo $msg; ?>
        </div>
        <form class="formholder" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
          <div class="name-holder">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" placeholder="enter username">
          </div>
          <div class="hinden-input-holder1">
            <label for="old-password">New Password:</label>
            <div class="hinden-input">
              <input type="text" placeholder="enter password" name="old-password2" id="old-password2" class="passopen hide-icon">
              <input type="password" placeholder="enter password" name="older-password" id="old-password" class="passclose">
              <div class="icon-holder">
                <img class="eyeicon" src="icons/eye icon.png" alt="icon">
                <img class="eyeicon1 hide-icon" src="icons/close eye icon.png" alt="icon">
              </div>
            </div> 
          </div>
          <div class="submit-holder">
            <button type="submit" name="submit" id="submit" class="submit">login</button>
          </div>
          <input type="text" class="resultpassword hide-icon" name="resultpassword" id="resultpassword">
        </form>
      </div>


    </div>
  </div>
  <script src="e provision scripte/e_pro_login.js"></script>
</body>
</html>

<?php 
  
 


  mysqli_close($conn);
?>