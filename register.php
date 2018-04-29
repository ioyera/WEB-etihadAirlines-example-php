<?php
$db = mysqli_connect("localhost", "Yera", "3254", "dobro");
// mysqli_select_db($db, "dbpro");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['passw'];

// $str = "SELECT userID FROM users WHERE Email='$email'";
$res = mysqli_query($db, "SELECT userID FROM users WHERE Email='$email'");
// echo $str;
$myrow = mysqli_fetch_array($res);
if (!empty($myrow['id'])) 
{
	exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.<a href='login.php#bottom'>Зарегистрироваться</a>");
}else{
	$query = "INSERT INTO users (`FirstName`, `LastName`, `Email`, `Passw`) VALUES ('$fname','$lname', '$email','$pass')";
	mysqli_query($db, $query);
	header('location:login.php');
}
mysqli_close($db);
?>