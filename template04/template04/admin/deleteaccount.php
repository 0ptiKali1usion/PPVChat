<?
include("_header-admin.php")
?>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#eeeeee">
  <tr>
    <td bgcolor="#FFFFFF">
  <br>
      <table width="600"  border="0" align="center">
        <tr>
          <td colspan="2" class="big_title"><div align="left">
            <p align="center">              Are you shure you want to delete this account:</p>
            <p align="center"><span class="a_small_title"><? echo $_POST['username'];?>, created <? echo $_POST['date'];?> ?</span><br>
              <br>
              <br>
              </p>
          </div></td>
        </tr>
        <tr align="center">
          <td width="300" class="big_title"><a href="dodeleteaccount.php?id=<? echo $_POST['id'];?>&type=<? echo $_POST['type']; ?>&username=<?echo $_POST['username'];?>">Yes, delete the account</a> </td>
          <td width="290" class="big_title"><a href="<? if($_POST['type']=="model"){echo"modelviewdetails";} else if ($_POST['type']=="member"){echo"memberviewdetails";} else if ($_POST['type']=="sop"){echo"sopviewdetails";}?>.php?id=<? echo $_POST['id'];?>">No,get me back</a> </td>
        </tr>
      </table>
      <p><br>	
    </p></td>
  </tr>
</table>
<?
include("_footer-admin.php")
?>
