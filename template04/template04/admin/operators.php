<?
include("_header-admin.php")
?>
<?
$tempMinutesPv=0;
$tempSecondsPv=0;
$tempMoneyEarned=0;
$tempMoneySent=0;
$sitemoney=0;
include ("../dbase.php");
include ("../settings.php");
  	//epercentage
	$result = mysql_query("SELECT epercentage,user FROM chatoperators");
	while($row = mysql_fetch_array($result)) 
	{
	$tempEPercentage=$row['epercentage'];
	$username=$row['user'];
  	
 	$result = mysql_query("SELECT t1.* , t2.user FROM videosessions AS t1, chatmodels AS t2 WHERE t1.model=t2.user  AND t2.owner='$username'");
	while($row2 = mysql_fetch_array($result)) 
		{
		$member=$row2['member'];
		$duration=$row2['duration'];
		$cpm=$row2['cpm'];
		
		$ammount=(($duration/60)*$cpm)*$tempEPercentage/10000 ;
		$ammount2=(($duration/60)*$cpm)*60/10000 ;
		$tempMoneyEarned+=$ammount;
		$sitemoney+=$ammount2;

		if ($row[paid]=="1"){ $tempMoneySent+=$ammount;}
		}
		
}
?>
<table width="720" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#333333">
  <tr>
    <td bgcolor="#FFFFFF" class="small_title"><p class="message"><strong>Money SOPs earned so far:<? echo $tempMoneyEarned;?>$<br>
        The site earned from SOP's models:<? echo $sitemoney; ?> <br>
        Money in SOP accounts (not yet paid):<? echo $tempMoneyEarned-$tempMoneySent ?>$ (separate from site earning)<br>
        </strong></p></td>
  </tr>
</table>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333">
  <tr>
    <td bgcolor="#FFFFFF">
	<table width="700"  bgcolor="#cccccc" border="0" align="center" cellpadding="1" cellspacing="1">
	<?php
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		
	include('../dbase.php');
	
	
	$result = mysql_query("SELECT * FROM chatoperators");
	while($row = mysql_fetch_array($result)) 
	{	
	$result3=mysql_query("SELECT name FROM countries WHERE id='$row[country]' LIMIT 1");
			while($row3 = mysql_fetch_array($result3)) {
			$tempCountry=$row3[name];
			}
		
		if ($color=="#eeeeee"){
			$color="#dddddd";
			}else{ $color="#eeeeee";}
			
		echo'<tr bgcolor="'.$color.'" class="form_definitions"><td align="center"><b>'.$row[user].'</b></td><td>'.$row[name].' from '.$tempCountry.'</td><td>'.$row[email].'</td><td align="center"><a href="sopviewdetails.php?id='.$row[id].'">View Details</a></td></tr>';	

	}
	?><br>

	
      </table>
<br>
	</td>
  </tr>
</table>
<?
include("_footer-admin.php")
?>
