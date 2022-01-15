<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatoperators" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

include("../../settings.php");

$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");



	while($row = mysql_fetch_array($result)) 

	{	$sopusername=$row[user];	}

}

?>

<?php

if($_POST[UserName]!="" && $_POST[Password1]!="" && $_POST[Password2]!="" && $_POST[Email]!="" && $_POST[Category] !="" && $_POST[Name] !="" && $_POST[Country] !="" && $_POST[State] !="" && $_POST[City] !=""&& $_POST[ZipCode] !="" && $_POST[Adress] !=""  && $_POST[birth]!="" && $_POST[ss]!="" && $_POST[idnumber]!=""&& $_POST[phone]!="" && $_FILES['ImageFile']['tmp_name']!="" && $_FILES['ActImage']['tmp_name']!="" && $_FILES['RImage']['tmp_name']!=""){



	$errorMsg="";

	

	//real username

	$replacevalues = array('&','/'," ","?","+","%","$","#","@");

	$username=str_replace($replacevalues,"", $_POST['UserName']);

	

	//if username already exists

	$result = mysql_query("SELECT user FROM chatmodels WHERE user='$username'");

	if (mysql_num_rows($result)>=1){

		$errorMsg.="Username exists, please choose another one!<br>";

	}  else {

		//if dir still exists

		@rmdir("../../models/".$username."/");

		@mkdir("../../models/".$username."/");

			

		//if password are correct

		if($_POST[Password1]!=$_POST[Password2]) {

			$errorMsg.="Passwords do not match<br>";

		} else	if(strlen($_POST[Password1])<6){

			$errorMsg.="Passwords must be at least 6 characters long<br>";

		}

		

		//user ID

		$dateRegistered=time();

		$currentTime=date("YmdHis");

		$userId=md5("$currentTime".$_SERVER['REMOTE_ADDR']);



		//calculates some time

		$day=$_POST[day];

		if ($day<10){$day="0".$day;}

		$currentSeconds=strtotime($day." ".$_POST[month]." ".$_POST[year]);

	

		//makes the users folder in models folder

		$urlThumbnail="../../models/".$_POST[UserName]."/thumbnail.jpg";

		$urlIdentityImage="../../models/".$_POST[UserName]."/".$userId.".jpg";

		$urlRImage="../../models/".$_POST[UserName]."/representative.jpg";

	

		//we copy the thumbail image

		if (!@copy($_FILES['ImageFile']['tmp_name'],$urlThumbnail)){

		$errorMsg.="Thumbnail image file could not be copied, please try again.<br>";

		}

		//we copy the id image

		if (!@copy($_FILES['ActImage']['tmp_name'],$urlIdentityImage)){

		$errorMsg.="ID image file could not be copied, please try again.<br>";

		}

		//we copy the R image

		if (!@copy($_FILES['RImage']['tmp_name'],$urlRImage)){

		$errorMsg.="Representative image file could not be copied, please try again.<br>";

		}

	}

		$db_pass=md5($_POST[Password1]);



		if ($errorMsg==""){

			mysql_query("INSERT INTO `chatmodels` ( id , user , password , email , language1 , language2 ,language3,language4, birthDate , braSize , birthSign , weight , weightMeasure , height , heightMeasure , eyeColor , ethnicity , message , position , fantasies , hobby , hairColor , hairLength , pubicHair , tImage , cpm , epercentage ,minimum, category , name , country , state , city , zip , adress , actImage , pMethod , pInfo , dateRegistered , owner , lastLogIn , phone ,fax, idtype , idmonth , idyear , idnumber , birthplace , ssnumber , msn , yahoo , icq , broadcastplace, emailtype,  status , lastupdate) VALUES ('$userId','$_POST[UserName]' , '$db_pass', '$_POST[Email]', '$_POST[L1]', '$_POST[L2]', '$_POST[L3]', '$_POST[L4]', '$currentSeconds', '$_POST[BraSize]', '$_POST[BirthSign]', 	'$_POST[Weight]', '$_POST[weightMeasure]', '$_POST[Height]', '$_POST[heightMeasure]', '$_POST[eyeColor]', '$_POST[Ethnic]', '$_POST[Message]', '$_POST[Position]', 	'$_POST[Fantasies]', '$_POST[Hobbies]','$_POST[hairColor]','$_POST[hairLength]','$_POST[pubicHair]','Thumbnail Image', '295', '30','500','$_POST[Category]', '$_POST[Name]', '$_POST[Country]', '$_POST[State]','$_POST[City]', '$_POST[ZipCode]', '$_POST[Adress]', 'IdentityImage', '$_POST[PMethod]', '$_POST[PInfo]','$dateRegistered','$sopusername','$dateRegistered','$_POST[phone]','$_POST[fax]','$_POST[idtype]','$_POST[idmonth]','$_POST[idyear]','$_POST[idnumber]','$_POST[birth]','$_POST[ss]','$_POST[msn]','$_POST[yahoo]','$_POST[icq]','$_POST[location]','$_POST[emailtype]','pending','00')");

			header ("Location: modelregistered.php");

		}

}

