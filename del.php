<html>
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
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
	include('connect.php');
	$ID = $_GET["id"];
	$sql = "DELETE FROM users  WHERE id = '".$ID."' ";
	$query = mysqli_query($conn,$sql);

	if($query) {
        echo "<script> 
               Swal.fire({
				position: 'center',
                icon: 'success',
                title: 'ลบข้อมูลสำเร็จ',
                showConfirmButton: false,
                timer: 1500
               }).then(()=> location = 'admin_page.php')
               </script>";
    } else {
        echo "<script> 
				Swal.fire({
                icon: 'error',
                title: 'ลบข้อมูลไม่สำเร็จ', 
                text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                }) 
             </script>";
	}
	mysqli_close($conn);
?>
</body>
</html>
