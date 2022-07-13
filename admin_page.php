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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.4.6/tailwind.min.css">
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
		
    <div class="container my-5">
		<a href="admin_page.php">ข้อมูลผู้ใช้งาน</a>
		&nbsp;&nbsp;&nbsp;
		<br>
        <div class="row">
		
        <div class="col-md-10">
            <h3>
                <span class="text-danger">ข้อมูลผู้ใช้งานจากฐานข้อมูล</span>
				<br>
            </h3>
			Userlevel<br>admin = 0<br>user = 1
        </div>
        <div class="col-md-2 mt-2">
            <a href="insert.php" class="btn btn-primary">
                <i class="far fa-plus-square"></i><span class=" ml-2">เพิ่มผู้ใช้งาน</span>
            </a>
        </div>
    </div>
    <br>

    <!-- data table ใช้เเสดงข้อมูลเเละเเบ่งหน้าให้อัตโนมัติ -->
    <table id="example" class="table table-striped table-bordered table-hover table-responsive-sm" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
				<th>Username</th>
                <th>Password</th>
                <th>Name</th>
                <th>Email</th>
                <th>Userlevel</th>
				<th>Process</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);

                ////การเช็กว่าข้อมูลมีมากกว่า 1 row 
                // if (mysqli_num_rows($result) > 0) 
                // {
                // เเสดงข้อมูลจากฐานข้อมูล
                while ($item = mysqli_fetch_assoc($result)) { ?>

            <!-- เเสดงข้อมูลจากฐานข้อมูล -->
			<?php
			?>
            <tr>
                <td class="" width="15%"><?php echo $item["id"]; ?></td>
                <td><?php echo $item["username"]; ?></td>
                <td>ซ่อนไว้(สามารถแก้ไขได้)</td>
                <td><?php echo $item["name"]; ?></td>
				<td><?php echo $item["email"]; ?></td>
				<td><?php echo $item["userlevel"]; ?></td>
                <td class="text-center">
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-warning" href="edit.php?id=<?php echo $item["id"]; ?>">
                            <i class="fas fa-edit"> </i>
                        </a>
                        <a class="btn btn-danger" href="del.php?id=<?php echo $item["id"]; ?>" onclick=\"return confirm('Do you want to delete this record? !!!')\">
                            <i class="fas fa-trash"> </i>
                        </a>
                    </div>
                </td>
            </tr>

            <?php
                }
            ?>
        </tbody>
    </table>
    </div>
    <!-- javascript ที่ทำงานกับ datatable ถ้าไม่ใส่จะใช้ datatable ไม่ได้ -->
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
</body>
</html>