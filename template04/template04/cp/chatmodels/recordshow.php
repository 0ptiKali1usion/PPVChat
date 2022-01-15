<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

include("../../settings.php");

$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");



	while($row = mysql_fetch_array($result)) 

	{	$username=$row[user];	}

}

mysql_free_result($result);

?>

<?
include("_models.header.php");
?>

<br>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <?

  include("../../dbase.php");

  

	

  $result = mysql_query('SELECT id,user, cpm FROM chatmodels WHERE id="'.$_COOKIE["id"].'" LIMIT 1');

			while($row = mysql_fetch_array($result)) 

			{

			$nCpm=$row[cpm];

			$sUser=$row[user];

			$sId=$row[id];

			

			}

	mysql_free_result($result);

  ?>

  

  <tr valign="top">

    <td height="113" colspan="6"><div align="center">

      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="720" height="700">

          <param name="movie" value="RecordInterface.swf">

		  <PARAM NAME=FlashVars VALUE="&fuser=<? echo $sUser; ?>&fcpm=<? echo $nCpm; ?>&fid=<? echo $sId; ?>&fmoney=<? echo $nMoney; ?>&connection=<? echo $connection_string;?>">

          <param name="quality" value="high">

          <embed flashvars="&fuser=<? echo $sUser; ?>&fcpm=<? echo $nCpm; ?>&fid=<? echo $sId; ?>&fmoney=<? echo $nMoney; ?>&connection=<? echo $connection_string;?>" src="RecordInterface.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="720" height="700"></embed>

      </object>

    </div></td>

  </tr>

  <tr>

    <td width="171">&nbsp;</td>

    <td width="129">&nbsp;</td>

    <td width="134">&nbsp;</td>

    <td width="286" colspan="2">&nbsp;</td>

  </tr>

</table>

<?
include("_models.footer.php");
?>