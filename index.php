<?php 
header ("Content-Type: text/html; charset=utf-8"); 
error_reporting(E_ALL); 
	
if(isset($_POST['go']))
{
	session_start();
	// must create db and change connections
	$conn = mysql_connect("localhost", "root","");
	mysql_select_db("users");
	$sql = "SELECT login FROM user_info WHERE login='".$_POST['login']."' AND pass='".$_POST['pass']."';";
	$result = mysql_query($sql, $conn);
	if (!mysql_num_rows($result) == 0)
	{
		$_SESSION['user_login'] = $_POST['login'];
		$_SESSION['active'] = true;
		Header("Location: forum.php");
	}
	else
    {
        //echo 'havent access to database';
        //sleep(5);
        Header("Location: index.php");
    }
}

echo "<!DOCTYPE html> 
<html> 
<head><meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"><title>Главная страница</title></head> 
<body> 
<h3>Добро пожаловать!</h3> 
<form method=\"post\">
	Логин <input type=\"text\" name=\"login\"><br><br>
	Пароль <input type=\"password\" name=\"pass\"><br><br>
	<input type=\"submit\" name=\"go\" value=\"Войти\">
	<input type=\"button\" value=\"Регистрация\" onclick=\"location.href = 'registr.php/';\">
</form>
</body></html>";
?>