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
include("_sop.header.php");
?>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="1">

  <tr>

    <td><?

	

	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400

	//$secondsAll=time();

		

	include('../../dbase.php');

	

	

	$result = mysql_query("SELECT * FROM chatmodels WHERE id='$_GET[id]' LIMIT 1");

		while($row = mysql_fetch_array($result)) 

		{

		$tStatus=$row["status"];

		$tempUser=$row["user"];

		$tempPass1=$row["password"];

		$tempPass2=$row["password"];

		$tempEmail=$row["email"];

		

		$tL1=$row["language1"];

		$tL2=$row["language2"];

		$tL3=$row["language3"];

		$tL4=$row["language4"];

		

		$tBirthD=$row["birthDate"];

		$tBraS=$row["braSize"];

		$tBirthS=$row["birthSign"];

		$tMessage=$row["message"];

		$tFantasies=$row["fantasies"];

		$tPosition=$row["position"];

		$tEthnic=$row["ethnicity"];

		$tEyeC=$row["eyeColor"];

		$tHeight=$row["height"];

		$tWeight=$row["weight"];

		$tHeightM=$row["heightMeasure"];

		$tWeightM=$row["weightMeasure"];

		

		$tCPM=$row["cpm"];

		$tCategory=$row["category"];

		

		$tempName = $row["name"];

		

		$result3=mysql_query("SELECT name FROM countries WHERE id='$row[country]' LIMIT 1");

			while($row3 = mysql_fetch_array($result3)) {

			$tempCountry=$row3[name];

			}

		

	

		$tempState=$row["state"];

		$tempZip = $row["zip"];

		$tempCity=$row["city"];

		$tempAdress = $row["adress"];

		$tempPMethod=$row["pMethod"];

		$tempPInfo=$row["pInfo"];

		

		$tOwner=$row[owner];

		$tempIdmonth=$row[idmonth];

		$tempIdyear=$row[idyear];

		$tempIdtype=$row[idtype];

		$tempIdnumber=$row[idnumber];

		$tempSs=$row[ssnumber];

		$tempPhone=$row[phone];

		$tempBirth=$row[birthplace];

		$tempYahoo=$row[yahoo];	

		$tempMsn=$row[msn];	

		$tempIcq=$row[icq];			

		$tHcolor=$row[hairColor];

		$tHlength=$row[hairLength];

		$tPhair=$row[pubicHair];	

		$tBfrom=$row[broadcastplace];

		$tHobbies=$row[hobby];

		$tempFax=$row[fax];	

		

		



		}

	?>

      <br>      

      <table width="450" height="120" align="center" class="barbg">

      <tr>

        <td width="50%" height="96" rowspan="2" align="center" valign="middle"><img src="../../models/<? echo $tempUser."/thumbnail.jpg" ?>" width="140" height="105" class="barbg"></td>

        <td width="50%" height="50%" valign="bottom" class="big_title">Model: <? echo $tempName ?></td>

      </tr>
      <tr>
        <td width="50%" height="50%" valign="top" class="small_title">Model Status: <? echo $tStatus; ?></td>
      </tr>
    </table>

	  <br>
	  <table width="450" border="0" align="center" cellpadding="4" cellspacing="1" class="tableborder">

	<tr class="tablebg">

	  <td width="50%" align="right" valign="top" class="small_title">User Name:</td>

	  <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tempUser; ?></td>
	</tr>

	<tr class="tablebg">

	  <td width="50%" align="right" valign="top" class="small_title">Email:</td>

	  <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tempEmail; ?></td>
	</tr>

	<tr class="tablebg">

	  <td width="50%" align="right" valign="top" class="small_title">&nbsp;</td>

	  <td width="50%" align="left" valign="top" class="form_definitions">&nbsp;</td>
	  </tr>

	<tr class="tablebg">

	  <td width="50%" align="right" valign="top" class="small_title">Language1:</td>

	  <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tL1; ?></td>
	  </tr>

	<tr class="tablebg">

	  <td width="50%" align="right" valign="top" class="small_title">Language2:</td>

	  <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tL2; ?></td>
	  </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Language3:</td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tL3; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Language4:</td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tL4; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">&nbsp;</td>

      <td width="50%" align="left" valign="top" class="form_definitions">&nbsp;</td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Bra Size: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tBraS; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Birth Sign: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tBirthS; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Eye Color: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tEyeC; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Weight: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tWeight." ".$tWeightM; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Height: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tHeight." ".$tHeightM; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Ethnicity: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tEthnic; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Hair Color: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tHcolor; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Hair Length: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tHlength; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Pubian Hair: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tPhair; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Broadcasting from: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tBfrom; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">&nbsp;</td>

      <td width="50%" align="left" valign="top" class="form_definitions">&nbsp;</td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Message: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tMessage; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Position: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tPosition; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Fantasies: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tFantasies; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Hobbies: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tHobbies; ?></td>
      </tr>  

	<tr class="tablebg">
	  <td width="50%" align="right" valign="top" class="small_title">&nbsp;</td>

	<td width="50%" align="left" valign="top" class="form_definitions">&nbsp;</td>
	</tr>  

	<tr class="tablebg">

	  <td width="50%" align="right" valign="top" class="small_title">Full Name: </td>

	<td width="50%" align="left" valign="top" class="form_definitions"><? echo $tempName; ?></td>
	</tr>

	<tr class="tablebg">

	  <td width="50%" align="right" valign="top" class="small_title">Country: </td>

	<td width="50%" align="left" valign="top" class="form_definitions"><? echo $tempCountry; ?></td>
	</tr>  

	<tr class="tablebg">

	  <td width="50%" align="right" valign="top" class="small_title">State: </td>

	<td width="50%" align="left" valign="top" class="form_definitions"><? echo $tempState; ?></td>
	</tr>  

	<tr class="tablebg">

	  <td width="50%" align="right" valign="top" class="small_title">City: </td>

	<td width="50%" align="left" valign="top" class="form_definitions"><? echo $tempCity; ?></td>
	</tr>  

	<tr class="tablebg">

	  <td width="50%" align="right" valign="top" class="small_title">Adress: </td>

	<td width="50%" align="left" valign="top" class="form_definitions"><? echo $tempAdress; ?></td>
	</tr>

	<tr class="tablebg">

	  <td width="50%" align="right" valign="top" class="small_title">Zip Code: </td>

	<td width="50%" align="left" valign="top" class="form_definitions"><? echo $tempZip; ?></td>
	</tr>

	<tr class="tablebg">

      <td width="50%" align="right" class="small_title">Phone: </td>

      <td width="50%" class="form_definitions"><? echo $tempPhone; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" class="small_title">Birth Place: </td>

      <td width="50%" class="form_definitions"><? echo $tempBirth; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" class="small_title">SSN (USA only): </td>

      <td width="50%" class="form_definitions"><? echo $tempSs; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" class="small_title">Yahoo: </td>

      <td width="50%" class="form_definitions"><? echo $tempYahoo; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" class="small_title">Msn: </td>

      <td width="50%" class="form_definitions"><? echo $tempMsn; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" class="small_title">Icq: </td>

      <td width="50%" class="form_definitions"><? echo $tempIcq; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Fax: </td>

      <td width="50%" align="left" valign="top" class="form_definitions"><? echo $tempFax; ?></td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">&nbsp;</td>

      <td width="50%" align="left" valign="top" class="form_definitions">&nbsp;</td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" valign="top" class="small_title">Birth Date: </td>

      <td width="50%" align="left" valign="top" class="form_definitions">

	  <? 

	  echo date("d F Y",$tBirthD)." / "; 

	  echo date('Y',time()-$tBirthD)-1970;echo " years old";

	  ?>

	  </td>
      </tr>

	<tr class="tablebg">

      <td width="50%" align="right" class="small_title">&nbsp;</td>

      <td width="50%" align="left" class="form_definitions">&nbsp;</td>
      </tr>  
	</table>	</td>

  </tr>
</table>

<br>

<?
include("_sop.footer.php");
?>