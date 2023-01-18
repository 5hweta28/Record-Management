<?php
@include 'config.php';

if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $id =$_POST['id'];
   $pswd = $_POST['pswd'];
   $cpswd = $_POST['cpswd'];

     if($pswd != $cpswd){
        $error[] = 'password not matched!';
     }else{
       $insert = "INSERT INTO user(name, id, pswd) VALUES('$name','$id','$pswd')";
       mysqli_query($conn, $insert);
       header('location:login_form.php');
     }
   };

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
   <form action="" method="post">
      <h3>Register Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="text" name="id" required placeholder="enter your id">
      <input type="password" name="pswd" required placeholder="enter your password">
      <input type="password" name="cpswd" required placeholder="confirm your password">
      <input type="submit" name="submit" value="Register Now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">LogIn Now</a></p>
   </form>
</div>
</body>
</html>
