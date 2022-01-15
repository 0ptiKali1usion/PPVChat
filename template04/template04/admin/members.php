<?
include("_header-admin.php")
?>
<?
$money=0;
include ("../dbase.php");
include ("../settings.php");
$result=mysql_query("Select money from chatusers");
while($row = mysql_fetch_array($result)) 
		{
		$money+=$row['money'];
		}
?>
<table width="720" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#333333">
  <tr>
    <td bgcolor="#FFFFFF" class="small_title"><p class="message"><strong>Money in members accounts:<?echo $money/100; ?> $ </strong></p></td>
  </tr>
</table>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333">
  <tr>
    <td bgcolor="#FFFFFF">
	<br>
	<table width="700"  bgcolor="#cccccc" border="0" align="center" cellpadding="1" cellspacing="1">
	<?php
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		
	include('../dbase.php');
	
	
	$result = mysql_query("SELECT * FROM chatusers");
	while($row = mysql_fetch_array($result)) 
	{	
		$result3=mysql_query("SELECT name FROM countries WHERE id='$row[country]' LIMIT 1");
			while($row3 = mysql_fetch_array($result3)) {
			$tempCountry=$row3[name];
			}
		if ($color=="#eeeeee"){
			$color="#dddddd";
			}else{ $color="#eeeeee";}
			
		echo'<tr bgcolor="'.$color.'" class="form_definitions"><td align="center"><b>'.$row[user].'</b></td><td>'.$row[name].' from '.$tempCountry.'</td><td>'.$row[email].'</td><td align="center"><a href="memberviewdetails.php?id='.$row[id].'">View Details</a></td></tr>';	

	}
	?>

	
      </table>
<br>
	</td>
  </tr>
</table>
<?
include("_footer-admin.php")
?>
