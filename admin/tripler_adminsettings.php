<?php
session_start();
# admin settings file to control downline behavior.
include "../config.php";
include "../header.php";
include "../style.php";
if(session_is_registered("alogin"))
{
?>
<table>
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td valign="top" align="center"><br><br> <?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
$action = $_POST["action"];
$error = "";
####################################################################################################################################################
if ($action == "savesettings")
{
$newshowmembercount = $_POST["newshowmembercount"];
$newshowperlevelmembercount = $_POST["newshowperlevelmembercount"];
$newshowmainpagestats = $_POST["newshowmainpagestats"];
$newshowdownlinepositioncount = $_POST["newshowdownlinepositioncount"];
$newshowcycledalreadypage = $_POST["newshowcycledalreadypage"];
$newshowcyclingnextpage = $_POST["newshowcyclingnextpage"];
$newshowhowmanypositionsperdownline = $_POST["newshowhowmanypositionsperdownline"];
$newpaymentprocessorfeepercentagetoadd = $_POST["newpaymentprocessorfeepercentagetoadd"];
$newminimumpayoutpro = $_POST["newminimumpayoutpro"];
$newminimumpayoutjv = $_POST["newminimumpayoutjv"];
$newminimumpayoutsuperjv = $_POST["newminimumpayoutsuperjv"];
$newdaysincestart = $_POST["newdaysincestart"];
####################################### 1
if ($matrixenabled1 == "yes")
{
$newselldownline1 = $_POST["newselldownline1"];
$newprice1 = $_POST["newprice1"];
$newpayout1 = $_POST["newpayout1"];
$newenablepersonalreferrals1 = $_POST["newenablepersonalreferrals1"];
$newregularcommission1 = $_POST["newregularcommission1"];
$newfreereentry1 = $_POST["newfreereentry1"];
$newupgradejvbonusmatrix1_num = $_POST["newupgradejvbonusmatrix1_num"];
$newupgradesuperjvbonusmatrix1_num = $_POST["newupgradesuperjvbonusmatrix1_num"];
	if (($newregularcommission1 == "") or ($newregularcommission1 < 0.01))
	{
	$newregularcommission1 = 0.00;
	}
	if (($newprice1 == "") or ($newprice1 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero price for Downline #1 positions</li>";
	}
	if (($newpayout1 == "") or ($newpayout1 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero amount to pay members when a position in Downline #1 cycles</li>";
	}
} # if ($matrixenabled1 == "yes")
####################################### 2
if ($matrixenabled2 == "yes")
{
$newselldownline2 = $_POST["newselldownline2"];
$newprice2 = $_POST["newprice2"];
$newpayout2 = $_POST["newpayout2"];
$newenablepersonalreferrals2 = $_POST["newenablepersonalreferrals2"];
$newregularcommission2 = $_POST["newregularcommission2"];
$newfreereentry2 = $_POST["newfreereentry2"];
$newupgradejvbonusmatrix2_num = $_POST["newupgradejvbonusmatrix2_num"];
$newupgradesuperjvbonusmatrix2_num = $_POST["newupgradesuperjvbonusmatrix2_num"];
	if (($newregularcommission2 == "") or ($newregularcommission2 < 0.01))
	{
	$newregularcommission2 = 0.00;
	}
	if (($newprice2 == "") or ($newprice2 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero price for Downline #2 positions</li>";
	}
	if (($newpayout2 == "") or ($newpayout2 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero amount to pay members when a position in Downline #2 cycles</li>";
	}
} # if ($matrixenabled2 == "yes")
####################################### 3
if ($matrixenabled3 == "yes")
{
$newselldownline3 = $_POST["newselldownline3"];
$newprice3 = $_POST["newprice3"];
$newpayout3 = $_POST["newpayout3"];
$newenablepersonalreferrals3 = $_POST["newenablepersonalreferrals3"];
$newregularcommission3 = $_POST["newregularcommission3"];
$newfreereentry3 = $_POST["newfreereentry3"];
$newupgradejvbonusmatrix3_num = $_POST["newupgradejvbonusmatrix3_num"];
$newupgradesuperjvbonusmatrix3_num = $_POST["newupgradesuperjvbonusmatrix3_num"];
	if (($newregularcommission3 == "") or ($newregularcommission3 < 0.01))
	{
	$newregularcommission3 = 0.00;
	}
	if (($newprice3 == "") or ($newprice3 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero price for Downline #3 positions</li>";
	}
	if (($newpayout3 == "") or ($newpayout3 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero amount to pay members when a position in Downline #3 cycles</li>";
	}
} # if ($matrixenabled3 == "yes")
####################################### 4
if ($matrixenabled4 == "yes")
{
$newselldownline4 = $_POST["newselldownline4"];
$newprice4 = $_POST["newprice4"];
$newpayout4 = $_POST["newpayout4"];
$newenablepersonalreferrals4 = $_POST["newenablepersonalreferrals4"];
$newregularcommission4 = $_POST["newregularcommission4"];
$newfreereentry4 = $_POST["newfreereentry4"];
$newupgradejvbonusmatrix4_num = $_POST["newupgradejvbonusmatrix4_num"];
$newupgradesuperjvbonusmatrix4_num = $_POST["newupgradesuperjvbonusmatrix4_num"];
	if (($newregularcommission4 == "") or ($newregularcommission4 < 0.01))
	{
	$newregularcommission4 = 0.00;
	}
	if (($newprice4 == "") or ($newprice4 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero price for Downline #4 positions</li>";
	}
	if (($newpayout4 == "") or ($newpayout4 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero amount to pay members when a position in Downline #4 cycles</li>";
	}
} # if ($matrixenabled4 == "yes")
####################################### 5
if ($matrixenabled5 == "yes")
{
$newselldownline5 = $_POST["newselldownline5"];
$newprice5 = $_POST["newprice5"];
$newpayout5 = $_POST["newpayout5"];
$newenablepersonalreferrals5 = $_POST["newenablepersonalreferrals5"];
$newregularcommission5 = $_POST["newregularcommission5"];
$newfreereentry5 = $_POST["newfreereentry5"];
$newupgradejvbonusmatrix5_num = $_POST["newupgradejvbonusmatrix5_num"];
$newupgradesuperjvbonusmatrix5_num = $_POST["newupgradesuperjvbonusmatrix5_num"];
	if (($newregularcommission5 == "") or ($newregularcommission5 < 0.01))
	{
	$newregularcommission5 = 0.00;
	}
	if (($newprice5 == "") or ($newprice5 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero price for Downline #5 positions</li>";
	}
	if (($newpayout5 == "") or ($newpayout5 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero amount to pay members when a position in Downline #5 cycles</li>";
	}
} # if ($matrixenabled5 == "yes")
####################################### 6
if ($matrixenabled6 == "yes")
{
$newselldownline6 = $_POST["newselldownline6"];
$newprice6 = $_POST["newprice6"];
$newpayout6 = $_POST["newpayout6"];
$newenablepersonalreferrals6 = $_POST["newenablepersonalreferrals6"];
$newregularcommission6 = $_POST["newregularcommission6"];
$newfreereentry6 = $_POST["newfreereentry6"];
$newupgradejvbonusmatrix6_num = $_POST["newupgradejvbonusmatrix6_num"];
$newupgradesuperjvbonusmatrix6_num = $_POST["newupgradesuperjvbonusmatrix6_num"];
	if (($newregularcommission6 == "") or ($newregularcommission6 < 0.01))
	{
	$newregularcommission6 = 0.00;
	}
	if (($newprice6 == "") or ($newprice6 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero price for Downline #6 positions</li>";
	}
	if (($newpayout6 == "") or ($newpayout6 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero amount to pay members when a position in Downline #6 cycles</li>";
	}
} # if ($matrixenabled6 == "yes")
####################################### 7
if ($matrixenabled7 == "yes")
{
$newselldownline7 = $_POST["newselldownline7"];
$newprice7 = $_POST["newprice7"];
$newpayout7 = $_POST["newpayout7"];
$newenablepersonalreferrals7 = $_POST["newenablepersonalreferrals7"];
$newregularcommission7 = $_POST["newregularcommission7"];
$newfreereentry7 = $_POST["newfreereentry7"];
$newupgradejvbonusmatrix7_num = $_POST["newupgradejvbonusmatrix7_num"];
$newupgradesuperjvbonusmatrix7_num = $_POST["newupgradesuperjvbonusmatrix7_num"];
	if (($newregularcommission7 == "") or ($newregularcommission7 < 0.01))
	{
	$newregularcommission7 = 0.00;
	}
	if (($newprice7 == "") or ($newprice7 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero price for Downline #7 positions</li>";
	}
	if (($newpayout7 == "") or ($newpayout7 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero amount to pay members when a position in Downline #7 cycles</li>";
	}
} # if ($matrixenabled7 == "yes")
####################################### 8
if ($matrixenabled8 == "yes")
{
$newselldownline8 = $_POST["newselldownline8"];
$newprice8 = $_POST["newprice8"];
$newpayout8 = $_POST["newpayout8"];
$newenablepersonalreferrals8 = $_POST["newenablepersonalreferrals8"];
$newregularcommission8 = $_POST["newregularcommission8"];
$newfreereentry8 = $_POST["newfreereentry8"];
$newupgradejvbonusmatrix8_num = $_POST["newupgradejvbonusmatrix8_num"];
$newupgradesuperjvbonusmatrix8_num = $_POST["newupgradesuperjvbonusmatrix8_num"];
	if (($newregularcommission8 == "") or ($newregularcommission8 < 0.01))
	{
	$newregularcommission8 = 0.00;
	}
	if (($newprice8 == "") or ($newprice8 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero price for Downline #8 positions</li>";
	}
	if (($newpayout8 == "") or ($newpayout8 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero amount to pay members when a position in Downline #8 cycles</li>";
	}
} # if ($matrixenabled8 == "yes")
####################################### 9
if ($matrixenabled9 == "yes")
{
$newselldownline9 = $_POST["newselldownline9"];
$newprice9 = $_POST["newprice9"];
$newpayout9 = $_POST["newpayout9"];
$newenablepersonalreferrals9 = $_POST["newenablepersonalreferrals9"];
$newregularcommission9 = $_POST["newregularcommission9"];
$newfreereentry9 = $_POST["newfreereentry9"];
$newupgradejvbonusmatrix9_num = $_POST["newupgradejvbonusmatrix9_num"];
$newupgradesuperjvbonusmatrix9_num = $_POST["newupgradesuperjvbonusmatrix9_num"];
	if (($newregularcommission9 == "") or ($newregularcommission9 < 0.01))
	{
	$newregularcommission9 = 0.00;
	}
	if (($newprice9 == "") or ($newprice9 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero price for Downline #9 positions</li>";
	}
	if (($newpayout9 == "") or ($newpayout9 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero amount to pay members when a position in Downline #9 cycles</li>";
	}
} # if ($matrixenabled9 == "yes")
####################################### 10
if ($matrixenabled10 == "yes")
{
$newselldownline10 = $_POST["newselldownline10"];
$newprice10 = $_POST["newprice10"];
$newpayout10 = $_POST["newpayout10"];
$newenablepersonalreferrals10 = $_POST["newenablepersonalreferrals10"];
$newregularcommission10 = $_POST["newregularcommission10"];
$newfreereentry10 = $_POST["newfreereentry10"];
$newupgradejvbonusmatrix10_num = $_POST["newupgradejvbonusmatrix10_num"];
$newupgradesuperjvbonusmatrix10_num = $_POST["newupgradesuperjvbonusmatrix10_num"];
	if (($newregularcommission10 == "") or ($newregularcommission10 < 0.01))
	{
	$newregularcommission10 = 0.00;
	}
	if (($newprice10 == "") or ($newprice10 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero price for Downline #10 positions</li>";
	}
	if (($newpayout10 == "") or ($newpayout10 < 0.01))
	{
	$error .= "<li>Please return and set a non-zero amount to pay members when a position in Downline #10 cycles</li>";
	}
} # if ($matrixenabled10 == "yes")
#####################################################################################################################
if ($error != "")
{
echo "<p align=\"center\" style=\"color: #ff0000; font-size: 16px;\">ERROR</p>";
echo "<p align=\"center\">Please return and correct the errors below:</p>";
echo "<p><br><ul>" . $error . "</ul></p>";
echo "<p align=\"center\"><a href=\"tripler_adminsettings.php\">Return</a></p>";
include "../footer.php";
exit;
}
if ($error == "")
{
$q0 = "update tripler_settings set paymentprocessorfeepercentagetoadd=\"$newpaymentprocessorfeepercentagetoadd\",showmembercount=\"$newshowmembercount\",showperlevelmembercount=\"$newshowperlevelmembercount\",showmainpagestats=\"$newshowmainpagestats\",showdownlinepositioncount=\"$newshowdownlinepositioncount\",showcycledalreadypage=\"$newshowcycledalreadypage\",showcyclingnextpage=\"$newshowcyclingnextpage\",showhowmanypositionsperdownline=\"$newshowhowmanypositionsperdownline\",minimumpayoutpro=\"$newminimumpayoutpro\",minimumpayoutjv=\"$newminimumpayoutjv\",minimumpayoutsuperjv=\"$newminimumpayoutsuperjv\"";
$r0 = mysql_query($q0) or die(mysql_error());
####################################### 1
if ($matrixenabled1 == "yes")
{
$q1 = "update tripler_settings set selldownline1=\"$newselldownline1\",price1=\"$newprice1\",payout1=\"$newpayout1\",enablepersonalreferrals1=\"$newenablepersonalreferrals1\",regularcommission1=\"$newregularcommission1\",freereentry1=\"$newfreereentry1\",upgradejvbonusmatrix1_num=\"$newupgradejvbonusmatrix1_num\",upgradesuperjvbonusmatrix1_num=\"$newupgradesuperjvbonusmatrix1_num\"";
$r1 = mysql_query($q1) or die(mysql_error());
} # if ($matrixenabled1 == "yes")
####################################### 2
if ($matrixenabled2 == "yes")
{
$q2 = "update tripler_settings set selldownline2=\"$newselldownline2\",price2=\"$newprice2\",payout2=\"$newpayout2\",enablepersonalreferrals2=\"$newenablepersonalreferrals2\",regularcommission2=\"$newregularcommission2\",freereentry2=\"$newfreereentry2\",upgradejvbonusmatrix2_num=\"$newupgradejvbonusmatrix2_num\",upgradesuperjvbonusmatrix2_num=\"$newupgradesuperjvbonusmatrix2_num\"";
$r2 = mysql_query($q2) or die(mysql_error());
} # if ($matrixenabled2 == "yes")
####################################### 3
if ($matrixenabled3 == "yes")
{
$q3 = "update tripler_settings set selldownline3=\"$newselldownline3\",price3=\"$newprice3\",payout3=\"$newpayout3\",enablepersonalreferrals3=\"$newenablepersonalreferrals3\",regularcommission3=\"$newregularcommission3\",freereentry3=\"$newfreereentry3\",upgradejvbonusmatrix3_num=\"$newupgradejvbonusmatrix3_num\",upgradesuperjvbonusmatrix3_num=\"$newupgradesuperjvbonusmatrix3_num\"";
$r3 = mysql_query($q3) or die(mysql_error());
} # if ($matrixenabled3 == "yes")
####################################### 4
if ($matrixenabled4 == "yes")
{
$q4 = "update tripler_settings set selldownline4=\"$newselldownline4\",price4=\"$newprice4\",payout4=\"$newpayout4\",enablepersonalreferrals4=\"$newenablepersonalreferrals4\",regularcommission4=\"$newregularcommission4\",freereentry4=\"$newfreereentry4\",upgradejvbonusmatrix4_num=\"$newupgradejvbonusmatrix4_num\",upgradesuperjvbonusmatrix4_num=\"$newupgradesuperjvbonusmatrix4_num\"";
$r4 = mysql_query($q4) or die(mysql_error());
} # if ($matrixenabled4 == "yes")
####################################### 5
if ($matrixenabled5 == "yes")
{
$q5 = "update tripler_settings set selldownline5=\"$newselldownline5\",price5=\"$newprice5\",payout5=\"$newpayout5\",enablepersonalreferrals5=\"$newenablepersonalreferrals5\",regularcommission5=\"$newregularcommission5\",freereentry5=\"$newfreereentry5\",upgradejvbonusmatrix5_num=\"$newupgradejvbonusmatrix5_num\",upgradesuperjvbonusmatrix5_num=\"$newupgradesuperjvbonusmatrix5_num\"";
$r5 = mysql_query($q5) or die(mysql_error());
} # if ($matrixenabled5 == "yes")
####################################### 6
if ($matrixenabled6 == "yes")
{
$q6 = "update tripler_settings set selldownline6=\"$newselldownline6\",price6=\"$newprice6\",payout6=\"$newpayout6\",enablepersonalreferrals6=\"$newenablepersonalreferrals6\",regularcommission6=\"$newregularcommission6\",freereentry6=\"$newfreereentry6\",upgradejvbonusmatrix6_num=\"$newupgradejvbonusmatrix6_num\",upgradesuperjvbonusmatrix6_num=\"$newupgradesuperjvbonusmatrix6_num\"";
$r6 = mysql_query($q6) or die(mysql_error());
} # if ($matrixenabled6 == "yes")
####################################### 7
if ($matrixenabled7 == "yes")
{
$q7 = "update tripler_settings set selldownline7=\"$newselldownline7\",price7=\"$newprice7\",payout7=\"$newpayout7\",enablepersonalreferrals7=\"$newenablepersonalreferrals7\",regularcommission7=\"$newregularcommission7\",freereentry7=\"$newfreereentry7\",upgradejvbonusmatrix7_num=\"$newupgradejvbonusmatrix7_num\",upgradesuperjvbonusmatrix7_num=\"$newupgradesuperjvbonusmatrix7_num\"";
$r7 = mysql_query($q7) or die(mysql_error());
} # if ($matrixenabled7 == "yes")
####################################### 8
if ($matrixenabled8 == "yes")
{
$q8 = "update tripler_settings set selldownline8=\"$newselldownline8\",price8=\"$newprice8\",payout8=\"$newpayout8\",enablepersonalreferrals8=\"$newenablepersonalreferrals8\",regularcommission8=\"$newregularcommission8\",freereentry8=\"$newfreereentry8\",upgradejvbonusmatrix8_num=\"$newupgradejvbonusmatrix8_num\",upgradesuperjvbonusmatrix8_num=\"$newupgradesuperjvbonusmatrix8_num\"";
$r8 = mysql_query($q8) or die(mysql_error());
} # if ($matrixenabled8 == "yes")
####################################### 9
if ($matrixenabled9 == "yes")
{
$q9 = "update tripler_settings set selldownline9=\"$newselldownline9\",price9=\"$newprice9\",payout9=\"$newpayout9\",enablepersonalreferrals9=\"$newenablepersonalreferrals9\",regularcommission9=\"$newregularcommission9\",freereentry9=\"$newfreereentry9\",upgradejvbonusmatrix9_num=\"$newupgradejvbonusmatrix9_num\",upgradesuperjvbonusmatrix9_num=\"$newupgradesuperjvbonusmatrix9_num\"";
$r9 = mysql_query($q9) or die(mysql_error());
} # if ($matrixenabled9 == "yes")
####################################### 10
if ($matrixenabled10 == "yes")
{
$q10 = "update tripler_settings set selldownline10=\"$newselldownline10\",price10=\"$newprice10\",payout10=\"$newpayout10\",enablepersonalreferrals10=\"$newenablepersonalreferrals10\",regularcommission10=\"$newregularcommission10\",freereentry10=\"$newfreereentry10\",upgradejvbonusmatrix10_num=\"$newupgradejvbonusmatrix10_num\",upgradesuperjvbonusmatrix10_num=\"$newupgradesuperjvbonusmatrix10_num\"";
$r10 = mysql_query($q10) or die(mysql_error());
} # if ($matrixenabled10 == "yes")
#######################################
echo "<p align=\"center\">Your Settings Were Saved!</p>";
echo "<p align=\"center\"><a href=\"tripler_adminsettings.php\">Return</a></p>";
include "../footer.php";
exit;
} # if ($error == "")
} # if ($action == "savesettings")
####################################################################################################################################################
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><br>
<form action="tripler_adminsettings.php" method="post">
<table cellpadding="4" cellspacing="2" border="0" align="center" bgcolor="#999999">
<tr><td align="center" colspan="2"><div class="heading"><?php echo $sitename ?> Downline Settings</div></td></tr>
<tr bgcolor="#eeeeee"><td>Add additional fee to downline position prices to cover fees charged by payment processors (enter 0 to disable):</td><td><select name="newpaymentprocessorfeepercentagetoadd" class="pickone">
<?php
for ($j=0;$j<=100;$j++)
{
?>
<option value="<?php echo $j ?>" <?php if ($paymentprocessorfeepercentagetoadd == $j) { echo "selected"; } ?>><?php echo $j ?>% Of Total Price</option>
<?php
}
?>
</select></td></tr>
<tr bgcolor="#eeeeee"><td>Show total membership count on main page:</td><td><select name="newshowmembercount" class="pickone">
<option value="yes" <?php if ($showmembercount == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($showmembercount != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Show per level membership counts on main page (<?php echo $toplevel ?>, <?php echo $middlelevel ?>, <?php echo $lowerlevel ?> counts):</td><td><select name="newshowperlevelmembercount" class="pickone">
<option value="yes" <?php if ($showperlevelmembercount == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($showperlevelmembercount != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Show commission stats and/or downline account counter on main page:</td><td><select name="newshowmainpagestats" class="pickone">
<option value="yes" <?php if ($showmainpagestats == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($showmainpagestats != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If you answered "yes" above, do you want to show the total number of downline accounts in the main page commission stats?:</td><td><select name="newshowdownlinepositioncount" class="pickone">
<option value="yes" <?php if ($showdownlinepositioncount == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($showdownlinepositioncount != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Allow any site visitors to see the "Already Cycled" page:</td><td><select name="newshowcycledalreadypage" class="pickone">
<option value="yes" <?php if ($showcycledalreadypage == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($showcycledalreadypage != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Allow any site visitors to see the "Next To Cycle" page:</td><td><select name="newshowcyclingnextpage" class="pickone">
<option value="yes" <?php if ($showcyclingnextpage == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($showcyclingnextpage != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>How many rows (records) PER downline on the "Already Cycled" and "Next To Cycle" pages should be shown at once? (a lot will make these pages load slowly):</td><td><select name="newshowhowmanypositionsperdownline" class="pickone">
<option value="1" <?php if ($showhowmanypositionsperdownline == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($showhowmanypositionsperdownline == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($showhowmanypositionsperdownline == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($showhowmanypositionsperdownline == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($showhowmanypositionsperdownline == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($showhowmanypositionsperdownline == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($showhowmanypositionsperdownline == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($showhowmanypositionsperdownline == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($showhowmanypositionsperdownline == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($showhowmanypositionsperdownline == "10") { echo "selected"; } ?>>10</option>
<option value="11" <?php if ($showhowmanypositionsperdownline == "11") { echo "selected"; } ?>>11</option>
<option value="12" <?php if ($showhowmanypositionsperdownline == "12") { echo "selected"; } ?>>12</option>
<option value="13" <?php if ($showhowmanypositionsperdownline == "13") { echo "selected"; } ?>>13</option>
<option value="14" <?php if ($showhowmanypositionsperdownline == "14") { echo "selected"; } ?>>14</option>
<option value="15" <?php if ($showhowmanypositionsperdownline == "15") { echo "selected"; } ?>>15</option>
<option value="16" <?php if ($showhowmanypositionsperdownline == "16") { echo "selected"; } ?>>16</option>
<option value="17" <?php if ($showhowmanypositionsperdownline == "17") { echo "selected"; } ?>>17</option>
<option value="18" <?php if ($showhowmanypositionsperdownline == "18") { echo "selected"; } ?>>18</option>
<option value="19" <?php if ($showhowmanypositionsperdownline == "19") { echo "selected"; } ?>>19</option>
<option value="20" <?php if ($showhowmanypositionsperdownline == "20") { echo "selected"; } ?>>20</option>
<option value="30" <?php if ($showhowmanypositionsperdownline == "30") { echo "selected"; } ?>>30</option>
<option value="40" <?php if ($showhowmanypositionsperdownline == "40") { echo "selected"; } ?>>40</option>
<option value="50" <?php if ($showhowmanypositionsperdownline == "50") { echo "selected"; } ?>>50</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Minimum payout for <?php echo $lowerlevel ?> members:</td><td>$<input type="text" name="newminimumpayoutpro" value="<?php echo $minimumpayoutpro ?>" maxlength="12" size="4"></td></tr>
<tr bgcolor="#eeeeee"><td>Minimum payout for <?php echo $middlelevel ?> members:</td><td>$<input type="text" name="newminimumpayoutjv" value="<?php echo $minimumpayoutjv ?>" maxlength="12" size="4"></td></tr>
<tr bgcolor="#eeeeee"><td>Minimum payout for <?php echo $toplevel ?> members:</td><td>$<input type="text" name="newminimumpayoutsuperjv" value="<?php echo $minimumpayoutsuperjv ?>" maxlength="12" size="4"></td></tr>
<tr bgcolor="#999999"><td align="center" colspan="2">&nbsp;</td></tr>
<tr bgcolor="#ffffff"><td align="center" colspan="2">&nbsp;</td></tr>
<?php
####################################### 1
if ($matrixenabled1 == "yes")
{
?>
<tr><td align="center" colspan="2"><div class="heading">Downline #1 Settings</div></td></tr>
<tr bgcolor="#eeeeee"><td>Enable Downline #1:</td><td><select name="newselldownline1" class="pickone">
<option value="yes" <?php if ($selldownline1 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($selldownline1 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Cost per Downline #1 position:</td><td>$<input type="text" name="newprice1" value="<?php echo $price1 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>Payout when a position cycles:</td><td>$<input type="text" name="newpayout1" value="<?php echo $payout1 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>May members cause their own positions to cycle faster by making personal referrals with their affiliate URLs? Selecting "NO" means that all positions entered into this downline only count towards cycling the TOP position. Selecting "YES" counts toward cycling the SPONSOR'S position instead (if they have any left in this downline):</td><td><select name="newenablepersonalreferrals1" class="pickone">
<option value="yes" <?php if ($enablepersonalreferrals1 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($enablepersonalreferrals1 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Do you want sponsors to receive a bonus sales commission when their referrals buy individual positions? This commission is NOT given when a referral receives BONUS positions that COME WITH an OTO purchase, a Special Offer, Upgrades, or positions given by the admin from the admin area. It is ONLY given when a referral BUYS positions individually (set to 0.00 to disable):</td><td>$<input type="text" name="newregularcommission1" value="<?php echo $regularcommission1 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>When a position cycles, should the member who bought it receive a Free Re-Entry into Downline #1 again?:</td><td><select name="newfreereentry1" class="pickone">
<option value="yes" <?php if ($freereentry1 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($freereentry1 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $middlelevel ?> membership, how many bonus positions in Downline #1 should they receive? 
Please be aware that if you give bonus positions AND a <?php $middlelevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $middlelevel ?> upgrade:</td><td><select name="newupgradejvbonusmatrix1_num" class="pickone">
<option value="0" <?php if ($upgradejvbonusmatrix1_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradejvbonusmatrix1_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradejvbonusmatrix1_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradejvbonusmatrix1_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradejvbonusmatrix1_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradejvbonusmatrix1_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradejvbonusmatrix1_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradejvbonusmatrix1_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradejvbonusmatrix1_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradejvbonusmatrix1_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradejvbonusmatrix1_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $toplevel ?> membership, how many bonus positions in Downline #1 should they receive? 
Please be aware that if you give bonus positions AND a <?php $toplevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $toplevel ?> upgrade:</td><td><select name="newupgradesuperjvbonusmatrix1_num" class="pickone">
<option value="0" <?php if ($upgradesuperjvbonusmatrix1_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradesuperjvbonusmatrix1_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradesuperjvbonusmatrix1_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradesuperjvbonusmatrix1_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradesuperjvbonusmatrix1_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradesuperjvbonusmatrix1_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradesuperjvbonusmatrix1_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradesuperjvbonusmatrix1_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradesuperjvbonusmatrix1_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradesuperjvbonusmatrix1_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradesuperjvbonusmatrix1_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#999999"><td align="center" colspan="2">&nbsp;</td></tr>
<tr bgcolor="#ffffff"><td align="center" colspan="2">&nbsp;</td></tr>
<?php
} # if ($matrixenabled1 == "yes")
####################################### 2
if ($matrixenabled2 == "yes")
{
?>
<tr><td align="center" colspan="2"><div class="heading">Downline #2 Settings</div></td></tr>
<tr bgcolor="#eeeeee"><td>Enable Downline #2:</td><td><select name="newselldownline2" class="pickone">
<option value="yes" <?php if ($selldownline2 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($selldownline2 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Cost per Downline #2 position:</td><td>$<input type="text" name="newprice2" value="<?php echo $price2 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>Payout when a position cycles:</td><td>$<input type="text" name="newpayout2" value="<?php echo $payout2 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>May members cause their own positions to cycle faster by making personal referrals with their affiliate URLs? Selecting "NO" means that all positions entered into this downline only count towards cycling the TOP position. Selecting "YES" counts toward cycling the SPONSOR'S position instead (if they have any left in this downline):</td><td><select name="newenablepersonalreferrals2" class="pickone">
<option value="yes" <?php if ($enablepersonalreferrals2 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($enablepersonalreferrals2 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Do you want sponsors to receive a bonus sales commission when their referrals buy individual positions? This commission is NOT given when a referral receives BONUS positions that COME WITH an OTO purchase, a Special Offer, Upgrades, or positions given by the admin from the admin area. It is ONLY given when a referral BUYS positions individually (set to 0.00 to disable):</td><td>$<input type="text" name="newregularcommission2" value="<?php echo $regularcommission2 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>When a position cycles, should the member who bought it receive a Free Re-Entry into Downline #2 again?:</td><td><select name="newfreereentry2" class="pickone">
<option value="yes" <?php if ($freereentry2 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($freereentry2 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $middlelevel ?> membership, how many bonus positions in Downline #2 should they receive? 
Please be aware that if you give bonus positions AND a <?php $middlelevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $middlelevel ?> upgrade:</td><td><select name="newupgradejvbonusmatrix2_num" class="pickone">
<option value="0" <?php if ($upgradejvbonusmatrix2_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradejvbonusmatrix2_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradejvbonusmatrix2_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradejvbonusmatrix2_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradejvbonusmatrix2_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradejvbonusmatrix2_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradejvbonusmatrix2_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradejvbonusmatrix2_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradejvbonusmatrix2_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradejvbonusmatrix2_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradejvbonusmatrix2_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $toplevel ?> membership, how many bonus positions in Downline #2 should they receive? 
Please be aware that if you give bonus positions AND a <?php $toplevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $toplevel ?> upgrade:</td><td><select name="newupgradesuperjvbonusmatrix2_num" class="pickone">
<option value="0" <?php if ($upgradesuperjvbonusmatrix2_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradesuperjvbonusmatrix2_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradesuperjvbonusmatrix2_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradesuperjvbonusmatrix2_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradesuperjvbonusmatrix2_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradesuperjvbonusmatrix2_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradesuperjvbonusmatrix2_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradesuperjvbonusmatrix2_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradesuperjvbonusmatrix2_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradesuperjvbonusmatrix2_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradesuperjvbonusmatrix2_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#999999"><td align="center" colspan="2">&nbsp;</td></tr>
<tr bgcolor="#ffffff"><td align="center" colspan="2">&nbsp;</td></tr>
<?php
} # if ($matrixenabled2 == "yes")
####################################### 3
if ($matrixenabled3 == "yes")
{
?>
<tr><td align="center" colspan="2"><div class="heading">Downline #3 Settings</div></td></tr>
<tr bgcolor="#eeeeee"><td>Enable Downline #3:</td><td><select name="newselldownline3" class="pickone">
<option value="yes" <?php if ($selldownline3 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($selldownline3 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Cost per Downline #3 position:</td><td>$<input type="text" name="newprice3" value="<?php echo $price3 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>Payout when a position cycles:</td><td>$<input type="text" name="newpayout3" value="<?php echo $payout3 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>May members cause their own positions to cycle faster by making personal referrals with their affiliate URLs? Selecting "NO" means that all positions entered into this downline only count towards cycling the TOP position. Selecting "YES" counts toward cycling the SPONSOR'S position instead (if they have any left in this downline):</td><td><select name="newenablepersonalreferrals3" class="pickone">
<option value="yes" <?php if ($enablepersonalreferrals3 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($enablepersonalreferrals3 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Do you want sponsors to receive a bonus sales commission when their referrals buy individual positions? This commission is NOT given when a referral receives BONUS positions that COME WITH an OTO purchase, a Special Offer, Upgrades, or positions given by the admin from the admin area. It is ONLY given when a referral BUYS positions individually (set to 0.00 to disable):</td><td>$<input type="text" name="newregularcommission3" value="<?php echo $regularcommission3 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>When a position cycles, should the member who bought it receive a Free Re-Entry into Downline #3 again?:</td><td><select name="newfreereentry3" class="pickone">
<option value="yes" <?php if ($freereentry3 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($freereentry3 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $middlelevel ?> membership, how many bonus positions in Downline #3 should they receive? 
Please be aware that if you give bonus positions AND a <?php $middlelevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $middlelevel ?> upgrade:</td><td><select name="newupgradejvbonusmatrix3_num" class="pickone">
<option value="0" <?php if ($upgradejvbonusmatrix3_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradejvbonusmatrix3_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradejvbonusmatrix3_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradejvbonusmatrix3_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradejvbonusmatrix3_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradejvbonusmatrix3_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradejvbonusmatrix3_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradejvbonusmatrix3_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradejvbonusmatrix3_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradejvbonusmatrix3_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradejvbonusmatrix3_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $toplevel ?> membership, how many bonus positions in Downline #3 should they receive? 
Please be aware that if you give bonus positions AND a <?php $toplevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $toplevel ?> upgrade:</td><td><select name="newupgradesuperjvbonusmatrix3_num" class="pickone">
<option value="0" <?php if ($upgradesuperjvbonusmatrix3_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradesuperjvbonusmatrix3_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradesuperjvbonusmatrix3_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradesuperjvbonusmatrix3_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradesuperjvbonusmatrix3_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradesuperjvbonusmatrix3_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradesuperjvbonusmatrix3_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradesuperjvbonusmatrix3_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradesuperjvbonusmatrix3_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradesuperjvbonusmatrix3_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradesuperjvbonusmatrix3_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#999999"><td align="center" colspan="2">&nbsp;</td></tr>
<tr bgcolor="#ffffff"><td align="center" colspan="2">&nbsp;</td></tr>
<?php
} # if ($matrixenabled3 == "yes")
####################################### 4
if ($matrixenabled4 == "yes")
{
?>
<tr><td align="center" colspan="2"><div class="heading">Downline #4 Settings</div></td></tr>
<tr bgcolor="#eeeeee"><td>Enable Downline #4:</td><td><select name="newselldownline4" class="pickone">
<option value="yes" <?php if ($selldownline4 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($selldownline4 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Cost per Downline #4 position:</td><td>$<input type="text" name="newprice4" value="<?php echo $price4 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>Payout when a position cycles:</td><td>$<input type="text" name="newpayout4" value="<?php echo $payout4 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>May members cause their own positions to cycle faster by making personal referrals with their affiliate URLs? Selecting "NO" means that all positions entered into this downline only count towards cycling the TOP position. Selecting "YES" counts toward cycling the SPONSOR'S position instead (if they have any left in this downline):</td><td><select name="newenablepersonalreferrals4" class="pickone">
<option value="yes" <?php if ($enablepersonalreferrals4 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($enablepersonalreferrals4 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Do you want sponsors to receive a bonus sales commission when their referrals buy individual positions? This commission is NOT given when a referral receives BONUS positions that COME WITH an OTO purchase, a Special Offer, Upgrades, or positions given by the admin from the admin area. It is ONLY given when a referral BUYS positions individually (set to 0.00 to disable):</td><td>$<input type="text" name="newregularcommission4" value="<?php echo $regularcommission4 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>When a position cycles, should the member who bought it receive a Free Re-Entry into Downline #4 again?:</td><td><select name="newfreereentry4" class="pickone">
<option value="yes" <?php if ($freereentry4 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($freereentry4 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $middlelevel ?> membership, how many bonus positions in Downline #4 should they receive? 
Please be aware that if you give bonus positions AND a <?php $middlelevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $middlelevel ?> upgrade:</td><td><select name="newupgradejvbonusmatrix4_num" class="pickone">
<option value="0" <?php if ($upgradejvbonusmatrix4_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradejvbonusmatrix4_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradejvbonusmatrix4_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradejvbonusmatrix4_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradejvbonusmatrix4_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradejvbonusmatrix4_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradejvbonusmatrix4_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradejvbonusmatrix4_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradejvbonusmatrix4_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradejvbonusmatrix4_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradejvbonusmatrix4_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $toplevel ?> membership, how many bonus positions in Downline #4 should they receive? 
Please be aware that if you give bonus positions AND a <?php $toplevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $toplevel ?> upgrade:</td><td><select name="newupgradesuperjvbonusmatrix4_num" class="pickone">
<option value="0" <?php if ($upgradesuperjvbonusmatrix4_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradesuperjvbonusmatrix4_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradesuperjvbonusmatrix4_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradesuperjvbonusmatrix4_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradesuperjvbonusmatrix4_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradesuperjvbonusmatrix4_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradesuperjvbonusmatrix4_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradesuperjvbonusmatrix4_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradesuperjvbonusmatrix4_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradesuperjvbonusmatrix4_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradesuperjvbonusmatrix4_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#999999"><td align="center" colspan="2">&nbsp;</td></tr>
<tr bgcolor="#ffffff"><td align="center" colspan="2">&nbsp;</td></tr>
<?php
} # if ($matrixenabled4 == "yes")
####################################### 5
if ($matrixenabled5 == "yes")
{
?>
<tr><td align="center" colspan="2"><div class="heading">Downline #5 Settings</div></td></tr>
<tr bgcolor="#eeeeee"><td>Enable Downline #5:</td><td><select name="newselldownline5" class="pickone">
<option value="yes" <?php if ($selldownline5 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($selldownline5 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Cost per Downline #5 position:</td><td>$<input type="text" name="newprice5" value="<?php echo $price5 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>Payout when a position cycles:</td><td>$<input type="text" name="newpayout5" value="<?php echo $payout5 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>May members cause their own positions to cycle faster by making personal referrals with their affiliate URLs? Selecting "NO" means that all positions entered into this downline only count towards cycling the TOP position. Selecting "YES" counts toward cycling the SPONSOR'S position instead (if they have any left in this downline):</td><td><select name="newenablepersonalreferrals5" class="pickone">
<option value="yes" <?php if ($enablepersonalreferrals5 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($enablepersonalreferrals5 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Do you want sponsors to receive a bonus sales commission when their referrals buy individual positions? This commission is NOT given when a referral receives BONUS positions that COME WITH an OTO purchase, a Special Offer, Upgrades, or positions given by the admin from the admin area. It is ONLY given when a referral BUYS positions individually (set to 0.00 to disable):</td><td>$<input type="text" name="newregularcommission5" value="<?php echo $regularcommission5 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>When a position cycles, should the member who bought it receive a Free Re-Entry into Downline #5 again?:</td><td><select name="newfreereentry5" class="pickone">
<option value="yes" <?php if ($freereentry5 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($freereentry5 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $middlelevel ?> membership, how many bonus positions in Downline #5 should they receive? 
Please be aware that if you give bonus positions AND a <?php $middlelevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $middlelevel ?> upgrade:</td><td><select name="newupgradejvbonusmatrix5_num" class="pickone">
<option value="0" <?php if ($upgradejvbonusmatrix5_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradejvbonusmatrix5_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradejvbonusmatrix5_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradejvbonusmatrix5_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradejvbonusmatrix5_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradejvbonusmatrix5_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradejvbonusmatrix5_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradejvbonusmatrix5_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradejvbonusmatrix5_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradejvbonusmatrix5_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradejvbonusmatrix5_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $toplevel ?> membership, how many bonus positions in Downline #5 should they receive? 
Please be aware that if you give bonus positions AND a <?php $toplevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $toplevel ?> upgrade:</td><td><select name="newupgradesuperjvbonusmatrix5_num" class="pickone">
<option value="0" <?php if ($upgradesuperjvbonusmatrix5_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradesuperjvbonusmatrix5_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradesuperjvbonusmatrix5_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradesuperjvbonusmatrix5_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradesuperjvbonusmatrix5_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradesuperjvbonusmatrix5_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradesuperjvbonusmatrix5_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradesuperjvbonusmatrix5_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradesuperjvbonusmatrix5_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradesuperjvbonusmatrix5_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradesuperjvbonusmatrix5_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#999999"><td align="center" colspan="2">&nbsp;</td></tr>
<tr bgcolor="#ffffff"><td align="center" colspan="2">&nbsp;</td></tr>
<?php
} # if ($matrixenabled5 == "yes")
####################################### 6
if ($matrixenabled6 == "yes")
{
?>
<tr><td align="center" colspan="2"><div class="heading">Downline #6 Settings</div></td></tr>
<tr bgcolor="#eeeeee"><td>Enable Downline #6:</td><td><select name="newselldownline6" class="pickone">
<option value="yes" <?php if ($selldownline6 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($selldownline6 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Cost per Downline #6 position:</td><td>$<input type="text" name="newprice6" value="<?php echo $price6 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>Payout when a position cycles:</td><td>$<input type="text" name="newpayout6" value="<?php echo $payout6 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>May members cause their own positions to cycle faster by making personal referrals with their affiliate URLs? Selecting "NO" means that all positions entered into this downline only count towards cycling the TOP position. Selecting "YES" counts toward cycling the SPONSOR'S position instead (if they have any left in this downline):</td><td><select name="newenablepersonalreferrals6" class="pickone">
<option value="yes" <?php if ($enablepersonalreferrals6 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($enablepersonalreferrals6 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Do you want sponsors to receive a bonus sales commission when their referrals buy individual positions? This commission is NOT given when a referral receives BONUS positions that COME WITH an OTO purchase, a Special Offer, Upgrades, or positions given by the admin from the admin area. It is ONLY given when a referral BUYS positions individually (set to 0.00 to disable):</td><td>$<input type="text" name="newregularcommission6" value="<?php echo $regularcommission6 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>When a position cycles, should the member who bought it receive a Free Re-Entry into Downline #6 again?:</td><td><select name="newfreereentry6" class="pickone">
<option value="yes" <?php if ($freereentry6 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($freereentry6 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $middlelevel ?> membership, how many bonus positions in Downline #6 should they receive? 
Please be aware that if you give bonus positions AND a <?php $middlelevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $middlelevel ?> upgrade:</td><td><select name="newupgradejvbonusmatrix6_num" class="pickone">
<option value="0" <?php if ($upgradejvbonusmatrix6_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradejvbonusmatrix6_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradejvbonusmatrix6_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradejvbonusmatrix6_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradejvbonusmatrix6_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradejvbonusmatrix6_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradejvbonusmatrix6_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradejvbonusmatrix6_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradejvbonusmatrix6_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradejvbonusmatrix6_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradejvbonusmatrix6_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $toplevel ?> membership, how many bonus positions in Downline #6 should they receive? 
Please be aware that if you give bonus positions AND a <?php $toplevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $toplevel ?> upgrade:</td><td><select name="newupgradesuperjvbonusmatrix6_num" class="pickone">
<option value="0" <?php if ($upgradesuperjvbonusmatrix6_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradesuperjvbonusmatrix6_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradesuperjvbonusmatrix6_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradesuperjvbonusmatrix6_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradesuperjvbonusmatrix6_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradesuperjvbonusmatrix6_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradesuperjvbonusmatrix6_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradesuperjvbonusmatrix6_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradesuperjvbonusmatrix6_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradesuperjvbonusmatrix6_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradesuperjvbonusmatrix6_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#999999"><td align="center" colspan="2">&nbsp;</td></tr>
<tr bgcolor="#ffffff"><td align="center" colspan="2">&nbsp;</td></tr>
<?php
} # if ($matrixenabled6 == "yes")
####################################### 7
if ($matrixenabled7 == "yes")
{
?>
<tr><td align="center" colspan="2"><div class="heading">Downline #7 Settings</div></td></tr>
<tr bgcolor="#eeeeee"><td>Enable Downline #7:</td><td><select name="newselldownline7" class="pickone">
<option value="yes" <?php if ($selldownline7 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($selldownline7 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Cost per Downline #7 position:</td><td>$<input type="text" name="newprice7" value="<?php echo $price7 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>Payout when a position cycles:</td><td>$<input type="text" name="newpayout7" value="<?php echo $payout7 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>May members cause their own positions to cycle faster by making personal referrals with their affiliate URLs? Selecting "NO" means that all positions entered into this downline only count towards cycling the TOP position. Selecting "YES" counts toward cycling the SPONSOR'S position instead (if they have any left in this downline):</td><td><select name="newenablepersonalreferrals7" class="pickone">
<option value="yes" <?php if ($enablepersonalreferrals7 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($enablepersonalreferrals7 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Do you want sponsors to receive a bonus sales commission when their referrals buy individual positions? This commission is NOT given when a referral receives BONUS positions that COME WITH an OTO purchase, a Special Offer, Upgrades, or positions given by the admin from the admin area. It is ONLY given when a referral BUYS positions individually (set to 0.00 to disable):</td><td>$<input type="text" name="newregularcommission7" value="<?php echo $regularcommission7 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>When a position cycles, should the member who bought it receive a Free Re-Entry into Downline #7 again?:</td><td><select name="newfreereentry7" class="pickone">
<option value="yes" <?php if ($freereentry7 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($freereentry7 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $middlelevel ?> membership, how many bonus positions in Downline #7 should they receive? 
Please be aware that if you give bonus positions AND a <?php $middlelevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $middlelevel ?> upgrade:</td><td><select name="newupgradejvbonusmatrix7_num" class="pickone">
<option value="0" <?php if ($upgradejvbonusmatrix7_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradejvbonusmatrix7_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradejvbonusmatrix7_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradejvbonusmatrix7_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradejvbonusmatrix7_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradejvbonusmatrix7_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradejvbonusmatrix7_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradejvbonusmatrix7_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradejvbonusmatrix7_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradejvbonusmatrix7_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradejvbonusmatrix7_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $toplevel ?> membership, how many bonus positions in Downline #7 should they receive? 
Please be aware that if you give bonus positions AND a <?php $toplevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $toplevel ?> upgrade:</td><td><select name="newupgradesuperjvbonusmatrix7_num" class="pickone">
<option value="0" <?php if ($upgradesuperjvbonusmatrix7_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradesuperjvbonusmatrix7_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradesuperjvbonusmatrix7_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradesuperjvbonusmatrix7_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradesuperjvbonusmatrix7_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradesuperjvbonusmatrix7_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradesuperjvbonusmatrix7_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradesuperjvbonusmatrix7_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradesuperjvbonusmatrix7_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradesuperjvbonusmatrix7_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradesuperjvbonusmatrix7_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#999999"><td align="center" colspan="2">&nbsp;</td></tr>
<tr bgcolor="#ffffff"><td align="center" colspan="2">&nbsp;</td></tr>
<?php
} # if ($matrixenabled7 == "yes")
####################################### 8
if ($matrixenabled8 == "yes")
{
?>
<tr><td align="center" colspan="2"><div class="heading">Downline #8 Settings</div></td></tr>
<tr bgcolor="#eeeeee"><td>Enable Downline #8:</td><td><select name="newselldownline8" class="pickone">
<option value="yes" <?php if ($selldownline8 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($selldownline8 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Cost per Downline #8 position:</td><td>$<input type="text" name="newprice8" value="<?php echo $price8 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>Payout when a position cycles:</td><td>$<input type="text" name="newpayout8" value="<?php echo $payout8 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>May members cause their own positions to cycle faster by making personal referrals with their affiliate URLs? Selecting "NO" means that all positions entered into this downline only count towards cycling the TOP position. Selecting "YES" counts toward cycling the SPONSOR'S position instead (if they have any left in this downline):</td><td><select name="newenablepersonalreferrals8" class="pickone">
<option value="yes" <?php if ($enablepersonalreferrals8 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($enablepersonalreferrals8 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Do you want sponsors to receive a bonus sales commission when their referrals buy individual positions? This commission is NOT given when a referral receives BONUS positions that COME WITH an OTO purchase, a Special Offer, Upgrades, or positions given by the admin from the admin area. It is ONLY given when a referral BUYS positions individually (set to 0.00 to disable):</td><td>$<input type="text" name="newregularcommission8" value="<?php echo $regularcommission8 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>When a position cycles, should the member who bought it receive a Free Re-Entry into Downline #8 again?:</td><td><select name="newfreereentry8" class="pickone">
<option value="yes" <?php if ($freereentry8 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($freereentry8 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $middlelevel ?> membership, how many bonus positions in Downline #8 should they receive? 
Please be aware that if you give bonus positions AND a <?php $middlelevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $middlelevel ?> upgrade:</td><td><select name="newupgradejvbonusmatrix8_num" class="pickone">
<option value="0" <?php if ($upgradejvbonusmatrix8_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradejvbonusmatrix8_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradejvbonusmatrix8_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradejvbonusmatrix8_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradejvbonusmatrix8_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradejvbonusmatrix8_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradejvbonusmatrix8_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradejvbonusmatrix8_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradejvbonusmatrix8_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradejvbonusmatrix8_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradejvbonusmatrix8_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $toplevel ?> membership, how many bonus positions in Downline #8 should they receive? 
Please be aware that if you give bonus positions AND a <?php $toplevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $toplevel ?> upgrade:</td><td><select name="newupgradesuperjvbonusmatrix8_num" class="pickone">
<option value="0" <?php if ($upgradesuperjvbonusmatrix8_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradesuperjvbonusmatrix8_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradesuperjvbonusmatrix8_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradesuperjvbonusmatrix8_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradesuperjvbonusmatrix8_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradesuperjvbonusmatrix8_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradesuperjvbonusmatrix8_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradesuperjvbonusmatrix8_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradesuperjvbonusmatrix8_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradesuperjvbonusmatrix8_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradesuperjvbonusmatrix8_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#999999"><td align="center" colspan="2">&nbsp;</td></tr>
<tr bgcolor="#ffffff"><td align="center" colspan="2">&nbsp;</td></tr>
<?php
} # if ($matrixenabled8 == "yes")
####################################### 9
if ($matrixenabled9 == "yes")
{
?>
<tr><td align="center" colspan="2"><div class="heading">Downline #9 Settings</div></td></tr>
<tr bgcolor="#eeeeee"><td>Enable Downline #9:</td><td><select name="newselldownline9" class="pickone">
<option value="yes" <?php if ($selldownline9 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($selldownline9 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Cost per Downline #9 position:</td><td>$<input type="text" name="newprice9" value="<?php echo $price9 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>Payout when a position cycles:</td><td>$<input type="text" name="newpayout9" value="<?php echo $payout9 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>May members cause their own positions to cycle faster by making personal referrals with their affiliate URLs? Selecting "NO" means that all positions entered into this downline only count towards cycling the TOP position. Selecting "YES" counts toward cycling the SPONSOR'S position instead (if they have any left in this downline):</td><td><select name="newenablepersonalreferrals9" class="pickone">
<option value="yes" <?php if ($enablepersonalreferrals9 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($enablepersonalreferrals9 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Do you want sponsors to receive a bonus sales commission when their referrals buy individual positions? This commission is NOT given when a referral receives BONUS positions that COME WITH an OTO purchase, a Special Offer, Upgrades, or positions given by the admin from the admin area. It is ONLY given when a referral BUYS positions individually (set to 0.00 to disable):</td><td>$<input type="text" name="newregularcommission9" value="<?php echo $regularcommission9 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>When a position cycles, should the member who bought it receive a Free Re-Entry into Downline #9 again?:</td><td><select name="newfreereentry9" class="pickone">
<option value="yes" <?php if ($freereentry9 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($freereentry9 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $middlelevel ?> membership, how many bonus positions in Downline #9 should they receive? 
Please be aware that if you give bonus positions AND a <?php $middlelevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $middlelevel ?> upgrade:</td><td><select name="newupgradejvbonusmatrix9_num" class="pickone">
<option value="0" <?php if ($upgradejvbonusmatrix9_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradejvbonusmatrix9_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradejvbonusmatrix9_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradejvbonusmatrix9_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradejvbonusmatrix9_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradejvbonusmatrix9_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradejvbonusmatrix9_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradejvbonusmatrix9_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradejvbonusmatrix9_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradejvbonusmatrix9_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradejvbonusmatrix9_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $toplevel ?> membership, how many bonus positions in Downline #9 should they receive? 
Please be aware that if you give bonus positions AND a <?php $toplevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $toplevel ?> upgrade:</td><td><select name="newupgradesuperjvbonusmatrix9_num" class="pickone">
<option value="0" <?php if ($upgradesuperjvbonusmatrix9_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradesuperjvbonusmatrix9_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradesuperjvbonusmatrix9_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradesuperjvbonusmatrix9_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradesuperjvbonusmatrix9_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradesuperjvbonusmatrix9_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradesuperjvbonusmatrix9_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradesuperjvbonusmatrix9_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradesuperjvbonusmatrix9_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradesuperjvbonusmatrix9_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradesuperjvbonusmatrix9_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#999999"><td align="center" colspan="2">&nbsp;</td></tr>
<tr bgcolor="#ffffff"><td align="center" colspan="2">&nbsp;</td></tr>
<?php
} # if ($matrixenabled9 == "yes")
####################################### 10
if ($matrixenabled10 == "yes")
{
?>
<tr><td align="center" colspan="2"><div class="heading">Downline #10 Settings</div></td></tr>
<tr bgcolor="#eeeeee"><td>Enable Downline #10:</td><td><select name="newselldownline10" class="pickone">
<option value="yes" <?php if ($selldownline10 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($selldownline10 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Cost per Downline #10 position:</td><td>$<input type="text" name="newprice10" value="<?php echo $price10 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>Payout when a position cycles:</td><td>$<input type="text" name="newpayout10" value="<?php echo $payout10 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>May members cause their own positions to cycle faster by making personal referrals with their affiliate URLs? Selecting "NO" means that all positions entered into this downline only count towards cycling the TOP position. Selecting "YES" counts toward cycling the SPONSOR'S position instead (if they have any left in this downline):</td><td><select name="newenablepersonalreferrals10" class="pickone">
<option value="yes" <?php if ($enablepersonalreferrals10 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($enablepersonalreferrals10 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>Do you want sponsors to receive a bonus sales commission when their referrals buy individual positions? This commission is NOT given when a referral receives BONUS positions that COME WITH an OTO purchase, a Special Offer, Upgrades, or positions given by the admin from the admin area. It is ONLY given when a referral BUYS positions individually (set to 0.00 to disable):</td><td>$<input type="text" name="newregularcommission10" value="<?php echo $regularcommission10 ?>" maxlength="12" size="6" class="typein"></td></tr>
<tr bgcolor="#eeeeee"><td>When a position cycles, should the member who bought it receive a Free Re-Entry into Downline #10 again?:</td><td><select name="newfreereentry10" class="pickone">
<option value="yes" <?php if ($freereentry10 == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($freereentry10 != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $middlelevel ?> membership, how many bonus positions in Downline #10 should they receive? 
Please be aware that if you give bonus positions AND a <?php $middlelevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $middlelevel ?> upgrade:</td><td><select name="newupgradejvbonusmatrix10_num" class="pickone">
<option value="0" <?php if ($upgradejvbonusmatrix10_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradejvbonusmatrix10_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradejvbonusmatrix10_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradejvbonusmatrix10_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradejvbonusmatrix10_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradejvbonusmatrix10_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradejvbonusmatrix10_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradejvbonusmatrix10_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradejvbonusmatrix10_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradejvbonusmatrix10_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradejvbonusmatrix10_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#eeeeee"><td>If a member buys a <?php echo $toplevel ?> membership, how many bonus positions in Downline #10 should they receive? 
Please be aware that if you give bonus positions AND a <?php $toplevel ?> upgrade with your OTO or Special Offer, those bonus positions would be ADDED to this number. It is recommended to either give positions with an upgrade OR an Offer, not both together.
Set to 0 to disable giving bonus positions with a <?php echo $toplevel ?> upgrade:</td><td><select name="newupgradesuperjvbonusmatrix10_num" class="pickone">
<option value="0" <?php if ($upgradesuperjvbonusmatrix10_num == "0") { echo "selected"; } ?>>0</option>
<option value="1" <?php if ($upgradesuperjvbonusmatrix10_num == "1") { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($upgradesuperjvbonusmatrix10_num == "2") { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($upgradesuperjvbonusmatrix10_num == "3") { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($upgradesuperjvbonusmatrix10_num == "4") { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($upgradesuperjvbonusmatrix10_num == "5") { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($upgradesuperjvbonusmatrix10_num == "6") { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($upgradesuperjvbonusmatrix10_num == "7") { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($upgradesuperjvbonusmatrix10_num == "8") { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($upgradesuperjvbonusmatrix10_num == "9") { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($upgradesuperjvbonusmatrix10_num == "10") { echo "selected"; } ?>>10</option></select></td></tr>
<tr bgcolor="#999999"><td align="center" colspan="2">&nbsp;</td></tr>
<tr bgcolor="#ffffff"><td align="center" colspan="2">&nbsp;</td></tr>
<?php
} # if ($matrixenabled10 == "yes")
#######################################
?>
<tr><td colspan="2" align="center">
<input type="hidden" name="action" value="savesettings"><input type="submit" value="SAVE SETTINGS" class="sendit"></td></tr></table></form>
</td></tr>
</table><br><br>
<?php
}
else
{
echo "Unauthorised Access!";
}
include "../footer.php";
?>