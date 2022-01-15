<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatusers" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

$result=mysql_query("SELECT user from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{	$username=$row[user];	}

}

?>



<?

$msgError="";

include("../../dbase.php");

$id=$_COOKIE["id"];

$member=$username;



if (isset($_POST[paymentSum])){

mysql_query("UPDATE chatmodelsstatus SET minimum='$_POST[paymentSum]' WHERE id = '$id' LIMIT 1");

$msgError="Value has been changed";

}

?>

<?
include("_members.header.php");
?>

<table width="720" border="0" align="center">

  <tr valign="top">

   <td height="113" class="form_definitions">      <span class="big_title"><br>
     Private Sessions History</span><br>     <br>

     <table width="700" border="0" align="center" cellpadding="4" cellspacing="1" class="tableborder">

        <tr align="left" class="barbg">

          <td width="104"><strong>Model</strong></td>

          <td width="148"><strong>Date</strong></td>

          <td width="114"><strong>Duration</strong></td>

          <td width="114"><strong>Cpm (USD)</strong></td>

          <td width="80"><strong>Paid (USD) </strong></td>

          <td width="85"><strong>Type</strong></td>
        </tr>
      </table>    

     <?

	

	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400

	//$secondsAll=time();

		

	include('../../dbase.php');

	$count=0;

	$result = mysql_query("SELECT * FROM videosessions WHERE member='$member' ORDER BY date DESC");

	while($row = mysql_fetch_array($result)) 

	{

	$count++;

		

	$ammount= $row[ammount];

	$model=$row[model];

	$epercentage=$row[epercentage];

	$duration=$row[duration];

	$cpm=$row[cpm];

	$type=$row['type'];

	

	if (($duration/60)<round($duration/60))

	{

	$tempMinutesPv=round($duration/60)-1;

	} else {

	$tempMinutesPv=$duration/60;

	}

	$tempSecondsPv=$duration % 60;

	

	$ammount=(($duration/60)*$cpm)/100 ;

	

		echo'<table width="700" border="0" align="center" class=tableborder cellpadding="4" cellspacing="1">

        <tr align="left">

          <td class=tablebg width="104">'.$model.'</td>

          <td class=tablebg width="148">'.date("d M Y, G:i:s", $row[date]) .'</td>

          <td class=tablebg width="114">'.$tempMinutesPv.":".$tempSecondsPv.'</td>

          <td class=tablebg width="114">'.$cpm/100 .'</td>

          <td class=tablebg width="80">'.$ammount.'</td>

		   <td class=tablebg width="85">'.$type.'</td>

        </tr>

      </table>';

	 }

	?></td>

  </tr>

</table>
<br>
<?
include("_members.footer.php");
?>