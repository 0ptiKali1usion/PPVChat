<?
include("_header-admin.php")
?>
<form name="form1" method="post" action="newslettersent.php">
<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#eeeeee">
  <tr>
    <td bgcolor="#FFFFFF">
	<table width="100%"  border="0">
      <tr>
        <td class="big_title">Send To:</td>
        </tr>
      <tr>
        <td class="form_definitions">
          <input name="members1" type="checkbox" id="members1" value="true">
    Free Acess Members </td>
      </tr>
      <tr>
        <td class="form_definitions">
          <input name="members2" type="checkbox" id="members2" value="true">
          Paying  Members
       </td>
        </tr>
      <tr>
        <td class="form_definitions"><input name="models" type="checkbox" id="models" value="true">
          Models</td>
        </tr>
      <tr>
        <td height="17" class="form_definitions"><input name="sop" type="checkbox" id="sop" value="true">
          Studio Operators </td>
        </tr>
    </table>
	<table width="100%" height="150"  border="0">
      <tr>
        <td class="big_title">&nbsp;</td>
      </tr>
      <tr>
        <td class="big_title">Subject:          
          <input name="subject" type="text" id="subject" size="32" maxlength="32"></td>
      </tr>
      <tr>
        <td class="big_title">Message:</td>
      </tr>
      <tr>
        <td class="big_title"><textarea name="message" cols="64" rows="6" id="message"></textarea>
          <br>
          <input type="submit" name="Submit" value="Send Newsletter"></td>
      </tr>
    </table>	
	</td>
  </tr>
</table>
</form>
<?
include("_footer-admin.php")
?>
