<?php
  session_start();
  include("databaseCC.php");
  error_reporting(E_ERROR | E_PARSE);
  $username = "iliano";
  $password = "ilia1234";
  $hash = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (user, password)
          VALUES ('$username', '$hash')";
  try {
    mysqli_query($conn, $sql);
  } catch (mysqli_sql_exception) {
    echo "<br>the username have been taken";
  }


  

  mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    #contain{
      max-width: 300px;
      height: 340px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      border: solid;
      row-gap: 2px;
      column-gap: 2px;
    }
    body{
      padding-left: 10px;
    }
    *{
      margin: 0;
      padding: 0;
    }
    #contain .m{
      display: flex;
      flex-direction: column;
      background-color: gray;
    }
    #contain .m img{
      flex: 100px;
      height: 50%;
    }
    #contain .m p{
      flex: 25px;
    }
    .profile{
      height: 30px;
      max-width: 400px;
      display: flex;
    }
    .profile-pic{
      height: 30px;
      max-width: 30px;
      border-radius: 19px;
      flex: 20px;
      border: solid;
      border-width: 2px;
      background-color: white;
    }
    .email-ad{
      display: flex;
      align-items: center;
      font-weight: bold;
      height: 100%;
      flex: 1;
      font-size: 19px;
      padding-left: 3px;
      margin-bottom: 5px;
    }
    .profile-zoon{
      margin-top: 5px;
      padding-left: 5px;
    }
    .name{
      margin-bottom: 3px;
      font-weight: bold;
      font-size: 21px;
      padding-left: 2px;

    }
    .logout{
      margin-top: 8px;
      padding-left: 3px;
    }
    #logout{
      
      border-color: blue;
      border-width: 1px;
      color: blue;
      border-radius: 4px;
      padding: 8px;
      background-color: white;
    }

  </style>
</head>
<body>
  <input type="file" value="choice a file">
    <div id="contain" name="body-contain">
      <div class="m">
        <img src="icons/dano 2.jpg" alt="dano milk">
        <p>high quality milk</p>
      </div>
      <div class="m">
        <img src="icons/helneken.jpg" alt="original henieken">
        <p>original henieken beer cameroon</p>
      </div>
      <div class="m">
        <img src="icons/mambo.jpeg" alt="mambo">
        <p>mambo chocolate</p>
      </div>
      <div class="m">
        <img src="icons/u fresh pf.jpeg" alt="ufresh">
        <p>ufresh jus cameroon</p>
      </div>

    </div>
  <div class="profile-zoon"></div>
    <div class="name">
      <?php
        echo "{$_SESSION["firstname"]} {$_SESSION["lastname"]}";
      ?>
    </div>
    <div class="profile">
      <div class="profile-pic"></div>
      <div class="email-ad">
        <?php
          echo "{$_SESSION["email"]}";
        ?>
      </div>
    </div>
    <div class="logout">
      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
       <input type="submit" value="logout" name="logout" id="logout">
      </form>
    </div>
</body>
</html>

<?php
  if ($_SERVER["REGUEST_METHOD"] = "POST") {
    
  }
?>
