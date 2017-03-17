<?php 
header ("Content-Type: text/html; charset=utf-8"); 
error_reporting(E_ALL); 
	
if(isset($_POST['go']))
{
	session_start();
	// must create db and change connections
	$conn = mysql_connect("127.0.0.1", "root","1656");
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
        error_log("DB: access denied!");
        Header("Location: index.php");
    }
}

echo "<!DOCTYPE html> 
<html> 
<head><meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"><title>Welcome to chat!</title></head> 
<body> 
<h3>Welcome, dear user!</h3> 
<form method=\"post\">
	LOGIN <input type=\"text\" name=\"login\"><br><br>
	PASSWORD <input type=\"password\" name=\"pass\"><br><br>
	<input type=\"submit\" name=\"go\" value=\"Log in\">
	<input type=\"button\" value=\"Log on\" onclick=\"location.href = 'registr.php/';\">
</form>
</body></html>";
?>