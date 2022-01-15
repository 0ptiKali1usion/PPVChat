<?php

session_start();

header("Cache-control: private");



if($_POST['UserName']!="" && $_POST['Password1']!="" && $_POST['Password2']!="" && $_POST['Email']!=""  && $_POST['Name'] !="" && $_POST['Country'] !="" && $_POST['State'] !="" && $_POST['City'] !=""&& $_POST['ZipCode'] !="" && $_POST['Adress'] !="" && $_POST['phone']!="" && $_POST['company']!=="" && $_POST['checkbox']!="" && !($_POST['Country']==60 && $_POST['idtax']==""))

{

	$errorMsg="";

	include ("../dbase.php");

	include ("../settings.php");



	$replacevalues = array('&','/'," ","?","+","%","$","#","@");

	$username=str_replace($replacevalues,"", $_POST['UserName']);

	

	$result = mysql_query("SELECT user FROM chatoperators WHERE user='$username'");

	if (mysql_num_rows($result)==1){

	$errorMsg="Username exists, please choose another one!";

	} else if($_POST[Password1]!=$_POST[Password2]) {

	$errorMsg="Passwords do not match";

	}else if(strlen($_POST[Password1])<6){

	$errorMsg="Passwords must be at least 6 characters long";



	} else {

		//user ID

		$dateRegistered=time();

		$currentTime=date("YmdHis");

		$userId=md5("$currentTime".$_SERVER['REMOTE_ADDR']);

		$db_pass=md5($_POST[Password1]);

		

		$_SESSION['UID']=$userId;

		$_SESSION['email']=$_POST['Email'];

		$_SESSION['password']=$_POST['Password1'];

		$_SESSION['emailtype']=$_POST['emailtype'];

		

		if(mysql_query("INSERT INTO chatoperators VALUES ('$userId','$username', '$_POST[Password1]', '$_POST[Email]', '$_POST[Name]', '$_POST[Country]', '$_POST[State]','$_POST[City]', '$_POST[ZipCode]', '$_POST[phone]', '$_POST[Adress]', '$_POST[PMethod]', '$_POST[PInfo]', '$dateRegistered','$dateRegistered','0','0','500','pending','$sopepercentage','$_POST[emailtype]','$_POST[company]','$_POST[idtax]')"))

		{ } else { $errorMsg="Could not modify database";}

	}//end if user exists

	

	if ($errorMsg==""){

	header ("Location: sopregistered.php");

	

$subject = "Operator account activation at $siteurl"; 



if ($_POST['emailtype']=="text"){

$charset="Content-type: text/plain; charset=iso-8859-1\r\n";

$message = "Thank you for registering on $sitename 

In order to activate your newly created account copy and paste the link below in your browser:



$siteurl/actop.php?UID=$userId



Once you activate your account you will recieve an email with your login information.



Thank you! 
$sitename 

This is an automated response, please do not reply!";



} else if($_POST['emailtype']=="html"){



$charset="Content-type: text/html; charset=iso-8859-1\r\n";

$message = "Thank you for registering on $sitename 

In order to activate your newly created account copy and paste the link below in your browser:



<a href='$siteurl/actop.php?UID=$userId'>$siteurl/actop.php?$userId</a>



Once you activate your account you will recieve an email with your login information.



Thank you! 
$sitename 


This is an automated response, please do not reply!";



}else {

echo"Email Session variable not set";

}



mail($_SESSION['email'], $subject, $message,

     "MIME-Version: 1.0\r\n".

     $charset.

     "From:$registrationemail\r\n".

     "Reply-To:$registrationemail\r\n".

     "X-Mailer: PHP/" . phpversion() );

	

	

	}

	

}

else 

{

$errorMsg="Please fill all the required fields.";

}

?>

<?
include("_reg.header.php");
?>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td height="52"><span class="big_title style9"><br>
      Studio Operator  Registration Form</span><br>
      <br>      

      <span class="small_title"> We are always looking for quality studio partners that can, provide high quality streaming, nicely decorated rooms and most important of all, beautiful models that are attentive and know how to please &amp; tease our customers, to broadcast on our site(s). <br>
      <br>

      <span class="error">

    <?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?>

    </span>      </span></td>

  </tr>

</table>

