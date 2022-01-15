<?php

session_start();

header("Pragma: public");

header("Expires: 0");

header("Cache-Control: private");

$errorMsg="";



if($_POST['UserName']!="" && $_POST['Password1']!="" && $_POST['Password2']!="" && $_POST['Email']!="" && $_POST['Name'] !="" && $_POST['Country'] !="" && $_POST['State'] !="" && $_POST['City'] !=""&& $_POST['ZipCode'] !="" && $_POST['Adress'] !=""  && $_POST['idnumber']!=""&& $_POST['phone']!="" && $_FILES['ActImage']['tmp_name']!="" && $_FILES['RImage']['tmp_name']!="" && $_POST['checkbox']!=""){



	//database settings and connection

	include("../dbase.php");

	include("../settings.php");

	

	//check if we have a user with the same username

	$replacevalues = array('&','/'," ","?","+","%","$","#","@");

	$username=str_replace($replacevalues,"", $_POST['UserName']);

	

	$result = mysql_query("SELECT user FROM chatmodels WHERE user='$username'");

	if (mysql_num_rows($result)>=1){

	//if username already exists

		$errorMsg.="Username exists, please choose another one!<br>";

	} else {

		if($_POST['Password1']!=$_POST['Password2']) {

		//if passwords do not match

			$errorMsg.="<br>Passwords do not match!<br>";

		}

		if(strlen($_POST['Password1'])<6){

		//if password length is less than 6

			$errorMsg.="<br>Passwords must be at least 6 characters long!<br>";

		}

		//if we can not m,ake the dir

		@rmdir("../models/".$username."/");

		@mkdir("../models/".$username."/");

		

		

		$dateRegistered=time();

		$currentTime=date("YmdHis");

		$userId=md5("$currentTime".$_SERVER['REMOTE_ADDR']);

		$urlIdentityImage="../models/".$username."/".$userId.".jpg";

		$urlRImage="../models/".$username."/representative.jpg";

		

		if(!copy($_FILES['ActImage']['tmp_name'],$urlIdentityImage)){

			$errorMsg.="<br>Could not copy ID image!";

		}

		

		if(!copy($_FILES['RImage']['tmp_name'],$urlRImage)){

			$errorMsg.="<br>Could not copy representative image!";

		}

		}

	

	if($errorMsg==""){

		//user ID

		

		$pass=$_POST['Password1'];

		$db_pass=md5($pass);

			

		$_SESSION['dateregistered']=$dateRegistered;

		$_SESSION['userid']=$userId;

		$_SESSION['userid3']='nasnas';

		$_SESSION['username']=$username;

		$_SESSION['password']=$_POST['Password1'];

		$_SESSION['password_encrypted']=$db_pass;

		$_SESSION['name']=$_POST['Name'];

		$_SESSION['email']=$_POST['Email'];

		$_SESSION['country']=$_POST['Country'];

		$_SESSION['state']=$_POST['State'];

		$_SESSION['city']=$_POST['City'];

		$_SESSION['zipcode']=$_POST['ZipCode'];

		$_SESSION['adress']=$_POST['Adress'];

		$_SESSION['ss']=$_POST['ss'];

		$_SESSION['idnumber']=$_POST['idnumber'];

		$_SESSION['idyear']=$_POST['idyear'];

		$_SESSION['idmonth']=$_POST['idmonth'];

		$_SESSION['phone']=$_POST['phone'];

		$_SESSION['idtype']=$_POST['idtype'];	

		$_SESSION['birthplace']=$_POST['birth'];

		$_SESSION['emailtype']=$_POST['emailtype'];

		session_write_close();

		

		header("Location: model2.php");

	}

	

	

}else

{

$errorMsg="Please fill all the required fields.";

}

?>

<?
include("_reg.header.php");
?>

<form action="model.php" method="post" enctype="multipart/form-data" name="form1" target="_self">

  <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr>

      <td height="52"><p><span class="big_title style9">Model Registration Form</span><br>
        <br>

            <span class="small_title"> What does <strong><? echo "$sitename"?></strong> offer you? <br>
