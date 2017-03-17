<?php
session_start();

if (isset($_POST['send']))
{
    // must create db and change connections
	$mail = $_POST['message']; 
	$avtor = $_SESSION['user_login'];
	$conn = mysql_connect("localhost", "root", "") or die("Невозможно установить соединение: ".mysql_error());
	mysql_select_db("users");
	$sql = "INSERT INTO mail(avtor, mail) VALUES('$avtor', '$mail')";
	if (mysql_query($sql, $conn))
	{
		Header("Location: forum.php");
	}
}

if($_SESSION['active'] == true)
{
	echo "<!DOCTYPE html> 
	<html> 
	<head><meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"><title>Форум</title></head> 
	<body> 
	<h3>Добро пожаловать на форум, ";

	echo $_SESSION['user_login'];
	echo "!</h3> 
	<p>Написать сообщение</p>
	<form method=\"post\">
	<textarea placeholder=\"Ваше сообщение...\" name=\"message\"></textarea><br>
	<input type=\"submit\" name=\"send\" onclick=\"window.location.reload()\">
	</form>
	<br>
	<h4>Сообщения на форуме</h4>";

	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("users");
	$list_f = mysql_list_fields("users", "mail");
	$n1 = mysql_num_fields($list_f);
	for($j = 0; $j < $n1; $j++) $names[] = mysql_field_name($list_f, $j);
	$sql = "SELECT * FROM mail";
	$q = mysql_query($sql, $conn) or die();
	$n = mysql_num_rows($q);
	for($i = 0; $i < $n; $i++)
	{
		foreach($names as $k => $val){
			$value = mysql_result($q, $i, $val);
			echo "$value<br>";
		}
		echo "__________________________<br>";
	}
	echo "</body></html>";
}
else Header("Location: index.php");
?>