<form action="operator.php" method="post" enctype="multipart/form-data" name="form1" target="_self">

  <table width="720" border="0" align="center" cellpadding="4" cellspacing="0">

    <tr>

      <td colspan="3" class="barbg"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>

          <td class="form_header_title">Step 1: Login Information </td>

        </tr>

      </table></td>

    </tr>

    <tr>

      <td colspan="3" class="form_definitions">Login information. Your username will be unique.</td>

    </tr>

    <tr>

      <td width="150" align="right" class="form_definitions">

	  <? if(isset($_POST[UserName]) && $_POST[UserName]==""){

		  echo "<font color=#ffdd54>Username:*</font>";

	 	 } else{

	 	 echo"Username:*";

	  }?></td>

      <td><input name="UserName"  value="<? if (isset($_POST[UserName])){ echo $_POST[UserName]; }  ?>" type="text" id="UserName" size="24" maxlength="24"></td>

      <td width="296">&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

	  <? if(isset($_POST[Password1]) && $_POST[Password1]==""){

		  echo "<font color=#ffdd54>Password:*</font>";

	 	 } else{

	 	 echo"Password:*";

	  }?>	  </td>

      <td><input name="Password1" type="password" id="Password1" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

	  <? if(isset($_POST[Password2]) && $_POST[Password2]==""){

		  echo "<font color=#ffdd54>Password:*</font>";

	 	 } else{

	 	 echo"Password:*";

	  }?>	  </td>

      <td><input name="Password2" type="password" id="Password2" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

	  <? if(isset($_POST[Email]) && $_POST[Email]==""){

		  echo "<font color=#ffdd54>E-mail:*</font>";

	 	 } else{ echo"E-mail:*";} 

	  ?>	  </td>

      <td><input name="Email" value="<? if (isset($_POST[Email])){ echo $_POST[Email]; }  ?>" type="text" id="Email" size="24" maxlength="24"></td>

      <td><span class="form_informations">Your email will not be visible to members and will not be disclosed to other parties. </span></td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td class="barbg" colspan="3"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td class="form_header_title">Step 2: Personal Information</td>

          </tr>

      </table></td>

    </tr>

    <tr align="left">

      <td colspan="3" class="form_definitions">
This information 
  
      is kept confidential and never disclosed to other parties. We use the information to verify your identity. </td>
    </tr>

    <tr>

      <td align="right" class="form_definitions"><? if(isset($_POST[Name]) && $_POST[Name]==""){

		  echo "<font color=#ffdd54>Full Name:*</font>";

	 	 } else{ echo"Full Name:*";}

	  	  ?>	  </td>

      <td><input name="Name" value="<? if (isset($_POST[Name])){ echo $_POST[Name]; }  ?>" type="text" id="Name" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">Country:*</td>

      <td width="250">

	  <select name="Country" id="Country">

          <?

		  include ("../dbase.php");

