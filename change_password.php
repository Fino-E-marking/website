<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="e provision styles/e_pro_change_password.css">
    <title>Change password</title>
  </head>
  <body>
    <div class="main-holder">
      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="hinden-input-holder1">
          <label for="old-password">Password:</label>
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
          <label for="new-password">New Password:</label>
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
          <button type="submit" name="submit" id="submit">apply change</button>
        </div>
      </div>
    </form>
    <script src="e provision scripte/e_pro_change_password.js"></script>
  </body>
</html>