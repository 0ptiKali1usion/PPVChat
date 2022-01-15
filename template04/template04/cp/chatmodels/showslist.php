<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");



	while($row = mysql_fetch_array($result)) 

	{	$username=$row[user];	}

}

mysql_free_result($result);



$msgError="";

include("../../dbase.php");

$id=$_COOKIE["id"];

$model=$username;



if (isset($_POST[paymentSum])){

mysql_query("UPDATE chatmodelsstatus SET minimum='$_POST[paymentSum]' WHERE id = '$id' LIMIT 1");

$msgError="Value has been changed";

}

?>

<?
include("_models.header.php");
?>

<table width="720" border="0" align="center">

  <tr valign="top">

   <td height="113" class="form_definitions">      <br>      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td><a href="paymentop.php" class="left">View Payment History </a> | <a href="showslist.php" class="left">View Show History </a></td>

      </tr>

    </table>

      <p class="big_title">Show History</p>

      <table class="tableborder" width="720" border="0" align="center" cellpadding="5" cellspacing="1">

        <tr align="left" class="barbg">

          <td width="92"><strong>Member</strong></td>

          <td width="141"><strong>Date</strong></td>

          <td width="72"><strong>Duration</strong></td>

          <td width="71"><strong>CPM($)</strong></td>

          <td width="76"><strong>Percentage</strong></td>

          <td width="87"><strong>Income ($) </strong></td>

          <td width="44"><strong>Paid</strong></td>

          <td width="48"><strong>Type</strong></td>
        </tr>
      </table>

    <?

	

	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400

	//$secondsAll=time();

		

	include('../../dbase.php');

	$count=0;

	$result = mysql_query("SELECT * FROM videosessions WHERE model='$model' ORDER BY date DESC");

	while($row = mysql_fetch_array($result)) 

	{

	$count++;

		

	$ammount= $row['ammount'];

	$member=$row['member'];

	$epercentage=$row['epercentage'];

	$duration=$row['duration'];

	$cpm=$row['cpm'];

	$type=$row['type'];

	

	if (($duration/60)<round($duration/60))

	{

	$tempMinutesPv=round($duration/60)-1;

	} else {

	$tempMinutesPv=$duration/60;

	}

	$tempSecondsPv=$duration % 60;

	

	$ammount=(($duration/60)*$cpm)*$epercentage/10000 ;

	

	if ($row[paid]!="1"){

	$paied="no";

	}else{

	$paied="yes";

	}

	echo'<table align=center width="720" border="0" class=tableborder cellpadding="5" cellspacing="1">

	      <tr align="left">

		  <td width="92" class=tablebg>'.$member.'</td>

          <td width="141" class=tablebg>'.date("d M Y, G:i:s", $row[date]) .'</td>

          <td width="72" class=tablebg>'.$tempMinutesPv.":".$tempSecondsPv.'</td>

          <td width="71" class=tablebg>'.$cpm/100 .'</td>

          <td width="76" class=tablebg>'.$epercentage.'%</td>

          <td width="87" class=tablebg>'.$ammount.'</td>

          <td width="44" class=tablebg>'.$paied.'</td>

		  <td width="48" class=tablebg>'.$type.'</td>

        </tr>

      </table>';

	 }

	 mysql_free_result($result);

	?>	

    </td>

  </tr>

</table>
<br>
<?
include("_models.footer.php");
?>