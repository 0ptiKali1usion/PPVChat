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

$msgError="";

include("../../dbase.php");

$id=$_COOKIE["id"];



if (isset($_POST[paymentSum])){

mysql_query("UPDATE chatoperators SET minimum='$_POST[paymentSum]' WHERE id = '$id' LIMIT 1");

$msgError="Minimum Release Level has been changed";

}

?>

<?
include("_sop.header.php");
?>

<table width="720" border="0" align="center">

  <tr valign="top">

  

  

    <td height="113" class="form_definitions">      <br>      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td><a href="payments.php" class="left">View Payment History</a>&nbsp; | &nbsp;<a href="showslist.php" class="left">View Show History </a></td>

      </tr>

    </table>

      <br>

      <table width="80%"  border="0" align="center" cellpadding="2" cellspacing="0">

        <tr>

          <td colspan="2" align="left" valign="top"><p class="error"><strong>

              <?

  

  //minimum payment

	$result = mysql_query("SELECT * FROM chatoperators WHERE id='".$_COOKIE["id"]."' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{ $tempMinimum=$row["minimum"];

	$tempEPercentage=$row["epercentage"];

	$username=$row['user'];

	}

  

	$tempMinutesPv=0;

	$tempSecondsPv=0;

	$tempMoneyEarned=0;

	$tempMoneySent=0;

	

 	$result2 = mysql_query("SELECT duration,cpm,soppaid FROM videosessions WHERE sop='$username' ");

	while($row2 = mysql_fetch_array($result2)) 

		{

		$duration=$row2['duration'];

		$cpm=$row2['cpm'];

		$ammount=(($duration/60)*$cpm)*$tempEPercentage/10000 ;

		$tempMoneyEarned+=$ammount;

		if ($row2['soppaid']=="1"){ $tempMoneySent+=$ammount;}

		}

		

	if (isset($msgError) && $msgError!="")

	{echo $msgError;}

?>

</p>

            <p class="form_definitions">

            <span style="font-weight: bold">Studio Income Percent:</span> <span class="small_title"><? echo $tempEPercentage;?>%</span><br>
            <br>
            </p>

          </td>

        </tr>

        <tr>

          <td width="50%" height="80" align="left" valign="top"><span style="font-weight: bold">Total Earnings:</span><span class="small_title"> $<? echo $tempMoneyEarned; ?></span><br>

            <span style="font-weight: bold">Payed so far:</span><span class="small_title"> $<? echo $tempMoneySent; ?></span><br>

<b> Your Current Balance:<span class="small_title"> $<? echo ($tempMoneyEarned-$tempMoneySent) ;?></span></b></td>

          <td width="50%" height="80" align="left" valign="top">    <p>&nbsp;  </p>

          </td>

        </tr>

        <tr>

          <td colspan="2" align="left" valign="top"><form name="form1" method="post" action="payments.php">

            Minimum Payment Release Level:
            <select name="paymentSum" id="paymentSum">

                  <option value="100"  <? if ($tempMinimum=="100"){echo "selected";}?> >100</option>

                  <option value="250"  <? if ($tempMinimum=="250"){echo "selected";}?> >250</option>

                  <option value="500"  <? if ($tempMinimum=="500"){echo "selected";}?> >500</option>

                  <option value="1000"  <? if ($tempMinimum=="1000"){echo "selected";}?> >1000</option>

                  <option value="2500"  <? if ($tempMinimum=="2500"){echo "selected";}?> >2500</option>

                  <option value="5000"  <? if ($tempMinimum=="5000"){echo "selected";}?> >5000</option>

              </select>

  <input type="submit" name="Submit" value="Change Minimum Sum">

          </form></td>

        </tr>
      </table>            <p><span class="big_title"><strong>Payment History</strong></span></p>

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

	$ammount= $row[ammount];

	echo'<table class="tableborder" width="80%" border="0" align="center" cellpadding="5" cellspacing="1"><tr><td class="barbg">'.$count.') <b>Amount: '.$ammount .' US Dollars</b> sent on '.date("d M Y, G:i", $row[date]).'</td></tr> <tr><td class="barbg"><p><b>Method:</b> '.$row[method].'<br><b>Details:</b>'.$row[details].'</p></td></tr></table><br>';

	}

	?>

      </p></td>

  </tr>

</table>

<?
include("_sop.footer.php");
?>