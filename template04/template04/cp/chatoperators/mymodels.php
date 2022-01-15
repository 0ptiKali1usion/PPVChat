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
include("_sop.header.php");
?>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><span class="big_title"><br>
      My Models</span><br>
      <br>

	<table width="600"  class=tableborder border="0" align="center" cellpadding="4" cellspacing="1">

	<?php

	

	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400

	//$secondsAll=time();

		

	include('../../dbase.php');



	

		$result2 = mysql_query("SELECT * FROM chatmodels WHERE owner='$username'");

		while($row2 = mysql_fetch_array($result2)) 

			{

			$result3=mysql_query("SELECT name FROM countries WHERE id='$row2[country]' LIMIT 1");

			while($row3 = mysql_fetch_array($result3)) 

				{

				$tempCountry=$row3[name];

				}

			

			$tempCity=$row2[city];	

			

			

			echo'<tr class="tablebg"><td class="small_title" align="middle"><b>'.$row2[user].'</b></td><td class="form_definitions">'.$row2[name].' from '.$tempCity.', '.$tempCountry.'</td><td class="form_definitions">'.$row2[email].'</td><td class="form_definitions" align="middle"><a class=left href="modelviewdetails.php?id='.$row2[id].'">View Details</a></td></tr>';	

			}



	?>

	

      </table>

<br>	</td>

  </tr>

</table>

<br>

<?
include("_sop.footer.php");
?>