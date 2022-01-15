<?
include("_main.header.php");
?>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td width="294" height="24" align="center" class="form_definitions"><div align="left"><a href="index.php" class="left">All Models</a> | <a href="index.php?category=girls" class="left">Girls</a> | <a href="index.php?category=boys" class="left">Boys</a> </div></td>

    <td width="426" align="center" class="form_definitions"><div align="right"><span class="model_title_small">Online Models in this category<span style="">:</span></span><span class="model_title_small" style="font-weight: bold">
      <? 

		  $nTime=time(); 

		  

		  //we set the status to offline to models that have not changed theyr status for 30 seconds

		  mysql_query("UPDATE chatmodels SET status='offline' WHERE $nTime-lastupdate>30 AND status!='rejected' AND status!='blocked' AND status!='pending'");

		  

		  if (!isset($_GET['category']))

			{

			$select="SELECT * FROM chatmodels WHERE status='online'";//100hours

			} else{

			$select="SELECT * FROM chatmodels WHERE category='$_GET[category]' AND status='online'";

			}

		  	$result = mysql_query($select);

			$nOnline=mysql_num_rows($result);

			mysql_free_result($result);

			

			if (!isset($_GET['category']))

			{

			$select="SELECT * FROM chatmodels WHERE status!='pending' AND status!='rejected'";

			} else{

			$select="SELECT * FROM chatmodels WHERE category='$_GET[category]' AND  status!='pending' AND status!='rejected'";

			}

			$result = mysql_query($select);

			$nTotal=mysql_num_rows($result);

			mysql_free_result($result);

			

		  echo $nOnline;

		  ?>
    </span><span class="model_title_small">/ Total Models in this category:<span style="font-weight: bold"> <? echo $nTotal;?> &nbsp;</span></span></div></td>
  </tr>

  <tr>

    <td colspan="2" align="center">&nbsp;</td>

  </tr>

</table>

<br>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><img src="images/online_models.gif" width="158" height="24"></td>

  </tr>

</table>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center" valign="top"><?php echo '<table width="720" border="0" align="center" cellpadding="0" cellspacing="1">';



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

				if ($count==1) {echo' <tr>';}

				echo '<td width="180" height="180" align="center" valign="middle" background="images/modelbox.gif">';

  				echo '<table width="180" height="180" border="0" cellpadding="2" cellspacing="1">';
				
	 			echo '<tr>';

		 			echo '<td height=10 align="left" valign="top"><span class="modelbox_title">&nbsp&nbsp&nbsp&nbsp&nbsp'.$username .' ('.$nYears.')</span></td>';

				echo '</tr><tr>';

	 			echo '<tr>';

		 			echo '<td height=80 align="center" valign="middle"><a href="liveshow.php?model='.$username.'"><img src="models/'.$username.'/thumbnail.jpg" width="140" height="105" border="0"></a></td>';

				echo '</tr><tr>';

		      	    echo '<td height=26 align="left" valign="top">';

		        	echo '<span class="model_title_small">';

				echo '&nbsp&nbsp&nbsp&nbspSpeaks: '.$languagestring.'</span><br>';

		        	echo '<span class="model_message">&nbsp&nbsp&nbsp&nbsp&nbsp'.$tempMessage.'</span></td>';

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

 			?>

	</td>

  </tr>

</table>

<br>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><img src="images/offline_models.gif" width="158" height="24"></td>

  </tr>

</table>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center" valign="top">	<?php echo '<table width="720" border="0" align="center" cellpadding="0" cellspacing="1">';

			include("dbase.php");

include("settings.php");

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

				if ($count==1) {echo' <tr>';}

				echo '<td width="180" height="180" align="center" valign="middle" background="images/modelbox.gif">';

  				echo '<table width="180" height="180" border="0" cellpadding="2" cellspacing="1">';
				
	 			echo '<tr>';

		 			echo '<td height=10 align="left" valign="top"><span class="modelbox_title">&nbsp&nbsp&nbsp&nbsp&nbsp'.$username .' ('.$nYears.')</span></td>';

				echo '</tr><tr>';

	 			echo '<tr>';

		 			echo '<td height=80 align="center" valign="middle"><img src="models/'.$username.'/thumbnail.jpg" width="140" height="105" border="0"></td>';

				echo '</tr><tr>';

		      	    echo '<td height=26 align="left" valign="top">';

		        	echo '<span class="model_title_small">';

				echo '&nbsp&nbsp&nbsp&nbspSpeaks: '.$languagestring.'</span><br>';

		        	echo '<span class="model_message">&nbsp&nbsp&nbsp&nbsp&nbsp'.$tempMessage.'</span></td>';

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

<br>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td width="400">&nbsp;</td>

    <td width="320" rowspan="2" align="right"><? if (isset($_COOKIE["usertype"])){

	

	echo '<a href="cp/'.$_COOKIE["usertype"].'/index.php"><img src="images/member_area.gif" border="0" ></a>';

	

	

	echo '<a href="logout.php"><img src="images/logout.gif" border="0" ></a>';

	} else {

	echo '<a href="login.php"><img src="images/login.gif" border="0"></a>';

	}?></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

  </tr>

</table>

<br>

<?
include("_main.footer.php");
?>

