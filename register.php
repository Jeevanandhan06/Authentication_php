<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <div class="box">

        <?php
        include("php/configure.php");
        if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $age=$_POST['age'];
            $password=$_POST['password'];

            $verify= mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
            if(mysqli_num_rows($verify)!=0){
                echo "<div style='color: red' class='message'><p>This email is already used.</p></div>";
                echo "<a href='javascript:self.history.back()'><button id='bt' class='btn'>Go back</button>";
            }
            else{
                mysqli_query($con,"INSERT INTO users(Username,email,age,password) VALUES('$username','$email','$age','$password')") or die("Error Occured");
                echo "<div style='color: green' class='message'><p>Registeration Successfull! </p></div>";
                echo" <a href='index.php'><button id='bt' class='btn'>Log In now</button>";
            }
        } 
        else{
        ?>




            <div class="form-box">
                <header>Sign Up</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="field">
                        
                        <input type="submit" class="btn" name="submit" id="submit" value="Create Account">
                    </div>
                    <div class="links">
                        Already a member? <a href="index.php">Log In Now</a>
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>
        </div>
        
    
</body>
</html>