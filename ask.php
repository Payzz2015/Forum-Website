<?php
    session_start();
    include('connect.php');
    if(!isset($_SESSION['user'])){
        header("location: login.php");
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Forums - Create Question</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/icon1.png" >
		<meta charset="UTF-8">
    </head>
    <body id="ask">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <center><img src="images/rticon.png" alt="Mountain" width="75" height="75"></center>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li>Home</li></a>
			<a href="tags.php"><li>Tags</li></a>
            <a href="ask.php"><li id="home">Ask Question</li></a>
            <a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
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
            <div id="sf">
                <center>
                    <div class="heading ask">
                        <h1 class="logo"><div id="ntro">Ask Question</div></h1>
                    </div>

                    <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" enctype="multipart/form-data">

                        <input name="question" type="text" title="Your Question..." placeholder="Write a Title..." id="question">

                        <select name="cat">
                            <option value="Category">Category</option>
                            <option value="Algorithms">Algorithms</option>
                            <option value="Architecture">Architecture</option>
                            <option value="Theory Of Computation">TOC</option>
                            <option value="Database Management">DBMS</option>
                            <option value="Probability &amp; Queuing">PQT</option>
                            <option value="Software Engineering">SE</option>
                            <option value="Other">Other</option>
                        </select>
						<br>
						<textarea id="area91" name="des" rows="10" cols="65" placeholder="Write a Description..."></textarea>
                        <input name="submit" type="submit" class="up-in" id="ask_submit">
                    </form>
                </center>
            </div>
        </div>
        
        <div id="ask-ta">
            <h1>Thank You.<br>Stay tunned for updates.</h1>
        </div>
        <div id="preloader"></div>
        <?php
        
            if( isset( $_POST["submit"] ) )
            {

                function valid($data){
                    $data=trim(stripslashes(htmlspecialchars($data)));
                    return $data;
                }
                $question = valid( $_POST["question"] );
				$des = valid( $_POST["des"] );
                $no = valid( $_POST["cat"]);
                $question = addslashes($question);
				$des = addslashes($des);
                $q = "SELECT * FROM quans WHERE question = '$question' AND des = '$des'";
                $result = mysqli_query($conn,$q);
                if(mysqli_error($conn))
                    echo "<script>window.alert('มีบางอย่างผิดพลาด');</script>";
                else if( $no == "Category"){
                    echo "<script>window.alert('โปรดเลือกหมวดหมู่');</script>";
                }
                else if( mysqli_num_rows($result) == 0 ){
                    $query = "INSERT INTO quans VALUES(NULL, '$question', '$des', NULL,'".$_SESSION['user']."',NULL)";
                    $query1 = "INSERT INTO quacat SELECT q.id, c.name FROM quans as q, category as c WHERE q.question = '".$question."' AND q.des = '".$des."' AND c.name = '".$_POST['cat']."'";
                    mysqli_query( $conn, $query);
                    if(mysqli_query( $conn, $query1)){
                        echo "<style>#sf{display: none;} #ask-ta{display:block;}</style>";
                    }
                    else{
                        echo "<script>window.alert('มีบางอย่างผิดพลาด');</script>";
                    }
                }
                else{
                    echo "<script>window.alert('คำถามนี้อาจจะซ้ำ, โปรดตรวจสอบใหม่อีกครั้ง');</script>";
                }
                
                mysqli_close($conn);
            }
        
        ?>
		
        <!-- Sripts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>
		<script src="js/loader.js"></script>
    </body>
    
</html>