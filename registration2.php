<?php
  session_start();
  include("databaseCC.php");

?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="E pro styles/E-registration.css">
    <title>Registration</title>
    <style>
      body{
        padding: 0;
        margin: 0;
      }
      @media only screen and (min-width: 728px){
        .body-holder{
          display: none;
        }
        .body-holder-destop{
          display: block;
          background-color: black;
          color: white;
          max-width: 445px;
          min-width: 444px;
          min-height: 480px;
          max-height: 485px;
          padding: 20px 30px 30px 20px;
          margin-top: 0;
        
          
        }
        .body-aline{
          display: flex;
          justify-content: center;
          flex-direction: column;
          align-items: center;
          width: 100%;
          height: 100%;
          padding: 0;
          margin: 0;
        
        }
        .error{
        color: red;
        font-size: 22px;
        text-align: center;
        font-weight: bold;
        padding-top: 0px;
        margin: 0px 0px 5px 0px ;
        
        }
        
      }
      @media only screen and (max-width: 727px){
        .body-holder{
          flex: 450px;
        }
      
      .error{
        color: red;
        font-size: 22px;
        text-align: center;
        font-weight: bold;
        padding-top: 0px;
        margin-top: 5px;
        flex: 50px;
        display: flex;
        justify-content: center;
        align-items: end;

      }
      .body-aline{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

      }
      
      }

          
     
    </style>
  </head>
  <body>
    
    <div class="body-aline">
    <div class="error">
      <?php
        if ($_SERVER["REQUEST_METHOD"] = "POST") {
          
          $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
          $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
          $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
          $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
          $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

          if (empty($username) && empty($firstname) && empty($password) && empty($email) && empty($lastname)) {
            echo "Please fill the form below!";
          }else if (empty($firstname)) {
            echo "please enter firstname";
          }else if (empty($lastname)) {
            echo "please enter lastname";
          }else if (empty($username)) {
            echo "please enter username";
          }else if (empty($email)) {
            echo "please enter an email";
          }else if (empty($password)) {
            echo "please enter a password";
          }else {
            $_SESSION["email"] = $email;
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user, password)
                    VALUES ('$username', '$hash')";
            try {
              mysqli_query($conn, $sql);
              header("location: LOGIN2.php");
            } catch (mysqli_sql_exception) {
              echo "The username have been taken";
            }
          }
          
        }
        
        mysqli_close($conn);
      ?>
    </div>
      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="body-holder">
          <div class="contain-holder">
            <div>
              <label for="firstname">First name:</label><br>
              <input type="text" id="firstname" placeholder="Firstname" name="firstname"><br>
            </div>
            <div>
              <label for="lastname">Last name:</label><br>
              <input type="text" id="lastname" placeholder="Lastname" name="lastname"><br>
            </div>
            <div>
              <label for="username">Username:</label><br>
              <input type="text" id="username" placeholder="user_name" name="username"><br>
            </div>
            <div>
              <label for="email">Email:</label><br>
              <input type="email" id="email" placeholder="example@gmail.com"
              name="email"><br>
            </div>
            <div>
              <label for="password">password:</label><br>
            <input type="password" id="password" placeholder="password" name="password"><br>
            </div>
            <div class="submit-cotain">
              <button class="submit-b"><input type="submit" id="submit" name="submit"></button>
            </div>
          </div>
        </div>
      </form>
      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="body-holder-destop">
          <div class="contain-holder">
            <div>
              <label for="firstname">First name:</label><br>
              <input type="text" id="firstname" placeholder="Firstname" name="firstname"><br>
            </div>
            <div>
              <label for="lastname">Last name:</label><br>
              <input type="text" id="lastname" placeholder="lastname" name="lastname"><br>
            </div>
            <div>
              <label for="Username">Username:</label><br>
              <input type="text" id="Username" placeholder="user_name" name="username"><br>
            </div>
            <div>
              <label for="Email">Email:</label><br>
              <input type="email" id="email" placeholder="example@gmail.com"
              name="email"><br>
            </div>
            <div>
              <label for="password">Password:</label><br>
            <input type="password" id="password" placeholder="password" name="password" require><br>
            </div>
            <div class="submit-cotain">
              <button class="submit-b"><input type="submit" id="submit" name="submit"></button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>





