<?
include("_main.header.php");
?>

<div align="center"></div>

<table width="720" height="200" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center" valign="middle"><p>&nbsp;</p>

      <p>&nbsp;</p>

      <p>&nbsp;</p>

      <p>&nbsp;</p>

      <table width="600" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td height="51"><p class="message"> 

<?

$result=mysql_query("SELECT email,user,password,emailtype,status from chatusers  WHERE id = '$_GET[UID]' LIMIT 1");

while($row = mysql_fetch_array($result)) 

	{

	$email=$row['email'];

	$user=$row['user'];

	$pass=$row['password'];

	$my_pass=$row['password'];

	$db_pass=md5($pass);

	$status=$row['status'];

	$emailtype=$row['emailtype'];

	}

	

if ($status!="pending"){

echo 'This account has already been activated!';

} else{

	mysql_query("UPDATE chatusers SET password='$db_pass', status='active' WHERE id ='$_GET[UID]' LIMIT 1");



	if ($emailtype=="text"){

	$charset="Content-type: text/plain; charset=iso-8859-1\r\n";

	$message = "Congratulations!
	
You have been successfully registered with $sitename.
Here's your login information:

	
Username: $user
Password: $my_pass
	

You can now access your account at: 
$siteurl/login.php?user=$user

	
Thank you!
$sitename 

This is an automated response. Please do not reply!";

	

	} else if($emailtype=="html"){

	

	$charset="Content-type: text/html; charset=iso-8859-1\r\n";

	$message = "Congratulations!
	
You have been successfully registered with $sitename.
Here's your login information:

	
Username: $user
Password: $my_pass
	

You can now access your account at: 
<a href='$siteurl/login.php?user=$user'>$siteurl/login.php?user=$user</a>

	
Thank you!
$sitename 

This is an automated response. Please do not reply!";

	

	}else {

	echo"E-Mail variable not set";

	}



	$subject = "Welcome to $sitename"; 

	mail($email, $subject, $message,"MIME-Version: 1.0\r\n".$charset."From:".$registrationemail."\r\n"."Reply-To:'".$registrationemail."'\r\n"."X-Mailer: PHP/".phpversion() );

	echo 'Thank you! Your member account has been activated. You can now access your account <a href="login.php">HERE</a>.';

}

?><br>

          </p>

          </td>

      </tr>

      <tr>

        <td>&nbsp;</td>

      </tr>

    </table>

    <p>&nbsp;</p>

    <p>&nbsp;</p>

    <p>&nbsp;</p></td>

  </tr>

</table>

<br>

<?
include("_main.footer.php");
?>

