<?
include("_header-admin.php")
?>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333">
  <tr>
    <td bgcolor="#FFFFFF"><br>
	<?
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		
	include('../dbase.php');
	
	

	
		$result2 = mysql_query("SELECT * FROM chatmodels WHERE status='pending'");
		while($row2 = mysql_fetch_array($result2)) 
		{
			$tempCity=$row2[city];
			$result3=mysql_query("SELECT name FROM countries WHERE id='$row2[country]' LIMIT 1");
			while($row3 = mysql_fetch_array($result3)) {
			$sName=$row3[name];
			}
		if ($color=="#eeeeee"){
			$color="#dddddd";
			}else{ $color="#eeeeee";}
			
		echo'<table width="700" bgcolor="#dddddd" border="0" align="center" cellpadding="0" cellspacing="1"><tr bgcolor="'.$color.'" class="form_definitions"><td align="middle"><b>'.$row2[user].'</b></td><td>'.$row2[name].' from '.$tempCity.','.$sName.'</td><td>'; 
		if ($row2[owner]!="none"){
		echo "Studio: ".$row2[owner];
		}else {
		echo "Private person";
		}
		echo'</td><td>'.$row2[cpm]/100 .' $/min</td><td><a href="subscriptionviewdetails.php?id='.$row2[id].'">View Details</a></td></tr></table>';	
		}
	?>
	<br>
	</td>
  </tr>
</table>
<?
include("_footer-admin.php")
?>
