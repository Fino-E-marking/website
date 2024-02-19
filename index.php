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
    <button type="submit" value="total" name="submit">total</button>
  </form>
</body>
</html>


<?php 
if (isset($_POST["submit"])) {
    $num = $_POST["NUM"];
    $total = null;

    $total1 = filter_input(INPUT_POST, "NUM", FILTER_SANITIZE_SPECIAL_CHARS);
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
                echo "done with number" . "<br>";
                function ispartpuntuation($total1, $include_num){
                  $include =  array("!", "@","#","$","%","&");
                  if(preg_match("/[{$include}]/", $total1)===0) {
                    echo "your password most atleast special character";
                  }else{
                    echo "jjjjjjj";
                  }
                 }
                }else {
                  echo "your password most include atleast one number";
                } 
                ispartpuntuation($total1, $include_num);
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

if (empty($_POST["NUM"])){
  echo "your password most be strong";
}
?>