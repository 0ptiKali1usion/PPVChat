<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatusers" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

include("../../settings.php");

$result=mysql_query("SELECT user,freetime,freetimeexpired from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{	$username=$row['user'];	

		$freetime=$row['freetime'];

		$freetimeexpired=$row['freetimeexpired'];

	}

	if ($freetime==0 && (time()-$freetimeexpired)>(3600*$freehours)){

	mysql_query("UPDATE chatusers SET freetime='120', freetimeexpired='0' WHERE id='$_COOKIE[id]' LIMIT 1");

	$freetime=120;

	}

}

?>

<?
include("_members.header.php");
?>

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr align="center" valign="middle">

    <td height="113"><br>

        <table width="720" border="0" cellpadding="10" cellspacing="1" class="tableborder">

          <tr>

            <td align="left" valign="top" class="tablebg"><p><span class="small_title"><strong>Your remaining Free Public Chat Time: <? echo $freetime;?></strong></span><strong><br>

            </strong><span class="form_definitions">You will receive another 120 seconds in <? echo $freehours;?> hours </span></p>            </td>

          </tr>
      </table>

        <br>

        <table width="720"  border="0" cellspacing="4" cellpadding="0">

          <tr>

            <td align="left" valign="top"><p class="form_definitions"><b class="big_title">Welcome

                      <? if (isset($username)){echo $username;} ?>!</b><br>

              This is your Member Control Panel. From here you can acces all the functions that you will need to get you started.</p>

              <p class="form_definitions"><strong class="small_title">Update Profile</strong><br>

 Update Profile section allows you to modify any information related to your account. Either your profile, email or password, they can all be changed there
</p>

                <p class="form_definitions"><span class="small_title"><strong>Virtual Wallet </strong></span><strong><br>

              </strong> Virtual Wallet is the section where you can see your current balance, and where you can buy credits to spend on private shows and recorded shows. Members with a virtual wallet balance greater then Zero can stay in public free chat for unlimited time. Members with zero balance have a limited time that they can stay on the public chat. For example the administrator can choose that members with no money in their accounts can stay in free public chat for 3 minutes, every 6 hours. These values can of course be changed. </p>

                <p class="form_definitions"><span class="small_title"><strong>My favorites </strong></span><strong><br>

                </strong> My favorites is the place where you can see if your favorite models are online/offline, and have a fast access to their shows. You can choose to be notified by email/sms when a favorite model comes online. </p>

                <p class="form_definitions"><span class="small_title"><strong>Browse Shows </strong></span><strong><br>

                  </strong> Take your time and search for models that you like, choose between several categories like Women, Couples, Gay. In each category you can see Online models as well as Offline models. Once you find one open it up and view it in the Live Chat Interface . Here you can: 
</p>

                <ul>
                  <li class="model_title_small"><span class="model_title_small">See / Hear the model in free public chat
                  </span>
                  <li class="model_title_small"><span class="model_title_small">Turn model Sound On/Off
                  </span>
                  <li class="model_title_small"><span class="model_title_small">View your Account Balance , Free Time Left , and the Per Minute Rate of the model
                  </span>
                  <li class="model_title_small"><span class="model_title_small">View members in the free public chat room of the model
                  </span>
                  <li class="model_title_small"><span class="model_title_small">Add Money to your account
                  </span>
                  <li class="model_title_small"><span class="model_title_small">Start a Private show where you are the only one who can see the model performing. Private shows are billed per minute (each half minute), the rate can depend from model to model, also the income percent between model / site owner or model/studio operator/site owner. Money are taken off your virtual wallet.
                  </span>
                  <li class="model_title_small"><span class="model_title_small">Start a 2-way Private show , which is similar to private show, with the addition that the model can see your webcam as well and also hear you.
                  </span>
                  <li class="model_title_small"><span class="model_title_small">Give a Tip to a model, you choose the amount.
                  </span>
                  <li class="model_title_small"><span class="model_title_small">Add the model to your Favorites
                  </span>
                  <li class="model_title_small"><span class="model_title_small">View model's Schedule
                  </span>
                  <li class="model_title_small"><span class="model_title_small">See the model's Profile and Photo Gallery for free. If your account balance is zero you can see only 3 photos, if you you have money in your account you can see unlimited pictures in the gallery.
                  </span>
                  <li class="model_title_small"><span class="model_title_small">See model's Recorded Shows . Each recorded show has its own fixed price that you have to pay to view it. You can see a free preview of a few seconds to have an idea of what you should expect of.
                  </span>
                  <li class="model_title_small"><span class="model_title_small">Each member has its own random color in the chat </span><br>
                  </li>
                </ul>
                <p class="form_definitions"><span class="small_title"><strong>Private Sessions </strong></span><strong><br>

                  </strong> History of your private sessions</p>                </td>

          </tr>
      </table>

        <p class="form_definitions"><br>

      </p></td>

  </tr>

</table>

<?
include("_members.footer.php");
?>