include ("../settings.php");

		$result = mysql_query('SELECT * FROM countries ORDER BY name');

    	while($row = mysql_fetch_array($result)) {

		echo"<option value='$row[id]'";

		if (isset($_POST[Country]) && $_POST[Country]==$row[id]){

		echo "selected";

		}

		

		echo ">$row[name]</option>";

		}

		  

		  

		  ?>

		   

        </select>

	  </td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions"><? if(isset($_POST[State]) && $_POST[State]==""){

		  echo "<font color=#ffdd54>State:*</font>";

	 	 } else{ echo"State:*";}

	  	  ?>	  </td>

      <td><input name="State" value="<? if (isset($_POST[State])){ echo $_POST[State]; } ?>" type="text" id="State" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

	  <? if(isset($_POST[City]) && $_POST[City]==""){

		  echo "<font color=#ffdd54>City:*</font>";

	 	 } else{ echo"City:*";}

	  	  ?>	  </td>

      <td><input name="City" value="<? if (isset($_POST[City])){ echo $_POST[City]; } ?>" type="text" id="City" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

	  <? if(isset($_POST[ZipCode]) && $_POST[ZipCode]==""){

		  echo "<font color=#ffdd54>Zip Code:*</font>";

	 	 } else{ echo"Zip Code:*";}

	  	  ?>	  </td>

      <td><input name="ZipCode" value="<? if (isset($_POST[ZipCode])){ echo $_POST[ZipCode]; }  ?>" type="text" id="ZipCode" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <? if(isset($_POST[phone]) && $_POST[phone]==""){

		  echo "<font color=#ffdd54>Phone Number:*</font>";

	 	 } else{ echo"Phone Number:*";}

	  	  ?>

      </td>

      <td><input name="phone" value="<? if (isset($_POST[phone])){ echo $_POST[phone]; }  ?>" type="text" id="phone" size="24" maxlength="24"></td>

      <td class="form_informations">&nbsp; </td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

	  <? if(isset($_POST[Adress]) && $_POST[Adress]==""){

		  echo "<font color=#ffdd54>Street Adress:*</font>";

	 	 } else{ echo"Street Adress:*";}

	  	  ?>	  </td>

      <td><textarea name="Adress" cols="24" rows="5" id="Adress"><? if (isset($_POST[Adress])){echo "$_POST[Adress]"; } ?></textarea></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right"><span class="form_definitions">

        <? if(isset($_POST[company]) && $_POST[company]==""){

		  echo "<font color=#ffdd54>Company:*</font>";

	 	 } else{ echo"Company:*";}

	  	  ?>

      </span></td>

      <td><input name="company" value="<? if (isset($_POST[company])){ echo $_POST[company]; }  ?>" type="text" id="company" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right"><span class="form_definitions">

        <? if(isset($_POST[taxid]) && $_POST[taxid]=="" &&  $_POST[Country]==60){

		  echo "<font color=#ffdd54>Tax Id number (if US company):*</font>";

	 	 } else{ echo"Tax Id number (if US company):*";}

	  	  ?>

      </span></td>

      <td><input name="taxid" value="<? if (isset($_POST[taxid])){ echo $_POST[taxid]; }  ?>" type="text" id="taxid" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td class="barbg" colspan="3"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td><span class="form_header_title">Step 3: Payment Information</span></td>

          </tr>

      </table></td>

    </tr>

    <tr align="left">

      <td colspan="3" class="form_definitions">This information will be used in order for us to pay you. </td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">Payment Method:</td>

      <td><select name="PMethod" id="PMethod">

        <option value="pp"  <? if (isset($_POST[PMethod]) && $_POST[PMethod]=="pp"){echo "selected";} else if (!isset($_POST[PMethod])){ echo "selected"; }?> >Paypal</option>

        <option value="wu"  <? if (isset($_POST[PMethod]) && $_POST[PMethod]=="wu"){echo "selected";}?> >Western Union</option>

        <option value="ck"  <? if (isset($_POST[PMethod]) && $_POST[PMethod]=="ck"){echo "selected";}?> >Check</option>

        <option value="wt"  <? if (isset($_POST[PMethod]) && $_POST[PMethod]=="wt"){echo "selected";}?> >Wire Transfer</option>

                                    </select></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">Payment Information:</td>

      <td><textarea name="PInfo" cols="24" rows="5" id="PInfo"><? if (isset($_POST[PInfo])){ echo $_POST[PInfo]; } ?></textarea></td>

      <td>&nbsp;</td>

    </tr>

    <tr align="left">

      <td class="barbg" colspan="3"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td><span class="form_header_title">Step 4: Complete your Studio Operator Registration </span></td>

          </tr>

      </table></td>

    </tr>

    <tr>

      <td colspan="3" align="right"><div align="left"><span class="form_definitions">Your account doesn't require administrator approval so you can start registering models right away. </span></div></td>

    </tr>

    <tr>

      <td colspan="3" class="form_definitions"><? if($_POST[checkbox]!="checkbox"){ echo "<span class=error>You must agree with our Terms and Conditions:</span><br>";

}?>

          <input name="checkbox" type="checkbox" value="checkbox" <? if( isset($_POST[checkbox]) && $_POST[checkbox]=="checkbox"){echo "checked";}?>>

I Agree with the <a href="sopterms.php" target="_blank" class="left">Terms and 

Conditions</a>.<br>

<br>

Send registration e-mails as:
<input name="emailtype" type="radio" value="text" checked>

Plain text

<input name="emailtype" type="radio" value="html">

Html</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><input type="submit" name="Submit" value=" I Agree the Terms and Conditions"></td>

      <td>&nbsp;</td>

    </tr>

  </table>

  <p>&nbsp;</p>

</form>

<?
include("_reg.footer.php");
?>
