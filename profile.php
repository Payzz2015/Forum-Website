<?php
    session_start();
    if(! isset($_SESSION['user'])){
        header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Forums - Profile</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link rel="icon" href="images/icon1.png" >
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
    </head>
    <body id="pro">        <div id="preloader"></div>

	
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
            <a href="profile.php"><li id="home">Hi, <?php echo $_SESSION["user"]; ?></li></a>
			<?php
				if($_SESSION["userlevel"] == '0'){
			?>
			<a href="admin_page.php"><li>Admin</li></a>
			<?php
				}
			?>	
            <a href="logout.php"><li>Log Out</li></a>
        </ul>
        
        <!-- content -->
        <div id="content">
        <center>
            <h1 id="hea"><?php echo "Welcome ".$_SESSION["user"]; ?></h1>
            <div class="clearfix">
                <div id="hea-det">
					<form>
						<div >
                            <a href="changepass.php" class="up-in" value="forum">Change Password</a>
						</div>
					</form>
					<br>
                    <p id="first">N</p><p class="tit">ame: </p>
                    <p class="det"><?php echo $_SESSION["name"]; ?></p><br>
                    <p id="first">E</p><p class="tit">mail: </p>
                    <p class="det"><?php echo $_SESSION["email"]; ?></p><br>
                    <p id="first">J</p><p class="tit">oin Date: </p>
                    <p class="det"><?php echo $_SESSION["date"]; ?></p>
					
                </div>
                <div id="pic"></div>
            </div>
        </center>
        </div>
        <!-- Footer -->	
    </body>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>
		<script src="js/loader.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</html>