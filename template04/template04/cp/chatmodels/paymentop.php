<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");



	while($row = mysql_fetch_array($result)) 

	{	$username=$row['user'];	}

}

mysql_free_result($result);



$msgError="";

include("../../dbase.php");

$id=$_COOKIE["id"];

$model=$username;



if (isset($_POST['paymentSum'])){

mysql_query("UPDATE chatmodels SET minimum='$_POST[paymentSum]' WHERE id = '$id' LIMIT 1");

$msgError="Minimum Release Level has been changed";

}

?>



<?
include("_models.header.php");
?>


<table width="720" border="0" align="center">

  <tr valign="top">

  

  <?

	$tempMinutesPv=0;

	$tempSecondsPv=0;

	$tempMoneyEarned=0;

	$tempMoneySent=0;

	$ammount=0;

 	$result = mysql_query("SELECT * FROM videosessions WHERE model='$model'");

	while($row = mysql_fetch_array($result)) 

		{

		$member=$row['member'];

		$epercentage=$row['epercentage'];

		$duration=$row['duration'];

		$cpm=$row['cpm'];

		$tempSecondsPv+=$row['duration'];



		$ammount=(($duration/60)*$cpm)*$epercentage/10000 ;

		$tempMoneyEarned+=$ammount;

		if ($row['paid']=="1"){ $tempMoneySent+=$ammount;}

		}

	mysql_free_result($result);

		

	

	//minimum payment & epercentage

	$result = mysql_query("SELECT minimum,epercentage,cpm FROM chatmodels WHERE id='".$id."' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{ 

	$tempMinimum=$row["minimum"];

	$tempCPM=$row['cpm'];

	$tempEPercentage=$row['epercentage'];

	}

	mysql_free_result($result);

  

  ?>

    <td height="113" class="form_definitions">      <br>      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td class="left"><a href="paymentop.php" class="left">View Payment History </a> | <a href="showslist.php" class="left">View Show History </a></td>

      </tr>

    </table>

      <br>

      <table width="80%"  border="0" align="center" cellpadding="2" cellspacing="0">

        <tr>

          <td colspan="2" align="left" valign="top"><p class="error"><strong>

            <?

			if (isset($msgError) && $msgError!="")

			{

			echo $msgError;

			}

			?>

            </p>

            <p class="form_definitions">

            <strong>Your income percent is: <span class="small_title"> <? echo $tempEPercentage;?>%</span><br>

            Your rate is: <span class="small_title"> <strong>$</strong><? echo $tempCPM/100;?></span> per minute<br>
            <br>
            </strong></p>

          </td>

        </tr>

        <tr>

          <td width="50%" height="80" align="left" valign="top"><span style="font-weight: bold">Total Earnings:</span><span class="small_title"> $<? echo $tempMoneyEarned; ?> </span><br>

            <span style="font-weight: bold">Paid so far:</span><span class="small_title"> $<? echo $tempMoneySent; ?></span><br>

<b> Your Current Balance: <span class="small_title">$<? echo ($tempMoneyEarned-$tempMoneySent) ;?> </span></b></td>

          <td width="50%" height="80" align="left" valign="top">    <p> Private Shows+Recorded Video Shows Paid Time:<br> 
              <span class="small_title"><? echo floor($tempSecondsPv/60)." Minutes : ".($tempSecondsPv%60)." Seconds"; ?></span></p>

          </td>

        </tr>

        <tr>

          <td colspan="2" align="left" valign="top"><form name="form1" method="post" action="paymentop.php">

            <div align="left">Minimum Payment Release Level:
                <select name="paymentSum" id="paymentSum">
      
                  <option value="100"  <? if ($tempMinimum=="100"){echo "selected";}?>>100</option>
      
                  <option value="250"  <? if ($tempMinimum=="250"){echo "selected";}?>>250</option>
      
                  <option value="500"  <? if ($tempMinimum=="500"){echo "selected";}?>>500</option>
      
                  <option value="1000"  <? if ($tempMinimum=="1000"){echo "selected";}?>>1000</option>
      
                  <option value="2500"  <? if ($tempMinimum=="2500"){echo "selected";}?>>2500</option>
      
                  <option value="5000"  <? if ($tempMinimum=="5000"){echo "selected";}?>>5000</option>
      
              </select>

  <input type="submit" name="Submit" value="Change Minimum Sum">

            </div>
          </form></td>

        </tr>
      </table>            

        <p class="big_title"><strong>Payment History </strong></p>
        <p>	
          <?

	

	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400

	//$secondsAll=time();

		

	include('../../dbase.php');

	$count=0;

	$result = mysql_query("SELECT * FROM payments WHERE id='$id' ORDER BY date DESC");

	while($row = mysql_fetch_array($result)) 

	{

	$count++;	

	$ammount= $row['ammount'];

	echo'<table class="tableborder" width="80%" border="0" align="center" cellpadding="5" cellspacing="1">

		<tr>

		<td class="barbg">'.$count.') <b>Amount: $'.$ammount .'</b> sent on '.date("d M Y, G:i", $row['date']).'</td>

		</tr> 

		<tr>

		<td class="tablebg"><p><b>Method:</b> '.$row['method'].'<br><b>Details:</b>'.$row['details'].'</p></td>

		</tr>
		

		</table>

		<br>';

	}

	mysql_free_result($result);

	?>
    
	  </p>
</td>
  </tr>

</table>

<?
include("_models.footer.php");
?>