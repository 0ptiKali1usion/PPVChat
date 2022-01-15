<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatoperators" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");



	while($row = mysql_fetch_array($result)) 

	{	$username=$row[user];	}

}

?>

<?

if($_POST[Email]!=""  && $_POST[Name] !="" && $_POST[Country] !="" && $_POST[State] !="" && $_POST[City] !=""&& $_POST[ZipCode] !="" && $_POST[Adress] !="")

{	



	include("../../dbase.php");

	$id=$_COOKIE["id"];

	$tempUser=$username;

	$tempPass1=$_POST[Password1];

	$tempPass2=$_POST[Password2];

	

	$tempEmail=$_POST[Email];

	$tempName = $_POST[Name];

	$tempCountry = $_POST[Country];

	$tempState= $_POST[State];

	$tempPhone=$_POST[Phone];	

	$tempCity=$_POST[City];

	$tempZip = $_POST[ZipCode];

	$tempAdress = $_POST[Adress];

	$tempPMethod=$_POST[PMethod];

	$tempPInfo=$_POST[PInfo];

	$tempCompany=$_POST[company];

	$tempIdtax=$_POST[idtax];

	

	mysql_query("UPDATE chatoperators SET phone='$tempPhone', email='$tempEmail', name='$tempName', country='$tempCountry', state='$tempState', city='$tempCity', zip='$tempZip', adress='$tempAdress', pMethod='$tempPMethod', pInfo='$tempPInfo',company='$tempCompany',idtax='$tempIdtax' WHERE id = '$id' LIMIT 1");

	

	if ($_POST[Password1]!=""){	

	$db_pass=md5($_POST[Password1]);

	mysql_query("UPDATE chatoperators SET password='$db_pass' WHERE id = '$id' LIMIT 1");

	}

	

	$errorMsg="Changes have been saved";



}

else if (!isset($_POST[Password1]))

{	

	include("../../dbase.php");

	$id=$_COOKIE["id"];

	$result = mysql_query("SELECT * FROM chatoperators WHERE id='".$id."'");

	while($row = mysql_fetch_array($result)) 

	{

		$tempUser=$row["user"];

		$tempPass1=$row["password"];

		$tempPass2=$row["password"];

		$tempState=$row["state"];

		$tempEmail=$row["email"];

		$tempName = $row["name"];

		$tempCountry = $row["country"];

		$tempZip = $row["zip"];

		$tempCity=$row["city"];

		$tempAdress = $row["adress"];

		$tempPMethod=$row["pMethod"];

		$tempPInfo=$row["pInfo"];

		$tempPhone= $row['phone'];

		$tempCompany=$row['company'];

		$tempIdtax=$row['idtax'];

	}

}else

{

$id=$_COOKIE["id"];

	$tempUser=$username;

	$tempPass1=$_POST[Password1];

	$tempPass2=$_POST[Password2];	

	$tempEmail=$_POST[Email];

	$tempName = $_POST[Name];

	$tempCountry = $_POST[Country];

	$tempState= $_POST[State];

	$tempPhone=$_POST[Phone];	

	$tempCity=$_POST[City];

	$tempZip = $_POST[ZipCode];

	$tempAdress = $_POST[Adress];

	$tempPMethod=$_POST[PMethod];

	$tempPInfo=$_POST[PInfo];

	$tempCompany=$_POST[company];

	$tempIdtax=$_POST[idtax];



$errorMsg="Please fill all the required fields";



} 

?>

<?
include("_sop.header.php");
?>

<table width="400" border="0" align="center">

  <tr valign="top">

    <td height="113"><span class="error"><br>
      </span><span class="big_title">Update Studio Profile</span><span class="error"><br>
      <br>
      <?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?>
      </span>        

      <form name="form1" method="post" action="updateprofile.php">

        <table width="720" border="0" align="center" cellpadding="4" cellspacing="0">

          <tr class="barbg">

            <td colspan="3" class="form_header_title">Login Information </td>
          </tr>

          <tr>

            <td colspan="3" align="right" class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td width="160" align="right" class="form_definitions style1"> Username: </td>

            <td class="small_title"><? echo $tempUser;?></td>

            <td width="286" class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions style1">New Password: 

			</td>

            <td><input name="Password1" type="password" id="Password1" size="24" maxlength="24"></td>

            <td class="form_informations style1">Leave blank if you do not want to change it</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions"><span class="style1">

              <? if($tempEmail==""){ echo "<font color=#ffdd54>Email:*</font>";

	 	 	} else{ echo"Email:*"; }?>

            </span>			</td>

            <td><input name="Email" type="text" id="Email" value="<? echo $tempEmail;?>" size="24" maxlength="24"></td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td class="style1">&nbsp;</td>

            <td class="style1">&nbsp;</td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr class="barbg">

            <td colspan="3" class="form_header_title">Personal Information </td>
          </tr>

          <tr>

            <td colspan="3" class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions"><span class="style1">

              <? if($tempName==""){ echo "<font color=#ffdd54>Full Name:*</font>";

	 	 	} else{ echo"Full Name:*"; }?>

            </span>	</td>

            <td><input name="Name" type="text" id="Name" value="<? echo $tempName;?>" size="24" maxlength="24"></td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions style1">Country:*</td>

            <td width="250"> <span class="style1">

              <select name="Country" id="Country">

                <?

		  include ("../../dbase.php");

