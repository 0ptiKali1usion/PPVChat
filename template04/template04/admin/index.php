<?
include("_header-admin.php")
?>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td bgcolor="#f7f7f7">
      <?
$nTime=time();
$onlinemodels=0;
$onlinemembers=0;
include('../dbase.php');
include('../settings.php');
mysql_query("UPDATE chatmodels SET status='offline' WHERE $nTime-lastupdate>30 AND status!='rejected' AND status!='blocked' AND status!='pending'");  
$result=mysql_query("SELECT onlinemembers FROM chatmodels WHERE status='online'");
while($row = mysql_fetch_array($result)) 
	{
	$onlinemembers+=$row['onlinemembers'];
	}
$onlinemodels=mysql_num_rows($result);
?>
      <table width="704"  border="0" align="center">
        <tr>
          <td class="big_title"><div align="left">
              <p>Broadcasting models: <? echo $onlinemodels;?><br>
                Members in chat rooms: <? echo $onlinemembers;?> <br>
              </p>
          </div></td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../graphics/onlinemodels.gif" width="120" height="28"></td>
  </tr>
</table>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><img src="../graphics/space.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td align="center" valign="top"><?php echo '<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#cccccc">';

		    $count=0;
			$nTime=time();
			
			
			if (!isset($_GET['category']))
			{
			$select="SELECT * FROM chatmodels WHERE status='online'";//100hours
			} else{
			$select="SELECT * FROM chatmodels WHERE category='$_GET[category]' AND status='online'";
			}
						
			
			$result = mysql_query($select);
			while($row = mysql_fetch_array($result)) 
				{			
				
				$tBirthD=$row[birthDate];
				$nYears=date('Y',time()-$tBirthD)-1970;
					
				$username=$row[user];
				$tempMessage=$row[message];
				$tempCity=$row[city];
				$tempPlace=$row[broadcastplace];
				$tempL1=$row[language1];
				$tempL2=$row[language2];	
				$tempL3=$row[language3];	
				$tempL4=$row[language4];	

					
				$languagestring=$tempL1;
				if (strtolower($tempL2)!="none"){
				$languagestring.= ", ".$tempL2;
				}
				if (strtolower($tempL3)!="none"){
				$languagestring.= ", ".$tempL3;
				}
				if (strtolower($tempL4)!="none"){
				$languagestring.= ", ".$tempL4;
				}
			
				$count++;
				if ($count==1) {echo' <tr bgcolor="#FFFFFF">';}
				echo '<td width="180" height="180" align="center" valign="middle">';
  				echo '<table width="180" height="180" border="0" cellpadding="2" cellspacing="1">';
	 			echo '<tr bgcolor="#f2f2f2">';
				echo '<td align="center" valign="middle"><a href="viewshow.php?model='.$username.'" target="_blank"><img src="../models/'.$username.'/thumbnail.jpg" width="140" height="105" border="0"></a></td>';			
				echo '</tr><tr bgcolor="#f2f2f2">';
		      	echo '<td align="left" valign="top">';
		     	echo '<span class="model_title">'.$username.'</span>';
		        echo '<span class="model_title_small">, '.$nYears.' years from '.$tempPlace.', speaks: '.$languagestring.'</span><br>';
		        echo '<span class="model_message">'.$tempMessage.'</span></td>';
				echo '</tr></table>';
				echo '  </td>';
				if ($count==4){ echo"</tr>"; $count=0;}
				}
			

			if ($count==1){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			} else if ($count==2){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			} else if ($count==3){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			}
			
			mysql_free_result($result);
			echo'</table>';
 			?> </td>
  </tr>
</table>
<br>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../graphics/offlinemodels.gif" width="120" height="28"></td>
  </tr>
