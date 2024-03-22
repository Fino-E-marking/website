<?php
  include("databaseCC.php");
  error_reporting(E_ERROR | E_PARSE);
 
?>


<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="e provision styles/e_pro_change_password.css">
    <title>Change password</title>
    <style>
      *{
        margin: 0;
        padding: 0;
      }.eyeicon,.iconB{
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
        background-color: red;
      }
      .hinden-input-holder1,.hinden-input-holder2{
        margin-bottom: 0px;
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
        padding: 10px;
        font-size: 20px;
        font-weight: bold;
        color: white;
        background-color: black;
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
        justify-content: center;
        align-items: center;
      }
    </style>
  </head>
  <body>
    <div class="main-holder">
      <div>
        <?php echo $msgs . "<br>"; ?>
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
        <div class="hinden-input-holder2">
          <label for="new-password">Confirm Password:</label>
          <div class="hinden-input2">
            <input type="text" placeholder="enter password" name="new-password2B" id="new-password2B" class="passopen2 hide-icon">
            <input type="password" placeholder="enter password" name="older-passwordB" id="new-passwordB" class="passclose2">
            <div class="icon-holderB holderB">
              <img class="eyeiconB iconB" src="icons/eye icon.png" alt="icon">
              <img class="eyeiconB1 iconB1 hide-icon" src="icons/close eye icon.png" alt="icon">
            </div>
          </div>
        </div>
        <div class="submit-holder">
          <button type="submit" name="submit" id="submit" class="submit">apply change</button>
        </div>
        <input type="text" class="resultpassword hide-icon" name="resultpassword" id="resultpassword">
        <input type="text" class="resultpassword2 hide-icon" name="resultpassword2" id="resultpassword2">
      </div>
    </form>
    <script src="e provision scripte/e_pro_change_password.js"></script>
  </body>
</html>

<?php
  mysqli_close($conn);
?>

<?php 
   $msgs = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
      $password1 = $_POST["resultpassword"];
      $password2 = $_POST["resultpassword2"];
      $username = $_POST["username"];

      if (empty($username)) {
        $msgs = "Please enter a 'username'";
      }elseif (empty($password1)) {
        $msgs = "Please enter a 'new password'";
      }elseif (empty($password2)) {
        $msgs = "Please enter a 'confirm password'.";
      }elseif (!empty($password1) && !empty($password2) && !empty($username)) {
        if ($password1 == $password2) {
          $password = filter_input(INPUT_POST,"resultpassword2", FILTER_SANITIZE_STRING);
          if (strlen($password) >= 8 ) {
            //echo "you are login";
            function isPartUppercase($password, $conn) {
              if(preg_match("/[A-Z]/", $password)===0) {
                echo "your password most include at least one uppercase letter";
              }else{
                function ispartlowercase($password, $conn){
                  $include_num = filter_input(INPUT_POST, "password", FILTER_SANITIZE_NUMBER_INT);
                  if(preg_match("/[a-z]/", $password)===0) {
                    echo "your password most include at least one lowercase letter";
                  }else{
                    if (strlen($password) !== strlen($include_num)) {
                      $number = filter_input(INPUT_POST, "resultpassword2", FILTER_SANITIZE_NUMBER_INT);  
                      if (strlen($number)) {      
                        $user_name = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                        $user_name_spaceremoved = str_replace(" ","_", $user_name);
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        
                        if (mysqli_connect_error()) {
                          echo mysqli_connect_error();
                          exit;
                        }
                        try{
                          $sql = "UPDATE users_infor 
                                  SET password = ?
                                  WHERE user_name = '$user_name_spaceremoved'";
                          $stmt = $conn->prepare($sql);
                          $stmt->bind_param("s", $hash);

                          $password = filter_input(INPUT_POST, "resultpassword2", FILTER_SANITIZE_STRING);
                          $hash = password_hash($password, PASSWORD_DEFAULT);
                          $user_name_spaceremoved = str_replace(" ", "_", $user_name);
                        
                        
                          $stmt->execute();
                          $stmt->close();
                          
                          header("location:msql_blk.php");
                          
                        } catch (mysqli_sql_exception){
                          echo "Invalide username";
                        }
                        }else {
                          echo "your password most include atleast one number";
                      } 
                    }else {
                      echo "your password most cosist of atleast a later";
                    }
                  }
                }
                ispartlowercase($password, $conn);
              }
            }
            isPartUppercase($password, $conn);
          }else {
            $msgs = "your password most be atleast 8 digit that <br> 
                    include uppercase , lowercase , digits and <br>
                    special characters.";
          }
        }else {
            $msgs = "The password your entered didn't match, make sure the two passwords are the same befor you apply change.";
        }
      }
    }
  }

?>



