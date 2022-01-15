<?
include("_header-admin.php")
?>
<table width="720" border="0" align="center">
  <tr valign="top">
     <td height="113" class="form_definitions">      <br>      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><a href="payments.php">Make Payments</a> | <a href="paymentop.php">View Payments</a></td>
      </tr>
    </table>
      <br>
      <p class="a_small_title"><strong>Previous Payments</strong></p>
      <p>	
	  <?
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		
	include('../dbase.php');
	$count=0;
	$result = mysql_query("SELECT * FROM payments ORDER BY date DESC");
	while($row = mysql_fetch_array($result)) 
	{
	$count++;	
	$ammount= $row['ammount'];
	echo'<table class="form_definitions" width="700" bgcolor="#efefef" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
		<td bgcolor="eeeeee" >'.$count.') <b>Ammount: '.$ammount .' US Dollars</b> sent on '.date("d M Y, G:i", $row['date']).'</td>
		</tr> 
		<tr>
		<td bgcolor="ffffff"><p><b>Method:</b> '.$row['method'].'<br><b>Details:</b>'.$row['details'].'</p></td>
		</tr>
		</table>
		<br>';
	}
	mysql_free_result($result);
	?>
	</p></td>
  </tr>
</table>
<?
include("_footer-admin.php")
?>
