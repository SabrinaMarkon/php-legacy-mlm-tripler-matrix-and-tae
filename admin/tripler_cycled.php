<?php
session_start();
# admin control file for viewing, adding, removing, and editing positions in each downline.
include "../config.php";
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
if (isset($_REQUEST["m"]))
{
$matrixnumber = $_REQUEST["m"];
}
else
{
include "../header.php";
include "../style.php";
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">Invalid Downline Specified</div></td></tr>
<tr><td align="center" colspan="2"><br>The matrix downline you selected does not exist.</td></tr>
</table>
<?php
include "../footer.php";
exit;
}
$matrixname = "matrixenabled" . $matrixnumber;
if ($$matrixname != "yes")
{
include "../header.php";
include "../style.php";
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">License Limitation</div></td></tr>
<tr><td align="center" colspan="2"><br>The script you are trying to run isn't licensed for Downline #<?php echo $matrixnumber ?>. Please contact <a href="mailto:webmaster@pearlsofwealth.com">Sabrina Markon</a> at <a href="http://www.pearlsofwealth.com" target="_blank">PearlsOfWealth.com</a> to purchase the Downline #<?php echo $matrixnumber ?> add-on.</a></td></tr>
</table>
<?php
include "../footer.php";
exit;
}
$selldownlinename = "selldownline" . $matrixnumber;
if ($$selldownlinename != "yes")
{
include "../header.php";
include "../style.php";
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">Invalid Downline</div></td></tr>
<tr><td align="center" colspan="2"><br>The downline you selected does not exist yet because you haven't yet enabled it.<br><br>If you would like to start another new downline, you can enable it <a href="tripler_settings.php">HERE</a></td></tr>
</table>
<?php
include "../footer.php";
exit;
}
$action = $_POST["action"];
####################################################################################################
if ($action == "saveposition")
{
# matrix number is in the request variable above.
include "../header.php";
include "../style.php";
$savememberid = $_POST["savememberid"];
$savepaypal = $_POST["savepaypal"];
$savepayza = $_POST["savepayza"];
$saveegopay = $_POST["saveegopay"];
$saveperfectmoney = $_POST["saveperfectmoney"];
$saveokpay = $_POST["saveokpay"];
$savesolidtrustpay = $_POST["savesolidtrustpay"];
$savemoneybookers = $_POST["savemoneybookers"];
$savepaychoice = $_POST["savepaychoice"];
$saveowed = $_POST["saveowed"];
$savepaid = $_POST["savepaid"];
$q = "update matrix$matrixnumber set paychoice=\"$savepaychoice\",paypal=\"$savepaypal\",payza=\"$savepayza\",egopay=\"$saveegopay\",perfectmoney=\"$saveperfectmoney\",okpay=\"$saveokpay\",solidtrustpay=\"$savesolidtrustpay\",moneybookers=\"$savemoneybookers\",owed=\"$saveowed\",paid=\"$savepaid\" where memberid=\"$savememberid\"";
$r = mysql_query($q);
echo "<p align=\"center\">Downline #" . $matrixnumber . "'s ID #" . $savememberid . " was Saved!</p>";
echo "<p align=\"center\"><a href=\"tripler_cycled.php?m=" . $matrixnumber . "\">Return</a></p>";
include "../footer.php";
exit;
} # if ($action == "saveposition")
####################################################################################################
if ($action == "markpaid")
{
$downlineid = $_POST["downlineid"];
$pay = $_POST["pay"];
$matrixnumber = $_POST["matrixnumber"];
$q = "select * from matrix$matrixnumber where memberid=\"$downlineid\"";
$r = mysql_query($q) or die(mysql_error());
$rows = mysql_num_rows($r);
if ($rows > 0)
	{
$username = mysql_result($r,0,"username");
$q2 = "insert into matrixpayouts (userid,paid,datepaid,description) values (\"$username\",\"$pay\",NOW(),\"Downline #$matrixnumber Payout - for ID #$downlineid\")";
$r2 = mysql_query($q2) or die(mysql_error());
$q3 = "update matrix$matrixnumber set owed=owed-".$pay.",paid=paid+".$pay.",lastpaid=NOW() where memberid=\"$downlineid\"";
$r3 = mysql_query($q3) or die(mysql_error());
echo "<p><center>Earnings of \$" . $pay . " for ".$username." have been marked as paid out.</p></center>";
	}
include "../footer.php";
exit;
} # if ($action == "markpaid")
####################################################################################################
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {
?><table>
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td valign="top" align="center"><br><br> <?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
$pricename = "price" . $matrixnumber;
$payoutname = "payout" . $matrixnumber;
$selldownlinename = "selldownline" . $matrixnumber;
$enablepersonalreferralsname = "enablepersonalreferrals" . $matrixnumber;
###############################################################
$tbl_name="matrix" . $matrixnumber;	 # your table name
# How many adjacent pages should be shown on each side?
$adjacents = 3;
# First get total number of rows in data table. 
# If you have a WHERE clause in your query, make sure you mirror it here.
$query = "select count(*) as num FROM $tbl_name where positionscycled>0 order by memberid asc";
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];
# Setup vars for query.
$targetpage = "tripler_cycled.php"; 	# your file name  (the name of this file)
$limit = 50; # how many items to show per page
$page = $_GET['page'];
if($page) 
$start = ($page - 1) * $limit; # first item to display on this page
else
$start = 0; # if no page var is given, set start to 0
# Get data.
$pnquery = "select * from $tbl_name where positionscycled>0 order by memberid asc limit $start, $limit";
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
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">$<?php echo $$pricename ?> <?php echo $sitename ?> Cycled Positions</div></td></tr>
<tr><td align="center" colspan="2"><br><?php echo $pagination ?></td></tr>
<tr><td colspan="2"><br>Here is shown any positions that have cycled in order. Earnings for cycling will be shown along with the ability to submit payment to the member who is owed. Any positions currently owed money will be highlighted to find them easily in the list.</td></tr>
<tr><td colspan="2"><br><br></td></tr>
<?php
$pnrows = mysql_num_rows($pnresult);
if ($pnrows > 0)
{
$cycleorderdisplaynumber = 1;
?>
<tr><td align="center" colspan="2">
<br><table cellpadding="1" cellspacing="2" border="0" align="center" bgcolor="#999999">
<tr bgcolor="#eeeeee"><td align="center"><b>Order Cycled</b></td><td align="center"><b>Date Cycled</b></td><td align="center"><b>Unique Position ID (never changes)</b></td><td align="center"><b>Username</b></td>
<td align="center"><b><a href="http://paypal.com" target="_blank">PayPal</a></b></td>
<td align="center"><b><a href="https://secure.payza.com/login" target="_blank">Payza</a></b></td>
<td align="center"><b><a href="https://www.egopay.com/login" target="_blank">EgoPay</a></b></td>
<td align="center"><b><a href="https://perfectmoney.is/login.html" target="_blank">Perfect Money</a></b></td>
<td align="center"><b><a href="https://www.okpay.com/en/account/login.html" target="_blank">OKPay</a></b></td>
<td align="center"><b><a href="https://www.solidtrustpay.com/login" target="_blank">Solid Trust Pay</a></b></td>
<td align="center"><b><a href="https://account.skrill.com/login?locale=en" target="_blank">Moneybookers</a></b></td>
<td align="center"><b>Paid With</b></td>
<td align="center"><b>Owed</b></td>
<td align="center"><b>Paid</b></td>
<td align="center"><b>Date Paid</b></td>
<td align="center"><b>Save</b></td>
<td align="center" colspan="3"><b>Mark Paid Out</b></td>
</tr>
<?php
while ($pnrow = mysql_fetch_array($pnresult))
{
$memberid = $pnrow["memberid"];
$name = $pnrow["username"];
$cycledate = $pnrow["cycledate"];
if ($cycledate == 0)
{
$showcycledate = "N/A";
}
if ($cycledate != 0)
{
$showcycledate = formatDate($cycledate);
}
$paypal = $pnrow["paypal"];
$payza = $pnrow["payza"];
$egopay = $pnrow["egopay"];
$perfectmoney = $pnrow["perfectmoney"];
$okpay = $pnrow["okpay"];
$solidtrustpay = $pnrow["solidtrustpay"];
$moneybookers = $pnrow["moneybookers"];
if (($paypal == "") or ($payza == "") or ($egopay == "") or ($perfectmoney == "") or ($okpay == "") or ($solidtrustpay == "") or ($moneybookers == ""))
	{
	$apq = "select * from members where userid=\"$name\"";
	$apr = mysql_query($apq);
	$aprows = mysql_num_rows($apr);
	if ($aprows > 0)
		{
		$paypal = mysql_result($apr,0,"paypal_email");
		$payza = mysql_result($apr,0,"payza_email");
		$egopay = mysql_result($apr,0,"egopay_account");
		$perfectmoney = mysql_result($apr,0,"perfectmoney_account");
		$okpay = mysql_result($apr,0,"okpay_account");
		$solidtrustpay = mysql_result($apr,0,"solidtrustpay_account");
		$moneybookers = mysql_result($apr,0,"moneybookers_email");
		for ($i=1;$i<=10;$i++)
			{
			$updateapq = "update matrix$i set paypal=\"$paypal\",payza=\"$payza\",egopay=\"$egopay\",perfectmoney=\"$perfectmoney\",okpay=\"$okpay\",solidtrustpay=\"$solidtrustpay\",moneybookers=\"$moneybookers\" where username=\"$name\"";
			$updateapr = mysql_query($updateapq);
			}
		}
	}
$paychoice = $pnrow["paychoice"];
$owed = $pnrow["owed"];
$paid = $pnrow["paid"];
$lastpaid = $pnrow["lastpaid"];
if ($lastpaid == 0)
{
$showlastpaid = "N/A";
}
if ($lastpaid != 0)
{
$showlastpaid = formatDate($lastpaid);
}
?>
<form action="tripler_cycled.php" method="post">
<tr bgcolor="#eeeeee"><td align="center"><?php echo $cycleorderdisplaynumber ?></td><td align="center"><?php echo $showcycledate ?></td><td align="center"><?php echo $memberid ?></td><td align="center"><?php echo $name ?></td>
<td align="center"><input type="text" name="savepaypal" value="<?php echo $paypal ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="savepayza" value="<?php echo $payza ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="saveegopay" value="<?php echo $egopay ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="saveperfectmoney" value="<?php echo $perfectmoney ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="saveokpay" value="<?php echo $okpay ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="savesolidtrustpay" value="<?php echo $solidtrustpay ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="savemoneybookers" value="<?php echo $moneybookers ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="savepaychoice" value="<?php echo $paychoice ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="saveowed" value="<?php echo $owed ?>" maxlength="12" size="6" class="typein"></td>
<td align="center"><input type="text" name="savepaid" value="<?php echo $paid ?>" maxlength="12" size="6" class="typein"></td>
<td align="center"><?php echo $showlastpaid ?></td>
<td align="center">
<input type="hidden" name="savememberid" value="<?php echo $memberid ?>">
<input type="hidden" name="action" value="saveposition">
<input type="hidden" name="m" value="<?php echo $matrixnumber ?>">
<input type="submit" value="SAVE" class="sendit">
</form>
</td>
<?php
if ($owed > 0)
{
?>
<form method="post" action="tripler_cycled.php">
<td align="center">
<input type="hidden" name="action" value="markpaid">
<input type="hidden" name="downlineid" value="<?php echo $memberid ?>">
<input type="hidden" name="pay" value="<?php echo $owed ?>">
<input type="hidden" name="matrixnumber" value="<?php echo $matrixnumber ?>">
<input type="submit" value="SET AS PAID">
</td></form>
</tr>
<?php
} # if ($owed > 0)
else
{
?>
<td align="center">No Money Owed</td>
<?php
}
?>
</tr>
<?php
$cycleorderdisplaynumber = $cycleorderdisplaynumber+1;
} # while ($pnrow = mysql_fetch_array($pnresult))
?>
</table></td></tr>
<tr><td align="center" colspan="2"><br><?php echo $pagination ?></td></tr>
</table>
<?php
} # if ($pnrows > 0)
?>
</td></tr></table>
<?php
}
else
{
echo "Unauthorised Access!";
}
include "../footer.php";
?>