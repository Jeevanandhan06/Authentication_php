<?php 
  session_start();


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <div class="box">

        <?php
        
        include("php/configure.php");
        if(isset($_POST['submit'])){
            $email= mysqli_real_escape_string($con,$_POST['email']);
            $password= mysqli_real_escape_string($con,$_POST['password']);

            $result= mysqli_query($con," SELECT *FROM users WHERE Email='$email' AND Password='$password'") or die("error");
            $row= mysqli_fetch_assoc($result);

            if(is_array($row) && !empty($row)){
                $_SESSION['valid']=$row['Email'];
                $_SESSION['username']=$row['Username'];
                $_SESSION['age']=$row['Age'];
                $_SESSION['id']=$row['Id'];
            }
            else{
                echo "<div style='color: red' class='message'><p>Username or Password is Wrong.</p></div>";
                echo "<a href='index.php'><button id='bt' class='btn'>Go back</button>";
            
            }
            if(isset($_SESSION['valid'])){
                header("Location:home.php");
            }

            
        }else{
          
        
        
        ?>


            <div class="form-box">
                <header>Login</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="Email">Username</label>
                        <input type="text" name="email" id="email" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="field">
                        
                        <input type="submit" class="btn" name="submit" id="submit" value="Login">
                    </div>
                    <div class="links">
                        Don't have account? <a href="register.php">Sign Up Now</a>
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>

        </div>
        
    
</body>
</html>