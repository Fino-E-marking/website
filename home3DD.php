<?php
  include("databaseCC.php");
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
  </style>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
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
  </form>
</body>
</html>
<?php
  
  if ($_SERVER["REQUEST_METHOTH"] == "POST") {
    $contain1 =  $_POST["body-contain"];
    echo $contain1;
  }
?>