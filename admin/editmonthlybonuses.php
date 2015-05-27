<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
function formatDate($val) {
	if ($val != "")
	{
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
	}
	if ($val == "")
	{
	return "Hasn't run yet";
	}
}
if( session_is_registered("alogin") ) {
?><table>
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td valign="top" align="center"><br><br>
<?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
if($_POST['action'] == "updatesuperjv")
	{
	$query = "update monthlybonusessuperjv set points = '".$_POST['pointssuperjv']."',surfcredits = '".$_POST['surfcreditssuperjv']."', solo_num = '".$_POST['solo_numsuperjv']."', hheadlinead_num = '".$_POST['hheadlinead_numsuperjv']."', hheadlinead_views = '".$_POST['hheadlinead_viewssuperjv']."', hheaderad_num = '".$_POST['hheaderad_numsuperjv']."', hheaderad_views = '".$_POST['hheaderad_viewssuperjv']."', banner_num = '".$_POST['banner_numsuperjv']."', banner_views = '".$_POST['banner_viewssuperjv']."', featuredad_num = '".$_POST['featuredad_numsuperjv']."', featuredad_views = '".$_POST['featuredad_viewssuperjv']."', button_num = '".$_POST['button_numsuperjv']."', button_views = '".$_POST['button_viewssuperjv']."', traffic_num = '".$_POST['traffic_numsuperjv']."', traffic_views = '".$_POST['traffic_viewssuperjv']."', hotlink_num = '".$_POST['hotlink_numsuperjv']."', hotlink_views = '".$_POST['hotlink_viewssuperjv']."', ptc_num = '".$_POST['ptc_numsuperjv']."', ptc_views = '".$_POST['ptc_viewssuperjv']."', botnav_num = '".$_POST['botnav_numsuperjv']."', topnav_num = '".$_POST['topnav_numsuperjv']."', login_num = '".$_POST['login_numsuperjv']."', login_views = '".$_POST['login_viewssuperjv']."', tripler1_num = '".$_POST['tripler1_numsuperjv']."', tripler2_num = '".$_POST['tripler2_numsuperjv']."', tripler3_num = '".$_POST['tripler3_numsuperjv']."', tripler4_num = '".$_POST['tripler4_numsuperjv']."', tripler5_num = '".$_POST['tripler5_numsuperjv']."', tripler6_num = '".$_POST['tripler6_numsuperjv']."', tripler7_num = '".$_POST['tripler7_numsuperjv']."', tripler8_num = '".$_POST['tripler8_numsuperjv']."', tripler9_num = '".$_POST['tripler9_numsuperjv']."', tripler10_num = '".$_POST['tripler10_numsuperjv']."' WHERE id='".$_POST['id']."'";
	$result = mysql_query($query) or die(mysql_error());
	echo "<font color=red>The " . $toplevel . " member monthly bonuses have been updated.</font><br><br>";
	} # if($_POST['action'] == "updatesuperjv")
if($_POST['action'] == "updatejv")
	{
	$query = "UPDATE monthlybonusesjv set points = '".$_POST['pointsjv']."',surfcredits = '".$_POST['surfcreditsjv']."', solo_num = '".$_POST['solo_numjv']."', hheadlinead_num = '".$_POST['hheadlinead_numjv']."', hheadlinead_views = '".$_POST['hheadlinead_viewsjv']."', hheaderad_num = '".$_POST['hheaderad_numjv']."', hheaderad_views = '".$_POST['hheaderad_viewsjv']."', banner_num = '".$_POST['banner_numjv']."', banner_views = '".$_POST['banner_viewsjv']."', featuredad_num = '".$_POST['featuredad_numjv']."', featuredad_views = '".$_POST['featuredad_viewsjv']."', button_num = '".$_POST['button_numjv']."', button_views = '".$_POST['button_viewsjv']."', traffic_num = '".$_POST['traffic_numjv']."', traffic_views = '".$_POST['traffic_viewsjv']."', hotlink_num = '".$_POST['hotlink_numjv']."', hotlink_views = '".$_POST['hotlink_viewsjv']."', ptc_num = '".$_POST['ptc_numjv']."', ptc_views = '".$_POST['ptc_viewsjv']."', botnav_num = '".$_POST['botnav_numjv']."', topnav_num = '".$_POST['topnav_numjv']."', login_num = '".$_POST['login_numjv']."', login_views = '".$_POST['login_viewsjv']."', tripler1_num = '".$_POST['tripler1_numjv']."', tripler2_num = '".$_POST['tripler2_numjv']."', tripler3_num = '".$_POST['tripler3_numjv']."', tripler4_num = '".$_POST['tripler4_numjv']."', tripler5_num = '".$_POST['tripler5_numjv']."', tripler6_num = '".$_POST['tripler6_numjv']."', tripler7_num = '".$_POST['tripler7_numjv']."', tripler8_num = '".$_POST['tripler8_numjv']."', tripler9_num = '".$_POST['tripler9_numjv']."', tripler10_num = '".$_POST['tripler10_numjv']."' WHERE id='".$_POST['id']."'";
	$result = mysql_query($query) or die(mysql_error());
	echo "<font color=red>The " . $middlelevel . " member monthly bonuses have been updated.</font><br><br>";
	} # if($_POST['action'] == "updatejv")
if($_POST['action'] == "updatepro")
	{
	$query = "UPDATE monthlybonusespro set points = '".$_POST['pointspro']."',surfcredits = '".$_POST['surfcreditspro']."', solo_num = '".$_POST['solo_numpro']."', hheadlinead_num = '".$_POST['hheadlinead_numpro']."', hheadlinead_views = '".$_POST['hheadlinead_viewspro']."', hheaderad_num = '".$_POST['hheaderad_numpro']."', hheaderad_views = '".$_POST['hheaderad_viewspro']."', banner_num = '".$_POST['banner_numpro']."', banner_views = '".$_POST['banner_viewspro']."', featuredad_num = '".$_POST['featuredad_numpro']."', featuredad_views = '".$_POST['featuredad_viewspro']."', button_num = '".$_POST['button_numpro']."', button_views = '".$_POST['button_viewspro']."', traffic_num = '".$_POST['traffic_numpro']."', traffic_views = '".$_POST['traffic_viewspro']."', hotlink_num = '".$_POST['hotlink_numpro']."', hotlink_views = '".$_POST['hotlink_viewspro']."', ptc_num = '".$_POST['ptc_numpro']."', ptc_views = '".$_POST['ptc_viewspro']."', botnav_num = '".$_POST['botnav_numpro']."', topnav_num = '".$_POST['topnav_numpro']."', login_num = '".$_POST['login_numpro']."', login_views = '".$_POST['login_viewspro']."', tripler1_num = '".$_POST['tripler1_numpro']."', tripler2_num = '".$_POST['tripler2_numpro']."', tripler3_num = '".$_POST['tripler3_numpro']."', tripler4_num = '".$_POST['tripler4_numpro']."', tripler5_num = '".$_POST['tripler5_numpro']."', tripler6_num = '".$_POST['tripler6_numpro']."', tripler7_num = '".$_POST['tripler7_numpro']."', tripler8_num = '".$_POST['tripler8_numpro']."', tripler9_num = '".$_POST['tripler9_numpro']."', tripler10_num = '".$_POST['tripler10_numpro']."' WHERE id='".$_POST['id']."'";
	$result = mysql_query($query) or die(mysql_error());
	echo "<font color=red>The " . $lowerlevel . " member monthly bonuses have been updated.</font><br><br>";
	} # if($_POST['action'] == "updatepro")
$sqlsuperjv = mysql_query("select * from monthlybonusessuperjv limit 1");
$superjvbonuses = mysql_fetch_array($sqlsuperjv);
$sqljv = mysql_query("select * from monthlybonusesjv limit 1");
$jvbonuses = mysql_fetch_array($sqljv);
$sqlpro = mysql_query("select * from monthlybonusespro limit 1");
$probonuses = mysql_fetch_array($sqlpro);
?>
<center>
<H2><? echo $sitename; ?> Monthly Bonuses</H2>
<p>If you do not want a membership level to receive monthly bonuses, leave the fields blank or set to 0.</p>
<hr>
<form action="editmonthlybonuses.php" method="POST">
<input type="hidden" name="action" value="updatesuperjv">
<input type="hidden" name="id" value="<? echo $superjvbonuses['id']; ?>">
<p><b><?php echo $toplevel ?> Monthly Bonuses</b></p>
<table>
<tr><td>Date Last Bonus Given To <?php echo $toplevel ?> Members:</td><td><?php echo formatDate($superjvbonuses['lastbonusdate']); ?></td></tr>
<tr><td>How many Points should a <?php echo $toplevel ?> member receive every month?</td><td><input type="text" name="pointssuperjv" value="<? echo $superjvbonuses['points']; ?>"></td></tr>
<tr><td>How many Surf Credits should a <?php echo $toplevel ?> member receive every month?</td><td><input type="text" name="surfcreditssuperjv" value="<? echo $superjvbonuses['surfcredits']; ?>"></td></tr>
<tr><td>How many Solo Ads should a <?php echo $toplevel ?> member receive every month?</td><td><input type="text" name="solo_numsuperjv" value="<? echo $superjvbonuses['solo_num']; ?>"></td></tr>
<tr><td colspan="2">A <?php echo $toplevel ?> member should receive <input type="text" name="hheadlinead_numsuperjv" size="10" value="<? echo $superjvbonuses['hheadlinead_num']; ?>"> Hot Headline Adz with <input type="text" name="hheadlinead_viewssuperjv" size="10" value="<? echo $superjvbonuses['hheadlinead_views']; ?>"> clicks every month?</td></tr>
<tr><td colspan="2">A <?php echo $toplevel ?> member should receive <input type="text" name="hheaderad_numsuperjv" size="10" value="<? echo $superjvbonuses['hheaderad_num']; ?>"> Hot Header Adz with <input type="text" name="hheaderad_viewssuperjv" size="10" value="<? echo $superjvbonuses['hheaderad_views']; ?>"> clicks every month?</td></tr>
<tr><td colspan="2">A <?php echo $toplevel ?> member should receive <input type="text" name="button_numsuperjv" size="10" value="<? echo $superjvbonuses['button_num']; ?>"> Button Banners with <input type="text" name="button_viewssuperjv" size="10" value="<? echo $superjvbonuses['button_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $toplevel ?> member should receive <input type="text" name="banner_numsuperjv" size="10" value="<? echo $superjvbonuses['banner_num']; ?>"> Banners with <input type="text" name="banner_viewssuperjv" size="10" value="<? echo $superjvbonuses['banner_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $toplevel ?> member should receive <input type="text" name="featuredad_numsuperjv" size="10" value="<? echo $superjvbonuses['featuredad_num']; ?>"> Featured Ads with <input type="text" name="featuredad_viewssuperjv" size="10" value="<? echo $superjvbonuses['featuredad_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $toplevel ?> member should receive <input type="text" name="trafficlink_numsuperjv" size="10" value="<? echo $superjvbonuses['trafficlink_num']; ?>"> Trafficlink Ads with <input type="text" name="trafficlink_viewssuperjv" size="10" value="<? echo $superjvbonuses['trafficlink_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $toplevel ?> member should receive <input type="text" name="ptc_numsuperjv" size="10" value="<? echo $superjvbonuses['ptc_num']; ?>"> <?php echo $ptclinkname ?> Ads with <input type="text" name="ptc_viewssuperjv" size="10" value="<? echo $superjvbonuses['ptc_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $toplevel ?> member should receive <input type="text" name="hotlink_numsuperjv" size="10" value="<? echo $superjvbonuses['hotlink_num']; ?>"> Hotlinks with <input type="text" name="hotlink_viewssuperjv" size="10" value="<? echo $superjvbonuses['hotlink_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $toplevel ?> member should receive <input type="text" name="login_numsuperjv" size="10" value="<? echo $superjvbonuses['login_num']; ?>"> Login Ads with <input type="text" name="login_viewssuperjv" size="10" value="<? echo $superjvbonuses['login_views']; ?>"> views every month?</td></tr>
<tr><td>How many Top Nav links should a <?php echo $toplevel ?> member receive every month?</td><td><input type="text" name="topnav_numsuperjv" value="<? echo $superjvbonuses['topnav_num']; ?>"></td></tr>
<tr><td>How many Bottom Nav links should a <?php echo $toplevel ?> member receive every month?</td><td><input type="text" name="botnav_numsuperjv" value="<? echo $superjvbonuses['botnav_num']; ?>"></td></tr>

<tr><td>Downline #1 Positions to add:</td><td><input type="text" name="tripler1_numsuperjv" value="<? echo $superjvbonuses['tripler1_num']; ?>"> Positions</td></tr>
<tr><td>Downline #2 Positions to add:</td><td><input type="text" name="tripler2_numsuperjv" value="<? echo $superjvbonuses['tripler2_num']; ?>"> Positions</td></tr>
<tr><td>Downline #3 Positions to add:</td><td><input type="text" name="tripler3_numsuperjv" value="<? echo $superjvbonuses['tripler3_num']; ?>"> Positions</td></tr>
<tr><td>Downline #4 Positions to add:</td><td><input type="text" name="tripler4_numsuperjv" value="<? echo $superjvbonuses['tripler4_num']; ?>"> Positions</td></tr>
<tr><td>Downline #5 Positions to add:</td><td><input type="text" name="tripler5_numsuperjv" value="<? echo $superjvbonuses['tripler5_num']; ?>"> Positions</td></tr>
<tr><td>Downline #6 Positions to add:</td><td><input type="text" name="tripler6_numsuperjv" value="<? echo $superjvbonuses['tripler6_num']; ?>"> Positions</td></tr>
<tr><td>Downline #7 Positions to add:</td><td><input type="text" name="tripler7_numsuperjv" value="<? echo $superjvbonuses['tripler7_num']; ?>"> Positions</td></tr>
<tr><td>Downline #8 Positions to add:</td><td><input type="text" name="tripler8_numsuperjv" value="<? echo $superjvbonuses['tripler8_num']; ?>"> Positions</td></tr>
<tr><td>Downline #9 Positions to add:</td><td><input type="text" name="tripler9_numsuperjv" value="<? echo $superjvbonuses['tripler9_num']; ?>"> Positions</td></tr>
<tr><td>Downline #10 Positions to add:</td><td><input type="text" name="tripler10_numsuperjv" value="<? echo $superjvbonuses['tripler10_num']; ?>"> Positions</td></tr>

<tr><td colspan="2" align="center"><br><input type="submit" value="Save <?php echo $toplevel ?> Bonuses"></td></tr>
</table>
</form>
<hr>
<form action="editmonthlybonuses.php" method="POST">
<input type="hidden" name="action" value="updatejv">
<input type="hidden" name="id" value="<? echo $jvbonuses['id']; ?>">
<p><b><?php echo $middlelevel ?> Monthly Bonuses</b></p>
<table>
<tr><td>Date Last Bonus Given To <?php echo $middlelevel ?> Members:</td><td><?php echo formatDate($jvbonuses['lastbonusdate']); ?></td></tr>
<tr><td>How many Points should a <?php echo $middlelevel ?> member receive every month?</td><td><input type="text" name="pointsjv" value="<? echo $jvbonuses['points']; ?>"></td></tr>
<tr><td>How many Surf Credits should a <?php echo $middlelevel ?> member receive every month?</td><td><input type="text" name="surfcreditsjv" value="<? echo $jvbonuses['surfcredits']; ?>"></td></tr>
<tr><td>How many Solo Ads should a <?php echo $middlelevel ?> member receive every month?</td><td><input type="text" name="solo_numjv" value="<? echo $jvbonuses['solo_num']; ?>"></td></tr>
<tr><td colspan="2">A <?php echo $middlelevel ?> member should receive <input type="text" name="hheadlinead_numjv" size="10" value="<? echo $jvbonuses['hheadlinead_num']; ?>"> Hot Headline Adz with <input type="text" name="hheadlinead_viewsjv" size="10" value="<? echo $jvbonuses['hheadlinead_views']; ?>"> clicks every month?</td></tr>
<tr><td colspan="2">A <?php echo $middlelevel ?> member should receive <input type="text" name="hheaderad_numjv" size="10" value="<? echo $jvbonuses['hheaderad_num']; ?>"> Hot Header Adz with <input type="text" name="hheaderad_viewsjv" size="10" value="<? echo $jvbonuses['hheaderad_views']; ?>"> clicks every month?</td></tr>
<tr><td colspan="2">A <?php echo $middlelevel ?> member should receive <input type="text" name="button_numjv" size="10" value="<? echo $jvbonuses['button_num']; ?>"> Button Banners with <input type="text" name="button_viewsjv" size="10" value="<? echo $jvbonuses['button_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $middlelevel ?> member should receive <input type="text" name="banner_numjv" size="10" value="<? echo $jvbonuses['banner_num']; ?>"> Banners with <input type="text" name="banner_viewsjv" size="10" value="<? echo $jvbonuses['banner_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $middlelevel ?> member should receive <input type="text" name="featuredad_numjv" size="10" value="<? echo $jvbonuses['featuredad_num']; ?>"> Featured Ads with <input type="text" name="featuredad_viewsjv" size="10" value="<? echo $jvbonuses['featuredad_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $middlelevel ?> member should receive <input type="text" name="trafficlink_numjv" size="10" value="<? echo $jvbonuses['trafficlink_num']; ?>"> Trafficlink Ads with <input type="text" name="trafficlink_viewsjv" size="10" value="<? echo $jvbonuses['trafficlink_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $middlelevel ?> member should receive <input type="text" name="ptc_numjv" size="10" value="<? echo $jvbonuses['ptc_num']; ?>"> <?php echo $ptclinkname ?> Ads with <input type="text" name="ptc_viewsjv" size="10" value="<? echo $jvbonuses['ptc_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $middlelevel ?> member should receive <input type="text" name="hotlink_numjv" size="10" value="<? echo $jvbonuses['hotlink_num']; ?>"> Hotlinks with <input type="text" name="hotlink_viewsjv" size="10" value="<? echo $jvbonuses['hotlink_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $middlelevel ?> member should receive <input type="text" name="login_numjv" size="10" value="<? echo $jvbonuses['login_num']; ?>"> Login Ads with <input type="text" name="login_viewsjv" size="10" value="<? echo $jvbonuses['login_views']; ?>"> views every month?</td></tr>
<tr><td>How many Top Nav links should a <?php echo $middlelevel ?> member receive every month?</td><td><input type="text" name="topnav_numjv" value="<? echo $jvbonuses['topnav_num']; ?>"></td></tr>
<tr><td>How many Bottom Nav links should a <?php echo $middlelevel ?> member receive every month?</td><td><input type="text" name="botnav_numjv" value="<? echo $jvbonuses['botnav_num']; ?>"></td></tr>

<tr><td>Downline #1 Positions to add:</td><td><input type="text" name="tripler1_numjv" value="<? echo $jvbonuses['tripler1_num']; ?>"> Positions</td></tr>
<tr><td>Downline #2 Positions to add:</td><td><input type="text" name="tripler2_numjv" value="<? echo $jvbonuses['tripler2_num']; ?>"> Positions</td></tr>
<tr><td>Downline #3 Positions to add:</td><td><input type="text" name="tripler3_numjv" value="<? echo $jvbonuses['tripler3_num']; ?>"> Positions</td></tr>
<tr><td>Downline #4 Positions to add:</td><td><input type="text" name="tripler4_numjv" value="<? echo $jvbonuses['tripler4_num']; ?>"> Positions</td></tr>
<tr><td>Downline #5 Positions to add:</td><td><input type="text" name="tripler5_numjv" value="<? echo $jvbonuses['tripler5_num']; ?>"> Positions</td></tr>
<tr><td>Downline #6 Positions to add:</td><td><input type="text" name="tripler6_numjv" value="<? echo $jvbonuses['tripler6_num']; ?>"> Positions</td></tr>
<tr><td>Downline #7 Positions to add:</td><td><input type="text" name="tripler7_numjv" value="<? echo $jvbonuses['tripler7_num']; ?>"> Positions</td></tr>
<tr><td>Downline #8 Positions to add:</td><td><input type="text" name="tripler8_numjv" value="<? echo $jvbonuses['tripler8_num']; ?>"> Positions</td></tr>
<tr><td>Downline #9 Positions to add:</td><td><input type="text" name="tripler9_numjv" value="<? echo $jvbonuses['tripler9_num']; ?>"> Positions</td></tr>
<tr><td>Downline #10 Positions to add:</td><td><input type="text" name="tripler10_numjv" value="<? echo $jvbonuses['tripler10_num']; ?>"> Positions</td></tr>

<tr><td colspan="2" align="center"><br><input type="submit" value="Save <?php echo $middlelevel ?> Bonuses"></td></tr>
</table>
</form>
<hr>
<form action="editmonthlybonuses.php" method="POST">
<input type="hidden" name="action" value="updatepro">
<input type="hidden" name="id" value="<? echo $probonuses['id']; ?>">
<p><b><?php echo $lowerlevel ?> Monthly Bonuses</b></p>
<table>
<tr><td>Date Last Bonus Given To <?php echo $lowerlevel ?> Members:</td><td><?php echo formatDate($probonuses['lastbonusdate']); ?></td></tr>
<tr><td>How many Points should a <?php echo $lowerlevel ?> member receive every month?</td><td><input type="text" name="pointspro" value="<? echo $probonuses['points']; ?>"></td></tr>
<tr><td>How many Surf Credits should a <?php echo $lowerlevel ?> member receive every month?</td><td><input type="text" name="surfcreditspro" value="<? echo $probonuses['surfcredits']; ?>"></td></tr>
<tr><td>How many Solo Ads should a <?php echo $lowerlevel ?> member receive every month?</td><td><input type="text" name="solo_numpro" value="<? echo $probonuses['solo_num']; ?>"></td></tr>
<tr><td colspan="2">A <?php echo $lowerlevel ?> member should receive <input type="text" name="hheadlinead_numpro" size="10" value="<? echo $probonuses['hheadlinead_num']; ?>"> Hot Headline Adz with <input type="text" name="hheadlinead_viewspro" size="10" value="<? echo $probonuses['hheadlinead_views']; ?>"> clicks every month?</td></tr>
<tr><td colspan="2">A <?php echo $lowerlevel ?> member should receive <input type="text" name="hheaderad_numpro" size="10" value="<? echo $probonuses['hheaderad_num']; ?>"> Hot Header Adz with <input type="text" name="hheaderad_viewspro" size="10" value="<? echo $probonuses['hheaderad_views']; ?>"> clicks every month?</td></tr>
<tr><td colspan="2">A <?php echo $lowerlevel ?> member should receive <input type="text" name="button_numpro" size="10" value="<? echo $probonuses['button_num']; ?>"> Button Banners with <input type="text" name="button_viewspro" size="10" value="<? echo $probonuses['button_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $lowerlevel ?> member should receive <input type="text" name="banner_numpro" size="10" value="<? echo $probonuses['banner_num']; ?>"> Banners with <input type="text" name="banner_viewspro" size="10" value="<? echo $probonuses['banner_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $lowerlevel ?> member should receive <input type="text" name="featuredad_numpro" size="10" value="<? echo $probonuses['featuredad_num']; ?>"> Featured Ads with <input type="text" name="featuredad_viewspro" size="10" value="<? echo $probonuses['featuredad_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $lowerlevel ?> member should receive <input type="text" name="trafficlink_numpro" size="10" value="<? echo $probonuses['trafficlink_num']; ?>"> Trafficlink Ads with <input type="text" name="trafficlink_viewspro" size="10" value="<? echo $probonuses['trafficlink_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $lowerlevel ?> member should receive <input type="text" name="ptc_numpro" size="10" value="<? echo $probonuses['ptc_num']; ?>"> <?php echo $ptclinkname ?> Ads with <input type="text" name="ptc_viewspro" size="10" value="<? echo $probonuses['ptc_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $lowerlevel ?> member should receive <input type="text" name="hotlink_numpro" size="10" value="<? echo $probonuses['hotlink_num']; ?>"> Hotlinks with <input type="text" name="hotlink_viewspro" size="10" value="<? echo $probonuses['hotlink_views']; ?>"> views every month?</td></tr>
<tr><td colspan="2">A <?php echo $lowerlevel ?> member should receive <input type="text" name="login_numpro" size="10" value="<? echo $probonuses['login_num']; ?>"> Login Ads with <input type="text" name="login_viewspro" size="10" value="<? echo $probonuses['login_views']; ?>"> views every month?</td></tr>
<tr><td>How many Top Nav links should a <?php echo $lowerlevel ?> member receive every month?</td><td><input type="text" name="topnav_numpro" value="<? echo $probonuses['topnav_num']; ?>"></td></tr>
<tr><td>How many Bottom Nav links should a <?php echo $lowerlevel ?> member receive every month?</td><td><input type="text" name="botnav_numpro" value="<? echo $probonuses['botnav_num']; ?>"></td></tr>

<tr><td>Downline #1 Positions to add:</td><td><input type="text" name="tripler1_numpro" value="<? echo $probonuses['tripler1_num']; ?>"> Positions</td></tr>
<tr><td>Downline #2 Positions to add:</td><td><input type="text" name="tripler2_numpro" value="<? echo $probonuses['tripler2_num']; ?>"> Positions</td></tr>
<tr><td>Downline #3 Positions to add:</td><td><input type="text" name="tripler3_numpro" value="<? echo $probonuses['tripler3_num']; ?>"> Positions</td></tr>
<tr><td>Downline #4 Positions to add:</td><td><input type="text" name="tripler4_numpro" value="<? echo $probonuses['tripler4_num']; ?>"> Positions</td></tr>
<tr><td>Downline #5 Positions to add:</td><td><input type="text" name="tripler5_numpro" value="<? echo $probonuses['tripler5_num']; ?>"> Positions</td></tr>
<tr><td>Downline #6 Positions to add:</td><td><input type="text" name="tripler6_numpro" value="<? echo $probonuses['tripler6_num']; ?>"> Positions</td></tr>
<tr><td>Downline #7 Positions to add:</td><td><input type="text" name="tripler7_numpro" value="<? echo $probonuses['tripler7_num']; ?>"> Positions</td></tr>
<tr><td>Downline #8 Positions to add:</td><td><input type="text" name="tripler8_numpro" value="<? echo $probonuses['tripler8_num']; ?>"> Positions</td></tr>
<tr><td>Downline #9 Positions to add:</td><td><input type="text" name="tripler9_numpro" value="<? echo $probonuses['tripler9_num']; ?>"> Positions</td></tr>
<tr><td>Downline #10 Positions to add:</td><td><input type="text" name="tripler10_numpro" value="<? echo $probonuses['tripler10_num']; ?>"> Positions</td></tr>

<tr><td colspan="2" align="center"><br><input type="submit" value="Save <?php echo $lowerlevel ?> Bonuses"></td></tr>
</table>
</form>
<?
echo "</td></tr></table>";
} # if( session_is_registered("alogin") )
else
{
echo "Unauthorised Access!";
}
include "../footer.php";
?>