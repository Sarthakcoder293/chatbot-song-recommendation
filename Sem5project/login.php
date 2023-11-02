<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'config1.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from users where name='$username' AND email='$email' AND
    pass='$password'";
    // $sql = "Select * from users where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        // while($row=mysqli_fetch_assoc($result)){
            // if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: mainbot.php");
            } 
            else{
                $error[] = 'incorrect email or password!';
            }
        }
        
     
    else{
        $error[] = 'incorrect email or password!';
    }

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
   
   <title>USER LOGIN</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css1/style.css">
   <style>
        *{
            margin:0
            padding:0;
        }
        body{
            background:url("Images/P Login (1).png") center no-repeat;
            height:95vh;
            background-size:cover

        }
        
    </style>

</head>
<body>

   
<div class="form-container">

   <form action="" method="post">
      <h3 style="color:orange;">LOGIN</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input  name="username"  class="in" required placeholder="Enter your username" style="background:  hsla(206, 20%, 93%, 0.5);">
      <input  name="email" type="email"  class="in" required placeholder="Enter your email" style="background:  hsla(206, 20%, 93%, 0.5);">
      <input type="password" name="password" class="in" required placeholder="Enter your password" style="background:  hsla(206, 20%, 93%, 0.5);">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <br>
      <p style="color:black">don't have an account? <a href="register.php" style="color:orange">register now</a></p>
   </form>

</div>

</body>
</html>