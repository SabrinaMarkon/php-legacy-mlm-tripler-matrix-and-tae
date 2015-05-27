<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
?>
<table>
<tr>
<td width="15%" valign=top><br>
<?php
include "adminnavigation.php";
?>
</td>
<td  valign="top" align="center"><br>
<?php
if( session_is_registered("alogin") ) {
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
if ($_POST["action"] == "delete")
{
$id = $_POST["id"];
$q = "delete from cashoutrequests where id=\"$id\"";
$r = mysql_query($q);
$show = "<p align=\"center\">Request Deleted</p>";
} # if ($_POST["action"] == "delete")

if ($_POST["action"] == "markpaid")
{
$payid = $_POST["payid"];
$payamount = $_POST["payamount"];
$payuserid = $_POST["payuserid"];
$q2 = "select * from members where userid=\"$payuserid\"";
$r2 = mysql_query($q2);
$rows2 = mysql_num_rows($r2);
if ($rows2 > 0)
	{
######################## REGULAR COMMISSION
	$paycommission = mysql_result($r2,0,"commission");
	if ($paycommission >= $payamount)
		{
		$q3 = "update members set commission=commission-".$payamount." where userid=\"$payuserid\"";
		$r3 = mysql_query($q3);
		$q4 = "insert into regularpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$payamount\",NOW(),\"Regular Commission Payout\")";
		$r4 = mysql_query($q4);
		$howmuchlefttopay = 0;
		break;
		}
	if ($paycommission < $payamount)
		{
		$q3 = "update members set commission=0 where userid=\"$payuserid\"";
		$r3 = mysql_query($q3);
		if ($paycommission > 0)
		{
		$q4 = "insert into regularpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$paycommission\",NOW(),\"Regular Commission Payout\")";
		$r4 = mysql_query($q4);
		}
		$howmuchlefttopay = $payamount-$paycommission;
		}
######################## DOWNLINE 1 EARNINGS
$dl1q = "select * from matrix1 where userid=\"$payuserid\" and owed>0 order by id";
$dl1r = mysql_query($dl1q);
$dl1rows = mysql_num_rows($dl1r);
if ($dl1rows > 0)
{
while ($dl1rowz = mysql_fetch_array($dl1r))
{
if ($howmuchlefttopay > 0)
{
$id = $dl1rowz["id"];
$owed = $dl1rowz["owed"];
	if ($owed >= $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$howmuchlefttopay\",NOW(),\"Downline #1 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix1 set owed=owed-".$howmuchlefttopay.",paid=paid+".$howmuchlefttopay.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = 0;
	break;
	}
	if ($owed < $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$owed\",NOW(),\"Downline #1 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix1 set owed=0.00,paid=paid+".$owed.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = $howmuchlefttopay-$owed;
	}
} # if ($howmuchlefttopay > 0)
} # wwhile ($dl1rowz = mysql_fetch_array($dl1r))
} # if ($dl1rows > 0)
######################## DOWNLINE 2 EARNINGS
$dl2q = "select * from matrix2 where userid=\"$payuserid\" and owed>0 order by id";
$dl2r = mysql_query($dl2q);
$dl2rows = mysql_num_rows($dl2r);
if ($dl2rows > 0)
{
while ($dl2rowz = mysql_fetch_array($dl2r))
{
if ($howmuchlefttopay > 0)
{
$id = $dl2rowz["id"];
$owed = $dl2rowz["owed"];
	if ($owed >= $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$howmuchlefttopay\",NOW(),\"Downline #2 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix2 set owed=owed-".$howmuchlefttopay.",paid=paid+".$howmuchlefttopay.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = 0;
	break;
	}
	if ($owed < $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$owed\",NOW(),\"Downline #2 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix2 set owed=0.00,paid=paid+".$owed.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = $howmuchlefttopay-$owed;
	}
} # if ($howmuchlefttopay > 0)
} # while ($dl2rowz = mysql_fetch_array($dl2r))
} # if ($dl2rows > 0)
######################## DOWNLINE 3 EARNINGS
$dl3q = "select * from matrix3 where userid=\"$payuserid\" and owed>0 order by id";
$dl3r = mysql_query($dl3q);
$dl3rows = mysql_num_rows($dl3r);
if ($dl3rows > 0)
{
while ($dl3rowz = mysql_fetch_array($dl3r))
{
if ($howmuchlefttopay > 0)
{
$id = $dl3rowz["id"];
$owed = $dl3rowz["owed"];
	if ($owed >= $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$howmuchlefttopay\",NOW(),\"Downline #3 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix3 set owed=owed-".$howmuchlefttopay.",paid=paid+".$howmuchlefttopay.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = 0;
	break;
	}
	if ($owed < $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$owed\",NOW(),\"Downline #3 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix3 set owed=0.00,paid=paid+".$owed.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = $howmuchlefttopay-$owed;
	}
} # if ($howmuchlefttopay > 0)
} # while ($dl3rowz = mysql_fetch_array($dl3r))
} # if ($dl3rows > 0)
######################## DOWNLINE 4 EARNINGS
$dl4q = "select * from matrix4 where userid=\"$payuserid\" and owed>0 order by id";
$dl4r = mysql_query($dl4q);
$dl4rows = mysql_num_rows($dl4r);
if ($dl4rows > 0)
{
while ($dl4rowz = mysql_fetch_array($dl4r))
{
if ($howmuchlefttopay > 0)
{
$id = $dl4rowz["id"];
$owed = $dl4rowz["owed"];
	if ($owed >= $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$howmuchlefttopay\",NOW(),\"Downline #4 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix4 set owed=owed-".$howmuchlefttopay.",paid=paid+".$howmuchlefttopay.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = 0;
	break;
	}
	if ($owed < $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$owed\",NOW(),\"Downline #4 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix4 set owed=0.00,paid=paid+".$owed.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = $howmuchlefttopay-$owed;
	}
} # if ($howmuchlefttopay > 0)
} # while ($dl4rowz = mysql_fetch_array($dl4r))
} # if ($dl4rows > 0)
######################## DOWNLINE 5 EARNINGS
$dl5q = "select * from matrix5 where userid=\"$payuserid\" and owed>0 order by id";
$dl5r = mysql_query($dl5q);
$dl5rows = mysql_num_rows($dl5r);
if ($dl5rows > 0)
{
while ($dl5rowz = mysql_fetch_array($dl5r))
{
if ($howmuchlefttopay > 0)
{
$id = $dl5rowz["id"];
$owed = $dl5rowz["owed"];
	if ($owed >= $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$howmuchlefttopay\",NOW(),\"Downline #5 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix5 set owed=owed-".$howmuchlefttopay.",paid=paid+".$howmuchlefttopay.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = 0;
	break;
	}
	if ($owed < $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$owed\",NOW(),\"Downline #5 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix5 set owed=0.00,paid=paid+".$owed.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = $howmuchlefttopay-$owed;
	}
} # if ($howmuchlefttopay > 0)
} # while ($dl5rowz = mysql_fetch_array($dl5r))
} # if ($dl5rows > 0)
######################## DOWNLINE 6 EARNINGS
$dl6q = "select * from matrix6 where userid=\"$payuserid\" and owed>0 order by id";
$dl6r = mysql_query($dl6q);
$dl6rows = mysql_num_rows($dl6r);
if ($dl6rows > 0)
{
while ($dl6rowz = mysql_fetch_array($dl6r))
{
if ($howmuchlefttopay > 0)
{
$id = $dl6rowz["id"];
$owed = $dl6rowz["owed"];
	if ($owed >= $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$howmuchlefttopay\",NOW(),\"Downline #6 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix6 set owed=owed-".$howmuchlefttopay.",paid=paid+".$howmuchlefttopay.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = 0;
	break;
	}
	if ($owed < $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$owed\",NOW(),\"Downline #6 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix6 set owed=0.00,paid=paid+".$owed.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = $howmuchlefttopay-$owed;
	}
} # if ($howmuchlefttopay > 0)
} # while ($dl6rowz = mysql_fetch_array($dl6r))
} # if ($dl6rows > 0)
######################## DOWNLINE 7 EARNINGS
$dl7q = "select * from matrix7 where userid=\"$payuserid\" and owed>0 order by id";
$dl7r = mysql_query($dl7q);
$dl7rows = mysql_num_rows($dl7r);
if ($dl7rows > 0)
{
while ($dl7rowz = mysql_fetch_array($dl7r))
{
if ($howmuchlefttopay > 0)
{
$id = $dl7rowz["id"];
$owed = $dl7rowz["owed"];
	if ($owed >= $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$howmuchlefttopay\",NOW(),\"Downline #7 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix7 set owed=owed-".$howmuchlefttopay.",paid=paid+".$howmuchlefttopay.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = 0;
	break;
	}
	if ($owed < $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$owed\",NOW(),\"Downline #7 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix7 set owed=0.00,paid=paid+".$owed.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = $howmuchlefttopay-$owed;
	}
} # if ($howmuchlefttopay > 0)
} # while ($dl7rowz = mysql_fetch_array($dl7r))
} # if ($dl7rows > 0)
######################## DOWNLINE 8 EARNINGS
$dl8q = "select * from matrix8 where userid=\"$payuserid\" and owed>0 order by id";
$dl8r = mysql_query($dl8q);
$dl8rows = mysql_num_rows($dl8r);
if ($dl8rows > 0)
{
while ($dl8rowz = mysql_fetch_array($dl8r))
{
if ($howmuchlefttopay > 0)
{
$id = $dl8rowz["id"];
$owed = $dl8rowz["owed"];
	if ($owed >= $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$howmuchlefttopay\",NOW(),\"Downline #8 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix8 set owed=owed-".$howmuchlefttopay.",paid=paid+".$howmuchlefttopay.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = 0;
	break;
	}
	if ($owed < $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$owed\",NOW(),\"Downline #8 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix8 set owed=0.00,paid=paid+".$owed.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = $howmuchlefttopay-$owed;
	}
} # if ($howmuchlefttopay > 0)
} # while ($dl8rowz = mysql_fetch_array($dl8r))
} # if ($dl8rows > 0)
######################## DOWNLINE 9 EARNINGS
$dl9q = "select * from matrix9 where userid=\"$payuserid\" and owed>0 order by id";
$dl9r = mysql_query($dl9q);
$dl9rows = mysql_num_rows($dl9r);
if ($dl9rows > 0)
{
while ($dl9rowz = mysql_fetch_array($dl9r))
{
if ($howmuchlefttopay > 0)
{
$id = $dl9rowz["id"];
$owed = $dl9rowz["owed"];
	if ($owed >= $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$howmuchlefttopay\",NOW(),\"Downline #9 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix9 set owed=owed-".$howmuchlefttopay.",paid=paid+".$howmuchlefttopay.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = 0;
	break;
	}
	if ($owed < $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$owed\",NOW(),\"Downline #9 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix9 set owed=0.00,paid=paid+".$owed.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = $howmuchlefttopay-$owed;
	}
} # if ($howmuchlefttopay > 0)
} # while ($dl9rowz = mysql_fetch_array($dl9r))
} # if ($dl9rows > 0)
######################## DOWNLINE 10 EARNINGS
$dl10q = "select * from matrix10 where userid=\"$payuserid\" and owed>0 order by id";
$dl10r = mysql_query($dl10q);
$dl10rows = mysql_num_rows($dl10r);
if ($dl10rows > 0)
{
while ($dl10rowz = mysql_fetch_array($dl10r))
{
if ($howmuchlefttopay > 0)
{
$id = $dl10rowz["id"];
$owed = $dl10rowz["owed"];
	if ($owed >= $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$howmuchlefttopay\",NOW(),\"Downline #10 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix10 set owed=owed-".$howmuchlefttopay.",paid=paid+".$howmuchlefttopay.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = 0;
	break;
	}
	if ($owed < $howmuchlefttopay)
	{
	$q5 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$owed\",NOW(),\"Downline #10 Payout - for ID #$id\")";
	$r5 = mysql_query($q5);
	$q6 = "update matrix10 set owed=0.00,paid=paid+".$owed.",lastpaid=NOW() where id=\"$id\"";
	$r6 = mysql_query($q6);
	$howmuchlefttopay = $howmuchlefttopay-$owed;
	}
} # if ($howmuchlefttopay > 0)
} # while ($dl10rowz = mysql_fetch_array($dl10r))
} # if ($dl10rows > 0)
############################################## DOWNLINE 1 STILL LEFT OWING
$matrixq = "select sum(owed) as matrixowed1 from matrix1 where username=\"$payuserid\"";
$matrixr = mysql_query($matrixq);
$matrixrows = mysql_num_rows($matrixr);
if ($matrixrows < 1)
	{
	$matrixowed1 = 0.00;
	}
if ($matrixrows > 0)
	{
	while($matrixrowz = mysql_fetch_array($matrixr))
	{
	$matrixowed1 = $matrixrowz["matrixowed1"];
	$matrixowed1 = sprintf("%.2f", $matrixowed1);
	}
	}
############################################## DOWNLINE 2 STILL LEFT OWING
$matrixq = "select sum(owed) as matrixowed2 from matrix2 where username=\"$payuserid\"";
$matrixr = mysql_query($matrixq);
$matrixrows = mysql_num_rows($matrixr);
if ($matrixrows < 1)
	{
	$matrixowed2 = 0.00;
	}
if ($matrixrows > 0)
	{
	while($matrixrowz = mysql_fetch_array($matrixr))
	{
	$matrixowed2 = $matrixrowz["matrixowed2"];
	$matrixowed2 = sprintf("%.2f", $matrixowed2);
	}
	}
############################################## DOWNLINE 3 STILL LEFT OWING
$matrixq = "select sum(owed) as matrixowed3 from matrix3 where username=\"$payuserid\"";
$matrixr = mysql_query($matrixq);
$matrixrows = mysql_num_rows($matrixr);
if ($matrixrows < 1)
	{
	$matrixowed3 = 0.00;
	}
if ($matrixrows > 0)
	{
	while($matrixrowz = mysql_fetch_array($matrixr))
	{
	$matrixowed3 = $matrixrowz["matrixowed3"];
	$matrixowed3 = sprintf("%.2f", $matrixowed3);
	}
	}
############################################## DOWNLINE 4 STILL LEFT OWING
$matrixq = "select sum(owed) as matrixowed4 from matrix4 where username=\"$payuserid\"";
$matrixr = mysql_query($matrixq);
$matrixrows = mysql_num_rows($matrixr);
if ($matrixrows < 1)
	{
	$matrixowed4 = 0.00;
	}
if ($matrixrows > 0)
	{
	while($matrixrowz = mysql_fetch_array($matrixr))
	{
	$matrixowed4 = $matrixrowz["matrixowed4"];
	$matrixowed4 = sprintf("%.2f", $matrixowed4);
	}
	}
############################################## DOWNLINE 5 STILL LEFT OWING
$matrixq = "select sum(owed) as matrixowed5 from matrix5 where username=\"$payuserid\"";
$matrixr = mysql_query($matrixq);
$matrixrows = mysql_num_rows($matrixr);
if ($matrixrows < 1)
	{
	$matrixowed5 = 0.00;
	}
if ($matrixrows > 0)
	{
	while($matrixrowz = mysql_fetch_array($matrixr))
	{
	$matrixowed5 = $matrixrowz["matrixowed5"];
	$matrixowed5 = sprintf("%.2f", $matrixowed5);
	}
	}
############################################## DOWNLINE 6 STILL LEFT OWING
$matrixq = "select sum(owed) as matrixowed6 from matrix6 where username=\"$payuserid\"";
$matrixr = mysql_query($matrixq);
$matrixrows = mysql_num_rows($matrixr);
if ($matrixrows < 1)
	{
	$matrixowed6 = 0.00;
	}
if ($matrixrows > 0)
	{
	while($matrixrowz = mysql_fetch_array($matrixr))
	{
	$matrixowed6 = $matrixrowz["matrixowed6"];
	$matrixowed6 = sprintf("%.2f", $matrixowed6);
	}
	}
############################################## DOWNLINE 7 STILL LEFT OWING
$matrixq = "select sum(owed) as matrixowed7 from matrix7 where username=\"$payuserid\"";
$matrixr = mysql_query($matrixq);
$matrixrows = mysql_num_rows($matrixr);
if ($matrixrows < 1)
	{
	$matrixowed7 = 0.00;
	}
if ($matrixrows > 0)
	{
	while($matrixrowz = mysql_fetch_array($matrixr))
	{
	$matrixowed7 = $matrixrowz["matrixowed7"];
	$matrixowed7 = sprintf("%.2f", $matrixowed7);
	}
	}
############################################## DOWNLINE 8 STILL LEFT OWING
$matrixq = "select sum(owed) as matrixowed8 from matrix8 where username=\"$payuserid\"";
$matrixr = mysql_query($matrixq);
$matrixrows = mysql_num_rows($matrixr);
if ($matrixrows < 1)
	{
	$matrixowed8 = 0.00;
	}
if ($matrixrows > 0)
	{
	while($matrixrowz = mysql_fetch_array($matrixr))
	{
	$matrixowed8 = $matrixrowz["matrixowed8"];
	$matrixowed8 = sprintf("%.2f", $matrixowed8);
	}
	}
############################################## DOWNLINE 9 STILL LEFT OWING
$matrixq = "select sum(owed) as matrixowed9 from matrix9 where username=\"$payuserid\"";
$matrixr = mysql_query($matrixq);
$matrixrows = mysql_num_rows($matrixr);
if ($matrixrows < 1)
	{
	$matrixowed9 = 0.00;
	}
if ($matrixrows > 0)
	{
	while($matrixrowz = mysql_fetch_array($matrixr))
	{
	$matrixowed9 = $matrixrowz["matrixowed9"];
	$matrixowed9 = sprintf("%.2f", $matrixowed9);
	}
	}
############################################## DOWNLINE 10 STILL LEFT OWING
$matrixq = "select sum(owed) as matrixowed10 from matrix10 where username=\"$payuserid\"";
$matrixr = mysql_query($matrixq);
$matrixrows = mysql_num_rows($matrixr);
if ($matrixrows < 1)
	{
	$matrixowed10 = 0.00;
	}
if ($matrixrows > 0)
	{
	while($matrixrowz = mysql_fetch_array($matrixr))
	{
	$matrixowed10 = $matrixrowz["matrixowed10"];
	$matrixowed10 = sprintf("%.2f", $matrixowed10);
	}
	}
########################

$totalmatrixowed = $matrixowed1+$matrixowed2+$matrixowed3+$matrixowed4+$matrixowed5+$matrixowed6+$matrixowed7+$matrixowed8+$matrixowed9+$matrixowed10;
$totalmatrixowed = sprintf("%.2f", $totalmatrixowed);

$rq = "select * from members where userid=\"$payuserid\"";
$rr = mysql_query($rq);
$rrows = mysql_num_rows($rr);
if ($rrows > 0)
		{
$regularowed = mysql_result($rr,0,"commission");
$q7 = "update cashoutrequests set regularowed=\"$regularowed\",matrixowed=\"$totalmatrixowed\",paid=\"$payamount\",lastpaid=\"$lastpaid\" where id=\"$payid\"";
$r7 = mysql_query($q7);
		}
$show = "<p align=\"center\">Cash Out Request #" . $payid . " for member " . $payuserid . " was marked as paid out.</p>";
$q = "update cashoutrequests set paid=\"$payamount\",lastpaid=NOW() where id=\"$payid\"";
$r = mysql_query($q);
	} # if ($rows2 > 0)
if ($rows2 < 1)
	{
$show = "<p align=\"center\">UserID " . $payuserid . " was not found.</p>";
	}
} # if ($_POST["action"] == "markpaid")

####################################################################################################
$tbl_name="cashoutrequests";	 # your table name
# How many adjacent pages should be shown on each side?
$adjacents = 3;
# First get total number of rows in data table. 
# If you have a WHERE clause in your query, make sure you mirror it here.
$query = "select count(*) as num FROM $tbl_name where amountrequested>0.00 order by id desc";
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];
# Setup vars for query.
$targetpage = "cashoutrequests.php"; 	# your file name  (the name of this file)
$limit = 20; # how many items to show per page
$page = $_GET['page'];
if($page) 
$start = ($page - 1) * $limit; # first item to display on this page
else
$start = 0; # if no page var is given, set start to 0
# Get data.
$pnquery = "select * from $tbl_name where amountrequested>0.00 order by id desc limit $start, $limit";
$pnresult = mysql_query($pnquery);
# Setup page vars for display.
if ($page == 0) $page = 1; # if no page var is given, default to 1.
$prev = $page - 1; # previous page is page - 1
$next = $page + 1; # next page is page + 1
$lastpage = ceil($total_pages/$limit); # lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1; # last page minus 1
# Now we apply our rules and draw the pagination object. 
# We're actually saving the code to a variable in case we want to draw it more than once.
$pagination = "";
if($lastpage > 1)
{
$pagination .= "<div class=\"pagination\">";
# previous button
if ($page > 1) 
$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";
else
$pagination.= "<span class=\"disabled\">« previous</span>";	
# pages	
if ($lastpage < 7 + ($adjacents * 2)) # not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
$pagination.= "<span class=\"current\">$counter</span>";
else
$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2)) # enough pages to hide some
{
# close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
	$pagination.= "<span class=\"current\">$counter</span>";
else
	$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
}
$pagination.= "...";
$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
}
# in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
$pagination.= "...";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
	$pagination.= "<span class=\"current\">$counter</span>";