An opportunity to make lots of money working with a webcam from the privacy of your home. <br>
<br>

          </span><span class="model_title_small">If you want to test your camera before registering press <a href="testcamera.php?source=model" target="_blank" class="left">Here</a>. </span></p>

        <table width="540" border="0" align="center" cellpadding="4" cellspacing="1" class="tableborder">

          <tr bgcolor="#333333">

            <td width="50%" class="tablebg"><span class="small_title style6 style4"><span class="small_title style6 style1"><span class="small_title style4  style6"><span class="small_title  style6"><span class="big_title">Part 1</span><br>

            </span><span class="small_title style4  style6"><span class="small_title  style6"><span class="style8">(Login Info, Personal Info, Terms)</span></span></span></span></span></span></td>

            <td width="50%" class="barbg"><span class="small_title style6"><span class="style4"><span class="big_title">Part 2

                  </span><br>

            <span class="small_title  style6"><span class="style8">(Profile Info, Payment Info &amp; Submission)</span></span>            </span></span></td>

          </tr>
        </table>        <p align="center"><span class="small_title"><span class="error">

        <?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?>

        <br>

        <br>

</span></span></p>

      </td>

    </tr>
    <tr>
      <td height="52">&nbsp;</td>
    </tr>

  </table>

  <table width="720" border="0" align="center" cellpadding="4" cellspacing="0">

    <tr class="form_header_title">

      <td height="16" colspan="3" align="center" valign="middle" class="barbg"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>

          <td class="form_header_title"><div align="left">Step 1: Login Information </div></td>

        </tr>

      </table></td>

    </tr>

    <tr>

      <td colspan="3" class="form_definitions">Login information. Your username will be unique.</td>

    </tr>

    <tr>

      <td width="160" align="right" class="form_definitions">

	  <? if(isset($_POST[UserName]) && $_POST[UserName]==""){

		  echo "<font color=#ffdd54>Username:*</font>";

	 	 } else{

	 	 echo"Username:*";

	  }?></td>

      <td width="250" align="left"><input name="UserName"  value="<? if (isset($_POST[UserName])){ echo $_POST[UserName]; }  ?>" type="text" id="UserName" size="24" maxlength="24"></td>

      <td width="286" align="left"><span class="form_informations">The  username will be your screen name in the text chat and different areas of the site. Try to choose one that represents you best. </span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

	  <? if(isset($_POST[Password1]) && $_POST[Password1]==""){

		  echo "<font color=#ffdd54>Password:*</font>";

	 	 } else{

	 	 echo"Password:*";

	  }?>	  </td>

      <td align="left"><input name="Password1" type="password" id="Password1" size="24" maxlength="24"></td>

      <td align="left" class="form_informations">Minimum 6 characters </td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

	  <? if(isset($_POST[Password2]) && $_POST[Password2]==""){

		  echo "<font color=#ffdd54>Retype Password:*</font>";

	 	 } else{

	 	 echo"Retype Password:*";

	  }?>	  </td>

      <td align="left"><input name="Password2" type="password" id="Password2" size="24" maxlength="24"></td>

      <td align="left">&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

	  <? if(isset($_POST[Email]) && $_POST[Email]==""){

		  echo "<font color=#ffdd54>E-mail:*</font>";

	 	 } else{ echo"E-mail:*";} 

	  ?>	  </td>

      <td align="left"><input name="Email" value="<? if (isset($_POST[Email])){ echo $_POST[Email]; }  ?>" type="text" id="Email" size="24" maxlength="24"></td>

      <td align="left" class="form_informations">Your email address will not be visible to members and will not be disclosed to other parties. </td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

  <br>

  <table width="720" border="0" align="center" cellpadding="4" cellspacing="0">

    <tr bgcolor="#9A0000" class="form_header_title">

      <td height="16" colspan="3" align="center" valign="middle" class="barbg"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>

          <td class="form_header_title"><div align="left">Step 2: Personal Information</div></td>

        </tr>

      </table></td>

    </tr>

    <tr>

      <td colspan="3" class="form_definitions">
    This information 
  
      is kept confidential and never disclosed to other parties. We use the information to verify your identity. </td>
    </tr>

    <tr>

      <td width="160" align="right" class="form_definitions"><? if(isset($_POST[Name]) && $_POST[Name]==""){

		  echo "<font color=#ffdd54>Full Name:*</font>";

	 	 } else{ echo"Full Name:*";}

	  	  ?>

      </td>

      <td width="250" align="left"><input name="Name" value="<? if (isset($_POST[Name])){ echo $_POST[Name]; }  ?>" type="text" id="Name" size="24" maxlength="24"></td>

      <td width="286">&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">Country:*</td>

      <td align="left"><select name="Country" id="Country">

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