else 

{

$errorMsg="Please fill all the required fields.";

}

?>

<?
include("_sop.header.php");
?>

<form action="newmodel.php" method="post" enctype="multipart/form-data" name="form1" target="_self">

  <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr>

      <td height="52"><span class="big_title style2">      Model Registration Form</span><br>
      <br>        
        <span class="small_title"> What does <strong><? echo "$sitename"?></strong> offer you? <br>
An opportunity to make lots of money working with a webcam from the privacy of your home. <br>
<br>

        </span><span class="small_title">

          <span class="error">

          <?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?>
          <br>
          <br>
      </span> </span></td>

    </tr>

  </table>

  <table width="720" border="0" align="center" cellpadding="4" cellspacing="0">

    <tr class="barbg">

      <td height="16" colspan="3" align="center" valign="middle" class="form_header_title"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td class="form_header_title"><div align="left">Step 1: Login Information </div></td>

          </tr>

      </table></td>

    </tr>

    <tr>

      <td colspan="3" class="form_definitions style2"><span class="form_definitions">Login information. Your username will be unique.</span></td>

    </tr>

    <tr>

      <td width="160" align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_POST[UserName]) && $_POST[UserName]==""){

		  echo "<font color=#ffdd54>Username:*</font>";

	 	 } else{

	 	 echo"Username:*";

	  }?>

      </span>      </td>

      <td width="250" align="left"><input name="UserName" type="text" id="UserName2"  value="<? if (isset($_POST[UserName])){ echo $_POST[UserName]; }  ?>" size="24" maxlength="24"></td>

      <td width="286" align="left"><span class="form_informations">The username will be your screen name in the text chat and different areas of the site. Try to choose one that represents you best. </span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_POST[Password1]) && $_POST[Password1]==""){

		  echo "<font color=#ffdd54>Password:*</font>";

	 	 } else{

	 	 echo"Password:*";

	  }?>

      </span>      </td>

      <td align="left"><input name="Password1" type="password" id="Password1" size="24" maxlength="24"></td>

      <td align="left" class="form_informations style2"><span class="form_informations">Minimum 6 characters </span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_POST[Password2]) && $_POST[Password2]==""){

		  echo "<font color=#ffdd54>Retype Password:*</font>";

	 	 } else{

	 	 echo"Retype Password:*";

	  }?>

      </span>      </td>

      <td align="left"><input name="Password2" type="password" id="Password2" size="24" maxlength="24"></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_POST[Email]) && $_POST[Email]==""){

		  echo "<font color=#ffdd54>E-mail:*</font>";

	 	 } else{ echo"E-mail:*";} 

	  ?>

      </span>      </td>

      <td align="left"><input name="Email" type="text" id="Email" value="<? if (isset($_POST[Email])){ echo $_POST[Email]; }  ?>" size="24" maxlength="24"></td>

      <td align="left" class="form_informations style2"><span class="form_informations">Your email address will not be visible to members and will not be disclosed to other parties. </span></td>

    </tr>

    <tr>

      <td><span class="style2"></span></td>

      <td><span class="style2"></span></td>

      <td><span class="style2"></span></td>

    </tr>

  </table>

  <br>

  <table width="720" border="0" align="center" cellpadding="4" cellspacing="0">

    <tr class="barbg">

      <td height="16" colspan="3" align="center" valign="middle" class="form_header_title"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td class="form_header_title"><div align="left">Step 2: Profile Details</div></td>

          </tr>

      </table></td>

    </tr>

    <tr>

      <td colspan="3"><span class="form_definitions">This information will be visible to all users (members and guests) visiting the site.</span></td>

    </tr>

    <tr>

      <td width="160" align="right" class="form_definitions style2">Language 1:</td>

      <td width="250" align="left" class="form_definitions"><span class="style2">

        <select name="L1" id="L1">

          <option value="Dutch"  <? if (isset($_POST[L1]) && $_POST[L1]=="Dutch"){echo "selected";}  else if (!isset($_POST[L1])){ echo "selected"; }?> >Dutch</option>

          <option value="English" <? if (isset($_POST[L1]) && $_POST[L1]=="English"){echo "selected";}?> >English</option>

          <option value="French" <? if (isset($_POST[L1]) && $_POST[L1]=="French"){echo "selected";}?> >French</option>

          <option value="German" <? if (isset($_POST[L1]) && $_POST[L1]=="German"){echo "selected";}?> >German</option>

          <option value="Italian" <? if (isset($_POST[L1]) && $_POST[L1]=="Italian"){echo "selected";}?> >Italian</option>

          <option value="Japanese" <? if (isset($_POST[L1]) && $_POST[L1]=="Japanese"){echo "selected";}?> >Japanese</option>

          <option value="Korean" <? if (isset($_POST[L1]) && $_POST[L1]=="Korean"){echo "selected";}?> >Korean</option>

          <option value="Portuguese" <? if (isset($_POST[L1]) && $_POST[L1]=="Portuguese"){echo "selected";}?> >Portuguese</option>

          <option value="Spanish" <? if (isset($_POST[L1]) && $_POST[L1]=="Spanish"){echo "selected";}?> >Spanish</option>

        </select>

      </span></td>

      <td width="286" align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right"><span class="form_definitions style2">Language 2:</span></td>

      <td align="left"><span class="style2">

        <select name="L2" id="select">

   	      <option value="None"  <? if (isset($_POST[L2]) && $_POST[L2]=="None"){echo "selected";}  else if (!isset($_POST[L2])){ echo "selected"; }?> >None</option>

          <option value="Dutch"  <? if (isset($_POST[L2]) && $_POST[L2]=="Dutch"){echo "selected";}?> >Dutch</option>

          <option value="English" <? if (isset($_POST[L2]) && $_POST[L2]=="English"){echo "selected";}?> >English</option>

          <option value="French" <? if (isset($_POST[L2]) && $_POST[L2]=="French"){echo "selected";}?> >French</option>

          <option value="German" <? if (isset($_POST[L2]) && $_POST[L2]=="German"){echo "selected";}?> >German</option>

          <option value="Italian" <? if (isset($_POST[L2]) && $_POST[L2]=="Italian"){echo "selected";}?> >Italian</option>

          <option value="Japanese" <? if (isset($_POST[L2]) && $_POST[L2]=="Japanese"){echo "selected";}?> >Japanese</option>

          <option value="Korean" <? if (isset($_POST[L2]) && $_POST[L2]=="Korean"){echo "selected";}?> >Korean</option>

          <option value="Portuguese" <? if (isset($_POST[L2]) && $_POST[L2]=="Portuguese"){echo "selected";}?> >Portuguese</option>

          <option value="Spanish" <? if (isset($_POST[L2]) && $_POST[L2]=="Spanish"){echo "selected";}?> >Spanish</option>

        </select>

      </span></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right"><span class="form_definitions style2">Language 3: </span></td>

      <td align="left"><span class="style2">

        <select name="L3" id="select">

          <option value="None"  <? if (isset($_POST[L3]) && $_POST[L3]=="None"){echo "selected";}  else if (!isset($_POST[L3])){ echo "selected"; }?> >None</option>

          <option value="Dutch"  <? if (isset($_POST[L3]) && $_POST[L3]=="Dutch"){echo "selected";}?> >Dutch</option>

          <option value="English" <? if (isset($_POST[L3]) && $_POST[L3]=="English"){echo "selected";}?> >English</option>

          <option value="French" <? if (isset($_POST[L3]) && $_POST[L3]=="French"){echo "selected";}?> >French</option>

          <option value="German" <? if (isset($_POST[L3]) && $_POST[L3]=="German"){echo "selected";}?> >German</option>

          <option value="Italian" <? if (isset($_POST[L3]) && $_POST[L3]=="Italian"){echo "selected";}?> >Italian</option>

          <option value="Japanese" <? if (isset($_POST[L3]) && $_POST[L3]=="Japanese"){echo "selected";}?> >Japanese</option>

          <option value="Korean" <? if (isset($_POST[L3]) && $_POST[L3]=="Korean"){echo "selected";}?> >Korean</option>

          <option value="Portuguese" <? if (isset($_POST[L3]) && $_POST[L3]=="Portuguese"){echo "selected";}?> >Portuguese</option>

          <option value="Spanish" <? if (isset($_POST[L3]) && $_POST[L3]=="Spanish"){echo "selected";}?> >Spanish</option>

        </select>

      </span></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right"><span class="form_definitions style2">Language 4: </span></td>

      <td align="left"><span class="style2">

        <select name="L4" id="select">

          <option value="None"  <? if (isset($_POST[L4]) && $_POST[L4]=="None"){echo "selected";}  else if (!isset($_POST[L4])){ echo "selected"; }?> >None</option>

          <option value="Dutch"  <? if (isset($_POST[L4]) && $_POST[L4]=="Dutch"){echo "selected";}?> >Dutch</option>

          <option value="English" <? if (isset($_POST[L4]) && $_POST[L4]=="English"){echo "selected";}?> >English</option>

          <option value="French" <? if (isset($_POST[L4]) && $_POST[L4]=="French"){echo "selected";}?> >French</option>

          <option value="German" <? if (isset($_POST[L4]) && $_POST[L4]=="German"){echo "selected";}?> >German</option>

          <option value="Italian" <? if (isset($_POST[L4]) && $_POST[L4]=="Italian"){echo "selected";}?> >Italian</option>

          <option value="Japanese" <? if (isset($_POST[L4]) && $_POST[L4]=="Japanese"){echo "selected";}?> >Japanese</option>

          <option value="Korean" <? if (isset($_POST[L4]) && $_POST[L4]=="Korean"){echo "selected";}?> >Korean</option>

          <option value="Portuguese" <? if (isset($_POST[L4]) && $_POST[L4]=="Portuguese"){echo "selected";}?> >Portuguese</option>

          <option value="Spanish" <? if (isset($_POST[L4]) && $_POST[L4]=="Spanish"){echo "selected";}?> >Spanish</option>

        </select>

      </span></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Date of Birth:</td>

      <td align="left"><span class="style2">

        <select name="day" id="day">

          <?

		  for($i=01; $i<=31; $i++)

		  {

		  echo "<option value='$i'";

		  if ($_POST[day]==$i){ echo "selected";}

		  echo">$i</option>";

		  }

		  ?>

        </select>

          <select name="month" id="month">

            <option value="January" <? if ($_POST[month]=="January"){ echo "selected";} else if (!isset($_POST[month])){ echo "selceted";}?>>January</option>

            <option value="February" <? if ($_POST[month]=="February"){ echo "selected";}?>>February</option>

            <option value="March" <? if ($_POST[month]=="March"){ echo "selected";}?>>March</option>

            <option value="April" <? if ($_POST[month]=="April"){ echo "selected";}?>>April</option>

            <option value="May" <? if ($_POST[month]=="May"){ echo "selected";}?>>May</option>

            <option value="June" <? if ($_POST[month]=="June"){ echo "selected";}?>>June</option>

            <option value="July" <? if ($_POST[month]=="July"){ echo "selected";}?>>July</option>

            <option value="August" <? if ($_POST[month]=="August"){ echo "selected";}?>>August</option>

            <option value="September" <? if ($_POST[month]=="September"){ echo "selected";}?>>September</option>

            <option value="October" <? if ($_POST[month]=="October"){ echo "selected";}?>>October</option>

            <option value="November" <? if ($_POST[month]=="November"){ echo "selected";}?>>November</option>

            <option value="December" <? if ($_POST[month]=="December"){ echo "selected";}?>>December</option>

          </select>

          <select name="year" id="year">

            <?

		  for($i=1980; $i<=date(Y)-17; $i++)

		  {

		  echo "<option value='$i'";

		   if ($_POST[year]==$i){ echo "selected";}

		  echo ">$i</option>";

		  }

		  

		  ?>

          </select>

      </span></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Bra Size: </td>

      <td align="left"><input name="BraSize" type="text" id="BraSize" value="<? if (isset($_POST[BraSize])){ echo $_POST[BraSize]; }  ?>" size="4" maxlength="4"></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Birth Sign: </td>

      <td align="left"><input name="BirthSign" type="text" id="BirthSign" value="<? if (isset($_POST[BirthSign])){ echo $_POST[BirthSign]; }  ?>"size="24" maxlength="24"></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Weight:</td>

      <td align="left"><span class="style2">

        <input name="Weight" type="text" id="Weight" size="4" value="<? if (isset($_POST[Weight])){ echo $_POST[Weight]; }  ?>" maxlength="4">

          <select name="weightMeasure" id="select2">

            <option value="kg" <? if (isset($_POST[weightMeasure]) && $_POST[weightMeasure]=="kg"){echo "selected";} else if (!isset($_POST[weightMeasure])){ echo "selected"; }?> >Kg</option>

            <option value="pd" <? if (isset($_POST[weightMeasure]) && $_POST[weightMeasure]=="pd"){echo "selected";}?> >Pounds</option>

          </select>

      </span></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Height:</td>

      <td align="left"><span class="style2">

        <input name="Height" type="text" id="Height" value="<? if (isset($_POST[Height])){ echo $_POST[Height]; }  ?>" size="4" maxlength="4">

          <select name="heightMeasure" id="select3">

            <option value="cm" <? if (isset($_POST[heightMeasure]) && $_POST[heightMeasure]=="cm"){echo "selected";} else if (!isset($_POST[heightMeasure])){ echo "selected"; } ?> >Centimeters</option>

            <option value="in" <? if (isset($_POST[heightMeasure]) && $_POST[heightMeasure]=="in"){echo "selected";}?>  >Inch</option>

          </select>

      </span></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Eye Color: </td>

      <td align="left"><input name="eyeColor" type="text" id="eyeColor" value="<? if (isset($_POST[eyeColor])){ echo $_POST[eyeColor]; }  ?>" size="24" maxlength="24"></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Ethinicity:</td>

      <td align="left"><input name="Ethnic" type="text" id="Ethnic" value="<? if (isset($_POST[Ethnic])){ echo $_POST[Ethnic]; }  ?>" size="24" maxlength="24"></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Hair Color: </td>

      <td align="left"><input name="hairColor" type="text" id="hairColor" value="<? if (isset($_POST[hairColor])){ echo $_POST[hairColor]; }  ?>" size="24" maxlength="24"></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Hair Length: </td>

      <td align="left"><input name="hairLength" type="text" id="hairLength" value="<? if (isset($_POST[hairLength])){ echo $_POST[hairLength]; }  ?>" size="24" maxlength="24"></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Pubian Hair: </td>

      <td align="left"><input name="pubicHair" type="text" id="pubicHair" value="<? if (isset($_POST[pubicHair])){ echo $_POST[pubicHair]; }  ?>" size="24" maxlength="24"></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Broadcasting from: </td>

      <td align="left"><input name="location" type="text" id="location" value="<? if (isset($_POST[location])){ echo $_POST[location]; }  ?>" size="24" maxlength="24"></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Message for visitors: </td>

      <td align="left"><span class="style2">

        <textarea name="Message" cols="24" rows="5" id="Message"><? if (isset($_POST[Message])){ echo $_POST[Message]; } ?>

        </textarea>

      </span></td>

      <td align="left" valign="top"><span class="form_informations style2">Maximum 32 characters, this message is displayed next to your thumbnail image when a visitors browses the models galleries..</span></td>

    </tr>

    <tr>

      <td height="12" align="right" class="form_definitions style2">&nbsp;</td>

      <td height="12" align="left"><span class="style2"></span></td>

      <td height="12" align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Favourite Position:</td>

      <td align="left"><span class="style2">

        <textarea name="Position" cols="24" rows="5" id="Position"><? if (isset($_POST[Position])){ echo $_POST[Position]; } ?>

        </textarea>

      </span></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td height="12" align="right" class="form_definitions style2">&nbsp;</td>

      <td height="12" align="left"><span class="style2"></span></td>

      <td height="12" align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Fantasies:</td>

      <td align="left"><span class="style2">

        <textarea name="Fantasies" cols="24" rows="5" id="Fantasies"><? if (isset($_POST[Fantasies])){ echo $_POST[Fantasies]; }?>

        </textarea>

      </span></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td height="12" align="right" class="form_definitions style2">&nbsp;</td>

      <td height="12" align="left"><span class="style2"></span></td>

      <td height="12" align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Hobbies:</td>

      <td align="left"><span class="style2">

        <textarea name="Hobbies" cols="24" rows="5" id="Hobbies"><? if (isset($_POST[Hobbies])){ echo $_POST[Hobbies]; }?>

        </textarea>

      </span></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions"><span class="style2">

        <? if(isset($_FILES['ImageFile']['name'])){

		  echo "<font color=#ffdd54>Specify Thumbnail Image again:*</font>";

	 	 } else{ echo"Thumbnail Image:*";}

	  	  ?>

      </span></td>

      <td align="left"><input name="ImageFile" type="file" id="ImageFile" value="asdf"></td>

      <td align="left"><span class="form_informations style2">This picture is displayed when a visitor browses the models galleries.Choose a representative image, as appealing as possible. </span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Category*</td>

      <td align="left"><span class="style2">

        <select name="Category" id="Category">
          <option value="girls">Girls</option>

            

          <option value="boys" <? if (isset($_POST[Category]) && $_POST[Category]=="boys"){echo "selected";}?> >Boys</option>

        </select>

      </span></td>

      <td align="left"><span class="style2"></span></td>

    </tr>

  </table>

  <br>

  <table width="720" border="0" align="center" cellpadding="4" cellspacing="0">

    <tr class="barbg">

      <td height="16" colspan="3" align="center" valign="middle" class="form_header_title"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td class="form_header_title"><div align="left">Step 3: Personal Information</div></td>

          </tr>

      </table></td>

    </tr>

    <tr>

      <td colspan="3" class="form_definitions style2"><span class="form_definitions">This information is kept confidential and never disclosed to other parties. We use the information to verify your identity. </span></td>

    </tr>

    <tr>

      <td width="160" align="right" class="form_definitions"><span class="style2">

        <? if(isset($_POST[Name]) && $_POST[Name]==""){

		  echo "<font color=#ffdd54>Full Name:*</font>";

	 	 } else{ echo"Full Name:*";}

	  	  ?>

      </span>      </td>

      <td width="250" align="left"><input name="Name" type="text" id="Name" value="<? if (isset($_POST[Name])){ echo $_POST[Name]; }  ?>" size="24" maxlength="24"></td>

      <td width="286"><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Country:*</td>

      <td align="left"><span class="style2">

        <select name="Country" id="Country">

          <?

		  include("../../dbase.php");

