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

$model=$username;

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
     <span class="big_title">Show History</span></td>

  </tr>

</table>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="tableborder">

  <tr align="left" bgcolor="#000000" class="form_definitions">

    <td class=tablebg width="80" bgcolor="#BD3439"><strong>Model</strong></td>

    <td class=tablebg width="80" bgcolor="#BD3439"><strong>Member</strong></td>

    <td class=tablebg width="130" bgcolor="#BD3439"><strong>Date</strong></td>

    <td class=tablebg width="50" bgcolor="#BD3439"><strong>Duration</strong></td>

    <td class=tablebg width="60" bgcolor="#BD3439"><strong>CPM($)</strong></td>

    <td class=tablebg width="80" bgcolor="#BD3439"><strong>Model Percentage</strong></td>

    <td class=tablebg width="80" bgcolor="#BD3439"><strong>Model <br>

    Income</strong></td>

    <td class=tablebg width="80" bgcolor="#BD3439"><strong>Studio Percentage</strong></td>

    <td class=tablebg width="80" bgcolor="#BD3439"><strong>Studio<br>

    Income</strong></td>

    <td class=tablebg width="80" bgcolor="#BD3439"><strong>Paid</strong></td>
  </tr>
</table>

<?	//epercentage

	$result = mysql_query("SELECT epercentage FROM chatoperators WHERE id='".$_COOKIE["id"]."' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

		{$tOpEPercentage=$row[epercentage];}

  

	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400

	//$secondsAll=time();

		

	include('../../dbase.php');

	$count=0;

	$topMoney=0;

	$result = mysql_query("SELECT t1.* , t2.user FROM videosessions AS t1, chatmodels AS t2 WHERE t1.model=t2.user  AND t2.owner='$username'");

	while($row = mysql_fetch_array($result)) 

	{

	$count++;

		

	$ammount= $row[ammount];

	$member=$row[member];

	$model=$row[model];

	$epercentage=$row[epercentage];

	$duration=$row[duration];

	$cpm=$row[cpm];

	

	if (($duration/60)<round($duration/60))

	{

	$tempMinutesPv=round($duration/60)-1;

	} else {

	$tempMinutesPv=$duration/60;

	}

	$tempSecondsPv=$duration % 60;

	

	$tmodMoney=(($duration/60)*$cpm)*$epercentage/10000 ;

	$topMoney=(($duration/60)*$cpm)*$tOpEPercentage/10000;

	

	if ($row[paid]!="1"){

	$paied="no";

	}else{

	$paied="yes";

	}

	

	

	

	echo'<table width="800" class="form_definitions" align="center" border="0" bgcolor="#eeeeee" cellpadding="0" cellspacing="1">

	      <tr align="left" bgcolor="#FFFFFF">

		  <td width="80">'.$model.'</td>

		  <td width="80">'.$member.'</td>

          <td width="130">'.date("d M Y, G:i:s", $row[date]) .'</td>

          <td width="50">'.$tempMinutesPv.":".$tempSecondsPv.'</td>

          <td width="60">'.$cpm/100 .'</td>

          <td width="80">'.$epercentage.'</td>

          <td width="80">'.$tmodMoney.'</td>

		  <td width="80">'.$tOpEPercentage.'</td>

          <td width="80"><b>'.$topMoney.'</b></td>

          <td width="80">'.$paied.'</td>

        </tr>

      </table>';}

	?>
<br>
<br>
<?
include("_sop.footer.php");
?>