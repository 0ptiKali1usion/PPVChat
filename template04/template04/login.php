<?

if(isset($_POST['accountUser']) && isset($_POST['accountPassword']))

{

	

include("dbase.php");

include("settings.php");

	if ($_POST['accountType']=="member")

	{

	$database="chatusers";

	} else if ($_POST['accountType']=="model")

	{

	$database="chatmodels";



	} else if ($_POST['accountType']=="studioop")

	{

	$database="chatoperators";

	}

	

	

	$userExists=false;

	$result = mysql_query("SELECT id,user,password,status FROM $database WHERE status!='pending' AND status!='rejected' ");

	while($row = mysql_fetch_array($result)) 

	{

		$tempUser=$row["user"];

		$tempPass=$row["password"];

		$tempId=$row["id"];

		

		if ($_POST['accountUser']==$tempUser && md5($_POST['accountPassword'])==$tempPass)

		{

			if ($row["status"]=="blocked")

			{

			$userExists=true;

			$errorMsg="Your account is suspended, please contact us for details!";

			} else {

			

			$userExists=true;

			$currentTime=time();

			mysql_query("UPDATE $database SET lastLogIn='$currentTime' WHERE id = '$tempId' LIMIT 1");

			setcookie("usertype", $database, time()+3600);

			setcookie("id", $tempId, time()+3600);

			header("Location: cp/$database/");

			}

		}

	

	}

	if (!$userExists){

	$errorMsg="Wrong Username or Password";

	}

	

	

} else if (isset($_GET['from']) && $_GET['from']=="recoverpass"){

	$errorMsg="Your new password has been emailed to you!";

} else {

	$errorMsg="Please enter your username and password";

}











?>



<?
include("_main.header.php");
?>

<table width="720" height="200" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center" valign="middle"><form action="login.php" method="post" enctype="application/x-www-form-urlencoded" name="form1">

      <p>&nbsp;</p>

      <table width="720" border="0" align="center">

        <tr>

          <td colspan="2"><p align="left">

              <span class="error"><?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?></span>

              <br>

              <br>

</p></td>

        </tr>

        <tr>

          <td width="210" align="right" valign="top" class="form_definitions"><div align="right">Username: </div></td>

          <td align="left" valign="top"><input name="accountUser" type="text" id="accountUser" value="<? echo $_GET[user];?>" size="24" maxlength="24"></td>

          </tr>

        <tr>

          <td align="right" valign="top" class="form_definitions"><div align="right">Password: </div></td>

          <td align="left" valign="top"><input name="accountPassword" type="password" id="accountPassword2" size="24" maxlength="24"></td>

          </tr>

        <tr>

          <td align="right" valign="top" class="form_definitions"><div align="right">Account Type:</div></td>

          <td align="left" valign="top">

              <select name="accountType" id="select">

                <option value="member" selected>Member</option>

                <option value="model">Model</option>

                <option value="studioop">Studio Operator</option>

              </select>            <div align="left"></div></td>

          </tr>

        <tr>

          <td align="right" valign="top" class="form_definitions">&nbsp;</td>

          <td align="left" valign="top">

            <input type="submit" name="Submit" value=" Log In to your account">            <div align="left"></div></td>

          </tr>

        <tr>

          <td align="right" valign="top" class="form_definitions">&nbsp;</td>

          <td align="left" valign="top"><a href="lostpassword.php" class="left">Forgot your password? </a></td>

          </tr>

      </table>

    </form></td>

  </tr>

</table>

<br>

<br>

<?
include("_main.footer.php");
?>

