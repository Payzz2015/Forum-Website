<?php
    session_start();
    if(! isset($_SESSION['user'])){
        header("Location: login.php");
	}
?>
<html>
    <head>
        <meta charset = "UTF-8">
        <title>Forums - Change Password</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/icon1.png" >
    </head>
    <body id="_5">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <center><img src="images/rticon.png" alt="Mountain" width="75" height="75"></center>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li>Home</li></a>
			<a href="tags.php"><li>Tags</li></a>
            <a href="ask.php"><li>Ask Question</li></a>
            <?php 
                if(! isset($_SESSION['user'])){
            ?>
            <a href="login.php"><li>Log In</li></a>
            <a href="signup.php"><li>Sign Up</li></a>
            <?php
                }
                else{
            ?>
            <a href="profile.php"><li id="home">Hi, <?php echo $_SESSION["user"]; ?></li></a>
			<?php
				if($_SESSION["userlevel"] == '0'){
			?>
			<a href="a_index.php"><li>Admin</li></a>
			<?php
				}
			?>	
            <a href="logout.php"><li>Log Out</li></a>
            <?php
                }
            ?>
        </ul>
        
        <!-- content -->
		<br>
        <div>
            <center>
                <div class="heading"><br><br><br><br><br>
                    <h1 class="logo"><div id="ntro">Change Password</div></h1>
                </div>
				
                <form action="passchanged.php" method="POST">
                    <input name="username" id="user" type="text" placeholder="Enter your Username" required>
                    <input name="password" id="key" type="password" placeholder="Old Password" required>	
					<input name="newpassword" id="key" type="password" placeholder="New password" required>
					<i class="material-icons" id="lock">lock</i>
                    <i class="material-icons" id="person">lock</i>
					<div id="button-block">
                        <center>
                            <div class="buttons"><input name="submit" type="submit" value="Change Password" class="up-in"id="but"></div>
							<div class="buttons" id="new"><a href="profile.php" class="up-in" value="forum">Cancel</a></div>
                        </center>
                    </div>
              </form>
            </div>
          </div>

        
        
        <!-- Sripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>
        
    </body>
    
</html>
