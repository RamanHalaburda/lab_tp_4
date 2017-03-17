<?php

if (isset($_POST['send']))
{

    // must create db and change connections
	$conn = mysql_connect("localhost", "root", "") or die("Невозможно установить соединение: ".mysql_error());
	mysql_select_db("users");
	$name = $_POST['nam']; 
	$login = $_POST['login']; 
	$pass = $_POST['pass']; 
	$path = "uploads/";
	move_uploaded_file($_FILES['userfile']['tmp_name'], $path.$_FILES['userfile']['name']);
	$avatar = $path.$_FILES['userfile']['name'];
	$pol = $_POST['pol']; 
	$sql = "INSERT INTO user_info(name, login, pass, avatar, pol) VALUES('$name', '$login', '$pass', '$avatar', '$pol')";
	if (mysql_query($sql, $conn))
	{
		Header("Location: index.php");
	}
	else Header("Location: registr.php");
}

echo "<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
	<title>Регистрация</title>
	<script type=\"text/javascript\">
	function test_edit(f){
		name = document.getElementById(\"nam\").value;
		login = document.getElementById(\"login\").value;
		pass = document.getElementById(\"pass\").value;
		boolean key = true;

		if(name.length<3) key = false;
		if(login.length<3) key = false;
		if(parseInt(pass)>5) key = false;

		if(key == true) f.submit(); else alert(\"Заполните все поля!\");
	};
	</script>
</head>
<body>
	<h3>Заполните данные для регистрации</h3>
	<form method=\"post\" enctype=\"multipart/form-data\">
		<input type='text' name='nam' placeholder='Ваше имя'><br>
		<input type='text' name='login' placeholder='Предпочитаемый логин'><br>
		<input type='password' name='pass' placeholder='Ваше пароль'><br>
		<input type='hidden' name='MAX_FILE_SIZE' value='30000'>
		<input type='file' name='userfile'><br>
		<span>Пол:</span>
		<select name='pol'>
			<option>Мужчина</option>
		 	<option>Женщина</option>
		</select><br>
		<input type='submit' name='send'>
	</form>
</body>
</html>";
?>