&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions"><? if(isset($_POST[State]) && $_POST[State]==""){

		  echo "<font color=#ffdd54>State:*</font>";

	 	 } else{ echo"State:*";}

	  	  ?>

      </td>

      <td align="left"><input name="State" value="<? if (isset($_POST[State])){ echo $_POST[State]; } ?>" type="text" id="State" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <? if(isset($_POST[City]) && $_POST[City]==""){

		  echo "<font color=#ffdd54>City:*</font>";

	 	 } else{ echo"City:*";}

	  	  ?>

      </td>

      <td align="left"><input name="City" value="<? if (isset($_POST[City])){ echo $_POST[City]; } ?>" type="text" id="City" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <? if(isset($_POST[ZipCode]) && $_POST[ZipCode]==""){

		  echo "<font color=#ffdd54>Zip Code:*</font>";

	 	 } else{ echo"Zip Code:*";}

	  	  ?>

      </td>

      <td align="left"><input name="ZipCode" value="<? if (isset($_POST[ZipCode])){ echo $_POST[ZipCode]; }  ?>" type="text" id="ZipCode" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <? if(isset($_POST[phone]) && $_POST[phone]==""){

		  echo "<font color=#ffdd54>Phone:*</font>";

	 	 } else{ echo"Phone:*";}

	  	  ?>

      </td>

      <td align="left"><input name="phone" value="<? if (isset($_POST[phone])){ echo $_POST[phone]; }  ?>" type="text" id="phone" size="24" maxlength="24"></td>

      <td class="form_informations">&nbsp; </td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <? if(isset($_POST[Adress]) && $_POST[Adress]==""){

		  echo "<font color=#ffdd54>Street Adress:*</font>";

	 	 } else{ echo"Street Adress:*";}

	  	  ?>

      </td>

      <td align="left"><textarea name="Adress" cols="24" rows="5" id="Adress"><? if (isset($_POST[Adress])){echo "$_POST[Adress]"; } ?></textarea></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <? if(isset($_FILES['ActImage']['name'])){

		  echo "<font color=#ffdd54>Specify the  Primary Photo ID again:*</font>";

	 	 } else{ echo"Primary Photo ID:*";}

	  	  ?>

      </td>

      <td align="left"><input name="ActImage" type="file" value="" id="ActImage"></td>

      <td class="form_informations">We need a scanned/digital photo of the Primary-ID to

      complete the confirmation process.</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions"> Primary-ID Type:* </td>

      <td align="left"><select name="idtype" id="select4">
          <option value="IDcard">ID Card</option>

          <option value="Passport" <? if ($_POST[idmonth]=="Passport"){ echo "selected";}?>>Passport</option>
          <option value="Driverslicense">Driver License</option>

     

        </select>

      </td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions"> Primary-ID Issue Date:* </td>

      <td align="left"><select name="idmonth" id="select4">

          <option value="January" <? if ($_POST[idmonth]=="January"){ echo "selected";} else if (!isset($_POST[idmonth])){ echo "selceted";}?>>January</option>

          <option value="February" <? if ($_POST[idmonth]=="February"){ echo "selected";}?>>February</option>

          <option value="March" <? if ($_POST[idmonth]=="March"){ echo "selected";}?>>March</option>

          <option value="April" <? if ($_POST[idmonth]=="April"){ echo "selected";}?>>April</option>

          <option value="May" <? if ($_POST[idmonth]=="May"){ echo "selected";}?>>May</option>

          <option value="June" <? if ($_POST[idmonth]=="June"){ echo "selected";}?>>June</option>

          <option value="July" <? if ($_POST[idmonth]=="July"){ echo "selected";}?>>July</option>

          <option value="August" <? if ($_POST[idmonth]=="August"){ echo "selected";}?>>August</option>

          <option value="September" <? if ($_POST[idmonth]=="September"){ echo "selected";}?>>September</option>

          <option value="October" <? if ($_POST[idmonth]=="October"){ echo "selected";}?>>October</option>

          <option value="November" <? if ($_POST[idmonth]=="November"){ echo "selected";}?>>November</option>

          <option value="December" <? if ($_POST[idmonth]=="December"){ echo "selected";}?>>December</option>

        </select>

          <select name="idyear" id="select5">

            <?

		  for($i=1950; $i<=date(Y); $i++)

		  {

		  echo "<option value='$i'";

		   if ($_POST[idyear]==$i){ echo "selected";}

		  echo ">$i</option>";

		  }

		  

		  ?>

        </select></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <? if(isset($_POST[idnumber]) && $_POST[idnumber]==""){

		  echo "<font color=#ffdd54>Primary-ID Number:*</font>";

	 	 } else{ echo"Primary-ID Number:*";}

	  	  ?>

      </td>

      <td align="left"><input name="idnumber" value="<? if (isset($_POST[idnumber])){ echo $_POST[idnumber]; }  ?>" type="text" id="idnumber" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <? if(isset($_POST[birth]) && $_POST[birth]==""){

		  echo "<font color=#ffdd54>Place of Birth:*</font>";

	 	 } else{ echo"Place of Birth:*";}

	  	  ?>

      </td>

      <td align="left"><input name="birth" value="<? if (isset($_POST[birth])){ echo $_POST[birth]; }  ?>" type="text" id="birth" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <? if(isset($_POST[ss]) && $_POST[ss]=="" && $_POST[Country]==60){

		  echo "<font color=#ffdd54>Social Security Number(USA Only):*</font>";

	 	 } else{ echo"Social Security Number(USA Only):*";}

	  	  ?>

      </td>

      <td align="left"><input name="ss" value="<? if (isset($_POST[ss])){ echo $_POST[ss]; }  ?>" type="text" id="ss" size="24" maxlength="24"></td>

      <td class="form_informations">&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

