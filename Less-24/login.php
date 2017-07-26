<html>
<head>
</head>
<body bgcolor="#000000">
<font size="3" color="#FFFF00">
<div align="right">
<a style="font-size:.8em;color:#FFFF00" href='index.php'><img src="../images/Home.png" height='45'; width='45'></br>HOME</a>
</div>
<?PHP

session_start();
//including the Mysql connect parameters.
//include("../sql-connections/sql-connect.php");




function sqllogin(){
   include("../sql-connections/sql-connect.php");

   $username = addslashes($_POST["login_user"]);
   $password = addslashes($_POST["login_password"]);

   //$sql = "SELECT * FROM users WHERE username='$username' and password='$password'";
   //include("../sql-connections/db-creds.inc");

   //@$con = mysqli_connect('localhost','root','root','security');

   $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";
   $result = mysqli_query($con,$sql);//or die('You tried to be real smart, Try harder!!!! :( ');
   $row = mysqli_fetch_row($result);
   if ($row[1]) {
			return $row[1];
   } else {
      		return 0;
   }

}






$login = sqllogin();
if (!$login== 0) 
{
   echo $login;
	$_SESSION["username"] = $login;
	setcookie("Auth", 1, time()+3600);  /* expire in 15 Minutes */
	header('Location: logged-in.php');
} 
else
{
?>
<tr><td colspan="2" style="text-align:center;"><br/><p style="color:#FF0000;">
<center>
<img src="../images/slap1.jpg">
</center>
</p></td></tr>
<?PHP
} 
?>






</body>
</html>
