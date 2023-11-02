<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'config1.php';
    $username = $_POST["username"];
    $email=$_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists=false;
    if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `users` ( `name`, `email`,`pass`) VALUES ('$username', '$email' ,'$password')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
            echo "<script>
                alert(\" success\");
                window.location = \"register.php\"
              </script>";
        }
    }
    else{
        $error[] = 'password not matched!';
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> USER REGISTRATION</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css1/style.css">
   <style>
        *{
            margin:0
            padding:0;
        }
        body{
            background:url("Images/p1 reg.jpeg") center no-repeat;
            height:80vh;
            background-size:cover

        }
        
    </style>

</head>
<body>

   
<div class="form-container">

   <form action="" method="post">
      <h3 style="color: orange;"> USER REGISTER</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="Set user name" style="background:  hsla(206, 20%, 93%, 0.5);">
      <input type="email" name="email" required placeholder="Enter your email" style="background:  hsla(206, 20%, 93%, 0.5);">
      <input type="password" name="password" required placeholder="Set password" style="background:  hsla(206, 20%, 93%, 0.5);">
      <input type="password" name="cpassword" required placeholder="Confirm password" style="background:  hsla(206, 20%, 93%, 0.5);">
      
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p style="color: white;">already have an account? <a href="login.php"  style="color:orange;">login now</a></p>
   </form>

</div>

</body>
</html>