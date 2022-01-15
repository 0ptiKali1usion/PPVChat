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

<table width="720" border="0" align="center" class="form_definitions">

  <tr valign="top">

    <td height="113"><br>

    <? if ($_POST[radiobutton]=="cc"){	

	?>

	<FORM action="buyminutes3.php" method=post name=form1>

	  <table width="720" border="0" cellspacing="0" cellpadding="6">

        <tr>

          <td class="big_title style1">Credit Card </td>

        </tr>

      </table>

	  <table width="720" border=0 cellPadding=4 cellSpacing=0 class="form_definitions">

         

          <TR>

            <TD colspan="2"> All payments are discreetly and securely processed by the iBill service. iBill is our Authorized Merchant. The Credit is valid for 30 days from date of purchase. </TD>

        </TR>

          <TR>

            <TD width="25%" align="right">Amount:*</TD>

            <TD align=left><select name="select">

              <option value="10" selected>10$ Credit</option>

              <option value="25">25$ Credit</option>

              <option value="50">50$ Credit</option>

              <option value="75">75$ Credit</option>

              <option value="100">100$ Credit</option>

            </select></TD>

          </TR>

          <TR>

            <TD align="right"><FONT class=formfields>Credit Card Number:</FONT> <FONT 

                class=boldtxt1>*</FONT>&nbsp;&nbsp;&nbsp; </TD>

            <TD align=left><INPUT name=CARD_NUMBER>

        MasterCard or Visa only </TD>

          </TR>

          <TR>

            <TD align="right"><FONT class=formfields>Expiration Date:</FONT> <FONT 

                class=boldtxt1>*</FONT>&nbsp;&nbsp;&nbsp;</TD>

            <TD align=left><INPUT 

                  name=CARD_EXPIRE type=password size=4 maxlength="6">

                <FONT class=bdytext>MMYY</FONT></TD>

          </TR>

          <TR>

            <TD align="right"><FONT class=formfields>Credit Card Phone:</FONT> <FONT 

                class=boldtxt1>*</FONT>&nbsp;&nbsp;&nbsp;</TD>

            <TD align=left><INPUT name=CARD_BINPHONE>

&nbsp;Number listed on back of credit card</TD>

          </TR>

          <TR>

            <TD height="45" align="right">Card Security Code:*</TD>

          <TD align=left><INPUT type=password maxLength=3 

                  size=4 name=CARD_CVV2>

        Enter the last three digits of the signature panel on the back of your card.</TD>

          </TR>

          <TBODY>

          </TBODY>

        </TABLE>  

        <input type="submit" name="Submit" value="   Make Transaction   ">	

      </FORM>

	

	<?

	} else if ($_POST[radiobutton]=="check"){

	?>

	<table width="720" border="0" cellspacing="0" cellpadding="6">

      <tr>

        <td class="big_title style1">Check</td>

      </tr>

      <tr>

        <td class="form_definitions">Make Checks Payable to: </td>

      </tr>

    </table>

	<br>

	<?

	} else if ($_POST[radiobutton]=="premium"){

	?>

	

	

    <br>

    <table width="720" border="0" cellspacing="0" cellpadding="6">

      <tr>

        <td class="big_title style1">Premium numbers </td>

      </tr>

      <tr>

        <td class="form_definitions">If the member comes from a country where this payment is active must call a premium number and a voice message will read a PIN code. This code entered in a box validate the process. Active Countries have flags displayed below </td>

      </tr>

    </table>

    <?

	} else if ($_POST[radiobutton]=="paypal"){

	?>

    <br>

    <table width="720" border="0" cellspacing="0" cellpadding="6">

      <tr>

        <td class="big_title style1">Paypal payment </td>

      </tr>

      <tr>

        <td class="form_definitions">PayPal payment details goes here. </td>

      </tr>

    </table>    

    <?

	} else if ($_POST[radiobutton]=="egold"){

	?>

    <br>

    <table width="720" border="0" cellspacing="0" cellpadding="6">

      <tr>

        <td class="big_title style1">E-Gold Payment </td>

      </tr>

      <tr>

        <td class="form_definitions">E-Gold payment details goes here.</td>

      </tr>

    </table>    <br>

	<?

	} else if ($_POST[radiobutton]=="wire"){

	?>

	<br>

	<table width="720" border="0" cellspacing="0" cellpadding="6">

      <tr>

        <td class="big_title style1">Wire Transfer</td>

      </tr>

      <tr>

        <td class="form_definitions">Transfer funds by Money Wire from your bank account and get 10% BONUS Credit for FREE! For example, wire $500 and get $50 BONUS!</td>

      </tr>

      <tr>

        <td class="form_definitions"> <p>The following are the details you must provide your bank in order to make a Money Transfer from your bank account to Camdate (account name: Net-Promotion, Inc.). Please contact your bank and ask them to transfer any amount you want to Net-Promotion, Inc. You will need the following information to make the transfer. Your bank may charge you a transfer fee which Camdate will not abosrb. You may print this page for your personal use. <br>

              <br>

            Once the wire transfer has been accepted, your account will be credited and your BONUS added. We will notify you by email once your account has been credited. <br>

            <br>

            <strong>Customer Reference: </strong><br>

            IMPORTANT! This reference is used to properly credit your Camdate account and must be included with your transfer. Ask your bank teller to add this number to your wire transfer form. (HERE THE CUSTOMER ID Ex. FC97845)<br>

            <br> 

            Amount: Choose any amount in US Dollars <br>

            <br>

          Bank Name &amp; Address: <br>

          USBank (Lynden Branch) <br>

          218, Front Street <br>

          Lynden, WA 98264 <br>

          United States of America <br>

          <br>

          ABA: 125000105 <br>

          SWIFT BIC code: USBKUS44IMT <br>

          Account Name: Net-Promotion, Inc. <br>

          Account Number: 153590264005 <br>

          <br>

          Please note that IBAN code is not requested for wire transfers to US Banks. </p>          </td>

      </tr>

    </table>

	<br>

<?

	}

	?>

	</td>

  </tr>

</table>

<?
include("_members.footer.php");
?>