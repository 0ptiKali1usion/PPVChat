<?
include("../../dbase.php");
include("../../settings.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><? echo $sitename; ?> - Model Control Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<TABLE BORDER="0" align="center" CELLPADDING="0" CELLSPACING="0">
  <TR>
    <TD><IMG SRC="../../images/header_1.jpg" WIDTH="720" BORDER="0" HEIGHT="201"></TD>
  </TR>
  <TR>
    <TD height="30" background="../../images/bar.gif"><table width="720" border="0" align="center" cellpadding="0" cellspacing="1">
        <tr align="center" valign="middle" class="left">
          <td><a href="index.php" class="meniu">CP Home</a></td>
          <td><a href="paymentop.php" class="meniu">Payments</a></td>
          <td><a href="updateprofile.php" class="meniu">Update Profile</a></td>
          <td> <a href="broadcast.php" class="meniu">BroadCast</a></td>
          <td><a href="recordshow.php" class="meniu">RecordShow</a></td>
          <td><a href="uploadpicture.php" class="meniu">Upload Picture </a></td>
          <td><a href="rules.php" class="meniu">Rules</a></td>
          <td><a href="../../logout.php" class="meniu">LogOut</a></td>
        </tr>
    </table></TD>
  </TR>
</TABLE>