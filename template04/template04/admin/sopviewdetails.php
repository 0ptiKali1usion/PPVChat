<?
include("_header-admin.php")
?>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333">
  <tr>
    <td bgcolor="#FFFFFF"><?
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		
	include('../dbase.php');
	
	
	$result = mysql_query("SELECT * FROM chatoperators WHERE id='$_GET[id]' LIMIT 1");
		while($row = mysql_fetch_array($result)) 
		{
		$username=$row["user"];
		$tempUser=$row["user"];
		$tempEmail=$row["email"];
		$tBirthD=$row["birthDate"];
		$status=$row['status'];
		$tempName = $row["name"];
	
			$result3=mysql_query("SELECT name FROM countries WHERE id='$row[country]' LIMIT 1");
			while($row3 = mysql_fetch_array($result3)) {
			$tempCountry=$row3[name];
			}
		
		$tempState=$row["state"];
		$tempZip = $row["zip"];
		$tempPhone = $row["phone"];
		$tempCity=$row["city"];
		$tempAdress = $row["adress"];
		$rawdate=$row["dateRegistered"];
		$date=date("d F Y, H:i",$rawdate);
		
		$tMoneyE=$row["moneyEarned"];
		$tMoneyS=$row["moneySent"];
		
		$tPMethod=$row["pMethod"];
		$tPInfo=$row["pInfo"];
		$tCompany=$row['company'];
		$tIdtax=$row['idtax'];

		}
	?>
      <table width="600" height="102" align="center" class="form_definitions">
      <tr>
        <td width="288" valign="bottom"><strong class="big_title">Details for <? echo $tempName ?><br>
          <span class="a_small_title">Status:<? echo $status;?></span>        </strong></td>
        <td width="300" valign="bottom"><table width="300" height="96"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <form name="form1" method="post" action="deleteaccount.php">
              <td height="30">
                <input type="submit" name="Submit2" value="Delete Account">
                <input name="id" type="hidden" id="id5" value="<? echo $_GET['id']; ?>">
                <input name="type" type="hidden" id="type4" value="sop">
                <input name="username" type="hidden" id="type5" value="<? echo $tempUser; ?>">
                <input name="date" type="hidden" id="date" value="<? echo $date; ?>">
</td>
            </form>
          </tr>
          <tr>
<? if($status!='blocked'){ 
	echo ' <form name="form2" method="post" action="blockaccount.php">';
} else {
	echo ' <form name="form2" method="post" action="activateaccount.php">';
}
?> 
			 
                <td height="30">
                  <input type="submit" name="Submit22" value="<? if($status!='blocked'){echo 'Block Account';} else {echo 'Activate Account';}?> ">
                  <input name="id" type="hidden" id="id35" value="<? echo $_GET['id']; ?>">
				  <input name="type" type="hidden" id="type" value="sop">
				  <input name="username" type="hidden" id="username" value="<? echo $tempUser; ?>">
				  <input name="date" type="hidden" id="date" value="<? echo $date; ?>">
