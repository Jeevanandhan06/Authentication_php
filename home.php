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
    <title>DashBoard</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p>Logo</p>
        </div>
        <div class="right-links">


        <?php 
        $id=$_SESSION['id'];
        $query=mysqli_query($con,"SELECT * FROM users WHERE Id='$id'");

        while($result=mysqli_fetch_assoc($query)){
            $res_Uname=$result['Username'];
            $res_email=$result['Email'];
            $res_age=$result['Age'];
            $res_id=$result['Id'];
        }
        echo "<a href='edit.php?Id='$res_id'>Change Profile</a>";
        
        ?>
            <!-- <a href="edit.php">Change profile</a> -->
            <a href="php\logout.php"><button class="btn">Log Out</button></a>

        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_Uname ?></b>,Welcome!</p>
                </div>
                <div class="box">
                    <p>your email is <b><?php echo $res_email ?></b>.</p>
                </div>
                
            </div>
            <div class="bottom">
                <div class="box">
                    <p> And your are <b><?php echo $res_age ?></b> years olds.</p>
                </div><br><br>
                
                    <center><p><img src="hel.gif" alt="Hello"></p></center>
                

            </div>
        </div>
    </main>
    
</body>
</html>
