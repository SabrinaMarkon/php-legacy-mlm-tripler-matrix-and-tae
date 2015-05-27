<?php
session_start();
include "../config.php";
require('../EgoPaySci.php');
if (isset($_GET["m"]))
{
$matrixnumber = $_GET["m"];
}
else
{
include "../header.php";
include "../style.php";
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">Invalid Downline Specified</div></td></tr>
<tr><td align="center" colspan="2"><br>The matrix downline you selected does not exist.</td></tr>
<tr><td align="center" colspan="2"><br><a href="index.php">Return To Member Page</a></td></tr>
</table>
<?php
echo "</td></tr></table>";
include "../footer.php";
exit;
}
$matrixname = "matrixenabled" . $matrixnumber;
if ($$matrixname != "yes")
{
echo "The script you are trying to run isn't licensed for Downline #" . $matrixnumber . ". Please contact <a href=\"mailto:sabrina@phpsitescripts.com\">Sabrina Markon</a> at <a href=\"http://phpsitescripts.com\">PHPSiteScripts.com</a> to purchase the Downline #" . $matrixnumber . " add-on.</a>";
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
<tr><td align="center" colspan="2"><br>The downline you selected does not exist.</td></tr>
<tr><td align="center" colspan="2"><br><a href="index.php">Return To Member Page</a></td></tr>
</table>
<?php
echo "</td></tr></table>";
include "../footer.php";
exit;
}
include "../header.php";
include "../style.php";

