<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatusers" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

$result=mysql_query("SELECT user from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{	$username=$row[user];	}

}



$temail="";

$tsms="";



if ( $_POST[hiddenField]=="yes" &&$_POST[email]=="true"){

	mysql_query("UPDATE chatusers SET emailnotify='1' WHERE user='$username'");

	$temail="1";

} else if ($_POST[hiddenField]=="yes" &&$_POST[email]==""){

	mysql_query("UPDATE chatusers SET emailnotify='0' WHERE user='$username'");

	$temail="0";

	}







if ( $_POST[hiddenField]=="yes" && $_POST[sms]=="true"){

	mysql_query("UPDATE chatusers SET smsnotify='1' WHERE user='$username'");

	$tsms="1";

	} else if ($_POST[hiddenField]=="yes" && $_POST[sms]=="") {

	mysql_query("UPDATE chatusers SET smsnotify='0' WHERE user='$username'");

	$tsms="0";

	}



if ($temail==""){

	$result=mysql_query("SELECT emailnotify from chatusers WHERE user='$username' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{

	$temail=$row[emailnotify];

	}

}



if ($tsms==""){

	$result=mysql_query("SELECT smsnotify from chatusers WHERE user='$username' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{

	$tsms=$row[smsnotify];

	}



}



if (isset($_GET[remove]) && $_GET[remove]!=""){

mysql_query("DELETE from favorites WHERE model='$_GET[remove]' AND member='$username' LIMIT 1");

}





?>
<?
include("_members.header.php");
?>


<br>
<table width="720" border="0" align="center" cellpadding="8" cellspacing="1" class="tableborder">

  <tr>

    <td class="barbg">      <form name="form1" method="post" action="favorites.php">
        <span class="error">

      <?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?>
      <br>
        </span><span class="small_title">Notify me when one of my models goes online.</span><br>

          <span class="form_definitions">
        <input name="email" type="checkbox" id="email" value="true" <? if ($temail==1){echo "checked";} ?>> 

        E-mail

         

        <input name="sms" type="checkbox" id="sms" value="true" <? if ($tsms==1){echo "checked";} ?>> 

SMS (0.08 $ per message)</span><br> 

<input type="submit" name="Submit" value="Save Changes">

<input name="hiddenField" type="hidden" value="yes">


    </form></td>

  </tr>
</table>

<br>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><img src="../../images/online_models.gif" width="158" height="24"></td>

  </tr>

</table>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0" class="form_definitions">

  <tr>

    <td align="center" valign="top">

	

	<?php echo '<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#eeeeee">';



		    $count=0;

			$nTime=time();

			include("../../dbase.php");

			//we set the status to offline to models that have not changed theyr status for 30 seconds

			  mysql_query("UPDATE chatmodels SET status='offline' WHERE $nTime-lastupdate>30 AND status!='rejected' AND ststus!='blocked' AND status!='pending'");

		  

			

			$result = mysql_query("SELECT t1.*, t2.* FROM favorites AS t1,chatmodels AS t2 WHERE t1.member='$username' AND t2.user=t1.model AND t2.status!='pending' AND t2.status!='offline' AND t2.status!='rejected'"  );					

			if (mysql_num_rows($result)==0){

			echo'<table width="600" border="0" cellspacing="0" cellpadding="0"><tr><td><br><p class="message"><strong>None of your favorites (if you have any) are online</strong>. You can select the options above to be notified when they go online. To add a model to your favorites, while viewing their show in the flash interface press the "Add to Favorites" button.</p></td></tr></table>';

			}

			while($row = mysql_fetch_array($result)) 

				{

				$tBirthD=$row[birthDate];

				$nYears=date('Y',time()-$tBirthD)-1970;

				$tempMessage=$row[message];

				$tempCity=$row[city];

				$tempCountry=$row[broadcastplace];

				$count++;

				

				if ($count==1) {echo' <tr bgcolor="#FFFFFF">';}

				echo '<td width="240" height="120" align="center" valign="middle">';

  				echo '<table width="221" height="96" border="0" cellpadding="2" cellspacing="1">';

	 			echo '<tr bgcolor="#330000">';

		 		echo '<td width="96" height="96" align="center" valign="middle"> <a href="../../liveshow.php?model='.$row[model].'&from=favorite"><img src="../../models/'.$row[model].'/thumbnail.jpg" width="96" height="96" border="0"></a> </td>';

		       	echo '<td align="left" valign="top">';

		     	echo '<span class="model_title">'.$row[model].'</span><br><br>';

		        echo '<span class="model_title_small">'.$nYears.' years from '.$tempCountry.'</span><br>';

		       	echo '<span class="model_message">'.$tempMessage.'</span></td>';

				echo '</tr></table>';

				echo '<a href="">Delete</a></td>';

				if ($count==3){ echo"</tr>"; $count=0;}

				}

				

			if ($count==1){

			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';

			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';

			echo'</tr>';

			} else if ($count==2){

			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';

			echo'</tr>';

			}



			echo'</table>';

 			?> </td>

  </tr>

</table>

<br>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><img src="../../images/offline_models.gif" width="158" height="24"></td>

  </tr>

</table>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center" valign="top">

<?php echo '<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#eeeeee">';



		    $count=0;

			$nTime=time();

			include("../../dbase.php");

			

			$result = mysql_query("SELECT t1.*, t2.* FROM favorites AS t1,chatmodels AS t2 WHERE t1.member='$username' AND t2.user=t1.model AND t2.status='offline'"  );					

			if (mysql_num_rows($result)==0){

			echo'<table width="600" border="0" cellspacing="0" cellpadding="0"><tr><td><br><p class="message"><strong>None of your favorites (if you have any) are offline</strong>. You can select the options above to be notified when they go online. To add a model to your favorites, while viewing their show in the flash interface press the "Add to Favorites" button.</p></td></tr></table>';

			}

			while($row = mysql_fetch_array($result)) 

				{

				$tBirthD=$row[birthDate];

				$nYears=date('Y',time()-$tBirthD)-1970;

				$tempMessage=$row[message];

				$tempCity=$row[city];

				$tempCountry=$row[broadcastplace];

				$count++;

				

				if ($count==1) {echo' <tr bgcolor="#FFFFFF">';}

				echo '<td width="240" height="120" align="center" valign="middle">';

  				echo '<table width="221" height="96" border="0" cellpadding="2" cellspacing="1">';

	 			echo '<tr bgcolor="#330000">';

		 		echo '<td width="96" height="96" align="center" valign="middle"> <a href="../../liveshow.php?model='.$row[model].'&from=favorite"><img src="../../models/'.$row[model].'/thumbnail.jpg" width="96" height="96" border="0"></a> </td>';

		       	echo '<td align="left" valign="top">';

		     	echo '<span class="model_title">'.$row[model].'</span><br><br>';

		        echo '<span class="model_title_small">'.$nYears.' years from '.$tempCountry.'</span><br>';

		       	echo '<span class="model_message">'.$tempMessage.'</span></td>';

				echo '</tr></table>';

				echo '<a href="">Delete</a></td>';

				if ($count==3){ echo"</tr>"; $count=0;}

				}

				

			if ($count==1){

			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';

			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';

			echo'</tr>';

			} else if ($count==2){

			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';

			echo'</tr>';

			}



			echo'</table>';

 			?>

</td>

  </tr>

</table>
<br>
<?
include("_members.footer.php");
?>