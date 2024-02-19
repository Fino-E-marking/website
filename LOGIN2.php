<?php
  session_start();
  include("databaseCC.php");
  error_reporting(ERRO / PASTE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="E pro styles/E-login.css">
  <title>login</title>
  <style>
   #login{
    padding: 5px 0px;
   }
   .sectionC input{
    margin-top: 5px;
    margin-bottom: 10px;
  }
  .error,.profil{
    color: red;
    font-size: 22px;
    text-align: center;
    font-weight: bold;
    padding-top: 0px;
    margin: 50px 0px 0px 0px ;
      
  }
  .error{
    margin: 2px 0px;
  }
  .sectionC{
    margin-top: 0px;
  }
  .profil{
    color: green;
  }
  @media only screen and  (min-width: 1350px) {
  .sectionB{
    font-size: 20px;
  }
  
  }
  @media only screen and  (min-width: 1100px) {
  .sectionA p{
    font-size: 60px;
  }
  .sectionC{
    margin: 0px 10px;
  } 
  }

  </style>
</head>
  <body>
   <div class="body-contain-holder">
      <div class="contain-holder">
        <h1>Welcome</h1>
        <section class="sectionA">
          <p class="sectionA-part1">
            To
            <button>
              <img src="all-icon/e-p pf1.jpeg" alt="profile image">
            </button> 
            E Provision Online
          </p>
          <p class="mobile-1p3">
            Sale
          </p>
        </section>
        <section class="sectionB">
          <p class="mobile-1p4">
            E provision is an online platform that  provide quality 
            goods at good and afortable  prices, to get started login  or <a href="registration2.php">create an acount</a> 
          </p>
        </section>
        <div class="profil">
          <?php
            echo "Hello {$_SESSION["firstname"]} {$_SESSION["lastname"]} please signin with your username and password";
          ?>
        </div>
        <div class="error">
        <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password =  $_POST["password"];
            $hash1 = password_hash($password, PASSWORD_DEFAULT);
            $verifA = password_verify($password, $hash1);
            
            try {
              $sql = "SELECT * FROM users WHERE user = '$username' ";
              $result = mysqli_query($conn, $sql);
              $find = mysqli_fetch_assoc($result);
              $hash2 = $find["password"];
              $verifB = password_verify($password, $hash2);
              if ($hash2 == null && $verifA !== $verifB) {
                echo "Invalit username";
                $hash2 = "";
              }elseif ($verifA !== $verifB) {
                echo "Incorrect password";
              }elseif ($verifA == $verifB) {
                header("location: home3DD.php");
              }
            } catch (Warning) {
              echo $hash2;
            }
           
              
          }
          mysqli_close($conn);
      
        ?>
        </div>
        <div class="sectionC-holder">
          <div class="sectionC">
          <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <div class="sectionC-part1">
              <label class="lb" for="username">User Name</label>
              <input type="text" id="username" name="username" placeholder="enter username" minlength="4" maxlength="20" >
            </div>
            <div class="sectionC-part2">
              <label class="lb" for="pasword">pasword</label><br>
              <input type="password" placeholder="enter pasword" id="pasword" minlength="8" maxlength="15" name="password"><br>
            </div>
            <div class="sectionC-part3">
              <input type="submit" id="login" name="login" value="login">
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
