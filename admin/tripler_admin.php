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
if ($action == "newposition")
{
# matrix number is in the request variable above.
include "../header.php";
include "../style.php";
$userid = $_POST["newuserid"];
$paypal = $_POST["newpaypal"];
$payza = $_POST["newpayza"];
$egopay = $_POST["newegopay"];
$perfectmoney = $_POST["newperfectmoney"];
$okpay = $_POST["newokpay"];
$solidtrustpay = $_POST["newsolidtrustpay"];
$moneybookers = $_POST["newmoneybookers"];
$transaction = $_POST["newtransaction"];
$paychoice = $_POST["newpaychoice"];
$positioncount = $_POST["newpositioncount"];
$enablepersonalreferralsname = "enablepersonalreferrals" . $matrixnumber;
$newreferid = $_POST["newreferid"];
if (($$enablepersonalreferralsname == "yes") and ($newreferid != "nopersonalreferid"))
{
$referid = $newreferid;
}
else
{
$referid = "";
}
include "../tripler_add.php";
if ($positioncount > 1)
	{
	$show = "Positions";
	}
if ($positioncount < 2)
	{
	$show = "Position";
	}
echo "<p align=\"center\">" . $positioncount . " " . $show . " Added For " . $userid . " to Downline #" . $matrixnumber. "</p>";
echo "<p align=\"center\"><a href=\"tripler_admin.php?m=" . $matrixnumber . "\">Return</a></p>";
include "../footer.php";
exit;
} # if ($action == "newposition")
####################################################################################################
if ($action == "saveposition")
{
# matrix number is in the request variable above.
include "../header.php";
include "../style.php";
$savememberid = $_POST["savememberid"];
$savetransaction = $_POST["savetransaction"];
$savepaychoice = $_POST["savepaychoice"];
$savepaypal = $_POST["savepaypal"];
$savepayza = $_POST["savepayza"];
$saveegopay = $_POST["saveegopay"];
$saveperfectmoney = $_POST["saveperfectmoney"];
$saveokpay = $_POST["saveokpay"];
$savesolidtrustpay = $_POST["savesolidtrustpay"];
$savemoneybookers = $_POST["savemoneybookers"];

$q = "update matrix$matrixnumber set transaction=\"$savetransaction\",paychoice=\"$savepaychoice\",paypal=\"$savepaypal\",payza=\"$savepayza\",egopay=\"$saveegopay\",perfectmoney=\"$saveperfectmoney\",okpay=\"$saveokpay\",solidtrustpay=\"$savesolidtrustpay\",moneybookers=\"$savemoneybookers\" where memberid=\"$savememberid\"";
$r = mysql_query($q);
echo "<p align=\"center\">Downline #" . $matrixnumber . "'s ID #" . $savememberid . " was Saved!</p>";
echo "<p align=\"center\"><a href=\"tripler_admin.php?m=" . $matrixnumber . "\">Return</a></p>";
include "../footer.php";
exit;
} # if ($action == "saveposition")
####################################################################################################
if ($action == "confirmdeletepositions")
{
# matrix number is in the request variable above.
$deletememberid = $_POST["deletememberid"];
$ref1reassign = $_POST["ref1reassign"];
$ref2reassign = $_POST["ref2reassign"];
$ref3reassign = $_POST["ref3reassign"];
$pricename = "price" . $matrixnumber;
$payoutname = "payout" . $matrixnumber;
$freereentryname = "freereentry" . $matrixnumber;
$enablepersonalreferralsname = "enablepersonalreferrals" . $matrixnumber;
$regularcommissionname = "regularcommission" . $matrixnumber;
$cost = $$pricename;
$reassigndownlineq = "select * from matrix$matrixnumber where memberid=\"$deletememberid\"";
$reassigndownliner = mysql_query($reassigndownlineq);
$reassigndownlinerows = mysql_num_rows($reassigndownliner);
if ($reassigndownlinerows < 1)
{
include "../header.php";
include "../style.php";
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">Position ID#<?php echo $deletememberid ?> Does Not Exist</div></td></tr>
<tr><td align="center" colspan="2"><br>The ID you selected to delete positions for is no longer in the system (perhaps already deleted?).<br><br><a href="tripler_admin.php?m=<?php echo $matrixnumber ?>">Return</a></td></tr>
</table>
<?php
include "../footer.php";
exit;
} # if ($reassigndownlinerows < 1)
if ($reassigndownlinerows > 0)
{
$ifnopositionsleftreassignref1 = mysql_result($reassigndownliner,0,"ref1");
$ifnopositionsleftreassignref1username = mysql_result($reassigndownliner,0,"ref1username");
$ifnopositionsleftreassignref2 = mysql_result($reassigndownliner,0,"ref2");
$ifnopositionsleftreassignref2username = mysql_result($reassigndownliner,0,"ref2username");
$ifnopositionsleftreassignref3 = mysql_result($reassigndownliner,0,"ref3");
$ifnopositionsleftreassignref3username = mysql_result($reassigndownliner,0,"ref3username");

if (($ref1reassign != "no") and ($ref1reassign != ""))
	{
	$rq = "select * from matrix$matrixnumber where memberid=\"$ref1reassign\"";
	$rr = mysql_query($rq);
	$rrows = mysql_num_rows($rr);
	if ($rrows > 0)
		{
		$ref1reassignsref1 = mysql_result($rr,0,"ref1");
		$ref1reassignsref2 = mysql_result($rr,0,"ref2");
		$ref1reassignsref3 = mysql_result($rr,0,"ref3");
		if ($ref1reassignsref1 != 0)
			{
			$rq1 = "update matrix$matrixnumber set ref1='$ifnopositionsleftreassignref1',ref1username='$ifnopositionsleftreassignref1username' where memberid='$ref1reassign'";
			$rr1 = mysql_query($rq1);
			}
		elseif ($ref1reassignsref2 != 0)
			{
			$rq1 = "update matrix$matrixnumber set ref2='$ifnopositionsleftreassignref1',ref2username='$ifnopositionsleftreassignref1username' where memberid='$ref1reassign'";
			$rr1 = mysql_query($rq1);
			}
		elseif ($ref1reassignsref3 != 0)
			{
			$refq1 = "update matrix$matrixnumber set ref3='$ifnopositionsleftreassignref1',ref3username='$ifnopositionsleftreassignref1username' where memberid='$ref1reassign'";
			$refr1 = mysql_query($refq1);
			# since all three refs are filled now, the ref1reassign sponsor has cycled a position.
			$refq2 = "update matrix$whichmatrix set ref1='0',ref2='0',ref3='0',ref1username='',ref2username='',ref3username='',positionsleft=0,positionscycled=positionscycled+1,owed=owed+'$$payoutname',done='yes' where memberid='$ref1reassign'";
			$refr2 = mysql_query($refq2);
				if ($$freereentryname == "yes")
				{
				doReentry($matrixnumber,$ref1reassign);
				}
			}
		} # if ($rrows > 0)
	} # if (($ref1reassign != "no") and ($ref1reassign != ""))
	###########################################################
if (($ref2reassign != "no") and ($ref2reassign != ""))
	{
	$rq = "select * from matrix$matrixnumber where memberid=\"$ref2reassign\"";
	$rr = mysql_query($rq);
	$rrows = mysql_num_rows($rr);
	if ($rrows > 0)
		{
		$ref2reassignsref1 = mysql_result($rr,0,"ref1");
		$ref2reassignsref2 = mysql_result($rr,0,"ref2");
		$ref2reassignsref3 = mysql_result($rr,0,"ref3");
		if ($ref2reassignsref1 != 0)
			{
			$rq1 = "update matrix$matrixnumber set ref1='$ifnopositionsleftreassignref2',ref1username='$ifnopositionsleftreassignref2username' where memberid='$ref2reassign'";
			$rr1 = mysql_query($rq1);
			}
		if ($ref2reassignsref2 != 0)
			{
			$rq1 = "update matrix$matrixnumber set ref2='$ifnopositionsleftreassignref2',ref2username='$ifnopositionsleftreassignref2username' where memberid='$ref2reassign'";
			$rr1 = mysql_query($rq1);
			}
		elseif ($ref2reassignsref3 != 0)
			{
			$refq1 = "update matrix$matrixnumber set ref3='$ifnopositionsleftreassignref2',ref3username='$ifnopositionsleftreassignref2username' where memberid='$ref2reassign'";
			$refr1 = mysql_query($refq1);
			# since all three refs are filled now, the ref2reassign sponsor has cycled a position.
			$refq2 = "update matrix$whichmatrix set ref1='0',ref2='0',ref3='0',ref1username='',ref2username='',ref3username='',positionsleft=0,positionscycled=positionscycled+1,owed=owed+'$$payoutname',done='yes' where memberid='$ref2reassign'";
			$refr2 = mysql_query($refq2);
				if ($$freereentryname == "yes")
				{
				doReentry($matrixnumber,$ref2reassign);
				}
			}
		} # if ($rrows > 0)
	} # if (($ref2reassign != "no") and ($ref2reassign != ""))
	###########################################################
if (($ref3reassign != "no") and ($ref3reassign != ""))
	{
	$rq = "select * from matrix$matrixnumber where memberid=\"$ref3reassign\"";
	$rr = mysql_query($rq);
	$rrows = mysql_num_rows($rr);
	if ($rrows > 0)
		{
		$ref3reassignsref1 = mysql_result($rr,0,"ref1");
		$ref3reassignsref2 = mysql_result($rr,0,"ref2");
		$ref3reassignsref3 = mysql_result($rr,0,"ref3");
		if ($ref3reassignsref1 != 0)
			{
			$rq1 = "update matrix$matrixnumber set ref1='$ifnopositionsleftreassignref3',ref1username='$ifnopositionsleftreassignref3username' where memberid='$ref3reassign'";
			$rr1 = mysql_query($rq1);
			}
		if ($ref3reassignsref2 != 0)
			{
			$rq1 = "update matrix$matrixnumber set ref2='$ifnopositionsleftreassignref3',ref2username='$ifnopositionsleftreassignref3username' where memberid='$ref3reassign'";
			$rr1 = mysql_query($rq1);
			}
		elseif ($ref3reassignsref2 != 0)
			{
			$refq1 = "update matrix$matrixnumber set ref3='$ifnopositionsleftreassignref3',ref3username='$ifnopositionsleftreassignref3username' where memberid='$ref3reassign'";
			$refr1 = mysql_query($refq1);
			# since all three refs are filled now, the ref2reassign sponsor has cycled a position.
			$refq2 = "update matrix$whichmatrix set ref1='0',ref2='0',ref3='0',ref1username='',ref2username='',ref3username='',positionsleft=0,positionscycled=positionscycled+1,owed=owed+'$$payoutname',done='yes' where memberid='$ref3reassign'";
			$refr2 = mysql_query($refq2);
				if ($$freereentryname == "yes")
				{
				doReentry($matrixnumber,$ref3reassign);
				}
			}
		} # if ($rrows > 0)
	} # if (($ref3reassign != "no") and ($ref3reassign != ""))
	###########################################################
# delete the position.
$deleteonepositionq2 = "delete from matrix$matrixnumber where memberid=\"$deletememberid\"";
$deleteonepositionr2 = mysql_query($deleteonepositionq2);
include "../header.php";
include "../style.php";
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">Position #<?php echo $deletememberid ?> Removed</div></td></tr>
<tr><td align="center" colspan="2"><br>The position you selected has been deleted.<br><br><a href="tripler_admin.php?m=<?php echo $matrixnumber ?>">Return</a></td></tr>
</table>
<?php
include "../footer.php";
exit;
} # if ($reassigndownlinerows > 0)
} # if ($action == "confirmdeletepositions")
####################################################################################################
if ($action == "confirmdeletedownline")
{
$deletewords = $_POST["deletewords"];
if ($deletewords == "delete downline")
	{
$q = "delete from matrix$matrixnumber";
$r = mysql_query($q);
include "../header.php";
include "../style.php";
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">Downline #<?php echo $matrixnumber ?> Positions Were All Deleted</div></td></tr>
<tr><td align="center" colspan="2"><br>You may now start this downline over again.<br><br><a href="tripler_admin.php?m=<?php echo $matrixnumber ?>">Return</a></td></tr>
</table>
<?php
include "../footer.php";
exit;
	} # if ($deletewords == "delete downline")
else
	{
include "../header.php";
include "../style.php";
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">Downline #<?php echo $matrixnumber ?> Positions Were NOT Deleted</div></td></tr>
<tr><td align="center" colspan="2"><br><a href="tripler_admin.php?m=<?php echo $matrixnumber ?>">Return</a></td></tr>
</table>
<?php
include "../footer.php";
exit;
	}
} # if ($action == "confirmdeletedownline")
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
$targetpage = "tripler_admin.php"; 	# your file name  (the name of this file)
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
<script type="text/javascript">
<!--
function confirmPost()
{
var agree=confirm("Are you sure you want to delete this position?");
if (agree)
return true ;
else
return false ;
}
function confirmPoststartover()
{
var agree=confirm("Are you sure? This will DELETE ALL POSITIONS in this downline (start over)");
if (agree)
return true ;
else
return false ;
}
-->
</script>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<?php
$q = "select * from members order by userid";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
if ($rows > 0)
{
?>
<tr><td align="center" colspan="2"><div class="heading">Add Position(s) to $<?php echo $$pricename ?> Downline</div></td></tr>
<tr><td colspan="2"><br><br>Please be aware that adding multiple positions to a member when the line is still new will cause one or more of these same positions to cycle right away. For example if you give the very first member in the line four positions, their first will cycle right away! (because #2, #3 and #4 out of the three you added would be counted as their three referrals). For this reason it is best to just give one position at a time at first if you are adding them from the admin area (unless someone paid for them). Below, however, you may add positions then start the downline over again at will, so feel free to try it out and get a feel for it before launch if you like.</td></tr>
<tr><form action="tripler_admin.php" method="post"><td align="center" colspan="2"><br><br>
<br><table cellpadding="4" cellspacing="2" border="0" align="center" bgcolor="#999999" width="300">
<tr bgcolor="#eeeeee"><td align="right">Give To Member: </td><td>
<select name="newuserid" class="pickone">
<?php
while ($rowz = mysql_fetch_array($r))
{
$userid = $rowz["userid"];
echo "<option value=\"" . $userid . "\">" . $userid . "</option>";
}
?>
</select>
</td></tr>
<tr bgcolor="#eeeeee"><td align="right">Payment Method: </td><td><input type="text" class="typein" name="newpaychoice" maxlength="255" size="16"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">PayPal: </td><td><input type="text" class="typein" name="newpaypal" maxlength="255" size="16"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">Payza: </td><td><input type="text" class="typein" name="newpayza" maxlength="255" size="16"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">EgoPay: </td><td><input type="text" class="typein" name="newegopay" maxlength="255" size="16"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">Perfect Money: </td><td><input type="text" class="typein" name="newperfectmoney" maxlength="255" size="16"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">OKPay: </td><td><input type="text" class="typein" name="newokpay" maxlength="255" size="16"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">Solid Trust Pay: </td><td><input type="text" class="typein" name="newsolidtrustpay" maxlength="255" size="16"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">Moneybookers: </td><td><input type="text" class="typein" name="newmoneybookers" maxlength="255" size="16"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">Payment Transaction: </td><td><input type="text" class="typein" name="newtransaction" maxlength="255" size="16"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">Give: </td><td><select name="newpositioncount" id="newpositioncount" class="pickone">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select> Positions</td></tr>
<?php
if ($$enablepersonalreferralsname == "yes")
{
$sponsorq = "select distinct username from matrix$matrixnumber where positionsleft>0 order by memberid";
$sponsorr = mysql_query($sponsorq);
$sponsorrows = mysql_num_rows($sponsorr);
if ($sponsorrows < 1)
	{
	$hidden = "<input type=\"hidden\" name=\"newreferid\" value=\"nopersonalreferid\">";
	}
if ($sponsorrows > 0)
	{
	$hidden = "";
?>
<tr bgcolor="#eeeeee"><td align="center" colspan="2">Personally Referred By: (goes under this person's positions instead of under the top position in the line)<br><select name="newreferid" id="newreferid" class="pickone">
<option value="nopersonalreferid">None - Put New Positions at the End of the Downline</option>
<?php
	while ($sponsorrowz = mysql_fetch_array($sponsorr))
		{
		$referrerusername = $sponsorrowz["username"];
		?>
		<option value="<?php echo $referrerusername ?>"><?php echo $referrerusername ?></option>
		<?php
		}
?>
</select></td></tr>
<?php
	}
} # if ($$enablepersonalreferralsname == "yes")
?>
<tr bgcolor="#eeeeee"><td colspan="2" align="center">
<?php
if ($hidden != "")
{
echo $hidden;
}
if ($$enablepersonalreferralsname != "yes")
{
?>
<input type="hidden" name="newreferid" value="nopersonalreferid">
<?php
}
?>
<input type="hidden" name="action" value="newposition"><input type="hidden" name="m" value="<?php echo $matrixnumber ?>"><input type="submit" value="Add" class="sendit"></form></td></tr>
</table></td></tr>
<tr><td colspan="2" align="center"><br>&nbsp;<br>&nbsp;</td></tr>
<?php
} # if ($rows > 0)
?>
<tr><td align="center" colspan="2"><div class="heading">Start $<?php echo $$pricename ?> Downline Over</div></td></tr>
<tr><td colspan="2"><br><br>Doing this will delete ALL POSITIONS in this downline so you can start over. This is irreversible, so make sure you are certain before doing this.</td></tr>
<tr><td align="center" colspan="2"><br><br><table cellpadding="2" cellspacing="2" border="0" align="center" bgcolor="#999999">
<form action="tripler_admin.php" method="post">
<tr bgcolor="#eeeeee"><td align="center">Type the words (without quotes), "delete downline":</td><td align="center"><input type="text" name="deletewords" value="" maxlength="255" size="12" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td align="center" colspan="2">
<input type="hidden" name="m" value="<?php echo $matrixnumber ?>">
<input type="hidden" name="action" value="confirmdeletedownline">
<input type="submit" value="DELETE ALL AND START OVER" onclick="return confirmPoststartover();" class="sendit">
</form>
</td>
</tr>
</table>
</td></tr>
<tr><td colspan="2" align="center"><br>&nbsp;<br>&nbsp;</td></tr>
<tr><td align="center" colspan="2"><div class="heading">$<?php echo $$pricename ?> <?php echo $sitename ?> Live Downline</div></td></tr>
<tr><td align="center" colspan="2"><br><?php echo $pagination ?></td></tr>
<tr><td colspan="2"><br>The next top position will cycle (and earn $<?php echo $$payoutname ?> at that time) per every 3 new positions!<br><br>The referrals shown for each person are towards their next position cycling. When a person's last position cycles, they are removed from the top and the next person in the downline will move up automatically. If you have enabled the setting to allow people to make personal referrals too, their personal referrals would go under each of their positions in order instead of under the top member (so if personal referrals is enabled, it is possible for members to cycle without waiting until they get to the top position). If you delete a position that has referrals, those referrals will be reassigned to go under the top position in the line.</td></tr>
<tr><td colspan="2"><br><br></td></tr>
<?php
$pnrows = mysql_num_rows($pnresult);
if ($pnrows > 0)
{
$positiondisplaynumber = 1;
?>
<tr><td align="center" colspan="2">
<br><table cellpadding="2" cellspacing="2" border="0" align="center" bgcolor="#999999">
<tr bgcolor="#eeeeee"><td align="center"><b>Place In Line</b></td><td align="center"><b>Unique Position ID (never changes)</b></td><td align="center"><b>Username</b></td>
<td align="center"><b>Referral 1</b></td>
<td align="center"><b>Referral 2</b></td>
<td align="center"><b>Referral 3</b></td>
<td align="center"><b>PayPal</b></td>
<td align="center"><b>Payza</b></td>
<td align="center"><b>EgoPay</b></td>
<td align="center"><b>Perfect Money</b></td>
<td align="center"><b>OKPay</b></td>
<td align="center"><b>Solid Trust Pay</b></td>
<td align="center"><b>Moneybookers</b></td>
<td align="center"><b>Paid With</b></td>
<td align="center"><b>Transaction</b></td>
<td align="center"><b>Order Date</b></td>
<td align="center"><b>IP</b></td>
<td align="center"><b>Save</b></td>
<td align="center" colspan="4"><b>Delete Position</b></td>
</tr>
<?php
while ($pnrow = mysql_fetch_array($pnresult))
{
$memberid = $pnrow["memberid"];
$name = $pnrow["username"];
$ref1username = $pnrow["ref1username"];
$ref1 = $pnrow["ref1"];
$ref2username = $pnrow["ref2username"];
$ref2 = $pnrow["ref2"];
$ref3username = $pnrow["ref3username"];
$ref3 = $pnrow["ref3"];
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
$transaction = $pnrow["transaction"];
$purchasedate = $pnrow["purchasedate"];
if ($purchasedate == 0)
{
$showpurchasedate = "N/A";
}
if ($purchasedate != 0)
{
$showpurchasedate = formatDate($purchasedate);
}
$purchaseip = $pnrow["purchaseip"];
?>
<form action="tripler_admin.php" method="post">
<tr bgcolor="#eeeeee"><td align="center"><?php echo $positiondisplaynumber ?></td><td align="center"><?php echo $memberid ?></td><td align="center"><?php echo $name ?></td>
<td align="center"><?php echo $ref1username ?></td>
<td align="center"><?php echo $ref2username ?></td>
<td align="center"><?php echo $ref3username ?></td>
<td align="center"><input type="text" name="savepaypal" value="<?php echo $paypal ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="savepayza" value="<?php echo $payza ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="saveegopay" value="<?php echo $egopay ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="saveperfectmoney" value="<?php echo $perfectmoney ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="saveokpay" value="<?php echo $okpay ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="savesolidtrustpay" value="<?php echo $solidtrustpay ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="savemoneybookers" value="<?php echo $moneybookers ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="savepaychoice" value="<?php echo $paychoice ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><input type="text" name="savetransaction" value="<?php echo $transaction ?>" maxlength="255" size="12" class="typein"></td>
<td align="center"><?php echo $showpurchasedate ?></td>
<td align="center"><?php echo $purchaseip ?></td>
<td align="center">
<input type="hidden" name="savememberid" value="<?php echo $memberid ?>">
<input type="hidden" name="action" value="saveposition">
<input type="hidden" name="m" value="<?php echo $matrixnumber ?>">
<input type="submit" value="SAVE" class="sendit">
</form>
</td>
<form action="tripler_admin.php" method="post">
<td align="center">
<?php
if ($ref1 != 0)
{
$q1 = "select * from matrix$matrixnumber where positionsleft>0 and memberid!=\"$memberid\" and memberid!=\"$ref1\" order by memberid";
$r1 = mysql_query($q1);
$rows1 = mysql_num_rows($r1);
if ($rows1 > 0)
	{
echo "<b>Give Referral 1 (" . $ref1username . ") to:</b> <select name=\"ref1reassign\"><option value=\"no\">Do Not Reassign</option>";
	while ($rowz1 = mysql_fetch_array($r1))
		{
		$reassignmemberid = $rowz1["memberid"];
		$reassignusername = $rowz1["username"];
		echo "<option value=\"" . $reassignmemberid . "\">Position ID#" . $reassignmemberid . " - " . $reassignusername . "</option>";
		}
echo "</select><br>";
	} # if ($rows1 > 0)
if ($rows1 < 1)
	{
?>
<input type="hidden" name="ref1reassign" value="no">
<?php
	} # if ($rows1 < 1)
} # if ($ref1 != 0)
if ($ref1 == 0)
	{
?>
<input type="hidden" name="ref1reassign" value="no">
<?php
	}
?>
</td><td align="center">
<?php
####################
if ($ref2 != 0)
{
$q2 = "select * from matrix$matrixnumber where positionsleft>0 and memberid!=\"$memberid\" and memberid!=\"$ref2\" order by memberid";
$r2 = mysql_query($q2);
$rows2 = mysql_num_rows($r2);
if ($rows2 > 0)
	{
echo "<b>Give Referral 2 (" . $ref2username . ") to:</b> <select name=\"ref2reassign\"><option value=\"no\">Do Not Reassign</option>";
	while ($rowz2 = mysql_fetch_array($r2))
		{
		$reassignmemberid = $rowz2["memberid"];
		$reassignusername = $rowz2["username"];
		echo "<option value=\"" . $reassignmemberid . "\">Position ID#" . $reassignmemberid . " - " . $reassignusername . "</option>";
		}
echo "</select><br>";
	} # if ($rows2 > 0)
if ($rows2 < 1)
	{
?>
<input type="hidden" name="ref2reassign" value="no">
<?php
	} # if ($rows2 < 1)
} # if ($ref2 != 0)
if ($ref2 == 0)
	{
?>
<input type="hidden" name="ref2reassign" value="no">
<?php
	}
?>
</td><td align="center">
<?php
####################
if ($ref3 != 0)
{
$q3 = "select * from matrix$matrixnumber where positionsleft>0 and memberid!=\"$memberid\" and memberid!=\"$ref3\" order by memberid";
$r3 = mysql_query($q3);
$rows3 = mysql_num_rows($r3);
if ($rows3 > 0)
	{
echo "<b>Give Referral 3 (" . $ref3username . ") to:</b> <select name=\"ref3reassign\"><option value=\"no\">Do Not Reassign</option>";
	while ($rowz3 = mysql_fetch_array($r3))
		{
		$reassignmemberid = $rowz3["memberid"];
		$reassignusername = $rowz3["username"];
		echo "<option value=\"" . $reassignmemberid . "\">Position ID#" . $reassignmemberid . " - " . $reassignusername . "</option>";
		}
echo "</select><br>";
	} # if ($rows3 > 0)
if ($rows3 < 1)
	{
?>
<input type="hidden" name="ref3reassign" value="no">
<?php
	} # if ($rows3 < 1)
} # if ($ref3 != 0)
if ($ref3 == 0)
	{
?>
<input type="hidden" name="ref3reassign" value="no">
<?php
	}
?>
</td><td align="center">
<input type="hidden" name="deletememberid" value="<?php echo $memberid ?>">
<input type="hidden" name="m" value="<?php echo $matrixnumber ?>">
<input type="hidden" name="action" value="confirmdeletepositions">
<input type="submit" value="DELETE POSITION" onclick="return confirmPost();" class="sendit">
</form>
</td>
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