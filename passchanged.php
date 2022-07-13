<head>
        <title>Forums - Change Password</title>
</head>
 <?php
	session_start();
	include 'connect.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = password_hash($password, PASSWORD_DEFAULT);
    $newpassword = $_POST['newpassword'];
	$newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
    $result = mysqli_query($conn, "SELECT password FROM users WHERE username='$username'");
	$result2 = mysqli_query($conn, "SELECT password FROM users WHERE password='$password'");
    if(!$result){
		echo "The username you entered does not exist";
    }
    else if(!$result2){
		echo "You entered an incorrect password";
    }
    $sql = mysqli_query($conn, "UPDATE users SET password='$newpassword' where username='$username'");
	if($sql){
		header("Location: profile.php");
		echo "<script>window.alert('You have successfully changed your password.');</script>";
	}
?>