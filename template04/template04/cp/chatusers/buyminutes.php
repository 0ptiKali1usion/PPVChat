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
include("_members.header.php");
?>


<table width="720" border="0" align="center">

  <tr valign="top">

    <td height="113"><br>      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

          <td><p><span class="big_title style1">My Virtual Wallet</span><br>
              <span class="form_definitions">Virtual Wallet is the section where you can see your current balance, and where you can buy credits to spend on private shows and recorded shows.<br>

              <br>

              </span><span class="form_definitions" style="font-weight: bold">Money in your virtual wallet:</span><span class="small_title" style="font-weight: bold"> $<?

			  include("../../dbase.php");

			  $result=mysql_query("SELECT money from chatusers where user='$username' LIMIT 1");

			  while($row = mysql_fetch_array($result)){

			  	$money=$row[money];

				echo $money/100 ." USD";

				} 

			  

			  

			  ?>
&nbsp;&nbsp; 
              </span><span class="form_definitions">|&nbsp;&nbsp; <a href="viewsessions.php" class="left">Private Sessions History</a><br>

              </span><span class="form_definitions"><br>

              </span></p></td>

        </tr>

      </table>    

      <table width="100%" border=0 align="center" cellPadding=4 cellSpacing=0 class="form_definitions">

        <TR>

          <TD><p>&nbsp;</p></TD>

        </TR>

        <TR>

          <TD height="16" class="barbg"><strong class="form_header_title"><font color="#FFFFFF">Upload Funds </font></strong></TD>

        </TR>

        <TR>

          <TD>Select your payment method and press Continue.<br>

            <form name="form1" method="post" action="makepayment.php">

              <table width="700" border="0" cellspacing="2" cellpadding="0">

                <tr>

                  <td width="227"><input name="radiobutton" type="radio" value="cc" checked>

Credit Card</td>

                  <td width="493" rowspan="6">&nbsp;</td>

                </tr>

                <tr>

                  <td><input name="radiobutton" type="radio" value="check">

Checks 





 (for US residents only)</td>

                </tr>

                <tr>

                  <td><input name="radiobutton" type="radio" value="premium"> 

                  Premium Numbers </td>

                </tr>

                <tr>

                  <td><input name="radiobutton" type="radio" value="wire">

Wire Transfer </td>

                </tr>

                <tr>

                  <td><input name="radiobutton" type="radio" value="paypal">

                  PayPal</td>

                </tr>

                <tr>

                  <td><input name="radiobutton" type="radio" value="egold">

                  E-Gold</td>

                </tr>

              </table>

              <br> 

<input type="button" name="Button" value="   Continue   ">

          </form> </TD>

        </TR>

        <TBODY>

        </TBODY>
      </TABLE></td>

  </tr>

</table>

<?
include("_members.footer.php");
?>