Fax:      </td>

      <td align="left"><input name="fax" value="<? if (isset($_POST[fax])){ echo $_POST[fax]; }  ?>" type="text" id="fax" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">MSN Messenger:</td>

      <td><input name="msn" value="<? if (isset($_POST[msn])){ echo $_POST[msn]; }  ?>" type="text" id="msn" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">Yahoo Messenger:</td>

      <td><input name="yahoo" value="<? if (isset($_POST[yahoo])){ echo $_POST[yahoo]; }  ?>" type="text" id="ZipCode33" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">ICQ Messenger:</td>

      <td><input name="icq" value="<? if (isset($_POST[icq])){ echo $_POST[icq]; }  ?>" type="text" id="ZipCode32" size="24" maxlength="24"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <? if(isset($_FILES['RImage']['name'])){

		  echo "<font color=#ffdd54>Representative Image:*</font>";

	 	 } else{ echo"Representative Image:*";}

	  	  ?>

      </td>

      <td align="left"><input name="RImage" type="file" value="" id="RImage"></td>

      <td class="form_informations">Representative image. Explicit <br>

        pornographic 

      images are strictly forbidden.</td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td height="16" colspan="3" class="barbg"><div align="left">
        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
    
        <tr>
    
          <td><span class="form_header_title">Step 3: Terms and Conditions </span></td>
    
        </tr>
    
    </table>
      </div></td>

    </tr>

    <tr>

      <td colspan="3" class="form_definitions"><? if($_POST[checkbox]!="checkbox"){ echo "<span class=error>You must agree with our Terms and Conditions:</span><br>";

}?><input name="checkbox" type="checkbox" value="checkbox" <? if( isset($_POST[checkbox]) && $_POST[checkbox]=="checkbox"){echo "checked";}?>>

I Agree with the <a href="modelterms.php" target="_blank" class="left">Terms and 

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

  <br>

</form>

<?
include("_reg.footer.php");
?>

