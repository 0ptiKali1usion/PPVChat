<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{	$username=$row['user'];	}

}

mysql_free_result($result);

?>

<?
include("_models.header.php");
?>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr align="center" valign="middle">

    <td height="113"><br>      <table width="80%"  border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td align="left" valign="top"><p class="form_definitions"><b class="big_title">Welcome

              <? if (isset($username)){echo $username;} ?>!</b><br>

This is your Model Control Panel. Here you can access all the functions that you need to get started.</p>

          <p class="form_definitions"><span class="small_title"><strong>Payments</strong></span><strong><br>

          </strong> View Account balance, Total Earnings, Total paid, Earning percentage, Cost per minute, Total time spent in private shows, Minimum Release Amount, Payment History, Private Shows History.</p>

          <p class="form_definitions"><strong class="small_title">Update Profile</strong><br>

 Update Profile section allows you to modify any information related to your model account. Either your thumbnail picture, user information, profile, personal and payment info, they all can be changed here.
</p>

          <p class="form_definitions"><span class="small_title"><strong>Broadcast</strong></span><strong><br>

          </strong> Broadcast section opens up your Live Chat Interface that allows you to:</p>

          <ul>
            <li class="model_title_small"><span class="model_title_small">Start Broadcasting which will turn you Online for members browsing for models. Stop Broadcasting will turn you Offline.
            
            </span>
            <li class="model_title_small"><span class="model_title_small">Turn your Sound On/Off 
            
            </span>
            <li class="model_title_small"><span class="model_title_small">Chat with members in the Free Public Chat , where they also can see and hear you
            
            
            </span>
            <li class="model_title_small"><span class="model_title_small">View Members in the free public chat room, as well as their Account Balance in &nbsp;brackets, so you know who to speak more with, in order to convince members with money in their accounts to go on private. </span>
            <li class="model_title_small"><span class="model_title_small">Perform a Private or 2-Way Private Show , if a member requests it. View the member's cam in a 2-Way Private Show.
            
            
            </span>
            <li class="model_title_small"><span class="model_title_small">Receive Tips
            
            
            </span>
            <li class="model_title_small">See your Account Balance , Per minute price , and Earnings in this session </li>
          </ul>
          <p class="form_definitions"><span class="small_title"><strong>RecordShow</strong></span><strong><br>

          </strong> Record Show is a 5-step process that allows the model to record audio/video shows, for which members will have to pay a fixed amount in order to view them. You can also record a few seconds preview that will be free of charge for the members. </p>

          <p class="form_definitions"><span class="small_title"><strong>Upload Picture </strong></span><strong><br>

            </strong> Allows you to upload pictures in your personal image gallery. </p>

          <p class="form_definitions"><strong>
            <span class="small_title">Rules</span><br>

            </strong> The rules and instructions for the model.<strong><br>

            </strong></p>

          </td>

      </tr>

      <tr>

        <td align="left" valign="top">&nbsp;</td>

      </tr>

    </table>    <p class="form_definitions"><br>

    </p>

    </td></tr>

</table>

<?
include("_models.footer.php");
?>
