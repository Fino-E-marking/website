<?php
  error_reporting(E_ERROR | E_PARSE)
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="index.php" method="post">
    <p>qantity</p><br>
    <input type="text" id="NUM" name="NUM"><br>
    <input type="radio" name="title" id="title1" value="Mr">
    <label for="title1">Mr</label>
    <input type="radio" name="title" id="title2" value="Mrs">
    <label for="title2">Mrs</label>
    <input type="radio" name="title" id="title3" value="Mama">
    <label for="title3">Mama</label>
    <input type="radio" name="title" id="title4" value="Doc">
    <label for="title4">Doc</label><br>

    <button type="submit" value="total" name="submit">total</button>
  </form>
</body>
</html>


<?php 
if (isset($_POST["submit"])) {
    $num = $_POST["NUM"];
    $total = null;
    
    $total1 = filter_input(INPUT_POST, "NUM", FILTER_SANITIZE_STRING);
    $include_num = filter_input(INPUT_POST, "NUM", FILTER_SANITIZE_NUMBER_INT);
    echo $total1 . "<br>" . "<br>" . "<br>";
    
    
    if (strlen($total1) >= 8 ) {
      //echo "you are login";
      function isPartUppercase($total1, $include_num) {
        if(preg_match("/[A-Z]/", $total1)===0) {
          echo "your password most include at least one uppercase letter";
        }else{
          function ispartlowercase($total1, $include_num){
            if(preg_match("/[a-z]/", $total1)===0) {
              echo "your password most include at least one lowercase letter";
            }else{
              if (strlen($total1) != strlen($include_num)) {
                $number = filter_input(INPUT_POST, "NUM", FILTER_SANITIZE_NUMBER_INT);  
                if (strlen($number)) {
                  function ispartpuntuation($total1){
                    $include =  array("!", "@","#","$","%","&");
                    if(preg_match("/[{$include}]/", $total1)===0) {
                      echo "your password most atleast special character";
                    }else{
                      echo "you are login" . "<br>";
                      $check = 0;
                      $check2 = null;
                      if (isset($_POST["submit"])) {
                        $check ++;
                      }
                      echo $check . "<br>";
                    }  
                  }
                  ispartpuntuation($total1);
                }else {
                  echo "your password most include atleast one number";
                } 
              } else {
                echo "your password most cosist of atleast a later";
              }
            }
          }
          ispartlowercase($total1, $include_num);
        }
      }
      isPartUppercase($total1, $include_num);
    }elseif (isset($num) && strlen($total1) < 8 && !empty($num) && isset($_POST["submit"])) {
      echo "your password most be atleast 8 digit that <br> 
            include uppercase , lowercase , digits and <br>
            special characters.";
    }

 }

if (isset($_POST["NUM"])) {
  if (isset($_POST["title"])) {
    $title = $_POST["title"];
    echo $title;
  }
}

?>