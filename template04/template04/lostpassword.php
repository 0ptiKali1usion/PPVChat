<?

if($_POST[accountUser]!="")

{

	include("dbase.php");

include("settings.php");

	if ($_POST[accountType]=="member")

	{

	$database="chatusers";

	} else if ($_POST[accountType]=="model")

	{

	$database="chatmodels";



	} else if ($_POST[accountType]=="studioOp")

	{

	$database="chatoperators";

	}

	

	

	$userExists=false;

	$result = mysql_query("SELECT user,email,id FROM $database WHERE status!='pending' && status!='rejected'");

	while($row = mysql_fetch_array($result))

	{

		$tempUser=$row["user"];

		$tempEmail=$row["email"];

		$tempId=$row["id"];

		

		if ($_POST[accountUser]==$tempUser){

			$userExists=true;

			function makeRandomPassword() { 

        	  $salt = "abchefghjkmnpqrstuvwxyz0123456789"; 

	          srand((double)microtime()*1000000); 

	          $i = 0; 

	          while ($i <= 7) { 

	                $num = rand() % 33; 

	                $tmp = substr($salt, $num, 1); 

	                $pass = $pass . $tmp; 

	                $i++; 

    	      } 

        	 return $pass; 

    	}

		$random_password = makeRandomPassword(); 

    	$db_password = md5($random_password); 



		mysql_query("UPDATE $database SET password='$db_password' WHERE id = '$tempId' LIMIT 1");

		

$subject = "$sitename Password Reset"; 	   		

$charset = "Content-type: text/plain; charset=iso-8859-1\r\n";

$message = "

Your password has been changed. 

     

New Password: $random_password 

	 	

$siteurl/login.php 



For your security we keep the passwords encrypted. 

That is why we can not recover your lost password.



This is an automated response, please do not reply!"; 

	

@mail($tempEmail, $subject, $message,

"MIME-Version: 1.0\r\n".

$charset.

"From:$registrationemail\r\n".

"Reply-To:$registrationemail\r\n".

"X-Mailer:PHP/" . phpversion() );

		

header("Location: login.php?from=recoverpass");

exit();

		

		}

	

	}

	$errorMsg="Username does not exist!";

	

	

} else

{

	$errorMsg="Please enter your username";

}



?>



<?
include("_main.header.php");
?>

<table width="720" height="200" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center" valign="middle"><form action="lostpassword.php" method="post" enctype="application/x-www-form-urlencoded" name="form1">

      <p>&nbsp;</p>

      <table width="720" border="0" align="center">

        <tr>

          <td colspan="3"><p align="left">

              <span class="error"><?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?></span>

              <br>

              <br>

</p></td>

        </tr>

        <tr>

          <td align="right" valign="top" class="form_definitions"><div align="right">Username:</div></td>

          <td align="left" valign="top"><p>

              <input name="accountUser" type="text" id="accountUser" size="24" maxlength="24">

          </p></td>

          <td align="left" valign="top" class="form_informations"><div align="left"></div></td>

        </tr>

        <tr>

          <td width="210" align="right" valign="top" class="form_definitions"><div align="right">Account  Type:</div></td>

          <td width="212" align="left" valign="top"><p>

            <select name="accountType" id="select">

              <option value="member">Member</option>

              <option value="model">Model</option>

              <option value="studioOp">Studio Operator</option>

            </select>

          </p></td>

          <td width="284" align="left" valign="top" class="form_informations"><div align="left"></div></td>

        </tr>

        <tr>

          <td align="right" valign="top" class="form_definitions">&nbsp;</td>

          <td colspan="2" align="left" valign="top" class="form_definitions"><br>
            The new password will be sent to your mail.</td>

          </tr>

        <tr>

          <td align="right" valign="top" class="form_definitions"><div align="right"></div></td>

          <td align="left" valign="top"><input type="submit" name="Submit" value="Generate New Password"></td>

          <td align="left" valign="top" class="form_informations"><div align="left"></div></td>

        </tr>

        <tr>

          <td colspan="3" align="right" valign="top" class="form_definitions"><div align="right"></div>            <div align="left"><br>
              <span class="form_informations">For your protection we encrypt the passwords before storing them, thus we can not retrieve your lost password. The system will generate a new one for you. After you log in again you will be able to change it from your &quot;Update Profile&quot; section in your account. Thank You. </span></div></td>

          </tr>

      </table>

    </form></td>

  </tr>

</table>

<br>

<?
include("_main.footer.php");
?>