include("../../settings.php");

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

&nbsp;</span></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions"><span class="style2">

        <? if(isset($_POST[State]) && $_POST[State]==""){

		  echo "<font color=#ffdd54>State:*</font>";

	 	 } else{ echo"State:*";}

	  	  ?>

      </span>      </td>

      <td align="left"><input name="State" type="text" id="State" value="<? if (isset($_POST[State])){ echo $_POST[State]; } ?>" size="24" maxlength="24"></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_POST[City]) && $_POST[City]==""){

		  echo "<font color=#ffdd54>City:*</font>";

	 	 } else{ echo"City:*";}

	  	  ?>

      </span>      </td>

      <td align="left"><input name="City" type="text" id="City" value="<? if (isset($_POST[City])){ echo $_POST[City]; } ?>" size="24" maxlength="24"></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_POST[ZipCode]) && $_POST[ZipCode]==""){

		  echo "<font color=#ffdd54>Zip Code:*</font>";

	 	 } else{ echo"Zip Code:*";}

	  	  ?>

      </span>      </td>

      <td align="left"><input name="ZipCode" type="text" id="ZipCode" value="<? if (isset($_POST[ZipCode])){ echo $_POST[ZipCode]; }  ?>" size="24" maxlength="24"></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_POST[phone]) && $_POST[phone]==""){

		  echo "<font color=#ffdd54>Phone:*</font>";

	 	 } else{ echo"Phone:*";}

	  	  ?>

      </span>      </td>

      <td align="left"><input name="phone" type="text" id="phone" value="<? if (isset($_POST[phone])){ echo $_POST[phone]; }  ?>" size="24" maxlength="24"></td>

      <td class="form_informations style2">&nbsp; </td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_POST[Adress]) && $_POST[Adress]==""){

		  echo "<font color=#ffdd54>Street Address:*</font>";

	 	 } else{ echo"Street Address:*";}

	  	  ?>

      </span>      </td>

      <td align="left"><span class="style2">

        <textarea name="Adress" cols="24" rows="5" id="Adress"><? if (isset($_POST[Adress])){echo "$_POST[Adress]"; } ?>

        </textarea>

      </span></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_FILES['ActImage']['name'])){

		  echo "<font color=#ffdd54>Specify the  Primary Photo ID again:*</font>";

	 	 } else{ echo"Primary Photo ID:*";}

	  	  ?>

      </span>      </td>

      <td align="left"><input name="ActImage" type="file" id="ActImage" value=""></td>

      <td class="form_informations style2"><span class="form_informations">We need a scanned/digital photo of the Primary-ID to complete the confirmation process.</span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2"> Primary-ID Type: </td>

      <td align="left"><span class="style2">

        <select name="idtype" id="select4">

          <option value="IDcard" selected <? if ($_POST[idmonth]=="IDcard"){ echo "selected";} else if (!isset($_POST[idmonth])){ echo "selceted";}?>>ID card</option>

          <option value="Passport" <? if ($_POST[idmonth]=="Passport"){ echo "selected";}?>>Passport</option>

          <option value="Driverslicense" <? if ($_POST[idmonth]=="Driverslicense"){ echo "selected";}?>>Drivers license</option>

        </select>

      </span>      </td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2"> Primary-ID Issue Date: </td>

      <td align="left"><span class="style2">

        <select name="idmonth" id="select4">

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

		  for($i=1980; $i<=date(Y)-17; $i++)

		  {

		  echo "<option value='$i'";

		   if ($_POST[idyear]==$i){ echo "selected";}

		  echo ">$i</option>";

		  }

		  

		  ?>

          </select>

      </span></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_POST[idnumber]) && $_POST[idnumber]==""){

		  echo "<font color=#ffdd54>Primary-ID Number:*</font>";

	 	 } else{ echo"Primary-ID Number:*";}

	  	  ?>

      </span>      </td>

      <td align="left"><input name="idnumber" type="text" id="idnumber" value="<? if (isset($_POST[idnumber])){ echo $_POST[idnumber]; }  ?>" size="24" maxlength="24"></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_POST[birth]) && $_POST[birth]==""){

		  echo "<font color=#ffdd54>Place of birth:*</font>";

	 	 } else{ echo"Place of birth:*";}

	  	  ?>

      </span>      </td>

      <td align="left"><input name="birth" type="text" id="birth" value="<? if (isset($_POST[birth])){ echo $_POST[birth]; }  ?>" size="24" maxlength="24"></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_POST[ss]) && $_POST[ss]==""){

		  echo "<font color=#ffdd54>SSN (USA Only):*</font>";

	 	 } else{ echo"SSN (USA Only):*";}

	  	  ?>

      </span>      </td>

      <td align="left"><input name="ss" type="text" id="ss" value="<? if (isset($_POST[ss])){ echo $_POST[ss]; }  ?>" size="24" maxlength="24"></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2"> Fax: </td>

      <td align="left"><input name="fax" type="text" id="fax" value="<? if (isset($_POST[fax])){ echo $_POST[fax]; }  ?>" size="24" maxlength="24"></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">MSN Messenger:</td>

      <td><input name="msn" type="text" id="msn" value="<? if (isset($_POST[msn])){ echo $_POST[msn]; }  ?>" size="24" maxlength="24"></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Yahoo Messenger:</td>

      <td><input name="yahoo" type="text" id="ZipCode33" value="<? if (isset($_POST[yahoo])){ echo $_POST[yahoo]; }  ?>" size="24" maxlength="24"></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">ICQ Messenger:</td>

      <td><input name="icq" type="text" id="ZipCode32" value="<? if (isset($_POST[icq])){ echo $_POST[icq]; }  ?>" size="24" maxlength="24"></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <span class="style2">

        <? if(isset($_FILES['RImage']['name'])){

		  echo "<font color=#ffdd54>Representative Image*</font>";

	 	 } else{ echo"Representative Image*";}

	  	  ?>

      </span>      </td>

      <td align="left"><input name="RImage" type="file" id="RImage" value=""></td>

      <td class="form_informations style2"><span class="form_informations">Representative image. Explicit <br>
