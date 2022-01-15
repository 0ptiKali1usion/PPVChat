<?
include("_header-admin.php")
?>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#eeeeee">
  <tr>
    <td bgcolor="#FFFFFF"><br>
	<?
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		
	include('../dbase.php');
	
	
	$result = mysql_query("SELECT * FROM chatmodels WHERE id='$_GET[id]' LIMIT 1");
		while($row = mysql_fetch_array($result)) 
		{
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
		$tOwner=$row["owner"];
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
		$tempFax=$row[fax];	


		}
	?>
	
	<table width="600" align="center">
      <tr>
        <td width="96" height="96" align="center" valign="middle"><img height="96" width="96" src="../models/<? echo $tempUser."/thumbnail.jpg" ?>"></td>
        <td width="496" valign="bottom" class="form_definitions"><strong>Details for <? echo $tempName ?> </strong></td>
      </tr>
    </table>
	<br>
	<table width="600" align="center" class="form_definitions">
	<tr>
	  <td width="201"><strong>User Name </strong></td>
	<td width="283"><strong><? echo $tempUser; ?></strong></td>
	<td width="100">&nbsp;</td>
	</tr>
	<tr>
	  <td>Email</td>
	<td><? echo $tempEmail; ?></td>
	<td >&nbsp;</td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  </tr>
	<tr>
	  <td>Language1</td>
	  <td><? echo $tL1; ?></td>
	  <td>&nbsp;</td>
	  </tr>
	<tr>
	  <td>Language2</td>
	  <td><? echo $tL2; ?></td>
	  <td>&nbsp;</td>
	  </tr>
	<tr>
      <td align="left" valign="top" class="form_definitions">Language3</td>
      <td align="left" valign="top" class="form_definitions"><? echo $tL3; ?></td>
      <td>&nbsp;</td>
	  </tr>
	<tr>
      <td align="left" valign="top" class="form_definitions">Language4</td>
      <td align="left" valign="top" class="form_definitions"><? echo $tL4; ?></td>
      <td>&nbsp;</td>
	  </tr>  
	<tr><td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>  
	<tr>
	  <td>Full Name </td>
	<td><? echo $tempName; ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	  <td>Country</td>
	<td><? echo $tempCountry; ?></td>
	<td>&nbsp;</td>
	</tr>  
	<tr>
	  <td>State</td>
	<td><? echo $tempState; ?></td>
	<td>&nbsp;</td>
	</tr>  
	<tr>
	  <td>City</td>
	<td><? echo $tempCity; ?></td>
	<td>&nbsp;</td>
	</tr>  
	<tr>
	  <td>Adress</td>
	<td><? echo $tempAdress; ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr><td>Zip Code</td>
	<td><? echo $tempZip; ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	  <td>Phone</td>
	  <td><? echo $tempPhone; ?></td>
	  <td>&nbsp;</td>
	  </tr>
	<tr>
	  <td>Birth Place </td>
	  <td><? echo $tempBirth; ?></td>
	  <td>&nbsp;</td>
	  </tr>
	<tr>
      <td>Social Security number(USA only) </td>
      <td><? echo $tempSs; ?></td>
      <td>&nbsp;</td>
	  </tr>
	<tr>
      <td>Yahoo</td>
      <td><? echo $tempYahoo; ?></td>
      <td>&nbsp;</td>
	  </tr>
	<tr>
      <td>Msn</td>
      <td><? echo $tempMsn; ?></td>
      <td>&nbsp;</td>
	  </tr>
	<tr>
	  <td>Icq</td>
	  <td><? echo $tempIcq; ?></td>
	  <td>&nbsp;</td>
	  </tr>
	<tr>
      <td>Fax</td>
      <td><? echo $tempFax; ?></td>
      <td>&nbsp;</td>
	  </tr>
	<tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
	  </tr>
	<tr>
      <td>Birth Date </td>
      <td>        <? 
	  echo date("d F Y",$tBirthD)."<br>"; 
	  echo date('Y',time()-$tBirthD)-1970;echo " years.";
	  ?>
	  </td>
      <td>&nbsp;</td>
	  </tr>
	<tr>
	  <td>Studio:</td>
	  <td><?
	  if ($tOwner!="none"){
		echo $tOwner;
		}else {
		echo "Private person";
		}
		?></td>
	  <td>&nbsp;</td>
	  </tr>  
	</table>
	<table width="600" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#F0F0F0" class="form_definitions">
      <tr bgcolor="#FFFFFF">
        <td width="300"><strong>Accept Submission </strong></td>
        <td width="290"><strong>Reject Submission </strong></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td><form name="form1" method="post" action="acceptsubmission.php">
            <p>Earning percentage (e.g: 30 or 40)<br>
                <input name="epc" type="text" id="epc" value="50" size="2" maxlength="2">
                %<br>
                Cost Per minute<br>
                <input name="cpm" type="text" id="cpm" value="295" size="3" maxlength="3">
                cents<br>
                <br>
                <input type="submit" name="Submit" value="Accept Submission">
                <input name="id" type="hidden" id="id4" value="<? echo $_GET[id]; ?>">
                <input name="username" type="hidden" id="username3" value="<? echo $tempUser; ?>">
                <input name="email" type="hidden" id="username" value="<? echo $tempEmail; ?>">
                <input name="studio" type="hidden" id="email2" value="<? echo  $tOwner; ?>">
              </p>
            </form></td>
        <td>Reason:
          <form name="form1" method="post" action="rejectsubmission.php">
            <textarea name="Reason" cols="32" rows="4" id="textarea"></textarea>
            <br>
            <input type="submit" name="Submit2" value="Reject Submission">
            <input name="id2" type="hidden" id="id22" value="<? echo $_GET[id]; ?>">
            <input name="username2" type="hidden" id="username22" value="<? echo $tempUser; ?>">
            <input name="email2" type="hidden" id="email" value="<? echo $tempEmail; ?>">
            <input name="studio2" type="hidden" id="studio" value="<? echo  $tOwner; ?>">
        </form></td>
      </tr>
    </table>
	<table width="600" align="center" class="form_definitions">
      <tr>
        <td><strong>Attached Identity Act Picture (<? echo $tempIdtype; ?>)<br>
          Number: <span class="form_definitions"><? echo $tempIdnumber; ?> </span><br>
          Released: <span class="form_definitions"><? echo $tempIdmonth."".$tempIdyear; ?></span></strong></td>
        </tr>
      <tr>
        <td><img src="../models/<? echo $tempUser."/".$_GET[id].".jpg";  ?>"></td>
      </tr>
    </table>	
    <table width="600" align="center" class="form_definitions">
      <tr>
        <td><strong>Attached Representative Picture </strong></td>
      </tr>
      <tr>
        <td><img src="../models/<? echo $tempUser."/representative.jpg";  ?>"></td>
      </tr>
    </table>    <br>	</td>
  </tr>
</table>
<?
include("_footer-admin.php")
?>