if( session_is_registered("ulogin") ) {
include("navigation.php");
include("../banners.php");
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
$howmanypositions = $_POST["howmanypositions"];
if ($howmanypositions == "")
	{
	$howmanypositions = 1;
	}
$pricename = "price" . $matrixnumber;
$apfeepercentage = $paymentprocessorfeepercentagetoadd/100;
$totalprice = $$pricename+($$pricename*$apfeepercentage);
$totalprice = $totalprice*$howmanypositions;
$payoutname = "payout" . $matrixnumber;
$selldownlinename = "selldownline" . $matrixnumber;
$enablepersonalreferralsname = "enablepersonalreferrals" . $matrixnumber;
$q = "select * from matrix$matrixnumber where username=\"$userid\"";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
if ($rows < 1)
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">Access Denied</div></td></tr>
<tr><td align="center" colspan="2"><br>Sorry, you need to be a member of the $<?php echo $$pricename ?> <?php echo $sitename ?> downline to view it.
<?php
if ($$selldownlinename == "yes")
{
echo " Order positions in this matrix below!";
}
?>
</td></tr>
<?php
if ($paymentprocessorfeepercentagetoadd > 0)
{
?>
<tr><td align="center" colspan="2"><br>A fee of <?php echo $paymentprocessorfeepercentagetoadd ?>% is added to the total to compensate for payment processor fees.</td></tr>
<?php
}
?>
<?php
if (($$selldownlinename == "yes") and (($adminpayza != "") or (($egopay_store_id!="") and ($egopay_store_password!="")) or ($adminperfectmoney != "") or ($adminokpay != "") or ($adminsolidtrustpay != "") or ($adminmoneybookers != "")))
	{
	if ($canbuymultiplepositionsatonce == "yes")
		{
		?>
		<form method="post">
		<tr><td align="center" colspan="2"><br>
		Purchase <select name="howmanypositions" id="howmanypositions" onchange="this.form.submit();" class="pickone">
		<option value="1" <?php if ($howmanypositions == 1) { echo "selected"; } ?>>1</option>
		<option value="2" <?php if ($howmanypositions == 2) { echo "selected"; } ?>>2</option>
		<option value="3" <?php if ($howmanypositions == 3) { echo "selected"; } ?>>3</option>
		<option value="4" <?php if ($howmanypositions == 4) { echo "selected"; } ?>>4</option>
		<option value="5" <?php if ($howmanypositions == 5) { echo "selected"; } ?>>5</option>
		<option value="6" <?php if ($howmanypositions == 6) { echo "selected"; } ?>>6</option>
		<option value="7" <?php if ($howmanypositions == 7) { echo "selected"; } ?>>7</option>
		<option value="8" <?php if ($howmanypositions == 8) { echo "selected"; } ?>>8</option>
		<option value="9" <?php if ($howmanypositions == 9) { echo "selected"; } ?>>9</option>
		<option value="10" <?php if ($howmanypositions == 10) { echo "selected"; } ?>>10</option>
		</select> Positions
		<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
		</td></tr>
		</form>
		<?php
		}
$adpackdefaultq = "select * from adpacks where enabled=\"yes\" order by id limit 1";
$adpackdefaultr = mysql_query($adpackdefaultq);
$adpackdefaultrows = mysql_num_rows($adpackdefaultr);
if ($adpackdefaultrows > 0)
		{
		$adpackdefaultid = mysql_result($adpackdefaultr,0,"id");
		}
$adpackchosen = $_POST["adpackchosen"];
if ($adpackchosen == "")
	{
	$adpackchosen = $adpackdefaultid;
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<form method="post">
<tr><td align="center" colspan="2">
Select AdPack: </b><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
?>
<option value="<?php echo $adpackid ?>"<?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions ?>">
</td></tr>
</form>
<?php
	}

# PAYZA
if ($adminpayza != "")
{
?>
<form method="post" action="https://secure.payza.com/checkout"> 
<tr><td align="center" colspan="2"><br>
<input type="hidden" name="ap_purchasetype" value="item"> 
<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
<input type="hidden" name="ap_currency" value="USD"> 
<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
<input type="hidden" name="ap_quantity" value="1"> 
<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
<input type="hidden" name="apc_2" value="<?php echo $howmanypositions ?>">
<input type="hidden" name="apc_3" value="<?php echo $matrixnumber ?>">
<input type="hidden" name="apc_4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ap_amount" value="<?php echo $totalprice ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif" border="0">
</form>
</td></tr>
<?php
} # if ($adminpayza != "")

# EGOPAY
if (($egopay_store_id!="") and ($egopay_store_password!=""))
{
try {
		
	$oEgopay = new EgoPaySci(array(
		'store_id'          => $egopay_store_id,
		'store_password'    => $egopay_store_password
	));
	
	$sPaymentHash = $oEgopay->createHash(array(
	/*
	 * Payment amount with two decimal places 
	 */
		'amount'    => $totalprice,
	/*
	 * Payment currency, USD/EUR
	 */
		'currency'  => 'USD',
	/*
	 * Description of the payment, limited to 120 chars
	 */
		'description' => $sitename . ' - ' . $userid,
	
	/*
	 * Optional fields
	 */
	'fail_url'	=> $domain. '/members/advertise.php',
	'success_url'	=> $domain. '/thank-you.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' - ' . $userid,
	'cf_3' => $totalprice,
	'cf_4' => $howmanypositions,
	'cf_5' => $matrixnumber,
	'cf_6' => $adpackchosen,
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<tr><td align="center"><br>
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
</form>
</td></tr>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<tr><td align="center"><br>
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalprice ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/tripler_downlines.php">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions matrixnumber adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions ?>">
<input type="hidden" name="matrixnumber" value="<?php echo $matrixnumber ?>">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
</form>
</td></tr>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<tr><td align="center"><br>
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $totalprice ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions ?>">
<input type="hidden" name="ok_item_1_custom_3_title" value="matrixnumber">
<input type="hidden" name="ok_item_1_custom_3_value" value="<?php echo $matrixnumber ?>">
<input type="hidden" name="ok_item_1_custom_4_title" value="adpackid">
<input type="hidden" name="ok_item_1_custom_4_value" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/tripler_downlines.php">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
</form>
</td></tr>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<tr><td align="center"><br>
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $totalprice ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="user2" value="<?php echo $howmanypositions ?>">
<input type="hidden" name="user3" value="<?php echo $matrixnumber ?>">
<input type="hidden" name="user4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_downlines.php">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
</form>
</td></tr>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<tr><td align="center"><br>
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_downlines.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $totalprice ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,matrixnumber,adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions ?>">
<input type="hidden" name="matrixnumber" value="<?php echo $matrixnumber ?>">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookers.gif">
</form>
</td></tr>
<?php
} # if ($adminmoneybookers != "")


	} # if (($$selldownlinename == "yes") and (($adminpayza != "") or (($egopay_store_id!="") and ($egopay_store_password!="")) or ($adminperfectmoney != "") or ($adminokpay != "") or ($adminsolidtrustpay != "") or ($adminmoneybookers != "")))
$apq = "select * from adpacks where enabled=\"yes\" order by id";
$apr = mysql_query($apq);
$aprows = mysql_num_rows($apr);
if ($aprows > 0)
	{
?>
<tr><td align="center" colspan="2">&nbsp;<br>&nbsp;<br></td></tr>
<tr><td align="center" colspan="2">
<table cellpadding="2" cellspacing="2" border="0" align="center" bgcolor="#999999">
<tr><td align="center" colspan="2"><div class="heading"><?php echo $sitename ?> AdPacks</div></td></tr>
<tr bgcolor="#eeeeee"><td align="center"><b>AdPack</b></td><td align="center"><b>Description</b></td></tr>
<?php
	while ($aprowz = mysql_fetch_array($apr))
	{
	$description = $aprowz["description"];
	$points = $aprowz["points"];
	$surfcredits = $aprowz["surfcredits"];
	$banner_num = $aprowz["banner_num"];
	$banner_views = $aprowz["banner_views"];
	$solo_num = $aprowz["solo_num"];
	$traffic_num = $aprowz["traffic_num"];
	$traffic_views = $aprowz["traffic_views"];
	$login_num = $aprowz["login_num"];
	$login_views = $aprowz["login_views"];
	$hotlink_num = $aprowz["hotlink_num"];
	$hotlink_views = $aprowz["hotlink_views"];
	$button_num = $aprowz["button_num"];
	$button_views = $aprowz["button_views"];
	$ptc_num = $aprowz["ptc_num"];
	$ptc_views = $aprowz["ptc_views"];
	$featuredad_num = $aprowz["featuredad_num"];
	$featuredad_views = $aprowz["featuredad_views"];
	$hheaderad_num = $aprowz["hheaderad_num"];
	$hheaderad_views = $aprowz["hheaderad_views"];
	$hheadlinead_num = $aprowz["hheadlinead_num"];
	$hheadlinead_views = $aprowz["hheadlinead_views"];
?>
<tr bgcolor="#eeeeee"><td align="center"><?php echo $description ?></td><td>
<div>
<ul>
<?php
	if ($points > 0)
		{
		echo "<li>$points Points</li>";
		}
	if ($surfcredits > 0)
		{
		echo "<li>$surfcredits Surf Credits</li>";
		}
	if ($solo_num > 0)
		{
		echo "<li>$solo_num Solo Ads</li>";
		}
	if (($featuredad_num > 0) and ($featuredad_views > 0))
		{
		echo "<li>$featuredad_num Featured Ads with $featuredad_views Impressions</li>";
		}
	if (($hheaderad_num > 0) and ($hheaderad_views > 0))
		{
		echo "<li>$hheaderad_num Hot Header Adz with $hheaderad_views Impressions</li>";
		}
	if (($hheadlinead_num > 0) and ($hheadlinead_views > 0))
		{
		echo "<li>$hheadlinead_num Hot Headline Adz with $hheadlinead_views Impressions</li>";
		}
	if (($banner_num > 0) and ($banner_views > 0))
		{
		echo "<li>$banner_num Banner Ads with $banner_views Impressions</li>";
		}
	if (($button_num > 0) and ($button_views > 0))
		{
		echo "<li>$button_num Button Banner Ads with $button_views Impressions</li>";
		}
	if (($login_num > 0) and ($login_views > 0))
		{
		echo "<li>$login_num Login Ads with $login_views Impressions</li>";
		}
	if (($traffic_num > 0) and ($traffic_views > 0))
		{
		echo "<li>$traffic_num Traffic Links with $traffic_views Impressions</li>";
		}
	if (($hotlink_num > 0) and ($hotlink_views > 0))
		{
		echo "<li>$hotlink_num Hot Links with $hotlink_views Impressions</li>";
		}
	if (($ptc_num > 0) and ($ptc_views > 0))
		{
		echo "<li>$ptc_num PTC Ads with $ptc_views Impressions</li>";
		}
?>
</ul>
</div>
</td></tr>
<?php
	}
?>
</table>
</td></tr>
<?php
	}
?>
<tr><td align="center" colspan="2"><br><a href="index.php">Return To Member Page</a></td></tr>
</table>
<?php
}
if ($rows > 0)
{
######################################################################################################
$tbl_name="matrix" . $matrixnumber;	 # your table name
# How many adjacent pages should be shown on each side?
$adjacents = 3;
# First get total number of rows in data table. 
# If you have a WHERE clause in your query, make sure you mirror it here.
$query = "select count(*) as num FROM $tbl_name where positionsleft>0 order by memberid asc";
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];
# Setup vars for query.
$targetpage = "tripler_downlines.php"; 	# your file name  (the name of this file)
$limit = 50; # how many items to show per page
$page = $_GET['page'];
if($page) 
$start = ($page - 1) * $limit; # first item to display on this page
else
$start = 0; # if no page var is given, set start to 0
# Get data.
$pnquery = "select * from $tbl_name where positionsleft>0 order by memberid asc limit $start, $limit";
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
######################################################################################################
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">$<?php echo $$pricename ?> <?php echo $sitename ?> Live Downline!</div></td></tr>
<tr><td align="center" colspan="2"><br><?php echo $pagination ?></td></tr>
<tr><td colspan="2"><br>The next top position will cycle (and be paid $<?php echo $$payoutname ?>!) per every 3 new positions!<br><br>The referrals shown for each person are towards their next position cycling. When a person's position cycles, they are removed from the top
<?php
if ($$enablepersonalreferralsname == "yes")
{
echo " (or from their current position if they cycle early due to their own personal referrals)";
}

echo " and the next person in the downline will move up automatically!";

if ($$selldownlinename == "yes")
{
echo " Order more positions in this matrix below!";
}
?>
</td></tr>
<?php
if ($paymentprocessorfeepercentagetoadd > 0)
{
?>
<tr><td align="center" colspan="2"><br>A fee of <?php echo $paymentprocessorfeepercentagetoadd ?>% is added to the total to compensate for payment processor fees.</td></tr>
<?php
}
if (($$selldownlinename == "yes") and (($adminpayza != "") or (($egopay_store_id!="") and ($egopay_store_password!="")) or ($adminperfectmoney != "") or ($adminokpay != "") or ($adminsolidtrustpay != "") or ($adminmoneybookers != "")))
	{
	if ($canbuymultiplepositionsatonce == "yes")
		{
		?>
		<form method="post">
		<tr><td align="center" colspan="2"><br>
		Purchase <select name="howmanypositions" id="howmanypositions" onchange="this.form.submit();" class="pickone">
		<option value="1" <?php if ($howmanypositions == 1) { echo "selected"; } ?>>1</option>
		<option value="2" <?php if ($howmanypositions == 2) { echo "selected"; } ?>>2</option>
		<option value="3" <?php if ($howmanypositions == 3) { echo "selected"; } ?>>3</option>
		<option value="4" <?php if ($howmanypositions == 4) { echo "selected"; } ?>>4</option>
		<option value="5" <?php if ($howmanypositions == 5) { echo "selected"; } ?>>5</option>
		<option value="6" <?php if ($howmanypositions == 6) { echo "selected"; } ?>>6</option>
		<option value="7" <?php if ($howmanypositions == 7) { echo "selected"; } ?>>7</option>
		<option value="8" <?php if ($howmanypositions == 8) { echo "selected"; } ?>>8</option>
		<option value="9" <?php if ($howmanypositions == 9) { echo "selected"; } ?>>9</option>
		<option value="10" <?php if ($howmanypositions == 10) { echo "selected"; } ?>>10</option>
		</select> Positions
		<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
		</td></tr>
		</form>
		<?php
		}
$adpackdefaultq = "select * from adpacks where enabled=\"yes\" order by id limit 1";
$adpackdefaultr = mysql_query($adpackdefaultq);
$adpackdefaultrows = mysql_num_rows($adpackdefaultr);
if ($adpackdefaultrows > 0)
		{
		$adpackdefaultid = mysql_result($adpackdefaultr,0,"id");
		}
$adpackchosen = $_POST["adpackchosen"];
if ($adpackchosen == "")
	{
	$adpackchosen = $adpackdefaultid;
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<form method="post">
<tr><td align="center" colspan="2">
Select AdPack: </b><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
?>
<option value="<?php echo $adpackid ?>"<?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions ?>">
</td></tr>
</form>
<?php
	}

# PAYZA
if ($adminpayza != "")
{
?>
<form method="post" action="https://secure.payza.com/checkout"> 
<tr><td align="center" colspan="2"><br>
<input type="hidden" name="ap_purchasetype" value="item"> 
<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
<input type="hidden" name="ap_currency" value="USD"> 
<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
<input type="hidden" name="ap_quantity" value="1"> 
<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
<input type="hidden" name="apc_2" value="<?php echo $howmanypositions ?>">
<input type="hidden" name="apc_3" value="<?php echo $matrixnumber ?>">
<input type="hidden" name="apc_4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ap_amount" value="<?php echo $totalprice ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif" border="0">
</form>
</td></tr>
<?php
} # if ($adminpayza != "")

# EGOPAY
if (($egopay_store_id!="") and ($egopay_store_password!=""))
{
try {
		
	$oEgopay = new EgoPaySci(array(
		'store_id'          => $egopay_store_id,
		'store_password'    => $egopay_store_password
	));
	
	$sPaymentHash = $oEgopay->createHash(array(
	/*
	 * Payment amount with two decimal places 
	 */
		'amount'    => $totalprice,
	/*
	 * Payment currency, USD/EUR
	 */
		'currency'  => 'USD',
	/*
	 * Description of the payment, limited to 120 chars
	 */
		'description' => $sitename . ' - ' . $userid,
	
	/*
	 * Optional fields
	 */
	'fail_url'	=> $domain. '/members/advertise.php',
	'success_url'	=> $domain. '/thank-you.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' - ' . $userid,
	'cf_3' => $totalprice,
	'cf_4' => $howmanypositions,
	'cf_5' => $matrixnumber,
	'cf_6' => $adpackchosen,
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<tr><td align="center"><br>
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
</form>
</td></tr>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<tr><td align="center"><br>
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalprice ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/tripler_downlines.php">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions matrixnumber adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions ?>">
<input type="hidden" name="matrixnumber" value="<?php echo $matrixnumber ?>">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
</form>
</td></tr>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<tr><td align="center"><br>
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $totalprice ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions ?>">
<input type="hidden" name="ok_item_1_custom_3_title" value="matrixnumber">
<input type="hidden" name="ok_item_1_custom_3_value" value="<?php echo $matrixnumber ?>">
<input type="hidden" name="ok_item_1_custom_4_title" value="adpackid">
<input type="hidden" name="ok_item_1_custom_4_value" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/tripler_downlines.php">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
</form>
</td></tr>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<tr><td align="center"><br>
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $totalprice ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="user2" value="<?php echo $howmanypositions ?>">
<input type="hidden" name="user3" value="<?php echo $matrixnumber ?>">
<input type="hidden" name="user4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_downlines.php">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
</form>
</td></tr>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<tr><td align="center"><br>
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_downlines.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $totalprice ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,matrixnumber,adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions ?>">
<input type="hidden" name="matrixnumber" value="<?php echo $matrixnumber ?>">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookers.gif">
</form>
</td></tr>
<?php
} # if ($adminmoneybookers != "")

	} # if (($$selldownlinename == "yes") and (($adminpayza != "") or (($egopay_store_id!="") and ($egopay_store_password!="")) or ($adminperfectmoney != "") or ($adminokpay != "") or ($adminsolidtrustpay != "") or ($adminmoneybookers != "")))
$apq = "select * from adpacks where enabled=\"yes\" order by id";
$apr = mysql_query($apq);
$aprows = mysql_num_rows($apr);
if ($aprows > 0)
	{
?>
<tr><td align="center" colspan="2">&nbsp;<br>&nbsp;<br></td></tr>
<tr><td align="center" colspan="2">
<table cellpadding="2" cellspacing="2" border="0" align="center" bgcolor="#999999">
<tr><td align="center" colspan="2"><div class="heading"><?php echo $sitename ?> AdPacks</div></td></tr>
<tr bgcolor="#eeeeee"><td align="center"><b>AdPack</b></td><td align="center"><b>Description</b></td></tr>
<?php
	while ($aprowz = mysql_fetch_array($apr))
	{
	$description = $aprowz["description"];
	$points = $aprowz["points"];
	$surfcredits = $aprowz["surfcredits"];
	$banner_num = $aprowz["banner_num"];
	$banner_views = $aprowz["banner_views"];
	$solo_num = $aprowz["solo_num"];
	$traffic_num = $aprowz["traffic_num"];
	$traffic_views = $aprowz["traffic_views"];
	$login_num = $aprowz["login_num"];
	$login_views = $aprowz["login_views"];
	$hotlink_num = $aprowz["hotlink_num"];
	$hotlink_views = $aprowz["hotlink_views"];
	$button_num = $aprowz["button_num"];
	$button_views = $aprowz["button_views"];
	$ptc_num = $aprowz["ptc_num"];
	$ptc_views = $aprowz["ptc_views"];
	$featuredad_num = $aprowz["featuredad_num"];
	$featuredad_views = $aprowz["featuredad_views"];
	$hheaderad_num = $aprowz["hheaderad_num"];
	$hheaderad_views = $aprowz["hheaderad_views"];
	$hheadlinead_num = $aprowz["hheadlinead_num"];
	$hheadlinead_views = $aprowz["hheadlinead_views"];
?>
<tr bgcolor="#eeeeee"><td align="center"><?php echo $description ?></td><td>
<div>
<ul>
<?php
	if ($points > 0)
		{
		echo "<li>$points Points</li>";
		}
	if ($surfcredits > 0)
		{
		echo "<li>$surfcredits Surf Credits</li>";
		}
	if ($solo_num > 0)
		{
		echo "<li>$solo_num Solo Ads</li>";
		}
	if (($featuredad_num > 0) and ($featuredad_views > 0))
		{
		echo "<li>$featuredad_num Featured Ads with $featuredad_views Impressions</li>";
		}
	if (($hheaderad_num > 0) and ($hheaderad_views > 0))
		{
		echo "<li>$hheaderad_num Hot Header Adz with $hheaderad_views Impressions</li>";
		}
	if (($hheadlinead_num > 0) and ($hheadlinead_views > 0))
		{
		echo "<li>$hheadlinead_num Hot Headline Adz with $hheadlinead_views Impressions</li>";
		}
	if (($banner_num > 0) and ($banner_views > 0))
		{
		echo "<li>$banner_num Banner Ads with $banner_views Impressions</li>";
		}
	if (($button_num > 0) and ($button_views > 0))
		{
		echo "<li>$button_num Button Banner Ads with $button_views Impressions</li>";
		}
	if (($login_num > 0) and ($login_views > 0))
		{
		echo "<li>$login_num Login Ads with $login_views Impressions</li>";
		}
	if (($traffic_num > 0) and ($traffic_views > 0))
		{
		echo "<li>$traffic_num Traffic Links with $traffic_views Impressions</li>";
		}
	if (($hotlink_num > 0) and ($hotlink_views > 0))
		{
		echo "<li>$hotlink_num Hot Links with $hotlink_views Impressions</li>";
		}
	if (($ptc_num > 0) and ($ptc_views > 0))
		{
		echo "<li>$ptc_num PTC Ads with $ptc_views Impressions</li>";
		}
?>
</ul>
</div>
</td></tr>
<?php
	}
?>
</table>
</td></tr>
<?php
	}
$pnrows = mysql_num_rows($pnresult);
if ($pnrows > 0)
{
$positiondisplaynumber = 1;
?>
<tr><td align="center" colspan="2">
<br><br><table cellpadding="4" cellspacing="2" border="0" align="center" bgcolor="#999999">
<tr><td align="center"><b>Position</b></td><td align="center"><b>Username</b></td>
<td align="center"><b>Referral 1</b></td>
<td align="center"><b>Referral 2</b></td>
<td align="center"><b>Referral 3</b></td>
</tr>
<?php
while ($pnrow = mysql_fetch_array($pnresult))
{
$name = $pnrow["username"];
$referral1 = $pnrow["ref1username"];
$referral2 = $pnrow["ref2username"];
$referral3 = $pnrow["ref3username"];
?>
<tr bgcolor="#eeeeee"><td align="center"><?php echo $positiondisplaynumber ?></td><td align="center"><?php echo $name ?></td>
<td align="center"><?php echo $referral1 ?></td>
<td align="center"><?php echo $referral2 ?></td>
<td align="center"><?php echo $referral3 ?></td>
</tr>
<?php
$positiondisplaynumber = $positiondisplaynumber+1;
}
?>
</table></td></tr>
<tr><td align="center" colspan="2"><br><?php echo $pagination ?></td></tr>
</table>
<?php
} # if ($pnrows > 0)
} # if ($rows > 0)
}
else
{ ?>
<p>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p>
<? }
echo "</td></tr></table>";
include "../footer.php";
exit;
?>