pornographic images are strictly forbidden.</span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">&nbsp;</td>

      <td><span class="style2"></span></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr class="barbg">

      <td colspan="3" class="form_definitions"><div align="left">
        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  
          <tr>
  
            <td class="style2"><span class="form_header_title">Step 4: Payment Information </span></td>
  
          </tr>
  
      </table>
      </div></td>

    </tr>

    <tr>

      <td colspan="3" class="form_definitions style2"><span class="form_definitions">This information will be used in order for us to pay you. </span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Minimum Payment: </td>

      <td align="left"><span class="style2">

        <select name="PMini" id="PMini">

          <option value="100"  <? if (isset($_POST[PMini]) && $_POST[PMini]=="100"){echo "selected";}?> >100</option>

          <option value="250"  <? if (isset($_POST[PMini]) && $_POST[PMini]=="250"){echo "selected";}?> >250</option>

          <option value="500"  <? if (isset($_POST[PMini]) && $_POST[PMini]=="500"){echo "selected";} else if (!isset($_POST[PMini])){ echo "selected"; }?> >500</option>

          <option value="1000"  <? if (isset($_POST[PMini]) && $_POST[PMini]=="1000"){echo "selected";}?> >1000</option>

          <option value="2500"  <? if (isset($_POST[PMini]) && $_POST[PMini]=="2500"){echo "selected";}?> >2500</option>

          <option value="5000"  <? if (isset($_POST[PMini]) && $_POST[PMini]=="5000"){echo "selected";}?> >5000</option>

        </select>

      </span></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Payment Method:</td>

      <td align="left"><span class="style2">

        <select name="PMethod" id="PMethod">

          <option value="pp"  <? if (isset($_POST[PMethod]) && $_POST[PMethod]=="pp"){echo "selected";} else if (!isset($_POST[PMethod])){ echo "selected"; }?> >Paypal</option>

          <option value="wu"  <? if (isset($_POST[PMethod]) && $_POST[PMethod]=="wu"){echo "selected";}?> >Western Union</option>

          <option value="ck"  <? if (isset($_POST[PMethod]) && $_POST[PMethod]=="ck"){echo "selected";}?> >Check</option>

          <option value="wt"  <? if (isset($_POST[PMethod]) && $_POST[PMethod]=="wt"){echo "selected";}?> >Wire Transfer</option>

        </select>

      </span></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr>

      <td align="right" class="form_definitions style2">Payment Information:</td>

      <td align="left"><span class="style2">

        <textarea name="PInfo" cols="24" rows="5" id="PInfo"><? if (isset($_POST[PInfo])){ echo $_POST[PInfo]; } ?>

        </textarea>

      </span></td>

      <td><span class="style2"></span></td>

    </tr>

    <tr class="barbg">

      <td colspan="3"><div align="left">
        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  
          <tr>
  
            <td class="style2"><span class="form_header_title">Step 5: Complete your registration </span></td>
  
          </tr>
  
      </table>
      </div></td>

    </tr>

    <tr>

      <td colspan="3" class="form_definitions style2"><span class="form_definitions">Your submission will be reviewed by an administrator and if approved you will recieve a confirmation email.<br>
      </span></td>

    </tr>

    <tr>

      <td colspan="3" class="form_definitions style2"><? if($_POST[checkbox]!="checkbox"){ echo "<span class=error>You must agree with our Terms and Conditions:</span><br>";

}?>

          <input name="checkbox" type="checkbox" value="checkbox" <? if( isset($_POST[checkbox]) && $_POST[checkbox]=="checkbox"){echo "checked";}?>>

      I Agree with the <a href="../../registration/modelterms.php" class="left">Terms and Conditions</a>.<br>

      <span class="form_definitions">Send registration e-mails as: </span>
      <input name="emailtype" type="radio" value="text" checked>

Plain text

<input name="emailtype" type="radio" value="html">

Html</td>

    </tr>

    <tr>

      <td><span class="style2"></span></td>

      <td><input name="Submit" type="submit" value=" I Agree the Terms and Conditions"></td>

      <td><span class="style2"></span></td>

    </tr>

  </table>

<?
include("_sop.footer.php");
?>