<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatusers" )

{

header("location: login.php");

} else{

include("dbase.php");

include("settings.php");

$result=mysql_query("SELECT user from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{	$username=$row['user'];	

	}

}

?>

<?
include("_main.header.php");
?>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <?

  if (isset($_COOKIE['usertype']) && $_COOKIE['usertype']=="chatusers")

  	{	 $result = mysql_query('SELECT cpm FROM chatmodels WHERE user="'.$_GET[model].'" LIMIT 1');

		 while($row = mysql_fetch_array($result)) 

			{$cpm=$row['cpm'];};

		 $result = mysql_query('SELECT id,user,money,freetime,freetimeexpired FROM chatusers WHERE id="'.$_COOKIE[id].'" LIMIT 1');

		 while($row = mysql_fetch_array($result)) 

			{

			$freetime=$row['freetime'];

			$freetimeexpired=$row['freetimeexpired'];

			$sUser=$row['user'];

			$sId=$row['id'];

			$nMoney=$row['money'];

			}

	

		if ($freetime==0 && (time()-$freetimeexpired)>(3600*$freehours)){

		mysql_query("UPDATE chatusers SET freetime='120', freetimeexpired='0' WHERE id='$_COOKIE[id]' LIMIT 1");

		$freetime=110;

		}

		$result=mysql_query("SELECT * from favorites WHERE member='$sUser' AND model='$_GET[model]'");

		if (mysql_num_rows($result)>=1){$nFav=1;}else{$nFav=0;}

			

	}else{

		$sUser="guest";

		$sId="00";

		$nMoney=0;

		$nFav=0;

	}

  ?>

  

  <tr valign="top">

    <td colspan="6"><div align="center">

      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="720" height="800">

		  <PARAM NAME=FlashVars VALUE="&fuser=<? echo $sUser; ?>&fmodel=<? echo $_GET[model]; ?>&fid=<? echo $sId; ?>&fmoney=<? echo $nMoney;?>&favorite=<? echo $nFav;?>&freetime=<? echo $freetime;?>&connection=<? echo $connection_string;?>&cpm=<? echo $cpm; ?>">

          <param name="quality" value="high"><param name="SRC" value="ShowInterface.swf">

          <embed flashvars="&fuser=<? echo $sUser; ?>&fmodel=<? echo $_GET[model]; ?>&fid=<? echo $sId; ?>&fmoney=<? echo $nMoney;?>&favorite=<? echo $nFav;?>&freetime=<? echo $freetime;?>&connection=<? echo $connection_string;?>&cpm=<? echo $cpm; ?>" src="ShowInterface.swf" width="720" height="800" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>

      </object>

    </div></td>

  </tr>

</table>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0" class="form_definitions">

  <tr>

    <td><a href="index.php" class="left">Browse Models </a></td>

  </tr>

</table>

<br>

<?
include("_main.footer.php");
?>

