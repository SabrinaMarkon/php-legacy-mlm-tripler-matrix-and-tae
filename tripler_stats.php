<?php
###############################################################################################################
if ($showmainpagestats == "yes")
{
?>
<table cellpadding="0" cellspacing="0" border='0' width="100%">
<tr style="height:40px;">
<td class="left_title">
<img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />
</td>
<td class="center_title">
Commission Stats
</td>
<td class="right_title">
<img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />
</td>
</tr>
<tr style="height:4px;">
<td colspan="3">
</tr>
<tr class='content_title'>
<td>
</td>
<td style="padding:5px;" align="center" bgcolor="#d3d3d3">
<table cellpadding="0" cellspacing="0" border='0' width='100%'>
<tr>
<td>
<?php
echo "<p align=\"center\">";
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
$totalpaid = 0.00;
$totalowed = 0.00;
$regularowed = 0.00;
$regularpaid = 0.00;
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
$matrixpaid1 = 0.00;
$matrixpaid2 = 0.00;
$matrixpaid3 = 0.00;
$matrixpaid4 = 0.00;
$matrixpaid5 = 0.00;
$matrixpaid6 = 0.00;
$matrixpaid7 = 0.00;
$matrixpaid8 = 0.00;
$matrixpaid9 = 0.00;
$matrixpaid10 = 0.00;
$matrixpaid = 0.00;
$matrixcount = 0;
####################################################
if ($showdownlinepositioncount == "yes")
{
####################################################
$q1 = "select count(memberid) as matrixcount1 from matrix1";
$r1 = mysql_query($q1);
while($row1 = mysql_fetch_array($r1))
{
$matrixcount1 = $row1["matrixcount1"];
}
####################################################
$q2 = "select count(memberid) as matrixcount2 from matrix2";
$r2 = mysql_query($q2);
while($row2 = mysql_fetch_array($r2))
{
$matrixcount2 = $row2["matrixcount2"];
}
####################################################
$q3 = "select count(memberid) as matrixcount3 from matrix3";
$r3 = mysql_query($q3);
while($row3 = mysql_fetch_array($r3))
{
$matrixcount3 = $row3["matrixcount3"];
}
####################################################
$q4 = "select count(memberid) as matrixcount4 from matrix4";
$r4 = mysql_query($q4);
while($row4 = mysql_fetch_array($r4))
{
$matrixcount4 = $row4["matrixcount4"];
}
####################################################
$q5 = "select count(memberid) as matrixcount5 from matrix5";
$r5 = mysql_query($q5);
while($row5 = mysql_fetch_array($r5))
{
$matrixcount5 = $row5["matrixcount5"];
}
####################################################
$q6 = "select count(memberid) as matrixcount6 from matrix6";
$r6 = mysql_query($q6);
while($row6 = mysql_fetch_array($r6))
{
$matrixcount6 = $row6["matrixcount6"];
}
####################################################
$q7 = "select count(memberid) as matrixcount7 from matrix7";
$r7 = mysql_query($q7);
while($row7 = mysql_fetch_array($r7))
{
$matrixcount7 = $row7["matrixcount7"];
}
####################################################
$q8 = "select count(memberid) as matrixcount8 from matrix8";
$r8 = mysql_query($q8);
while($row8 = mysql_fetch_array($r8))
{
$matrixcount8 = $row8["matrixcount8"];
}
####################################################
$q9 = "select count(memberid) as matrixcount9 from matrix9";
$r9 = mysql_query($q9);
while($row9 = mysql_fetch_array($r9))
{
$matrixcount9 = $row9["matrixcount9"];
}
####################################################
$q10 = "select count(memberid) as matrixcount10 from matrix10";
$r10 = mysql_query($q10);
while($row10 = mysql_fetch_array($r10))
{
$matrixcount10 = $row10["matrixcount10"];
}
####################################################
$matrixcount = $matrixcount1+$matrixcount2+$matrixcount3+$matrixcount4+$matrixcount5+$matrixcount6+$matrixcount7+$matrixcount8+$matrixcount9+$matrixcount10;
####################################################
} # if ($showdownlinepositioncount == "yes")
####################################################
$q1 = "select sum(paid) as matrixpaid1 from matrix1";
$r1 = mysql_query($q1);
while($row1 = mysql_fetch_array($r1))
{
$matrixpaid1 = $row1["matrixpaid1"];
}
####################################################
$q2 = "select sum(paid) as matrixpaid2 from matrix2";
$r2 = mysql_query($q2);
while($row2 = mysql_fetch_array($r2))
{
$matrixpaid2 = $row2["matrixpaid2"];
}
####################################################
$q3 = "select sum(paid) as matrixpaid3 from matrix3";
$r3 = mysql_query($q3);
while($row3 = mysql_fetch_array($r3))
{
$matrixpaid3 = $row3["matrixpaid3"];
}
####################################################
$q4 = "select sum(paid) as matrixpaid4 from matrix4";
$r4 = mysql_query($q4);
while($row4 = mysql_fetch_array($r4))
{
$matrixpaid4 = $row4["matrixpaid4"];
}
####################################################
$q5 = "select sum(paid) as matrixpaid5 from matrix5";
$r5 = mysql_query($q5);
while($row5 = mysql_fetch_array($r5))
{
$matrixpaid5 = $row5["matrixpaid5"];
}
####################################################
$q6 = "select sum(paid) as matrixpaid6 from matrix6";
$r6 = mysql_query($q6);
while($row6 = mysql_fetch_array($r6))
{
$matrixpaid6 = $row6["matrixpaid6"];
}
####################################################
$q7 = "select sum(paid) as matrixpaid7 from matrix7";
$r7 = mysql_query($q7);
while($row7 = mysql_fetch_array($r7))
{
$matrixpaid7 = $row7["matrixpaid7"];
}
####################################################
$q8 = "select sum(paid) as matrixpaid8 from matrix8";
$r8 = mysql_query($q8);
while($row8 = mysql_fetch_array($r8))
{
$matrixpaid8 = $row8["matrixpaid8"];
}
####################################################
$q9 = "select sum(paid) as matrixpaid9 from matrix9";
$r9 = mysql_query($q9);
while($row9 = mysql_fetch_array($r9))
{
$matrixpaid9 = $row9["matrixpaid9"];
}
####################################################
$q10 = "select sum(paid) as matrixpaid10 from matrix10";
$r10 = mysql_query($q10);
while($row10 = mysql_fetch_array($r10))
{
$matrixpaid10 = $row10["matrixpaid10"];
}
####################################################
$matrixpaid = $matrixpaid1+$matrixpaid2+$matrixpaid3+$matrixpaid4+$matrixpaid5+$matrixpaid6+$matrixpaid7+$matrixpaid8+$matrixpaid9+$matrixpaid10;
$matrixpaid = sprintf("%.2f", $matrixpaid);
####################################################
$q1 = "select sum(owed) as matrixowed1 from matrix1";
$r1 = mysql_query($q1);
while($row1 = mysql_fetch_array($r1))
{
$matrixowed1 = $row1["matrixowed1"];
}
####################################################
$q2 = "select sum(owed) as matrixowed2 from matrix2";
$r2 = mysql_query($q2);
while($row2 = mysql_fetch_array($r2))
{
$matrixowed2 = $row2["matrixowed2"];
}
####################################################
$q3 = "select sum(owed) as matrixowed3 from matrix3";
$r3 = mysql_query($q3);
while($row3 = mysql_fetch_array($r3))
{
$matrixowed3 = $row3["matrixowed3"];
}
####################################################
$q4 = "select sum(owed) as matrixowed4 from matrix4";
$r4 = mysql_query($q4);
while($row4 = mysql_fetch_array($r4))
{
$matrixowed4 = $row4["matrixowed4"];
}
####################################################
$q5 = "select sum(owed) as matrixowed5 from matrix5";
$r5 = mysql_query($q5);
while($row5 = mysql_fetch_array($r5))
{
$matrixowed5 = $row5["matrixowed5"];
}
####################################################
$q6 = "select sum(owed) as matrixowed6 from matrix6";
$r6 = mysql_query($q6);
while($row6 = mysql_fetch_array($r6))
{
$matrixowed6 = $row6["matrixowed6"];
}
####################################################
$q7 = "select sum(owed) as matrixowed7 from matrix7";
$r7 = mysql_query($q7);
while($row7 = mysql_fetch_array($r7))
{
$matrixowed7 = $row7["matrixowed7"];
}
####################################################
$q8 = "select sum(owed) as matrixowed8 from matrix8";
$r8 = mysql_query($q8);
while($row8 = mysql_fetch_array($r8))
{
$matrixowed8 = $row8["matrixowed8"];
}
####################################################
$q9 = "select sum(owed) as matrixowed9 from matrix9";
$r9 = mysql_query($q9);
while($row9 = mysql_fetch_array($r9))
{
$matrixowed9 = $row9["matrixowed9"];
}
####################################################
$q10 = "select sum(owed) as matrixowed10 from matrix10";
$r10 = mysql_query($q10);
while($row10 = mysql_fetch_array($r10))
{
$matrixowed10 = $row10["matrixowed10"];
}
####################################################
$matrixowed = $matrixowed1+$matrixowed2+$matrixowed3+$matrixowed4+$matrixowed5+$matrixowed6+$matrixowed7+$matrixowed8+$matrixowed9+$matrixowed10;
$matrixowed = sprintf("%.2f", $matrixowed);
####################################################
$q3 = "select sum(paid) as regularpaid from regularpayouts";
$r3 = mysql_query($q3);
while($row3 = mysql_fetch_array($r3))
{
$regularpaid = $row3["regularpaid"];
}
$regularpaid = sprintf("%.2f", $regularpaid);
$q5 = "select sum(commission) as regularowed from members";
$r5 = mysql_query($q5);
while($row5 = mysql_fetch_array($r5))
{
$regularowed = $row5["regularowed"];
}
$regularowed = sprintf("%.2f", $regularowed);
####################################################
$totalowed = $matrixowed+$regularowed;
$totalowed = sprintf("%.2f", $totalowed);
$totalpaid = $matrixpaid+$regularpaid;
$totalpaid = sprintf("%.2f", $totalpaid);
####################################################
$q2 = "select * from members order by id desc limit 1";
$r2 = mysql_query($q2);
$rows2 = mysql_num_rows($r2);
if ($rows2 < 1)
{
$lastmemberjoined = "N/A";
}
if ($rows2 > 0)
{
$lastmemberjoined = mysql_result($r2,0,"userid");
}
####################################################
/*
$q3 = "(select paid,datepaid from matrixpayouts) union (select paid,datepaid from regularpayouts) order by datepaid desc limit 1";
$r3 = mysql_query($q3);
$rows3 = mysql_num_rows($r3);
if ($rows3 < 1)
	{
$lastpayout = "N/A";
	}
if ($rows3 > 0)
	{
	$paid = mysql_result($r3,0,"paid");
	$datepaid = mysql_result($r3,0,"datepaid");
	$datepaid = formatDate($datepaid);
	$lastpayout = "\$" . $paid . " on " . $datepaid;
	}
*/
#################################################### 
if ($regularpaid == NULL)
	{
	$regularpaid = "0.00";
	}
if ($matrixpaid == NULL)
	{
	$matrixpaid = "0.00";
	}
if ($regularowed == NULL)
	{
	$regularowed = "0.00";
	}
if ($matrixowed == NULL)
	{
	$matrixowed = "0.00";
	}
?>
<!-- EDIT BELOW TO CHANGE DESIGN OF TABLE WITH STATS IN IT (ie. total payouts, etc.) -->
<table align=center cellpadding="4" cellspacing="0" border="0" style="width: 203px; border: #000000 0px solid; COLOR: #000000; FONT: 12px Tahoma, sans-serif; font-weight: normal;" align="center">
<tr><td style="padding-left: 10px;">
<?php
if ($showdownlinepositioncount == "yes")
{
echo "Total Positions: " . $matrixcount . "<br>";
}
echo "Downline Earnings: \$" . $matrixowed . "<br>";
echo "Downline Payouts: \$" . $matrixpaid . "<br>";
echo "Regular Earnings: \$" . $regularowed . "<br>";
echo "Regular Payouts: \$" . $regularpaid . "<br>";
echo "Total Payouts: \$" . $totalpaid . "<br>";
#echo "Last Payout Made: " . $lastpayout . "<br>";
echo "Newest Member: " . $lastmemberjoined . "<br>";
echo "</td></tr></table>";
?>
<!-- COPY THIS CODE TO PASTE INTO ANY HTML PAGE -->
<br>
<table cellpadding="2" cellspacing="0" border="0" style="border: #000000 1px solid; background: url('<?php echo $domain ?>/images/nav.png');COLOR: #ffffff; FONT: 16px; font-weight: bold;" align="center"><tr><td align="center">
Latest Payouts<br>
</td></tr><tr><td>
<iframe id="NewsWindow" src="payoutscroller.php" width="<?php echo $featuredadwidth ?>" height="300" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" style="border: #000000 1px solid;"></iframe>
</td></tr></table>
<!-- END CODE -->
<?php
echo "</p>";
?>
</td>
</tr>
</table>
</td>
<td>
</td>
</tr>
<tr style="height:8px;">
<td colspan="3">
</tr>
</table>
<?php
} # if ($showmainpagestats == "yes")
###############################################################################################################
?>