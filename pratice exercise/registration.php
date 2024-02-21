<?php
  session_start();
  include("databaseCC.php");

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    
  }

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
          margin-top: 50px;
        
          
        }
        .body-aline{
          display: flex;
          justify-content: center;
          width: 100%;
          height: 100%;
          padding: 0;
        
        }
      }
      .notis-b{
        color: green;
        font-size: 22px;
        text-align: center;
        font-weight: bold;
        padding-top: 5px;
        
      }
      .error{
        color: red;
      }

          
     
    </style>
  </head>
  <body>
    <div class="notis-b">
    <div class="error">
      <?php
      if (isset($_POST["login"])) {
        if (empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password)) {
          echo "Please enter firstname!";
        }
        else if (!empty($firstname) && empty($lastname) && !empty($username) && !empty($email) && !empty($password)) {
          echo "Please enter lastname!";
        }
        else if (!empty($firstname) && !empty($lastname) && empty($username) && !empty($email) && !empty($password)) {
          echo "Please enter a username!";
        }
        else if (!empty($firstname) && !empty($lastname) && !empty($username) && empty($email) && !empty($password)) {
          echo "Please enter an email!";
        }
        else if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && empty($password)) {
          echo "Please enter password!";
        }else{
          $username = $username;
          $password = $password;
          $email = $email;
          $hash = password_hash($password, PASSWORD_DEFAULT);

          $sql = "INSERT INTO users (user, password)
                  VALUES ('$username', '$hash')";
          if (isset($_POST["login"])) {
           // try {
              mysqli_query($conn, $sql);
              
              header("location: LOGIN2,php");
                      echo "Register successful";    
           // } catch (mysqli_sql_exception) {
              echo "The username have been taken";
           // }
          }
        }
        mysqli_close($conn);
      }
      ?>
      </div>
    </div>
    <div class="body-aline">
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

<?php
 
 
?>



