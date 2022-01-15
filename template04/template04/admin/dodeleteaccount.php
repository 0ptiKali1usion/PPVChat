<?
include ("../dbase.php");
include ("../settings.php");
if ($_GET['type']=="model"){
mysql_query('DELETE from modelpictures WHERE user="'.$_GET['username'].'"');
mysql_query('DELETE from chatmodels WHERE user="'.$_GET['username'].'"');
mysql_query('DELETE from favorites WHERE model="'.$_GET['username'].'"');
unlink("../models/".$_GET['username']."/");
} else if($_GET['type']=="member"){
mysql_query('DELETE from chatusers WHERE user="'.$_GET['username'].'" ');
mysql_query('DELETE from favorites WHERE member="'.$_GET['username'].'"');
}
else if ($_GET['type']=="sop"){
mysql_query('DELETE from chatoperators WHERE user="'.$_GET['username'].'"');
}

?>
<?
include("_header-admin.php")
?>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#eeeeee">
  <tr>
    <td bgcolor="#FFFFFF"><p>&nbsp;</p>
      <table width="600"  border="0" align="center">
        <tr>
          <td width="590" class="big_title"><div align="left">
            <p align="center"> Account Deleted<br>
              </p>
            </div></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
  </tr>
</table>
<?
include("_footer-admin.php")
?>
