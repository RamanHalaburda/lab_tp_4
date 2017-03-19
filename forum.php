<?php
session_start();

if (isset($_POST['send']))
{
	$mail = $_POST['message']; 
	$author = $_SESSION['user_login'];

	$conn = mysqli_connect("127.0.0.1:3306", "root","1656");
    if (!$conn) {
        die("Database tp4 connection failed: " . mysqli_error());
    }

    $db_selected = mysqli_select_db($conn,'tp4');
    if (!$db_selected) {
        die("Database tp4 selection failed: " . mysqli_error());
    }

	$sql = "INSERT INTO mail(author, message) VALUES('$author', '$mail')";
	if (mysqli_query($conn, $sql))
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
	<h3>Welcome to chat, ";

	echo $_SESSION['user_login'];
	echo "!</h3> 
	<p>Написать сообщение</p>
	<form method=\"post\">
	<textarea placeholder=\"Your message...\" name=\"message\"></textarea><br>
	<input type=\"submit\" name=\"send\" onclick=\"window.location.reload()\">
	</form>
	<br>
	<h4>Messages</h4>";

    $conn = mysqli_connect("127.0.0.1:3306", "root","1656");
    if (!$conn) {
        die("Database tp4 connection failed: " . mysqli_error());
    }

    $db_selected = mysqli_select_db($conn,'tp4');
    if (!$db_selected) {
        die("Database tp4 selection failed: " . mysqli_error());
    }


/*
	$list_f = mysql_list_fields("users", "mail");
	$n1 = mysql_num_fields($list_f);

	for($j = 0; $j < $n1; $j++)
	{
        $names[] = mysqli_field_name($list_f, $j);
    }
    $sql = "SELECT * FROM mail;";
	$q = mysql_query($conn, $sql) or die("query doesn't maked!");
	$n = mysql_num_rows($q);
	for($i = 0; $i < $n; $i++)
	{
		foreach($names as $k => $val)
		{
			$value = mysqli_result($q, $i, $val);
			echo "$value<br>";
		}
		echo "__________________________<br>";
	}

*/
/*
    $sql = "select * from  mail" or die(mysql_error());
    $rs = mysqli_query($sql);
    $row=mysqli_fetch_array($rs);
    foreach($row as $key)
    {
        echo $key['author'] . " >> " . $key['message'];
    }
*/
    $sql = "select * from  articles" or die(mysql_error());
    $rs = mysql_query($sql);

    while($row = mysql_fetch_array($rs)){

        echo $row['title']."<br />";
    }

	echo "</body></html>";
}
else Header("Location: index.php");
?>