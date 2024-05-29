<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>query place</title>
</head>
<body>
  <label for="query">Enter query:</label>
  <input type="message" column="20" row="30" >
  <div type="messagebox" column="20" row="30">enter message</div>

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