else
	$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
}
$pagination.= "...";
$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
}
# close to end; only hide early pages
else
{
$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
$pagination.= "...";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
if ($counter == $page)
	$pagination.= "<span class=\"current\">$counter</span>";
else
	$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
}
}
}
# next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";
else
$pagination.= "<span class=\"disabled\">next »</span>";
$pagination.= "</div>\n";		
}
###############################################################
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
<table cellpadding="4" cellspacing="0" border="0" align="left" width="100%">
<?php
if ($pagination != "")
	{
?>
<tr><td align="center" colspan="2" style="height: 30px;"><?php echo $pagination ?></td></tr>
<?php
	}
?>
<tr><td align="center" colspan="2"><br><br>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" bgcolor="#999999">
<tr><td align="center" colspan="2"><div class="heading">Member Cash Out Requests</div></td></tr>
<?php
$numrows = @ mysql_num_rows($pnresult);
if ($numrows < 1)
{
?>
<tr bgcolor="#eeeeee"><td align="center" colspan="2">No Cash Out Requests Pending.</td></tr>
<?php
}
if ($show != "")
{
echo $show;
}
if ($numrows > 0)
{
?>
<tr><td align="center" colspan="2">
<!--<div style="width: 780px; height: 500px; overflow:auto;">-->
<table cellpadding="4" cellspacing="2" border="0" align="center" bgcolor="#999999">
<tr bgcolor="#eeeeee">
<td align="center">Userid</td>
<td align="center"><a href="http://paypal.com" target="_blank">PayPal</a></td>
<td align="center"><a href="https://secure.payza.com/login" target="_blank">Payza</a></td>
<td align="center"><a href="https://www.egopay.com/login" target="_blank">EgoPay</a></td>
<td align="center"><a href="https://perfectmoney.is/login.html" target="_blank">Perfect Money</a></td>
<td align="center"><a href="https://www.okpay.com/en/account/login.html" target="_blank">OKPay</a></td>
<td align="center"><a href="https://www.solidtrustpay.com/login" target="_blank">Solid Trust Pay</a></td>
<td align="center"><a href="https://account.skrill.com/login?locale=en" target="_blank">Moneybookers</a></td>
<td align="center">Amount Requested</td>
<td align="center">Date Requested</td>
<td align="center">Regular Commissions Owing</td>
<td align="center">Downline Earnings Owing</td>
<td align="center">Already Paid For This Request</td>
<td align="center">Date Paid For This Request</td>
<td align="center">Mark Paid Out</td>
<td align="center">Delete</td>
</tr>
<?php
while ($line = mysql_fetch_array($pnresult)) {
$requestid = $line["id"];
$userid = $line["userid"];
$memberpaypal = $line["paypal"];
$memberpayza = $line["payza"];
$memberegopay = $line["egopay"];
$memberperfectmoney = $line["perfectmoney"];
$memberokpay = $line["okpay"];
$membersolidtrustpay = $line["solidtrustpay"];
$membermoneybookers = $line["moneybookers"];
$amountrequested = $line["amountrequested"];
if ($amountrequested > 0)
{
$bgcolor=" bgcolor=\"#FFCCCC\"";
}
else
{
$bgcolor = "";
}
$regularowed = $line["regularowed"];
$matrixowed = $line["matrixowed"];
$daterequested = $line["daterequested"];
if (($daterequested == "") or ($daterequested == 0))
	{
$daterequested = "N/A";
	}
if (($daterequested != "") and ($daterequested != 0))
	{
$daterequested = formatDate($daterequested);
	}
$paid = $line["paid"];
$lastpaid = $line["lastpaid"];
if (($lastpaid == "") or ($lastpaid == 0))
	{
$lastpaid = "N/A";
	}
if (($lastpaid != "") and ($lastpaid != 0))
	{
$lastpaid = formatDate($lastpaid);
	}
?>
<tr bgcolor="#eeeeee">
<td align="center"><?php echo $userid ?></td>
<td align="center"><?php echo $memberpaypal ?></td>
<td align="center"><?php echo $memberpayza ?></td>
<td align="center"><?php echo $memberegopay ?></td>
<td align="center"><?php echo $memberperfectmoney ?></td>
<td align="center"><?php echo $memberokpay ?></td>
<td align="center"><?php echo $membersolidtrustpay ?></td>
<td align="center"><?php echo $membermoneybookers ?></td>
<td align="center"<?php echo $bgcolor ?>>$<?php echo $amountrequested ?></td>
<td align="center"><?php echo $daterequested ?></td>
<td align="center">$<?php echo $regularowed ?></td>
<td align="center">$<?php echo $matrixowed ?></td>
<td align="center">$<?php echo $paid ?></td>
<td align="center"><?php echo $lastpaid ?></td>
<?php
if ($amountrequested > 0)
{
?>
<form method="post" action="cashoutrequests.php">
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
<input type="hidden" name="action" value="markpaid">
<input type="hidden" name="payid" value="<?php echo $requestid ?>">
<input type="hidden" name="payamount" value="<?php echo $amountrequested ?>">
<input type="hidden" name="payuserid" value="<?php echo $userid ?>">
<input type="submit" value="Set As Paid">
</center>
</td></form>
</tr>
<?php
} # if ($amountrequested > 0)
if ($amountrequested <= 0)
{
?>
<td align="center">No Money Owed</td>
<?php
}
?>
<form method="post" action="cashoutrequests.php">
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
<input type="hidden" name="action" value="delete">
<input type="hidden" name="id" value="<?php echo $requestid ?>">
<input type="submit" value="Delete">
</center>
</td></form>
</tr>
<?php
}
?>
</table>
<!--</div>-->
</td></tr>
<?php
} # if ($numrows > 0)
?>
</td></tr></table>
</td></tr>
<tr><td align="center" colspan="2"><br><br><?php echo $pagination ?><br>&nbsp;<br>&nbsp;</td></tr>
</table>
<?php
}
else
echo "Unauthorised Access!";
?>
</td></tr></table>
<?php
include "../footer.php";
?>