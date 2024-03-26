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
   
  if (isset($_POST["submit"])) {
    if (empty($_POST["First_name"]) && empty($_POST["Last_name"]) &&
        empty($_POST["user_name"]) && empty($_POST["email"]) &&
        empty($_POST["password"])) {
      $msg = "please fill form and register";
    }elseif (empty($_POST["First_name"])) {
       $msg = "please enter first name";
    }elseif (empty($_POST["Last_name"])) {
        $msg = "please enter last name";
    }elseif (empty($_POST["user_name"])) {
        $msg = "please enter user name";
    }elseif (empty($_POST["email"])) { 
        $msg = "please enter an email";
    }elseif (empty($_POST["password"])) {
        $msg = "please enter a password";
    }else{
      if (!empty($_POST["password"])) {
          
          if (strlen($password) >= 8 ) {
            //$msg = "you are login";
              if(preg_match("/[A-Z]/", $password)===0) {
                $msg = "your password most include at least one uppercase letter";
              }else{
                  $include_num = filter_input(INPUT_POST, "password", FILTER_SANITIZE_NUMBER_INT);
                  if(preg_match("/[a-z]/", $password)===0) {
                    $msg = "your password most include at least one lowercase letter";
                  }else{
                    if (strlen($password) != strlen($include_num)) {
                      $number = filter_input(INPUT_POST, "password", FILTER_SANITIZE_NUMBER_INT);  
                      if (strlen($number)) {
                          $first_name = filter_input(INPUT_POST, "First_name", FILTER_SANITIZE_STRING);
                          $Last_name = filter_input(INPUT_POST, "Last_name", FILTER_SANITIZE_STRING);
                          $user_name = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
                          $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                          $hash = password_hash($password, PASSWORD_DEFAULT);
                          $user_name_spaceremoved = str_replace(" ", "_", $user_name);
                          $include =  array("!", "@","#","$","%","&");
                          //if(preg_match("/[{$include}]/", $password)===0) {
                          //  $msg = "your password most atleast special character";
                         // }else{
                           
                          if (mysqli_connect_error()) {
                            $msg = mysqli_connect_error();
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
                            $msg = mysqli_connect_error();
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
                            // $msg = "you are now registered" . "<br>";
                            // $msg = "update was sucessfull" . "<br>";
                          //  } catch (mysqli_sql_exception) {
                           //   $msg = "The username have been taken";
                          //  }
                         // }  
                      }else {
                        $msg = "your password most include atleast one number";
                      } 
                    } else {
                      $msg = "your password most cosist of atleast a later";
                    }
                  }
              }
          }elseif (isset($_POST["NUM"]) && strlen($password) < 8 && !empty($_POST["NUM"]) && isset($_POST["submit"])) {
            $msg = "your password most be atleast 8 digit that <br> 
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
   #Last_name,#First_name,#email,#password,#user_name{
      height: 22px;
      width: 100%;
      margin-bottom: 10px;
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
  .display-message{
    color: red;
    font-weight: bold;
    max-width: 350px;
    font-size: 17px;
  }
  </style>
</head>
<body>
  

</body>
</html>


<?php 

mysqli_close($conn);
?>