<?php
function doReentry($whichmatrix,$refmemberid)
{
$positions = 1;
$pricename = "price" . $whichmatrix;
$payoutname = "payout" . $whichmatrix;
$freereentryname = "freereentry" . $whichmatrix;
$enablepersonalreferralsname = "enablepersonalreferrals" . $whichmatrix;
$regularcommissionname = "regularcommission" . $whichmatrix;
$cost = $positions*$$pricename;
$q1 = "select * from matrix$whichmatrix where memberid='$refmemberid'";
$r1 = mysql_query($q1);
$rows1 = mysql_num_rows($r1);	
	if ($rows1 > 0)
	{
	$theusername = mysql_result($r1,0,"username");
	$thepaychoice = mysql_result($r1,0,"paychoice");
	$thepaypal = mysql_result($r1,0,"paypal");
	$thepayza = mysql_result($r1,0,"payza");
	$theegopay = mysql_result($r1,0,"egopay");
	$theperfectmoney = mysql_result($r1,0,"perfectmoney");
	$theokpay = mysql_result($r1,0,"okpay");
	$thesolidtrustpay = mysql_result($r1,0,"solidtrustpay");
	$themoneybookers = mysql_result($r1,0,"moneybookers");
	$idrquery = "select memberid from matrix$whichmatrix order by memberid desc limit 1";
	$idrresult = mysql_query($idrquery);
	$idrrows = mysql_num_rows($idrresult);
	if ($idrrows < 1)
		{
		$thememberid = 1;
		}
	if ($idrrows > 0)
		{
		$theoldid = mysql_result($idrresult,0,"memberid");
		$thememberid = $theoldid+1;
		}
	$mrquery = "insert into matrix$whichmatrix (memberid,username,positionsleft,positionscycled,paymentmade,transaction,paychoice,paypal,payza,egopay,perfectmoney,okpay,solidtrustpay,moneybookers,purchasedate,purchaseip) values ('$thememberid','$theusername',1,0,'$cost','FREE REENTRY','$thepaychoice','$thepaypal','$thepayza','$theegopay','$theperfectmoney','$theokpay','$thesolidtrustpay','$themoneybookers',NOW(),'$REMOTE_ADDR')";
	$mrresult = mysql_query($mrquery);
	## credit next person in the downline who needs a referral.
	$mrquery1 = "select * from matrix$whichmatrix where positionsleft>0 order by memberid limit 1";
	$mrresult1 = mysql_query($mrquery1);
	$mrrows1 = mysql_num_rows($mrresult1);
	if ($mrrows1 > 0)
		{
		$newref1 = mysql_result($mrresult1,0,"ref1");
		$newref2 = mysql_result($mrresult1,0,"ref2");
		$newref3 = mysql_result($mrresult1,0,"ref3");
		$newrefmemberid = mysql_result($mrresult1,0,"memberid");
		if ($newref1 == 0)
			{
			$refq1 = "update matrix$whichmatrix set ref1='$thememberid',ref1username='$theusername' where memberid='$newrefmemberid'";
			$refr1 = mysql_query($refq1);
			}
		elseif ($newref2 == 0)
			{
			$refq1 = "update matrix$whichmatrix set ref2='$thememberid',ref2username='$theusername' where memberid='$newrefmemberid'";
			$refr1 = mysql_query($refq1);
			}
		elseif ($newref3 == 0)
			{
			$refq1 = "update matrix$whichmatrix set ref3='$thememberid',ref3username='$theusername' where memberid='$newrefmemberid'";
			$refr1 = mysql_query($refq1);
			# since all refs are filled now, the newrefmemberid has cycled a position.
			$refq2 = "update matrix$whichmatrix set ref1='0',ref2='0',ref3='0',ref1username='',ref2username='',ref3username='',positionsleft=0,positionscycled=positionscycled+1,owed=owed+".$$payoutname.",done='yes',cycledate=NOW() where memberid='$newrefmemberid'";
			$refr2 = mysql_query($refq2);
				if ($$freereentryname == "yes")
				{
				doReentry($whichmatrix,$newrefmemberid);
				}
			}
		} # if ($mrrows1 > 0)
	} # if ($rows1 > 0)

} # function doReentry($whichmatrix,$refmemberid)
?>