<?php 
header ("Content-Type: text/html; charset=utf-8"); 
error_reporting(E_ALL ^ E_DEPRECATED);
	
if(isset($_POST['go']))
{
	session_start();
	// must create db and change connections
	error_log("start");
    $conn = mysqli_connect("localhost", "root","1656","tp4");
	//mysqli_select_db("tp4");
	$sql = "SELECT login FROM user_info WHERE login='".$_POST['login']."' AND pass='".$_POST['pass']."';";
	$result = mysqli_query($conn, $sql); // vice versa
	if (!mysql_num_rows($result) == 0)
	{
        error_log("DB: access denied!1");
		$_SESSION['user_login'] = $_POST['login'];
		$_SESSION['active'] = true;
		Header("Location: forum.php");
	}
	else
    {
        error_log("DB: access denied!2");
        Header("Location: index.php");
    }
    error_log("DB: access denied!3");
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