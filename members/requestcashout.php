<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("ulogin") )
{
include("navigation.php");
include("../banners.php");
echo "<p><center>";
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
$totalmatrixowed = 0.00;
$regularowed = 0.00;
$matrixowed = 0.00;
$matrixowed1 = 0.00;
$matrixowed2 = 0.00;
$matrixowed3 = 0.00;
$matrixowed4 = 0.00;
$matrixowed5 = 0.00;
$matrixowed6 = 0.00;
$matrixowed7 = 0.00;
$matrixowed8 = 0.00;
$matrixowed9 = 0.00;
$matrixowed10 = 0.00;
###############################################
$q1 = "select sum(owed) as matrixowed1 from matrix1 where username=\"$userid\"";
$r1 = mysql_query($q1);
while($row1 = mysql_fetch_array($r1))
{
$matrixowed1 = $row1["matrixowed1"];
}
####################################################
$q2 = "select sum(owed) as matrixowed2 from matrix2 where username=\"$userid\"";
$r2 = mysql_query($q2);
while($row2 = mysql_fetch_array($r2))
{
$matrixowed2 = $row2["matrixowed2"];
}
####################################################
$q3 = "select sum(owed) as matrixowed3 from matrix3 where username=\"$userid\"";
$r3 = mysql_query($q3);
while($row3 = mysql_fetch_array($r3))
{
$matrixowed3 = $row3["matrixowed3"];
}
####################################################
$q4 = "select sum(owed) as matrixowed4 from matrix4 where username=\"$userid\"";
$r4 = mysql_query($q4);
while($row4 = mysql_fetch_array($r4))
{
$matrixowed4 = $row4["matrixowed4"];
}
####################################################
$q5 = "select sum(owed) as matrixowed5 from matrix5 where username=\"$userid\"";
$r5 = mysql_query($q5);
while($row5 = mysql_fetch_array($r5))
{
$matrixowed5 = $row5["matrixowed5"];
}
####################################################
$q6 = "select sum(owed) as matrixowed6 from matrix6 where username=\"$userid\"";
$r6 = mysql_query($q6);
while($row6 = mysql_fetch_array($r6))
{
$matrixowed6 = $row6["matrixowed6"];
}
####################################################
$q7 = "select sum(owed) as matrixowed7 from matrix7 where username=\"$userid\"";
$r7 = mysql_query($q7);
while($row7 = mysql_fetch_array($r7))
{
$matrixowed7 = $row7["matrixowed7"];
}
####################################################
$q8 = "select sum(owed) as matrixowed8 from matrix8 where username=\"$userid\"";
$r8 = mysql_query($q8);
while($row8 = mysql_fetch_array($r8))
{
$matrixowed8 = $row8["matrixowed8"];
}
####################################################
$q9 = "select sum(owed) as matrixowed9 from matrix9 where username=\"$userid\"";
$r9 = mysql_query($q9);
while($row9 = mysql_fetch_array($r9))
{
$matrixowed9 = $row9["matrixowed9"];
}
####################################################
$q10 = "select sum(owed) as matrixowed10 from matrix10 where username=\"$userid\"";
$r10 = mysql_query($q10);
while($row10 = mysql_fetch_array($r10))
{
$matrixowed10 = $row10["matrixowed10"];
}
####################################################
$totalmatrixowed = $matrixowed1+$matrixowed2+$matrixowed3+$matrixowed4+$matrixowed5+$matrixowed6+$matrixowed7+$matrixowed8+$matrixowed9+$matrixowed10;
$totalmatrixowed = sprintf("%.2f", $totalmatrixowed);
$commission = sprintf("%.2f", $commission);
$totalowed = $commission+$totalmatrixowed;
$totalowed = sprintf("%.2f", $totalowed);
####################################################
if ($memtype == "SUPER JV")
	{
	$minimumpayout = $minimumpayoutsuperjv;
	}
if ($memtype == "JV Member")
	{
	$minimumpayout = $minimumpayoutjv;
	}
if (($memtype != "SUPER JV") and ($memtype != "JV Member"))
	{
	$minimumpayout = $minimumpayoutpro;
	}
###############################################################################
if ($_POST["action"] == "cashout")
{
$cashoutamount = $_POST["cashoutamount"];
$message = $_POST["message"];
if ($cashoutamount < $minimumpayout)
	{
	echo "<p align=\"center\"><font face=\"Tahoma\" size=\"2\">Sorry, you cannot withdraw less than the minimum payout, which is \$" . $minimumpayout . "<br><a href=\"requestcashout.php\">Click here</a> to go back.</font></p>";
	include "../footer.php";
	exit;
	}
if ($cashoutamount > $totalowed)
	{
	echo "<p align=\"center\"><font face=\"Tahoma\" size=\"2\">You do not have \$" . $cashoutamount . " in earnings to withdraw.<br><a href=\"requestcashout.php\">Click here</a> to go back.</font></p>";
	include "../footer.php";
	exit;
	}
if ($paypal_email == "")
	{
	$paypal_email = "Not Entered";
	}
if ($payza_email == "")
	{
	$payza_email = "Not Entered";
	}
if ($egopay_account == "")
	{
	$egopay_account = "Not Entered";
	}
if ($perfectmoney_account == "")
	{
	$perfectmoney_account = "Not Entered";
	}
if ($okpay_account == "")
	{
	$okpay_account = "Not Entered";
	}
if ($solidtrustpay_account == "")
	{
	$solidtrustpay_account = "Not Entered";
	}
if ($moneybookers_email == "")
	{
	$moneybookers_email = "Not Entered";
	}
$q = "insert into cashoutrequests (userid,paypal,payza,egopay,perfectmoney,okpay,solidtrustpay,moneybookers,amountrequested,regularowed,matrixowed,daterequested,message) values (\"$userid\",\"$paypal_email\",\"$payza_email\",\"$egopay_account\",\"$perfectmoney_account\",\"$okpay_account\",\"$solidtrustpay_account\",\"$moneybookers_email\",\"$cashoutamount\",\"$commission\",\"$totalmatrixowed\",NOW(),\"$message\")";
$r = mysql_query($q);
########################################################
$headers = "From: $sitename<$adminemail>\n";
$headers .= "Reply-To: <$adminemail>\n";
$headers .= "X-Sender: <$adminemail>\n";
$headers .= "X-Mailer: PHP4\n";
$headers .= "X-Priority: 3\n";
$headers .= "Return-Path: <$adminemail>\n";
$to = $adminemail;
$subject = $sitename . " Cash Out Request for UserID $userid";
$body = "UserID: $userid\n";
$body .= "PayPal: $paypal_email\n";
$body .= "Payza: $payza_email\n";
$body .= "EgoPay: $egopay_account\n";
$body .= "Perfect Money: $perfectmoney_account\n";
$body .= "OKPay: $okpay_account\n";
$body .= "Solid Trust Pay: $solidtrustpay_account\n";
$body .= "Moneybookers/Skrill: $moneybookers_email\n";
$body .= "Requested:\n\n";
$body .= "Withdrawal: \$$cashoutamount\n";
$body .= "Message:\n$message\n\n";
$body .= "Total Regular Commissions Owed: \$$commission\n";
$body .= "Total Downline Earnings Owed: \$$totalmatrixowed\n";
$body .= "Total Earnings Owed: \$$totalowed\n";
$body .= "\n";
$body .= "TOTAL CASH ADMIN PAYS FROM THIS CASHOUT REQUEST: \$$cashoutamount\n";
$body .= "\n";
@mail($to, $subject, wordwrap(stripslashes($body)),$headers, "-f $adminemail");
echo "<p align=\"center\"><font face=\"Tahoma\" size=\"2\">Your cash out request for \$" . $cashoutamount . " was submitted to the admin. <br><a href=\"requestcashout.php\">Click here</a> to go back.</font></p>";
include "../footer.php";
exit;
} # if ($_POST["action"] == "cashout")
###############################################################################
?>
<style type="text/css">
<!--
td {
color: #000000;
font-size: 12px;
font-weight: normal;
font-family: Tahoma, sans-serif;
}
-->
</style>
<table align="center" border="0" width="100%">
<tr><td colspan="2">
<div style="text-align: center;">
<?php
$query = "select * from pages where name='Request Cash Out Page'";
$result = mysql_query ($query)
or die ("Query failed");
while ($line = mysql_fetch_array($result))
{
$htmlcode = $line["htmlcode"];
echo $htmlcode;
?>
<tr><td colspan="2" align="center"><br>&nbsp;</td></tr>
<?php
}
#############################
?>
</div> 
</td></tr>

<tr><td align="center" colspan="2">
<table cellpadding="2" cellspacing="2" border="0" align="center" bgcolor="#999999" width="90%">
<tr><td align="center" colspan="2"><div class="heading">Cash Out Earnings</div></td></tr>
<?php
if ($minimumpayout > 0)
	{
?>
<tr bgcolor="#eeeeee"><td align="center" colspan="2">Minimum Payout: $<?php echo $minimumpayout ?></td></tr>
<?php
	}
?>
<tr bgcolor="#eeeeee"><td colspan="2"><div>
Total Regular commissions owed: $<?php echo $commission ?>
<br>
Total Downline earnings owed: $<?php echo $totalmatrixowed ?>
<br>Total Cash: $<?php echo $totalowed ?>
</div>
</td></tr>
<form method="post" action="requestcashout.php">
<tr bgcolor="#eeeeee"><td>Withdraw Earnings:</td><td>$<input type="text" name="cashoutamount" maxlength="12" size="6"></td></tr>
<tr bgcolor="#eeeeee"><td>Message:</td><td><input type="text" name="message" maxlength="255" size="95"></td></tr>
<tr><td align="center" colspan="2"><input type="hidden" name="action" value="cashout">
<input type="submit" value="Submit"></form></td></tr>
</table>
</td></tr>

<tr><td colspan="2" align="center"><br>&nbsp;</td></tr>
</table>
<?php
}
else
{ ?>
<font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="<? echo $domain; ?>/memberlogin.php">click here</a> to login.</p></b></font><center>
<? }
include "../footer.php";
mysql_close($dblink);
?>