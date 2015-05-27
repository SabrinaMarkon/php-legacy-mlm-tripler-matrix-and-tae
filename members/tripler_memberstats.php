<?php
session_start();
include "../config.php";
require('../EgoPaySci.php');
$matrixowed = 0.00;
$matrixpaid = 0.00;
$matrix1owed = 0.00;
$matrix1paid = 0.00;
$matrix2owed = 0.00;
$matrix2paid = 0.00;
$matrix3owed = 0.00;
$matrix3paid = 0.00;
$matrix4owed = 0.00;
$matrix4paid = 0.00;
$matrix5owed = 0.00;
$matrix5paid = 0.00;
$matrix6owed = 0.00;
$matrix6paid = 0.00;
$matrix7owed = 0.00;
$matrix7paid = 0.00;
$matrix8owed = 0.00;
$matrix8paid = 0.00;
$matrix9owed = 0.00;
$matrix9paid = 0.00;
$matrix10owed = 0.00;
$matrix10paid = 0.00;
$totalpositions = 0;
$totalpositions1 = 0;
$totalpositions2 = 0;
$totalpositions3 = 0;
$totalpositions4 = 0;
$totalpositions5 = 0;
$totalpositions6 = 0;
$totalpositions7 = 0;
$totalpositions8 = 0;
$totalpositions9 = 0;
$totalpositions10 = 0;
$totalcycledpositions = 0;
$totalcycledpositions1 = 0;
$totalcycledpositions2 = 0;
$totalcycledpositions3 = 0;
$totalcycledpositions4 = 0;
$totalcycledpositions5 = 0;
$totalcycledpositions6 = 0;
$totalcycledpositions7 = 0;
$totalcycledpositions8 = 0;
$totalcycledpositions9 = 0;
$totalcycledpositions10 = 0;
$totalactivepositions = 0;
$totalactivepositions1 = 0;
$totalactivepositions2 = 0;
$totalactivepositions3 = 0;
$totalactivepositions4 = 0;
$totalactivepositions5 = 0;
$totalactivepositions6 = 0;
$totalactivepositions7 = 0;
$totalactivepositions8 = 0;
$totalactivepositions9 = 0;
$totalactivepositions10 = 0;
#############################################################
if ((($matrixenabled1 == "yes") and ($selldownline1 == "yes")) or (($matrixenabled2 == "yes") and ($selldownline2 == "yes")) or (($matrixenabled3 == "yes") and ($selldownline3 == "yes")) or (($matrixenabled4 == "yes") and ($selldownline4 == "yes")) or (($matrixenabled5 == "yes") and ($selldownline5 == "yes")) or (($matrixenabled6 == "yes") and ($selldownline6 == "yes")) or (($matrixenabled7 == "yes") and ($selldownline7 == "yes")) or (($matrixenabled8 == "yes") and ($selldownline8 == "yes")) or (($matrixenabled9 == "yes") and ($selldownline9 == "yes")) or (($matrixenabled10 == "yes") and ($selldownline10 == "yes")))
{
#############################################################
if (($matrixenabled1 == "yes") and ($selldownline1 == "yes"))
{
$q = "select sum(owed),sum(paid),count(*) as howmanypositions from matrix1 where username=\"$userid\"";
$r = mysql_query($q);
while($rowz = mysql_fetch_array($r))
	{
	$matrix1owed = $rowz["sum(owed)"];
	$matrix1paid = $rowz["sum(paid)"];
	$totalpositions1 = $rowz["howmanypositions"];
	$matrix1owed = sprintf("%.2f", $matrix1owed);
	$matrix1paid = sprintf("%.2f", $matrix1paid);
	}
$q2 = "select count(*) as howmanycycledpositions from matrix1 where positionsleft<1 and done=\"yes\" and username=\"$userid\"";
$r2 = mysql_query($q2);
while($rowz2 = mysql_fetch_array($r2))
	{
	$totalcycledpositions1 = $rowz2["howmanycycledpositions"];
	}
$q3 = "select count(*) as howmanyactivepositions from matrix1 where positionsleft>0 and done=\"no\" and username=\"$userid\"";
$r3 = mysql_query($q3);
while($rowz3 = mysql_fetch_array($r3))
	{
	$totalactivepositions1 = $rowz3["howmanyactivepositions"];
	}
}
#############################################################
if (($matrixenabled2 == "yes") and ($selldownline2 == "yes"))
{
$q = "select sum(owed),sum(paid),count(*) as howmanypositions from matrix2 where username=\"$userid\"";
$r = mysql_query($q);
while($rowz = mysql_fetch_array($r))
	{
	$matrix2owed = $rowz["sum(owed)"];
	$matrix2paid = $rowz["sum(paid)"];
	$totalpositions2 = $rowz["howmanypositions"];
	$matrix2owed = sprintf("%.2f", $matrix2owed);
	$matrix2paid = sprintf("%.2f", $matrix2paid);
	}
$q2 = "select count(*) as howmanycycledpositions from matrix2 where positionsleft<1 and done=\"yes\" and username=\"$userid\"";
$r2 = mysql_query($q2);
while($rowz2 = mysql_fetch_array($r2))
	{
	$totalcycledpositions2 = $rowz2["howmanycycledpositions"];
	}
$q3 = "select count(*) as howmanyactivepositions from matrix2 where positionsleft>0 and done=\"no\" and username=\"$userid\"";
$r3 = mysql_query($q3);
while($rowz3 = mysql_fetch_array($r3))
	{
	$totalactivepositions2 = $rowz3["howmanyactivepositions"];
	}
}
#############################################################
if (($matrixenabled3 == "yes") and ($selldownline3 == "yes"))
{
$q = "select sum(owed),sum(paid),count(*) as howmanypositions from matrix3 where username=\"$userid\"";
$r = mysql_query($q);
$totalpositions3 = mysql_num_rows($r);
while($rowz = mysql_fetch_array($r))
	{
	$matrix3owed = $rowz["sum(owed)"];
	$matrix3paid = $rowz["sum(paid)"];
	$totalpositions3 = $rowz["howmanypositions"];
	$matrix3owed = sprintf("%.2f", $matrix3owed);
	$matrix3paid = sprintf("%.2f", $matrix3paid);
	}
$q2 = "select count(*) as howmanycycledpositions from matrix3 where positionsleft<1 and done=\"yes\" and username=\"$userid\"";
$r2 = mysql_query($q2);
while($rowz2 = mysql_fetch_array($r2))
	{
	$totalcycledpositions3 = $rowz2["howmanycycledpositions"];
	}
$q3 = "select count(*) as howmanyactivepositions from matrix3 where positionsleft>0 and done=\"no\" and username=\"$userid\"";
$r3 = mysql_query($q3);
while($rowz3 = mysql_fetch_array($r3))
	{
	$totalactivepositions3 = $rowz3["howmanyactivepositions"];
	}
}
#############################################################
if (($matrixenabled4 == "yes") and ($selldownline4 == "yes"))
{
$q = "select sum(owed),sum(paid),count(*) as howmanypositions from matrix4 where username=\"$userid\"";
$r = mysql_query($q);
$totalpositions4 = mysql_num_rows($r);
while($rowz = mysql_fetch_array($r))
	{
	$matrix4owed = $rowz["sum(owed)"];
	$matrix4paid = $rowz["sum(paid)"];
	$totalpositions4 = $rowz["howmanypositions"];
	$matrix4owed = sprintf("%.2f", $matrix4owed);
	$matrix4paid = sprintf("%.2f", $matrix4paid);
	}
$q2 = "select count(*) as howmanycycledpositions from matrix4 where positionsleft<1 and done=\"yes\" and username=\"$userid\"";
$r2 = mysql_query($q2);
while($rowz2 = mysql_fetch_array($r2))
	{
	$totalcycledpositions4 = $rowz2["howmanycycledpositions"];
	}
$q3 = "select count(*) as howmanyactivepositions from matrix4 where positionsleft>0 and done=\"no\" and username=\"$userid\"";
$r3 = mysql_query($q3);
while($rowz3 = mysql_fetch_array($r3))
	{
	$totalactivepositions4 = $rowz3["howmanyactivepositions"];
	}
}
#############################################################
if (($matrixenabled5 == "yes") and ($selldownline5 == "yes"))
{
$q = "select sum(owed),sum(paid),count(*) as howmanypositions from matrix5 where username=\"$userid\"";
$r = mysql_query($q);
$totalpositions5 = mysql_num_rows($r);
while($rowz = mysql_fetch_array($r))
	{
	$matrix5owed = $rowz["sum(owed)"];
	$matrix5paid = $rowz["sum(paid)"];
	$totalpositions5 = $rowz["howmanypositions"];
	$matrix5owed = sprintf("%.2f", $matrix5owed);
	$matrix5paid = sprintf("%.2f", $matrix5paid);
	}
$q2 = "select count(*) as howmanycycledpositions from matrix5 where positionsleft<1 and done=\"yes\" and username=\"$userid\"";
$r2 = mysql_query($q2);
while($rowz2 = mysql_fetch_array($r2))
	{
	$totalcycledpositions5 = $rowz2["howmanycycledpositions"];
	}
$q3 = "select count(*) as howmanyactivepositions from matrix5 where positionsleft>0 and done=\"no\" and username=\"$userid\"";
$r3 = mysql_query($q3);
while($rowz3 = mysql_fetch_array($r3))
	{
	$totalactivepositions5 = $rowz3["howmanyactivepositions"];
	}
}
#############################################################
if (($matrixenabled6 == "yes") and ($selldownline6 == "yes"))
{
$q = "select sum(owed),sum(paid),count(*) as howmanypositions from matrix6 where username=\"$userid\"";
$r = mysql_query($q);
$totalpositions6 = mysql_num_rows($r);
while($rowz = mysql_fetch_array($r))
	{
	$matrix6owed = $rowz["sum(owed)"];
	$matrix6paid = $rowz["sum(paid)"];
	$totalpositions6 = $rowz["howmanypositions"];
	$matrix6owed = sprintf("%.2f", $matrix6owed);
	$matrix6paid = sprintf("%.2f", $matrix6paid);
	}
$q2 = "select count(*) as howmanycycledpositions from matrix6 where positionsleft<1 and done=\"yes\" and username=\"$userid\"";
$r2 = mysql_query($q2);
while($rowz2 = mysql_fetch_array($r2))
	{
	$totalcycledpositions6 = $rowz2["howmanycycledpositions"];
	}
$q3 = "select count(*) as howmanyactivepositions from matrix6 where positionsleft>0 and done=\"no\" and username=\"$userid\"";
$r3 = mysql_query($q3);
while($rowz3 = mysql_fetch_array($r3))
	{
	$totalactivepositions6 = $rowz3["howmanyactivepositions"];
	}
}
#############################################################
if (($matrixenabled7 == "yes") and ($selldownline7 == "yes"))
{
$q = "select sum(owed),sum(paid),count(*) as howmanypositions from matrix7 where username=\"$userid\"";
$r = mysql_query($q);
$totalpositions7 = mysql_num_rows($r);
while($rowz = mysql_fetch_array($r))
	{
	$matrix7owed = $rowz["sum(owed)"];
	$matrix7paid = $rowz["sum(paid)"];
	$totalpositions7 = $rowz["howmanypositions"];
	$matrix7owed = sprintf("%.2f", $matrix7owed);
	$matrix7paid = sprintf("%.2f", $matrix7paid);
	}
$q2 = "select count(*) as howmanycycledpositions from matrix7 where positionsleft<1 and done=\"yes\" and username=\"$userid\"";
$r2 = mysql_query($q2);
while($rowz2 = mysql_fetch_array($r2))
	{
	$totalcycledpositions7 = $rowz2["howmanycycledpositions"];
	}
$q3 = "select count(*) as howmanyactivepositions from matrix7 where positionsleft>0 and done=\"no\" and username=\"$userid\"";
$r3 = mysql_query($q3);
while($rowz3 = mysql_fetch_array($r3))
	{
	$totalactivepositions7 = $rowz3["howmanyactivepositions"];
	}
}
#############################################################
if (($matrixenabled8 == "yes") and ($selldownline8 == "yes"))
{
$q = "select sum(owed),sum(paid),count(*) as howmanypositions from matrix8 where username=\"$userid\"";
$r = mysql_query($q);
$totalpositions8 = mysql_num_rows($r);
while($rowz = mysql_fetch_array($r))
	{
	$matrix8owed = $rowz["sum(owed)"];
	$matrix8paid = $rowz["sum(paid)"];
	$totalpositions8 = $rowz["howmanypositions"];
	$matrix8owed = sprintf("%.2f", $matrix8owed);
	$matrix8paid = sprintf("%.2f", $matrix8paid);
	}
$q2 = "select count(*) as howmanycycledpositions from matrix8 where positionsleft<1 and done=\"yes\" and username=\"$userid\"";
$r2 = mysql_query($q2);
while($rowz2 = mysql_fetch_array($r2))
	{
	$totalcycledpositions8 = $rowz2["howmanycycledpositions"];
	}
$q3 = "select count(*) as howmanyactivepositions from matrix8 where positionsleft>0 and done=\"no\" and username=\"$userid\"";
$r3 = mysql_query($q3);
while($rowz3 = mysql_fetch_array($r3))
	{
	$totalactivepositions8 = $rowz3["howmanyactivepositions"];
	}
}
#############################################################
if (($matrixenabled9 == "yes") and ($selldownline9 == "yes"))
{
$q = "select sum(owed),sum(paid),count(*) as howmanypositions from matrix9 where username=\"$userid\"";
$r = mysql_query($q);
$totalpositions9 = mysql_num_rows($r);
while($rowz = mysql_fetch_array($r))
	{
	$matrix9owed = $rowz["sum(owed)"];
	$matrix9paid = $rowz["sum(paid)"];
	$totalpositions9 = $rowz["howmanypositions"];
	$matrix9owed = sprintf("%.2f", $matrix9owed);
	$matrix9paid = sprintf("%.2f", $matrix9paid);
	}
$q2 = "select count(*) as howmanycycledpositions from matrix9 where positionsleft<1 and done=\"yes\" and username=\"$userid\"";
$r2 = mysql_query($q2);
while($rowz2 = mysql_fetch_array($r2))
	{
	$totalcycledpositions9 = $rowz2["howmanycycledpositions"];
	}
$q3 = "select count(*) as howmanyactivepositions from matrix9 where positionsleft>0 and done=\"no\" and username=\"$userid\"";
$r3 = mysql_query($q3);
while($rowz3 = mysql_fetch_array($r3))
	{
	$totalactivepositions9 = $rowz3["howmanyactivepositions"];
	}
}
#############################################################
if (($matrixenabled10 == "yes") and ($selldownline10 == "yes"))
{
$q = "select sum(owed),sum(paid),count(*) as howmanypositions from matrix10 where username=\"$userid\"";
$r = mysql_query($q);
$totalpositions10 = mysql_num_rows($r);
while($rowz = mysql_fetch_array($r))
	{
	$matrix10owed = $rowz["sum(owed)"];
	$matrix10paid = $rowz["sum(paid)"];
	$totalpositions10 = $rowz["howmanypositions"];
	$matrix10owed = sprintf("%.2f", $matrix10owed);
	$matrix10paid = sprintf("%.2f", $matrix10paid);
	}
$q2 = "select count(*) as howmanycycledpositions from matrix10 where positionsleft<1 and done=\"yes\" and username=\"$userid\"";
$r2 = mysql_query($q2);
while($rowz2 = mysql_fetch_array($r2))
	{
	$totalcycledpositions10 = $rowz2["howmanycycledpositions"];
	}
$q3 = "select count(*) as howmanyactivepositions from matrix10 where positionsleft>0 and done=\"no\" and username=\"$userid\"";
$r3 = mysql_query($q3);
while($rowz3 = mysql_fetch_array($r3))
	{
	$totalcycledpositions10 = $rowz3["howmanyactivepositions"];
	}
}
#############################################################
}
$matrixowed = $matrix1owed+$matrix2owed+$matrix3owed+$matrix4owed+$matrix5owed+$matrix6owed+$matrix7owed+$matrix8owed+$matrix9owed+$matrix10owed;
$matrixpaid = $matrix1paid+$matrix2paid+$matrix3paid+$matrix4paid+$matrix5paid+$matrix6paid+$matrix7paid+$matrix8paid+$matrix9paid+$matrix10paid;
$matrixowed = sprintf("%.2f", $matrixowed);
$matrixpaid = sprintf("%.2f", $matrixpaid);
$totalpositions = $totalpositions1+$totalpositions2+$totalpositions3+$totalpositions4+$totalpositions5+$totalpositions6+$totalpositions7+$totalpositions8+$totalpositions9+$totalpositions10;
$totalcycledpositions = $totalcycledpositions1+$totalcycledpositions2+$totalcycledpositions3+$totalcycledpositions4+$totalcycledpositions5+$totalcycledpositions6+$totalcycledpositions7+$totalcycledpositions8+$totalcycledpositions9+$totalcycledpositions10;
$totalactivepositions = $totalactivepositions1+$totalactivepositions2+$totalactivepositions3+$totalactivepositions4+$totalactivepositions5+$totalactivepositions6+$totalactivepositions7+$totalactivepositions8+$totalactivepositions9+$totalactivepositions10;
#############################################################
include "../header.php";
include "../style.php";
if( session_is_registered("ulogin") ) {

    include("navigation.php");
    include("../banners.php");
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">Your Downline Stats</div></td></tr>
<tr><td colspan="2"><br>
<div style="text-align: center;">
<?php
$query1 = "select * from pages where name='Member Downline Stats Page'";
$result1 = mysql_query($query1);
$line1 = mysql_fetch_array($result1);
$htmlcode = $line1["htmlcode"];
include "../banners.php";
echo $htmlcode;
?>
</div> 
</td></tr>
<?php
if ($paymentprocessorfeepercentagetoadd > 0)
{
?>
<tr><td align="center" colspan="2"><br>A fee of <?php echo $paymentprocessorfeepercentagetoadd ?>% is added to the total to compensate for payment processor fees.</td></tr>
<?php
}
if ((($matrixenabled1 == "yes") and ($selldownline1 == "yes")) or (($matrixenabled2 == "yes") and ($selldownline2 == "yes")) or (($matrixenabled3 == "yes") and ($selldownline3 == "yes")) or (($matrixenabled4 == "yes") and ($selldownline4 == "yes")) or (($matrixenabled5 == "yes") and ($selldownline5 == "yes")) or (($matrixenabled6 == "yes") and ($selldownline6 == "yes")) or (($matrixenabled7 == "yes") and ($selldownline7 == "yes")) or (($matrixenabled8 == "yes") and ($selldownline8 == "yes")) or (($matrixenabled9 == "yes") and ($selldownline9 == "yes")) or (($matrixenabled10 == "yes") and ($selldownline10 == "yes")))
{
$howmanypositions1 = $_POST["howmanypositions1"];
if ($howmanypositions1 == "")
	{
	$howmanypositions1 = 1;
	}
$howmanypositions2 = $_POST["howmanypositions2"];
if ($howmanypositions2 == "")
	{
	$howmanypositions2 = 1;
	}
$howmanypositions3 = $_POST["howmanypositions3"];
if ($howmanypositions3 == "")
	{
	$howmanypositions3 = 1;
	}
$howmanypositions4 = $_POST["howmanypositions4"];
if ($howmanypositions4 == "")
	{
	$howmanypositions4 = 1;
	}
$howmanypositions5 = $_POST["howmanypositions5"];
if ($howmanypositions5 == "")
	{
	$howmanypositions5 = 1;
	}
$howmanypositions6 = $_POST["howmanypositions6"];
if ($howmanypositions6 == "")
	{
	$howmanypositions6 = 1;
	}
$howmanypositions7 = $_POST["howmanypositions7"];
if ($howmanypositions7 == "")
	{
	$howmanypositions7 = 1;
	}
$howmanypositions8 = $_POST["howmanypositions8"];
if ($howmanypositions8 == "")
	{
	$howmanypositions8 = 1;
	}
$howmanypositions9 = $_POST["howmanypositions9"];
if ($howmanypositions9 == "")
	{
	$howmanypositions9 = 1;
	}
$howmanypositions10 = $_POST["howmanypositions10"];
if ($howmanypositions10 == "")
	{
	$howmanypositions10 = 1;
	}
?>
<tr><td align="center" colspan="2"><br>
<table cellpadding="2" cellspacing="2" border="0" align="center" bgcolor="#989898">
<tr bgcolor="#d3d3d3"><td align="center"><b>Downline Price</b></td>
<td align="center"><b>Payout</b></td>
<td align="center"><b>Total Positions</b></td>
<td align="center"><b>Active Positions</b></td>
<td align="center"><b>Cycled Positions</b></td>
<td align="center"><b>Total Owed</b></td>
<td align="center"><b>Total Paid</b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
?>
<td align="center"><b>Number To Order</b></td>
<?php
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id limit 1";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
$adpackdefaultid = mysql_result($adpackr,0,"id");
?>
<td align="center"><b>Select AdPack</b></td>
<?php
	}
$adpackchosen = $_POST["adpackchosen"];
if ($adpackchosen == "")
	{
	$adpackchosen = $adpackdefaultid;
	}

if ($adminpayza != "")
{
?>
<td align="center"><b>Payza</b></td></tr>
<?php
}
if (($egopay_store_id!="") and ($egopay_store_password!=""))
{
?>
<td align="center"><b>EgoPay</b></td></tr>
<?php
}
if ($adminperfectmoney != "")
{
?>
<td align="center"><b>Perfect Money</b></td></tr>
<?php
}
if ($adminokpay != "")
{
?>
<td align="center"><b>OKPay</b></td></tr>
<?php
}
if ($adminsolidtrustpay != "")
{
?>
<td align="center"><b>Solid Trust Pay</b></td></tr>
<?php
}
if ($adminmoneybookers != "")
{
?>
<td align="center"><b>Moneybookers</b></td></tr>
<?php
}

#############################################################
if (($matrixenabled1 == "yes") and ($selldownline1 == "yes"))
{
?>
<tr bgcolor="#eeeeee"><td align="center"><b>$<?php echo $price1 ?></b></td>
<td align="center"><b>$<?php echo $payout1 ?></b></td>
<td align="center"><b><?php echo $totalpositions1 ?></b></td>
<td align="center"><b><?php echo $totalactivepositions1 ?></b></td>
<td align="center"><b><?php echo $totalcycledpositions1 ?></b></td>
<td align="center"><b>$<?php echo $matrix1owed ?></b></td>
<td align="center"><b>$<?php echo $matrix1paid ?></b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
?>
<form method="post">
<td align="center">
Purchase <select name="howmanypositions1" id="howmanypositions1" onchange="this.form.submit();" class="pickone">
<option value="1" <?php if ($howmanypositions1 == 1) { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($howmanypositions1 == 2) { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($howmanypositions1 == 3) { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($howmanypositions1 == 4) { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($howmanypositions1 == 5) { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($howmanypositions1 == 6) { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($howmanypositions1 == 7) { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($howmanypositions1 == 8) { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($howmanypositions1 == 9) { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($howmanypositions1 == 10) { echo "selected"; } ?>>10</option>
</select> Positions
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
</td>
</form>
<?php
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<form method="post">
<td align="center"><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
?>
<option value="<?php echo $adpackid ?>" <?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
</td>
</form>
<?php
	}
$feepercentage = $paymentprocessorfeepercentagetoadd/100;
$totalprice1 = $price1+($price1*$feepercentage);
$totalprice1 = $totalprice1*$howmanypositions1;
# PAYZA
if ($adminpayza != "")
{
?>
<form method="post" action="https://secure.payza.com/checkout">
<td align="center">
<input type="hidden" name="ap_purchasetype" value="item"> 
<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
<input type="hidden" name="ap_currency" value="USD"> 
<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
<input type="hidden" name="ap_quantity" value="1"> 
<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
<input type="hidden" name="apc_2" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="apc_3" value="1">
<input type="hidden" name="apc_4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ap_amount" value="<?php echo $totalprice1 ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png" border="0">
</form>
</td>
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
		'amount'    => $totalprice1,
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
	'fail_url'	=> $domain. '/members/tripler_memberstats.php',
	'success_url'	=> $domain. '/thank-you.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' - ' . $userid,
	'cf_3' => $totalprice1,
	'cf_4' => $howmanypositions1,
	'cf_5' => '1',
	'cf_6' => $adpackchosen,
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<td align="center">
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
</form>
</td>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<td align="center">
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalprice1 ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions matrixnumber adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="matrixnumber" value="1">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
</form>
</td>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<td align="center">
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $totalprice1 ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="ok_item_1_custom_3_title" value="matrixnumber">
<input type="hidden" name="ok_item_1_custom_3_value" value="1">
<input type="hidden" name="ok_item_1_custom_4_title" value="adpackid">
<input type="hidden" name="ok_item_1_custom_4_value" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
</form>
</td>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<td align="center">
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $totalprice1 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="user2" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="user3" value="1">
<input type="hidden" name="user4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
</form>
</td>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td align="center">
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $totalprice1 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,matrixnumber,adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="matrixnumber" value="1">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
</form>
</td>
<?php
} # if ($adminmoneybookers != "")
}
#############################################################
if (($matrixenabled2 == "yes") and ($selldownline2 == "yes"))
{
?>
<tr bgcolor="#eeeeee"><td align="center"><b>$<?php echo $price2 ?></b></td>
<td align="center"><b>$<?php echo $payout2 ?></b></td>
<td align="center"><b><?php echo $totalpositions2 ?></b></td>
<td align="center"><b><?php echo $totalactivepositions2 ?></b></td>
<td align="center"><b><?php echo $totalcycledpositions2 ?></b></td>
<td align="center"><b>$<?php echo $matrix2owed ?></b></td>
<td align="center"><b>$<?php echo $matrix2paid ?></b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
?>
<form method="post">
<td align="center">
Purchase <select name="howmanypositions2" id="howmanypositions2" onchange="this.form.submit();" class="pickone">
<option value="1" <?php if ($howmanypositions2 == 1) { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($howmanypositions2 == 2) { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($howmanypositions2 == 3) { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($howmanypositions2 == 4) { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($howmanypositions2 == 5) { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($howmanypositions2 == 6) { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($howmanypositions2 == 7) { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($howmanypositions2 == 8) { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($howmanypositions2 == 9) { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($howmanypositions2 == 10) { echo "selected"; } ?>>10</option>
</select> Positions
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
</td>
</form>
<?php
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<form method="post">
<td align="center"><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
?>
<option value="<?php echo $adpackid ?>" <?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
</td>
</form>
<?php
	}
$feepercentage = $paymentprocessorfeepercentagetoadd/100;
$totalprice2 = $price2+($price2*$feepercentage);
$totalprice2 = $totalprice2*$howmanypositions2;
# PAYZA
if ($adminpayza != "")
{
?>
<form method="post" action="https://secure.payza.com/checkout">
<td align="center">
<input type="hidden" name="ap_purchasetype" value="item"> 
<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
<input type="hidden" name="ap_currency" value="USD"> 
<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
<input type="hidden" name="ap_quantity" value="1"> 
<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
<input type="hidden" name="apc_2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="apc_3" value="2">
<input type="hidden" name="apc_4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ap_amount" value="<?php echo $totalprice2 ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png" border="0">
</form>
</td>
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
		'amount'    => $totalprice2,
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
	'fail_url'	=> $domain. '/members/tripler_memberstats.php',
	'success_url'	=> $domain. '/thank-you.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' - ' . $userid,
	'cf_3' => $totalprice2,
	'cf_4' => $howmanypositions2,
	'cf_5' => '2',
	'cf_6' => $adpackchosen,
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<td align="center">
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
</form>
</td>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<td align="center">
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalprice2 ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions matrixnumber adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="matrixnumber" value="2">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
</form>
</td>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<td align="center">
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $totalprice2 ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="ok_item_1_custom_3_title" value="matrixnumber">
<input type="hidden" name="ok_item_1_custom_3_value" value="2">
<input type="hidden" name="ok_item_1_custom_4_title" value="adpackid">
<input type="hidden" name="ok_item_1_custom_4_value" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
</form>
</td>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<td align="center">
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $totalprice2 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="user2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="user3" value="2">
<input type="hidden" name="user4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
</form>
</td>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td align="center">
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $totalprice2 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,matrixnumber,adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="matrixnumber" value="2">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
</form>
</td>
<?php
} # if ($adminmoneybookers != "")
}
#############################################################
if (($matrixenabled3 == "yes") and ($selldownline3 == "yes"))
{
?>
<tr bgcolor="#eeeeee"><td align="center"><b>$<?php echo $price3 ?></b></td>
<td align="center"><b>$<?php echo $payout3 ?></b></td>
<td align="center"><b><?php echo $totalpositions3 ?></b></td>
<td align="center"><b><?php echo $totalactivepositions3 ?></b></td>
<td align="center"><b><?php echo $totalcycledpositions3 ?></b></td>
<td align="center"><b>$<?php echo $matrix3owed ?></b></td>
<td align="center"><b>$<?php echo $matrix3paid ?></b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
?>
<form method="post">
<td align="center">
Purchase <select name="howmanypositions3" id="howmanypositions3" onchange="this.form.submit();" class="pickone">
<option value="1" <?php if ($howmanypositions3 == 1) { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($howmanypositions3 == 2) { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($howmanypositions3 == 3) { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($howmanypositions3 == 4) { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($howmanypositions3 == 5) { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($howmanypositions3 == 6) { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($howmanypositions3 == 7) { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($howmanypositions3 == 8) { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($howmanypositions3 == 9) { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($howmanypositions3 == 10) { echo "selected"; } ?>>10</option>
</select> Positions
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
</td>
</form>
<?php
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<form method="post">
<td align="center"><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
?>
<option value="<?php echo $adpackid ?>" <?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
</td>
</form>
<?php
	}
$feepercentage = $paymentprocessorfeepercentagetoadd/100;
$totalprice3 = $price3+($price3*$feepercentage);
$totalprice3 = $totalprice3*$howmanypositions3;
# PAYZA
if ($adminpayza != "")
{
?>
<form method="post" action="https://secure.payza.com/checkout">
<td align="center">
<input type="hidden" name="ap_purchasetype" value="item"> 
<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
<input type="hidden" name="ap_currency" value="USD"> 
<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
<input type="hidden" name="ap_quantity" value="1"> 
<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
<input type="hidden" name="apc_2" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="apc_3" value="3">
<input type="hidden" name="apc_4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ap_amount" value="<?php echo $totalprice3 ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png" border="0">
</form>
</td>
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
		'amount'    => $totalprice3,
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
	'fail_url'	=> $domain. '/members/tripler_memberstats.php',
	'success_url'	=> $domain. '/thank-you.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' - ' . $userid,
	'cf_3' => $totalprice3,
	'cf_4' => $howmanypositions3,
	'cf_5' => '3',
	'cf_6' => $adpackchosen,
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<td align="center">
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
</form>
</td>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<td align="center">
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalprice3 ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions matrixnumber adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="matrixnumber" value="3">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
</form>
</td>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<td align="center">
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $totalprice3 ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="ok_item_1_custom_3_title" value="matrixnumber">
<input type="hidden" name="ok_item_1_custom_3_value" value="3">
<input type="hidden" name="ok_item_1_custom_4_title" value="adpackid">
<input type="hidden" name="ok_item_1_custom_4_value" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
</form>
</td>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<td align="center">
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $totalprice3 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="user2" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="user3" value="3">
<input type="hidden" name="user4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
</form>
</td>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td align="center">
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $totalprice3 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,matrixnumber,adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="matrixnumber" value="3">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
</form>
</td>
<?php
} # if ($adminmoneybookers != "")
}
#############################################################
if (($matrixenabled4 == "yes") and ($selldownline4 == "yes"))
{
?>
<tr bgcolor="#eeeeee"><td align="center"><b>$<?php echo $price4 ?></b></td>
<td align="center"><b>$<?php echo $payout4 ?></b></td>
<td align="center"><b><?php echo $totalpositions4 ?></b></td>
<td align="center"><b><?php echo $totalactivepositions4 ?></b></td>
<td align="center"><b><?php echo $totalcycledpositions4 ?></b></td>
<td align="center"><b>$<?php echo $matrix4owed ?></b></td>
<td align="center"><b>$<?php echo $matrix4paid ?></b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
?>
<form method="post">
<td align="center">
Purchase <select name="howmanypositions4" id="howmanypositions4" onchange="this.form.submit();" class="pickone">
<option value="1" <?php if ($howmanypositions4 == 1) { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($howmanypositions4 == 2) { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($howmanypositions4 == 3) { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($howmanypositions4 == 4) { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($howmanypositions4 == 5) { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($howmanypositions4 == 6) { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($howmanypositions4 == 7) { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($howmanypositions4 == 8) { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($howmanypositions4 == 9) { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($howmanypositions4 == 10) { echo "selected"; } ?>>10</option>
</select> Positions
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
</td>
</form>
<?php
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<form method="post">
<td align="center"><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
?>
<option value="<?php echo $adpackid ?>" <?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
</td>
</form>
<?php
	}
$feepercentage = $paymentprocessorfeepercentagetoadd/100;
$totalprice4 = $price4+($price4*$feepercentage);
$totalprice4 = $totalprice4*$howmanypositions4;
# PAYZA
if ($adminpayza != "")
{
?>
<form method="post" action="https://secure.payza.com/checkout">
<td align="center">
<input type="hidden" name="ap_purchasetype" value="item"> 
<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
<input type="hidden" name="ap_currency" value="USD"> 
<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
<input type="hidden" name="ap_quantity" value="1"> 
<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
<input type="hidden" name="apc_2" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="apc_3" value="4">
<input type="hidden" name="apc_4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ap_amount" value="<?php echo $totalprice4 ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png" border="0">
</form>
</td>
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
		'amount'    => $totalprice4,
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
	'fail_url'	=> $domain. '/members/tripler_memberstats.php',
	'success_url'	=> $domain. '/thank-you.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' - ' . $userid,
	'cf_3' => $totalprice4,
	'cf_4' => $howmanypositions4,
	'cf_5' => '4',
	'cf_6' => $adpackchosen,
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<td align="center">
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
</form>
</td>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<td align="center">
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalprice4 ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions matrixnumber adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="matrixnumber" value="4">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
</form>
</td>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<td align="center">
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $totalprice4 ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="ok_item_1_custom_3_title" value="matrixnumber">
<input type="hidden" name="ok_item_1_custom_3_value" value="4">
<input type="hidden" name="ok_item_1_custom_4_title" value="adpackid">
<input type="hidden" name="ok_item_1_custom_4_value" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
</form>
</td>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<td align="center">
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $totalprice4 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="user2" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="user3" value="4">
<input type="hidden" name="user4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
</form>
</td>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td align="center">
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $totalprice4 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,matrixnumber,adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="matrixnumber" value="4">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
</form>
</td>
<?php
} # if ($adminmoneybookers != "")
}
#############################################################
if (($matrixenabled5 == "yes") and ($selldownline5 == "yes"))
{
?>
<tr bgcolor="#eeeeee"><td align="center"><b>$<?php echo $price5 ?></b></td>
<td align="center"><b>$<?php echo $payout5 ?></b></td>
<td align="center"><b><?php echo $totalpositions5 ?></b></td>
<td align="center"><b><?php echo $totalactivepositions5 ?></b></td>
<td align="center"><b><?php echo $totalcycledpositions5 ?></b></td>
<td align="center"><b>$<?php echo $matrix5owed ?></b></td>
<td align="center"><b>$<?php echo $matrix5paid ?></b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
?>
<form method="post">
<td align="center">
Purchase <select name="howmanypositions5" id="howmanypositions5" onchange="this.form.submit();" class="pickone">
<option value="1" <?php if ($howmanypositions5 == 1) { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($howmanypositions5 == 2) { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($howmanypositions5 == 3) { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($howmanypositions5 == 4) { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($howmanypositions5 == 5) { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($howmanypositions5 == 6) { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($howmanypositions5 == 7) { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($howmanypositions5 == 8) { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($howmanypositions5 == 9) { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($howmanypositions5 == 10) { echo "selected"; } ?>>10</option>
</select> Positions
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
</td>
</form>
<?php
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<form method="post">
<td align="center"><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
?>
<option value="<?php echo $adpackid ?>" <?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
</td>
</form>
<?php
	}
$feepercentage = $paymentprocessorfeepercentagetoadd/100;
$totalprice5 = $price5+($price5*$feepercentage);
$totalprice5 = $totalprice5*$howmanypositions5;
# PAYZA
if ($adminpayza != "")
{
?>
<form method="post" action="https://secure.payza.com/checkout">
<td align="center">
<input type="hidden" name="ap_purchasetype" value="item"> 
<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
<input type="hidden" name="ap_currency" value="USD"> 
<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
<input type="hidden" name="ap_quantity" value="1"> 
<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
<input type="hidden" name="apc_2" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="apc_3" value="5">
<input type="hidden" name="apc_4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ap_amount" value="<?php echo $totalprice5 ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png" border="0">
</form>
</td>
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
		'amount'    => $totalprice5,
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
	'fail_url'	=> $domain. '/members/tripler_memberstats.php',
	'success_url'	=> $domain. '/thank-you.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' - ' . $userid,
	'cf_3' => $totalprice5,
	'cf_4' => $howmanypositions5,
	'cf_5' => '5',
	'cf_6' => $adpackchosen,
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<td align="center">
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
</form>
</td>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<td align="center">
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalprice5 ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions matrixnumber adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="matrixnumber" value="5">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
</form>
</td>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<td align="center">
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $totalprice5 ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="ok_item_1_custom_3_title" value="matrixnumber">
<input type="hidden" name="ok_item_1_custom_3_value" value="5">
<input type="hidden" name="ok_item_1_custom_4_title" value="adpackid">
<input type="hidden" name="ok_item_1_custom_4_value" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
</form>
</td>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<td align="center">
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $totalprice5 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="user2" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="user3" value="5">
<input type="hidden" name="user4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
</form>
</td>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td align="center">
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $totalprice5 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,matrixnumber,adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="matrixnumber" value="5">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
</form>
</td>
<?php
} # if ($adminmoneybookers != "")
}
#############################################################
if (($matrixenabled6 == "yes") and ($selldownline6 == "yes"))
{
?>
<tr bgcolor="#eeeeee"><td align="center"><b>$<?php echo $price6 ?></b></td>
<td align="center"><b>$<?php echo $payout6 ?></b></td>
<td align="center"><b><?php echo $totalpositions6 ?></b></td>
<td align="center"><b><?php echo $totalactivepositions6 ?></b></td>
<td align="center"><b><?php echo $totalcycledpositions6 ?></b></td>
<td align="center"><b>$<?php echo $matrix6owed ?></b></td>
<td align="center"><b>$<?php echo $matrix6paid ?></b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
?>
<form method="post">
<td align="center">
Purchase <select name="howmanypositions6" id="howmanypositions6" onchange="this.form.submit();" class="pickone">
<option value="1" <?php if ($howmanypositions6 == 1) { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($howmanypositions6 == 2) { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($howmanypositions6 == 3) { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($howmanypositions6 == 4) { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($howmanypositions6 == 5) { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($howmanypositions6 == 6) { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($howmanypositions6 == 7) { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($howmanypositions6 == 8) { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($howmanypositions6 == 9) { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($howmanypositions6 == 10) { echo "selected"; } ?>>10</option>
</select> Positions
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
</td>
</form>
<?php
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<form method="post">
<td align="center"><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
?>
<option value="<?php echo $adpackid ?>" <?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
</td>
</form>
<?php
	}
$feepercentage = $paymentprocessorfeepercentagetoadd/100;
$totalprice6 = $price6+($price6*$feepercentage);
$totalprice6 = $totalprice6*$howmanypositions6;
# PAYZA
if ($adminpayza != "")
{
?>
<form method="post" action="https://secure.payza.com/checkout">
<td align="center">
<input type="hidden" name="ap_purchasetype" value="item"> 
<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
<input type="hidden" name="ap_currency" value="USD"> 
<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
<input type="hidden" name="ap_quantity" value="1"> 
<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
<input type="hidden" name="apc_2" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="apc_3" value="6">
<input type="hidden" name="apc_4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ap_amount" value="<?php echo $totalprice6 ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png" border="0">
</form>
</td>
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
		'amount'    => $totalprice6,
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
	'fail_url'	=> $domain. '/members/tripler_memberstats.php',
	'success_url'	=> $domain. '/thank-you.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' - ' . $userid,
	'cf_3' => $totalprice6,
	'cf_4' => $howmanypositions6,
	'cf_5' => '6',
	'cf_6' => $adpackchosen,
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<td align="center">
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
</form>
</td>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<td align="center">
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalprice6 ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions matrixnumber adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="matrixnumber" value="6">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
</form>
</td>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<td align="center">
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $totalprice6 ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="ok_item_1_custom_3_title" value="matrixnumber">
<input type="hidden" name="ok_item_1_custom_3_value" value="6">
<input type="hidden" name="ok_item_1_custom_4_title" value="adpackid">
<input type="hidden" name="ok_item_1_custom_4_value" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
</form>
</td>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<td align="center">
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $totalprice6 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="user2" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="user3" value="6">
<input type="hidden" name="user4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
</form>
</td>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td align="center">
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $totalprice6 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,matrixnumber,adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="matrixnumber" value="6">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
</form>
</td>
<?php
} # if ($adminmoneybookers != "")
}
#############################################################
if (($matrixenabled7 == "yes") and ($selldownline7 == "yes"))
{
?>
<tr bgcolor="#eeeeee"><td align="center"><b>$<?php echo $price7 ?></b></td>
<td align="center"><b>$<?php echo $payout7 ?></b></td>
<td align="center"><b><?php echo $totalpositions7 ?></b></td>
<td align="center"><b><?php echo $totalactivepositions7 ?></b></td>
<td align="center"><b><?php echo $totalcycledpositions7 ?></b></td>
<td align="center"><b>$<?php echo $matrix7owed ?></b></td>
<td align="center"><b>$<?php echo $matrix7paid ?></b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
?>
<form method="post">
<td align="center">
Purchase <select name="howmanypositions7" id="howmanypositions7" onchange="this.form.submit();" class="pickone">
<option value="1" <?php if ($howmanypositions7 == 1) { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($howmanypositions7 == 2) { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($howmanypositions7 == 3) { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($howmanypositions7 == 4) { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($howmanypositions7 == 5) { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($howmanypositions7 == 6) { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($howmanypositions7 == 7) { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($howmanypositions7 == 8) { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($howmanypositions7 == 9) { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($howmanypositions7 == 10) { echo "selected"; } ?>>10</option>
</select> Positions
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
</td>
</form>
<?php
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<form method="post">
<td align="center"><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
?>
<option value="<?php echo $adpackid ?>" <?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
</td>
</form>
<?php
	}
$feepercentage = $paymentprocessorfeepercentagetoadd/100;
$totalprice7 = $price7+($price7*$feepercentage);
$totalprice7 = $totalprice7*$howmanypositions7;
# PAYZA
if ($adminpayza != "")
{
?>
<form method="post" action="https://secure.payza.com/checkout">
<td align="center">
<input type="hidden" name="ap_purchasetype" value="item"> 
<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
<input type="hidden" name="ap_currency" value="USD"> 
<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
<input type="hidden" name="ap_quantity" value="1"> 
<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
<input type="hidden" name="apc_2" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="apc_3" value="7">
<input type="hidden" name="apc_4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ap_amount" value="<?php echo $totalprice7 ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png" border="0">
</form>
</td>
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
		'amount'    => $totalprice7,
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
	'fail_url'	=> $domain. '/members/tripler_memberstats.php',
	'success_url'	=> $domain. '/thank-you.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' - ' . $userid,
	'cf_3' => $totalprice7,
	'cf_4' => $howmanypositions7,
	'cf_5' => '7',
	'cf_6' => $adpackchosen,
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<td align="center">
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
</form>
</td>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<td align="center">
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalprice7 ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions matrixnumber adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="matrixnumber" value="7">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
</form>
</td>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<td align="center">
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $totalprice7 ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="ok_item_1_custom_3_title" value="matrixnumber">
<input type="hidden" name="ok_item_1_custom_3_value" value="7">
<input type="hidden" name="ok_item_1_custom_4_title" value="adpackid">
<input type="hidden" name="ok_item_1_custom_4_value" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
</form>
</td>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<td align="center">
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $totalprice7 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="user2" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="user3" value="7">
<input type="hidden" name="user4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
</form>
</td>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td align="center">
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $totalprice7 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,matrixnumber,adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="matrixnumber" value="7">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
</form>
</td>
<?php
} # if ($adminmoneybookers != "")
}
#############################################################
if (($matrixenabled8 == "yes") and ($selldownline8 == "yes"))
{
?>
<tr bgcolor="#eeeeee"><td align="center"><b>$<?php echo $price8 ?></b></td>
<td align="center"><b>$<?php echo $payout8 ?></b></td>
<td align="center"><b><?php echo $totalpositions8 ?></b></td>
<td align="center"><b><?php echo $totalactivepositions8 ?></b></td>
<td align="center"><b><?php echo $totalcycledpositions8 ?></b></td>
<td align="center"><b>$<?php echo $matrix8owed ?></b></td>
<td align="center"><b>$<?php echo $matrix8paid ?></b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
?>
<form method="post">
<td align="center">
Purchase <select name="howmanypositions8" id="howmanypositions8" onchange="this.form.submit();" class="pickone">
<option value="1" <?php if ($howmanypositions8 == 1) { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($howmanypositions8 == 2) { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($howmanypositions8 == 3) { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($howmanypositions8 == 4) { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($howmanypositions8 == 5) { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($howmanypositions8 == 6) { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($howmanypositions8 == 7) { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($howmanypositions8 == 8) { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($howmanypositions8 == 9) { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($howmanypositions8 == 10) { echo "selected"; } ?>>10</option>
</select> Positions
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
</td>
</form>
<?php
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<form method="post">
<td align="center"><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
?>
<option value="<?php echo $adpackid ?>" <?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
</td>
</form>
<?php
	}
$feepercentage = $paymentprocessorfeepercentagetoadd/100;
$totalprice8 = $price8+($price8*$feepercentage);
$totalprice8 = $totalprice8*$howmanypositions8;
# PAYZA
if ($adminpayza != "")
{
?>
<form method="post" action="https://secure.payza.com/checkout">
<td align="center">
<input type="hidden" name="ap_purchasetype" value="item"> 
<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
<input type="hidden" name="ap_currency" value="USD"> 
<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
<input type="hidden" name="ap_quantity" value="1"> 
<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
<input type="hidden" name="apc_2" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="apc_3" value="8">
<input type="hidden" name="apc_4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ap_amount" value="<?php echo $totalprice8 ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png" border="0">
</form>
</td>
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
		'amount'    => $totalprice8,
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
	'fail_url'	=> $domain. '/members/tripler_memberstats.php',
	'success_url'	=> $domain. '/thank-you.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' - ' . $userid,
	'cf_3' => $totalprice8,
	'cf_4' => $howmanypositions8,
	'cf_5' => '8',
	'cf_6' => $adpackchosen,
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<td align="center">
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
</form>
</td>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<td align="center">
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalprice8 ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions matrixnumber adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanyposition8 ?>">
<input type="hidden" name="matrixnumber" value="8">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
</form>
</td>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<td align="center">
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $totalprice8 ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="ok_item_1_custom_3_title" value="matrixnumber">
<input type="hidden" name="ok_item_1_custom_3_value" value="8">
<input type="hidden" name="ok_item_1_custom_4_title" value="adpackid">
<input type="hidden" name="ok_item_1_custom_4_value" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
</form>
</td>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<td align="center">
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $totalprice8 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="user2" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="user3" value="8">
<input type="hidden" name="user4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
</form>
</td>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td align="center">
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $totalprice8 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,matrixnumber,adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="matrixnumber" value="8">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
</form>
</td>
<?php
} # if ($adminmoneybookers != "")
}
#############################################################
if (($matrixenabled9 == "yes") and ($selldownline9 == "yes"))
{
?>
<tr bgcolor="#eeeeee"><td align="center"><b>$<?php echo $price9 ?></b></td>
<td align="center"><b>$<?php echo $payout9 ?></b></td>
<td align="center"><b><?php echo $totalpositions9 ?></b></td>
<td align="center"><b><?php echo $totalactivepositions9 ?></b></td>
<td align="center"><b><?php echo $totalcycledpositions9 ?></b></td>
<td align="center"><b>$<?php echo $matrix9owed ?></b></td>
<td align="center"><b>$<?php echo $matrix9paid ?></b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
?>
<form method="post">
<td align="center">
Purchase <select name="howmanypositions9" id="howmanypositions9" onchange="this.form.submit();" class="pickone">
<option value="1" <?php if ($howmanypositions9 == 1) { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($howmanypositions9 == 2) { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($howmanypositions9 == 3) { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($howmanypositions9 == 4) { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($howmanypositions9 == 5) { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($howmanypositions9 == 6) { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($howmanypositions9 == 7) { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($howmanypositions9 == 8) { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($howmanypositions9 == 9) { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($howmanypositions9 == 10) { echo "selected"; } ?>>10</option>
</select> Positions
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
</td>
</form>
<?php
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<form method="post">
<td align="center"><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
?>
<option value="<?php echo $adpackid ?>" <?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
</td>
</form>
<?php
	}
$feepercentage = $paymentprocessorfeepercentagetoadd/100;
$totalprice9 = $price9+($price9*$feepercentage);
$totalprice9 = $totalprice9*$howmanypositions9;
# PAYZA
if ($adminpayza != "")
{
?>
<form method="post" action="https://secure.payza.com/checkout">
<td align="center">
<input type="hidden" name="ap_purchasetype" value="item"> 
<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
<input type="hidden" name="ap_currency" value="USD"> 
<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
<input type="hidden" name="ap_quantity" value="1"> 
<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
<input type="hidden" name="apc_2" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="apc_3" value="9">
<input type="hidden" name="apc_4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ap_amount" value="<?php echo $totalprice9 ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png" border="0">
</form>
</td>
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
		'amount'    => $totalprice9,
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
	'fail_url'	=> $domain. '/members/tripler_memberstats.php',
	'success_url'	=> $domain. '/thank-you.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' - ' . $userid,
	'cf_3' => $totalprice9,
	'cf_4' => $howmanypositions9,
	'cf_5' => '9',
	'cf_6' => $adpackchosen,
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<td align="center">
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
</form>
</td>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<td align="center">
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalprice9 ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions matrixnumber adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanyposition9 ?>">
<input type="hidden" name="matrixnumber" value="9">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
</form>
</td>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<td align="center">
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $totalprice9 ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="ok_item_1_custom_3_title" value="matrixnumber">
<input type="hidden" name="ok_item_1_custom_3_value" value="9">
<input type="hidden" name="ok_item_1_custom_4_title" value="adpackid">
<input type="hidden" name="ok_item_1_custom_4_value" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
</form>
</td>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<td align="center">
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $totalprice9 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="user2" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="user3" value="9">
<input type="hidden" name="user4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
</form>
</td>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td align="center">
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $totalprice9 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,matrixnumber,adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="matrixnumber" value="9">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
</form>
</td>
<?php
} # if ($adminmoneybookers != "")
}
#############################################################
if (($matrixenabled10 == "yes") and ($selldownline10 == "yes"))
{
?>
<tr bgcolor="#eeeeee"><td align="center"><b>$<?php echo $price10 ?></b></td>
<td align="center"><b>$<?php echo $payout10 ?></b></td>
<td align="center"><b><?php echo $totalpositions10 ?></b></td>
<td align="center"><b><?php echo $totalactivepositions10 ?></b></td>
<td align="center"><b><?php echo $totalcycledpositions10 ?></b></td>
<td align="center"><b>$<?php echo $matrix10owed ?></b></td>
<td align="center"><b>$<?php echo $matrix10paid ?></b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
?>
<form method="post">
<td align="center">
Purchase <select name="howmanypositions10" id="howmanypositions10" onchange="this.form.submit();" class="pickone">
<option value="1" <?php if ($howmanypositions10 == 1) { echo "selected"; } ?>>1</option>
<option value="2" <?php if ($howmanypositions10 == 2) { echo "selected"; } ?>>2</option>
<option value="3" <?php if ($howmanypositions10 == 3) { echo "selected"; } ?>>3</option>
<option value="4" <?php if ($howmanypositions10 == 4) { echo "selected"; } ?>>4</option>
<option value="5" <?php if ($howmanypositions10 == 5) { echo "selected"; } ?>>5</option>
<option value="6" <?php if ($howmanypositions10 == 6) { echo "selected"; } ?>>6</option>
<option value="7" <?php if ($howmanypositions10 == 7) { echo "selected"; } ?>>7</option>
<option value="8" <?php if ($howmanypositions10 == 8) { echo "selected"; } ?>>8</option>
<option value="9" <?php if ($howmanypositions10 == 9) { echo "selected"; } ?>>9</option>
<option value="10" <?php if ($howmanypositions10 == 10) { echo "selected"; } ?>>10</option>
</select> Positions
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
</td>
</form>
<?php
	}
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<form method="post">
<td align="center"><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
?>
<option value="<?php echo $adpackid ?>" <?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<input type="hidden" name="howmanypositions1" value="<?php echo $howmanypositions1 ?>">
<input type="hidden" name="howmanypositions2" value="<?php echo $howmanypositions2 ?>">
<input type="hidden" name="howmanypositions3" value="<?php echo $howmanypositions3 ?>">
<input type="hidden" name="howmanypositions4" value="<?php echo $howmanypositions4 ?>">
<input type="hidden" name="howmanypositions5" value="<?php echo $howmanypositions5 ?>">
<input type="hidden" name="howmanypositions6" value="<?php echo $howmanypositions6 ?>">
<input type="hidden" name="howmanypositions7" value="<?php echo $howmanypositions7 ?>">
<input type="hidden" name="howmanypositions8" value="<?php echo $howmanypositions8 ?>">
<input type="hidden" name="howmanypositions9" value="<?php echo $howmanypositions9 ?>">
<input type="hidden" name="howmanypositions10" value="<?php echo $howmanypositions10 ?>">
</td>
</form>
<?php
	}
$feepercentage = $paymentprocessorfeepercentagetoadd/100;
$totalprice10 = $price10+($price10*$feepercentage);
$totalprice10 = $totalprice10*$howmanypositions10;
# PAYZA
if ($adminpayza != "")
{
?>
<form method="post" action="https://secure.payza.com/checkout">
<td align="center">
<input type="hidden" name="ap_purchasetype" value="item"> 
<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
<input type="hidden" name="ap_currency" value="USD"> 
<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
<input type="hidden" name="ap_quantity" value="1"> 
<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
<input type="hidden" name="apc_2" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="apc_3" value="10">
<input type="hidden" name="apc_4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ap_amount" value="<?php echo $totalprice10 ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png" border="0">
</form>
</td>
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
		'amount'    => $totalprice10,
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
	'fail_url'	=> $domain. '/members/tripler_memberstats.php',
	'success_url'	=> $domain. '/thank-you.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' - ' . $userid,
	'cf_3' => $totalprice10,
	'cf_4' => $howmanypositions10,
	'cf_5' => '10',
	'cf_6' => $adpackchosen,
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<td align="center">
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
</form>
</td>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<td align="center">
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalprice10 ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions matrixnumber adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanyposition10 ?>">
<input type="hidden" name="matrixnumber" value="10">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
</form>
</td>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<td align="center">
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $totalprice10 ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="ok_item_1_custom_3_title" value="matrixnumber">
<input type="hidden" name="ok_item_1_custom_3_value" value="10">
<input type="hidden" name="ok_item_1_custom_4_title" value="adpackid">
<input type="hidden" name="ok_item_1_custom_4_value" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
</form>
</td>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<td align="center">
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $totalprice10 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="user2" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="user3" value="10">
<input type="hidden" name="user4" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
</form>
</td>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td align="center">
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/tripler_memberstats.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $totalprice10 ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,matrixnumber,adpackid">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions10 ?>">
<input type="hidden" name="matrixnumber" value="10">
<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
</form>
</td>
<?php
} # if ($adminmoneybookers != "")
}
#############################################################
?>
</table>
</td></tr>
<?php
}
?>
</table>
<?php
}
else
{ ?>
<p>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p>
<? }
echo "</td></tr></table>";
include "../footer.php";
exit;
?>