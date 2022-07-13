	<?php
		session_start();
		include('connect.php');
		if(! isset($_SESSION['user'])){
			header("Location: login.php");
		}
		if($_SESSION["userlevel"] != '0'){
			header("Location: profile.php");
		}
	?>
	<head>
	<meta charset="UTF-8">
	<title>Forums - Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/admin.css">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/icon1.png" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<!-- การลิ้ง javascript ของ bootstrap เเบบ cdn -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<!-- การลิ้ง css ของ data table เเบบ cdn -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
		<!-- javascript ที่ทำงานกับ datatable ลิ้งมาเเบบ cdn -->
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
			integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	</head>
	<body id="pro">
            <a href="index.php">
				<div id="log">
					<center><img src="images/rticon.png" alt="Mountain" width="75" height="75"></center>
				</div>
			</a>
			<ul id="nav-bar">
				<a href="index.php"><li>Home</li></a>
				<a href="tags.php"><li>Tags</li></a>
				<a href="ask.php"><li>Ask Question</li></a>
				<a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
				<?php
					if($_SESSION["userlevel"] == '0'){
				?>
				<a href="admin_page.php"><li id="home">Admin</li></a>
				<?php
					}
				?>	
				<a href="logout.php"><li>Log Out</li></a>
			</ul>



    <div class="container my-5 px-0 1">

        <!--Section: Content-->
        <section class="p-5 my-md-5 text-center">


            <div class="row">
                <div class="col-md-6 mx-auto">
                    <!-- Material form login -->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Form -->
                            <form class="text-center" style="color: #757575;" action="" method="POST">

                                <h3 class="font-weight-bold my-4 pb-2 text-center text-primary">เพิ่มข้อมูลผู้ใช้</h3>

                                <div class="form-group">
                                    <input type="text" class="form-control" required autofocus placeholder="Username"
                                        name="username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" required placeholder="Password"
                                        name="password" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" required placeholder="Name"
                                        name="name" required>
                                </div>
								<div class="form-group">
                                    <input type="email" class="form-control" required placeholder="Email"
                                        name="email" required>
                                </div>
								<div class="form-group">
                                    <input type="number" class="form-control" required placeholder="Userlevel"
                                        name="userlevel" min="0" max="1" required>
                                </div>
                                <div class="text-center">
                                    <input type="submit" name="SubmitInsert" value="Submit"
                                        class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </div>

    <?php
		include('connect.php');
        if (isset($_POST["SubmitInsert"])) {
			$password = $_POST["password"];
			$password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (id, username, password, name, email, userlevel) 
                VALUES (NULL, '{$_POST["username"]}', '$password', '{$_POST["name"]}', '{$_POST["email"]}', '{$_POST["userlevel"]}');";

            if (mysqli_query($conn, $sql)) {
                echo
                    "<script> 
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'บันทึกข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(()=> location = 'admin_page.php')
                </script>";
            } else {
                echo
                    "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'บันทึกข้อมูลไม่สำเร็จ', 
                        text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                    }) 
                </script>";
            }
            mysqli_close($conn);
        }

        ?>

</body>

</html>