include ("../../settings.php");

		$result = mysql_query('SELECT * FROM countries ORDER BY name');

    	while($row = mysql_fetch_array($result)) {

		echo"<option value='$row[id]'";

		if ($tempCountry==$row[id]){

		echo "selected";

		}

		

		echo ">$row[name]</option>";

		}

		  

		  

		  ?>

		       

          </select>

            </span> </td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions"><span class="style1">

              <? if($tempState==""){ echo "<font color=#ffdd54>State:*</font>";

	 	 	} else{ echo"State:*"; }?>

            </span>			</td>

            <td><input name="State" type="text" id="State" value="<? echo $tempState;?>" size="24" maxlength="24"></td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions">

			  <span class="style1">

			  <? if($tempCity==""){ echo "<font color=#ffdd54>City:*</font>";

	 	 	} else{ echo"City:*"; }?>

		    </span>			</td>

            <td><input name="City" type="text" id="City" value="<? echo $tempCity;?>" size="24" maxlength="24"></td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions"><span class="style1">

              <? if($tempZip==""){ echo "<font color=#ffdd54>Zip Code:*</font>";

	 	 	} else{ echo"Zip Code:*"; }?>

            </span>			</td>

            <td><input name="ZipCode" type="text" id="ZipCode" value="<? echo $tempZip;?>" size="24" maxlength="24"></td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions"><span class="style1">

              <? if($tempPhone==""){ echo "<font color=#ffdd54>Phone:*</font>";

	 	 	} else{ echo"Phone:*"; }?>

            </span>            </td>

            <td><input name="Phone" type="text" id="Phone" value="<? echo $tempPhone;?>" size="24" maxlength="24"></td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions"><span class="style1">

              <? if($tempAdress==""){ echo "<font color=#ffdd54>Address:*</font>";

	 	 	} else{ echo"Address:*"; }?>

            </span>	</td>

            <td class="style1">

              <textarea name="Adress" cols="24" rows="5" id="Adress"><? echo $tempAdress;?></textarea>

            </td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions style1">

              <? if($tempCompany==""){

		  echo "<font color=#ffdd54>Company:*</font>";

	 	 } else{ echo"Company:*";}

	  	  ?>

            </td>

            <td><input name="company" type="text" id="company" value="<? echo $tempCompany;?>" size="24" maxlength="24"></td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions style1">

              <? if( $tempIdtax=="" &&  $tempCountry==60){

		  echo "<font color=#ffdd54>Tax Id Number (if US company):*</font>";

	 	 } else{ echo"Tax Id Number (if US company):*";}

	  	  ?>

            </td>

            <td><input name="idtax" type="text" id="idtax" value="<? echo $tempIdtax;?>" size="24" maxlength="24"></td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td class="style1">&nbsp;</td>

            <td class="style1">&nbsp;</td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr class="barbg">

            <td colspan="3" class="form_header_title">Payment Information</td>
          </tr>

          <tr>

            <td colspan="3" class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions style1">Payment Method:</td>

            <td class="style1">

              <select name="PMethod" id="PMethod">

                <option value="pp"  <? if ($tempPMethod=="pp"){echo "selected";}?> >Paypal</option>

                <option value="wu"  <? if ($tempPMethod=="wu"){echo "selected";}?> >Western Union</option>

                <option value="ck"  <? if ($tempPMethod=="ck"){echo "selected";}?> >Check</option>

                <option value="wt"  <? if ($tempPMethod=="wt"){echo "selected";}?> >Wire Transfer</option>

              </select>

            </td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" class="form_definitions style1">Payment Information:</td>

            <td class="style1">

              <textarea name="PInfo" cols="24" rows="5" id="PInfo"><? echo $tempPInfo;?></textarea>

            </td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td class="style1">&nbsp;</td>

            <td class="style1">&nbsp;</td>

            <td class="style1">&nbsp;</td>

          </tr>

          <tr>

            <td class="style1">&nbsp;</td>

            <td><input name="Submit" type="submit" value="   Save Changes   "></td>

            <td class="style1">&nbsp;</td>

          </tr>

        </table>

        <p>&nbsp;</p>

    </form></td>

  </tr>

</table>

<?
include("_sop.footer.php");
?>