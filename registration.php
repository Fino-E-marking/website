<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $file = $_POST["password"];
    echo $file;
    
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
          margin-top: 70px;
        
          
        }
        .body-aline{
          display: flex;
          justify-content: center;
          width: 100%;
          height: 100%;
          padding: 0;
        
        }
      }
          
     
    </style>
  </head>
  <body>
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