</td>
            </form>
          </tr>
          <tr>
            <form name="form3" method="post" action="sendemail.php">
              <td height="33">
                <input type="submit" name="Submit222" value="Send Email">
                <input name="id" type="hidden" id="id45" value="<? echo $_GET['id']; ?>">
                <input name="type" type="hidden" id="type2" value="sop">
                <input name="username" type="hidden" id="username4" value="<? echo $tempUser; ?>">
                <input name="email" type="hidden" id="date4" value="<? echo $tempEmail; ?>"></td>
            </form>
          </tr>
        </table></td>
      </tr>
    </table>
	<table width="600" align="center" class="form_definitions">
	<tr>
	  <td width="201">User Name </td>
	<td width="349"><? echo $tempUser; ?></td>
	</tr>
	<tr>
	  <td>Email</td>
	<td><? echo $tempEmail; ?></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  </tr>  
	<tr>
	  <td>Full Name </td>
	<td><? echo $tempName; ?></td>
	</tr>
	<tr>
	  <td>Country</td>
	<td><? echo $tempCountry; ?></td>
	</tr>  
	<tr>
	  <td>State</td>
	<td><? echo $tempState; ?></td>
	</tr>  
	<tr>
	  <td>City</td>
	<td><? echo $tempCity; ?></td>
	</tr>  
	<tr>
	  <td>Adress</td>
	<td><? echo $tempAdress; ?></td>
	</tr>
	<tr><td>Zip Code</td>
	<td><? echo $tempZip; ?></td>
	</tr>
	<tr>
	  <td>Phone</td>
	  <td><? echo $tempPhone; ?></td>
	  </tr>
	<tr>
      <td>Date Registered </td>
      <td><? echo $date; ?></td>
      </tr>
	<tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
	<tr>
      <td>Company</td>
      <td><? echo $tCompany; ?></td>
      </tr>
	<tr>
      <td>Id Tax Number </td>
      <td><? echo $tIdtax; ?></td>
      </tr>
	<tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
	<tr>
      <td>Payment Method</td>
      <td><? echo $tPMethod; ?></td>
      </tr>
	<tr>
      <td>Payment Details </td>
      <td><? echo $tPInfo; ?></td>
      </tr>  
	</table>  
	<span class="error">
	<?
  
  //minimum payment
	$result = mysql_query("SELECT minimum FROM chatoperators WHERE id='".$_GET['id']."' LIMIT 1");
	while($row = mysql_fetch_array($result)) 
	{ $tempMinimum=$row["minimum"];}
	
	//epercentage
	$result = mysql_query("SELECT epercentage FROM chatoperators WHERE id='".$_GET['id']."' LIMIT 1");
	while($row = mysql_fetch_array($result)) 
		{$tempEPercentage=$row[epercentage];}
  
	$tempMinutesPv=0;
	$tempSecondsPv=0;
	$tempMoneyEarned=0;
	//select t1.name, t2.salary from employee AS t1, info AS t2 where t1.name = t2.name; 
	$tempMoneySent=0;
	
 	$result = mysql_query("SELECT t1.* , t2.user FROM videosessions AS t1, chatmodels AS t2 WHERE t1.model=t2.user  AND t2.owner='$username'");
	while($row = mysql_fetch_array($result)) 
		{
		$member=$row[member];
		$duration=$row[duration];
		$cpm=$row[cpm];
	
		if (($duration/60)<round($duration/60))
			{
			$tempMinutesPv+=round($duration/60)-1;
			} else {
			$tempMinutesPv+=$duration/60;
			}
		$tempSecondsPv+=$duration % 60;
		
		$ammount=(($duration/60)*$cpm)*$tempEPercentage/10000 ;
		$tempMoneyEarned+=$ammount;
		if ($row[paid]=="1"){ $tempMoneySent+=$ammount;}
		}
		
			if (isset($msgError) && $msgError!="")
			{
			echo $msgError;
			}
			?>
	</span><br>
	<table width="600"  border="0" align="center" cellpadding="2" cellspacing="1">
      <tr>
        <td colspan="2" align="left" valign="top"><p class="form_definitions"> He is currently earning <? echo $tempEPercentage;?>% of his models sales. <br>
            </p>
          </strong></td>
      </tr>
      <tr class="form_definitions">
        <td width="50%" height="71" align="left" valign="top">Earnings:<? echo $tempMoneyEarned; ?> $<br>
      Payed so far:<? echo $tempMoneySent; ?><br>
      <b> Total in his money account: <? echo ($tempMoneyEarned-$tempMoneySent) ;?> $</b></td>
        <td width="50%" height="71" align="left" valign="top">
          <p> Total Models Time in Private Chat: <? echo $tempMinutesPv.":".$tempSecondsPv ; ?> (minutes:seconds)</p></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="top"><form name="form1" method="post" action="payments.php">
        Minimum payment sum:
            <select name="paymentSum" id="paymentSum">
              <option value="100"  <? if ($tempMinimum=="100"){echo "selected";}?>>100</option>
              <option value="250"  <? if ($tempMinimum=="250"){echo "selected";}?>>250</option>
              <option value="500"  <? if ($tempMinimum=="500"){echo "selected";}?>>500</option>
              <option value="1000"  <? if ($tempMinimum=="1000"){echo "selected";}?>>1000</option>
              <option value="2500"  <? if ($tempMinimum=="2500"){echo "selected";}?>>2500</option>
              <option value="5000"  <? if ($tempMinimum=="5000"){echo "selected";}?>>5000</option>
            </select>
        (Us Dollars)
        <input type="submit" name="Submit" value="Change Minimum Sum">
        </form></td>
      </tr>
    </table>	<br>	</td>
  </tr>
</table>
<?
include("_footer-admin.php")
?>

