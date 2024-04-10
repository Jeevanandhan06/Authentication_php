<?php 
  session_start();
  include("php/configure.php");
  if(!isset($_SESSION['valid'])){
    header("Location:index.php");
  }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>
        <div class="right-links">
            <a href="edit.html">Change profile</a>
            <a href="php\logout.php"><button class="btn">Log Out</button></a>

        </div>
    </div>
    <div class="container">
        <div class="box">
            <?php 
            if(isset($_POST['submit'])){
                $username=$_POST['username'];
                $email=$_POST['email'];
                $age=$_POST['age'];


                $id=$_SESSION['id'];

                $edit_query= mysqli_query($con,"UPDATE  users SET Username='$username',Email='$email',Age='$age' where Id='$id'") or die("Error occured");
                if($edit_query){
                    echo "<div style='color: green' class='message'><p>Successfully updated.</p></div>";
                echo "<a href='home.php'><button id='bt' class='btn'>Go back</button>";
            
                }else{
                //     $id=$_SESSION['id'];

                // $query= mysqli_query($con,"SELECT * FROM users WHERE Id=$id") or die("Error occured");
                // while()
                echo "<div style='color: red' class='message'><p> Updating is not Successfull.</p></div>";
                echo "<a href='home.php'><button id='bt' class='btn'>Go back</button>";
            
               
                


                }
                
            }else{
            
            ?>
            <div class="form-box">
                <header>Change profile</header>
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
                    <!-- <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div> -->
                    <div class="field">
                        
                        <input type="submit" class="btn" name="submit" id="submit" value="Update">
                    </div>
                    <!-- <div class="links">
                        Already a member? <a href="index.html">Log In Now</a>
                    </div> -->
                </form>
            </div>
        </div>

        <?php } ?>

        </div>
</body>
</html>