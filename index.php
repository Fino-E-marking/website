<?php
  include("databaseCC.php");
  error_reporting(E_ERROR | E_PARSE);

?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = filter_input(INPUT_POST, "First_name", FILTER_SANITIZE_STRING);
  $Last_name = filter_input(INPUT_POST, "Last_name", FILTER_SANITIZE_STRING);
  $user_name = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
  echo $password . "<br>";
   
  if (isset($_POST["submit"])) {
    if (empty($_POST["First_name"]) && empty($_POST["Last_name"]) &&
        empty($_POST["user_name"]) && empty($_POST["email"]) &&
        empty($_POST["password"])) {
      echo "please fill form and register";
    }elseif (empty($_POST["First_name"])) {
       echo "please enter first name";
    }elseif (empty($_POST["Last_name"])) {
        echo "please enter last name";
    }elseif (empty($_POST["user_name"])) {
        echo "please enter user name";
    }elseif (empty($_POST["email"])) { 
        echo "please enter an email";
    }elseif (empty($_POST["password"])) {
        echo "please enter a password";
    }else{
      if (!empty($_POST["password"])) {
          
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
                    if (strlen($password) != strlen($include_num)) {
                      $number = filter_input(INPUT_POST, "password", FILTER_SANITIZE_NUMBER_INT);  
                      if (strlen($number)) {
                        function ispartpuntuation($password, $conn){
                          $first_name = filter_input(INPUT_POST, "First_name", FILTER_SANITIZE_STRING);
                          $Last_name = filter_input(INPUT_POST, "Last_name", FILTER_SANITIZE_STRING);
                          $user_name = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
                          $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                          $hash = password_hash($password, PASSWORD_DEFAULT);
                          $user_name_spaceremoved = str_replace(" ", "_", $user_name);
                          $include =  array("!", "@","#","$","%","&");
                          //if(preg_match("/[{$include}]/", $password)===0) {
                          //  echo "your password most atleast special character";
                         // }else{
                           
                          if (mysqli_connect_error()) {
                            echo mysqli_connect_error();
                            exit;
                          }
                          $sql = "INSERT INTO users_infor (First_name, Last_name, user_name, email, password)
                          VALUES (?,?,?,?,?) ";
                          $stmt = $conn->prepare($sql);
                          $stmt->bind_param("sssss", $first_name, $Last_name, $user_name_spaceremoved, $email, $hash );

                          $first_name = filter_input(INPUT_POST, "First_name", FILTER_SANITIZE_STRING);
                          $Last_name = filter_input(INPUT_POST, "Last_name", FILTER_SANITIZE_STRING);
                          $user_name = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
                          $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                          $hash = password_hash($password, PASSWORD_DEFAULT);
                          $user_name_spaceremoved = str_replace(" ", "_", $user_name);
                          
                          $stmt->execute();
                          $stmt->close();
                          
                      /*
                          if (mysqli_connect_error()) {
                            echo mysqli_connect_error();
                            exit;
                          }
                           $sql = "UPDATE users_infor 
                                  SET Last_name = ?,
                                  email = ?
                                  WHERE user_name = ?";
                          $stmt = $conn->prepare($sql);
                          $stmt->bind_param("sss", $Last_name,  $email, $user_name_spaceremoved );

                          $Last_name = filter_input(INPUT_POST, "Last_name", FILTER_SANITIZE_STRING);
                          $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                          $user_name_spaceremoved = str_replace(" ", "_", $user_name);
                        
                          
                          $stmt->execute();
                          $stmt->close();
                            
                      */

                            //$sql = "INSERT INTO users_infor (First_name, Last_name, user_name, email, password)
                           // VALUES ('$first_name', '$Last_name', '$user_name_spaceremoved', '$email', '$hash') ";
                           
                          //  $sql = "UPDATE users_infor 
                           //         SET Last_name = '$Last_name',
                          //          password = '$hash'
                           //         WHERE user_name = '$user_name'";
                          //  try {
                          //    mysqli_query($conn, $sql);
                            // echo "you are now registered" . "<br>";
                            // echo "update was sucessfull" . "<br>";
                          //  } catch (mysqli_sql_exception) {
                           //   echo "The username have been taken";
                          //  }
                         // }  
                        }
                        ispartpuntuation( $password, $conn);
                      }else {
                        echo "your password most include atleast one number";
                      } 
                    } else {
                      echo "your password most cosist of atleast a later";
                    }
                  }
                }
                ispartlowercase($password,$conn);
              }
            }
            isPartUppercase($password, $conn);
          }elseif (isset($_POST["NUM"]) && strlen($password) < 8 && !empty($_POST["NUM"]) && isset($_POST["submit"])) {
            echo "your password most be atleast 8 digit that <br> 
                  include uppercase , lowercase , digits and <br>
                  special characters.";
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
  <title>Register page</title>
  <style>
    .test{
      padding-left: 100px;
      color: red;
    }
  </style>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
    <label for="First_name">First name:</label>
    <input type="text" name="First_name" id="First_name" placeholder="enter first name"><br>
    <div class="test"><?php "<br>";?></div><br>
    <label for="Last_name">Last name:</label>
    <input type="text" name="Last_name" id="Last_name" placeholder="enter Last name"><br>
    <div class="test"><?php  "<br>";?></div><br>
    <label for="user_name">User name:</label>
    <input type="text" name="user_name" id="user_name" placeholder="enter user name"><br>
    <div class="test"><?php  "<br>";?></div><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" placeholder="enter email"><br>
    <div class="test"><?php "<br>";?></div><br>
    <label for="password">password:</label>
    <input type="password" name="password" id="password" placeholder="enter a password"><br>
    <div class="test"><?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
     // $total1 = $password;
      //$include_num = filter_input(INPUT_POST, "password", FILTER_SANITIZE_NUMBER_INT);
      //passwordintr($password);
    }?></div><br>

    <button type="submit"  name="submit">register</button>
  </form>
</body>
</html>


<?php 

mysqli_close($conn);
?>