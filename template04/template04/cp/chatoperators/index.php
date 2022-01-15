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

  <tr align="center" valign="middle">

    <td height="113"><br>

        <table width="80%"  border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td align="left" valign="top"><p class="form_definitions"><b class="big_title">Welcome

                      <? if (isset($username)){echo $username;} ?>!</b><br>

              This is your Model Control Panel. Here you can access all the functions that you need to get started.</p>

              <p class="form_definitions"><strong class="small_title">Update Profile</strong><br>

 Update Profile section allows you to modify any information related to your account. Either your profile, user or payment information, they can all be changed there.</p>

                <p class="form_definitions"><span class="small_title"><strong>Add Model </strong></span><strong><br>

                </strong> Add a model to your studio operator account. The model registration form is similar to the Individual Model registration form. Models registered under your Studio Operator account will share revenue with both you and website owner. You  receive a fixed percent of your models revenues. </p>

                <p class="form_definitions"><span class="small_title"><strong>My Models </strong></span><strong><br>

                  </strong> Watch your models' activity with this tool. </p>

                <p class="form_definitions"><span class="small_title"><strong>Payments</strong></span><strong><br>

                </strong> View Account balance, Total Earnings, Total paid, Earning percentage, Minimum Release Amount, Payment History, Private Shows History. <strong><br>

              </strong></p></td>

          </tr>

          <tr>

            <td align="left" valign="top">&nbsp;</td>

          </tr>

        </table>

        <p class="form_definitions"><br>

      </p></td>

  </tr>

</table>

<?
include("_sop.footer.php");
?>