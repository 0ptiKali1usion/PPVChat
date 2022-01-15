<?
include("_header-admin.php")
?>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333">
  <tr>
    <td bgcolor="#FFFFFF">	
	<table width="600" align="center" class="form_definitions">
      <tr>
        <td><?
	include('../dbase.php');
	
	mysql_query("UPDATE chatmodels SET status='rejected' WHERE id = '$_POST[id]' LIMIT 1");

	
	mail($_POST[email], "Your submission at $siteurl was rejected", "Your subscription for becoming a Video Chat Model has not been approoved.\r\n Reason: $_POST[reason]",
     "MIME-Version: 1.0\r\n".
     "Content-type: text/plain; charset=iso-8859-1\r\n".
     "From:$registrationemail\r\n".
     "Reply-To?:$registrationemail\r\n".
     "X-Mailer: PHP/" . phpversion() );

	if ($_POST[owner]!='none'){
	$result3=mysql_query("SELECT email FROM chatoperators WHERE user='$_POST[owner]' LIMIT 1");
			while($row3 = mysql_fetch_array($result3)) {
			$tOwnerEmail=$row3[email];
			}
		
		
	mail($tOwnerEmail, "Your model submission at $siteurl was rejected", "Your models subscription for becoming a Video Chat Model has not been approoved.\r\n Reason: $_POST[reason]",
     "MIME-Version: 1.0\r\n".
     "Content-type: text/plain; charset=iso-8859-1\r\n".
     "From:$registrationemail\r\n".
     "Reply-To:$registrationemail\r\n".
     "X-Mailer: PHP/" . phpversion() );
	 
	
	}
	
	echo"Model Rejected";
	
	?></td>
        </tr>
    </table>		</td>
  </tr>
</table>
<?
include("_footer-admin.php")
?>
