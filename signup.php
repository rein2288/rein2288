<?php 
$dbc = mysqli_connect('localhost','root','','userblackshop');
if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
	$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
	if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
		$query = "SELECT * FROM `signup` WHERE username ='$username'";

		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0){

				$query = "INSERT INTO `signup` (username, password) VALUES ('$username', SHA('$password1'))";
			
				mysqli_query($dbc,$query);
				echo "account is ready";
				mysqli_close($dbc);
				exit();
		}
		else{
			echo 'Login is true';


		}
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<label for="username">Введите ваш логин:</label>
		<input type="text" name="username"><br><br>
		<label for="password">Введите ваш пароль:</label>
		<input type="password" name="password1"><br><br>
		<label for="password">Подтвердите ваш пароль:</label>
		<input type="password" name="password2">
		<button name="submit">Вход</button>
		</form>
		
	</body>
</html>