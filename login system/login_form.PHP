<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

  $id = $_POST['id'];
  $pswd = $_POST['pswd'];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id' && pswd = '$pswd'");

  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    $_SESSION['name'] = $row['name'];
    header('location:admin_page.php');

   }else{
      $error[] = 'incorrect Id or Password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>LogIn Form</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
   <form action="" method="post">
      <h3>LogIn Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="id" required placeholder="enter your id">
      <input type="password" name="pswd" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
   </form>
</div>
</body>
</html>