</table>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><img src="../graphics/space.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td align="center" valign="top"><?php echo '<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#cccccc">';
		    $count=0;
			$nTime=time();
			if (!isset($_GET['category']))
			{
			$select="SELECT * FROM chatmodels WHERE status='offline'";
			} else{
			$select="SELECT * FROM chatmodels WHERE category='$_GET[category]' AND status='offline'";
			}

			$result = mysql_query($select);
			while($row = mysql_fetch_array($result)) 
				{			
				$tBirthD=$row['birthDate'];
				$nYears=date('Y',time()-$tBirthD)-1970;
					
				$tempMessage=$row['message'];
				$username=$row['user'];
				$tempCity=$row['city'];
				$tempPlace=$row['broadcastplace'];
				$tempL1=$row['language1'];
				$tempL2=$row['language2'];	
				$tempL3=$row['language3'];	
				$tempL4=$row['language4'];	
						
				$languagestring=$tempL1;
				if (strtolower($tempL2)!="none"){
				$languagestring.= ", ".$tempL2;
				}
				if (strtolower($tempL3)!="none"){
				$languagestring.= ", ".$tempL3;
				}
				if (strtolower($tempL4)!="none"){
				$languagestring.= ", ".$tempL4;
				}
				$count++;
				if ($count==1) {echo' <tr bgcolor="#FFFFFF">';}
				echo '<td width="180" height="180" align="center" valign="middle">';
  				echo '<table width="180" height="180" border="0" cellpadding="2" cellspacing="1">';
	 			echo '<tr bgcolor="#f2f2f2">';
		 		echo '<td align="center" valign="middle"><a href="viewshow.php?model='.$username.'" target="_blank"><img src="../models/'.$username.'/thumbnail.jpg" width="140" height="105" border="0"></a></td>';
				echo '</tr><tr bgcolor="#f2f2f2">';
		      	echo '<td align="left" valign="top">';
		     	echo '<span class="model_title">'.$username .'</span>';
		        echo '<span class="model_title_small">, '.$nYears.' years from '.$tempPlace.', speaks: '.$languagestring.'</span><br>';
		        echo '<span class="model_message">'.$tempMessage.'</span></td>';
				echo '</tr></table>';
				echo '  </td>';
				if ($count==4){ echo"</tr>"; $count=0;}
				}
			

			if ($count==1){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			} else if ($count==2){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			} else if ($count==3){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			}
			
			mysql_free_result($result);
			echo'</table>';
 			?></td>
  </tr>
</table>
<p><br>
  <?
	$nTotal=0;
	$nThisMonth=0;
	$nPending=0;
	$nBoys=0;
	$nLesbian=0;
	$nCouple=0;
	$nGirls=0;
	$nTransgender=0;
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		

	
	$result = mysql_query("SELECT dateRegistered FROM chatmodels"); 
	while($row = mysql_fetch_array($result)) 
	{
	if (date( "m",$row['dateRegistered'])==date("m")){
	$nThisMonth++;	
	}
	}
	
	
	
	$result = mysql_query("SELECT * FROM chatmodels");
	while($row = mysql_fetch_array($result)) 
	{	
	if ($row['status']=="pending")
	{
	$nPending++;
	} else
	if ($row['status']!="pending" && $row['status']!="rejected")
	{
	$nTotal++;
	}
	
	switch ($row[category])
	{
	case "girls":
  		if ($row['status']!="pending") $nGirls++;
  		break;  
	case "boys":
		if ($row['status']!="pending") $nBoys++;
		break;
  	case "lesbian":
		if ($row['status']!="pending") $nLesbian++;
		break;
	case "couple":
		if ($row['status']!="pending") $nCouple++;
		break;
	case "transgender":
		if ($row['status']!="pending") $nTransgender++;
		break;
	}	
	
	}
	?>
</p>
<table width="720"  border="0" align="center" cellpadding="2" cellspacing="1">
  <tr>
    <td align="left" valign="top"><p class="form_definitions"><strong>General Info</strong> </p></td>
  </tr>
  <tr class="form_definitions">
    <td height="120" align="left" valign="top">Total Registered Models:<? echo $nTotal; ?><br>
  Models waiting for confirmation: <? echo $nPending; ?><br>
      Boys:<? echo $nBoys; ?><br>
	Couple:<? echo $nBoys; ?><br>
	Transgender: <? echo $nTransgender; ?> </td>
  </tr>
</table>

<?
include("_footer-admin.php")
?>