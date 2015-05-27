<?php
# matrixnumber, positions, referid (or not) available from the scripts this file is included in.
if ($positioncount == "")
{
$positions = 1;
}
if ($positioncount != "")
{
$positions = $positioncount;
}
$pricename = "price" . $matrixnumber;
$payoutname = "payout" . $matrixnumber;
$freereentryname = "freereentry" . $matrixnumber;
$enablepersonalreferralsname = "enablepersonalreferrals" . $matrixnumber;
$regularcommissionname = "regularcommission" . $matrixnumber;
$cost = $positions*$$pricename;

if ($referid != "")
{
	if ($$enablepersonalreferralsname == "yes")
	{
	$mquery1 = "select * from matrix$matrixnumber where positionsleft>0 and username='$referid' order by memberid limit 1";
	}
	if ($$enablepersonalreferralsname != "yes")
	{
	$mquery1 = "select * from matrix$matrixnumber where positionsleft>0 order by memberid limit 1";
	}
}
if ($referid == "")
{
$mquery1 = "select * from matrix$matrixnumber where positionsleft>0 order by memberid limit 1";
}
######################################
for ($i=0;$i<$positions;$i++)
{
# get a new member id for the matrix.
$memberid = "";
$idquery = "select memberid from matrix$matrixnumber order by memberid desc limit 1";
$idresult = mysql_query($idquery);
$idrows = mysql_num_rows($idresult);
if ($idrows < 1)
	{
	$memberid = 1;
	}
if ($idrows > 0)
	{
	$oldid = mysql_result($idresult,0,"memberid");
	$memberid = $oldid+1;
	}
$mquery = "insert into matrix$matrixnumber (memberid,username,positionsleft,positionscycled,paymentmade,transaction,paychoice,paypal,payza,egopay,perfectmoney,okpay,solidtrustpay,moneybookers,purchasedate,purchaseip) values ('$memberid','$userid','1',0,'$cost','$transaction','$paychoice','$paypal','$payza','$egopay','$perfectmoney','$okpay','$solidtrustpay','$moneybookers',NOW(),'$REMOTE_ADDR')";
$mresult = mysql_query($mquery);

if ($memberid > 1) # the first position purchased must not be counted as a referral itself (or it will put the first member under the first member!)
	{
# correct mquery1 is determined above (depends whether or not personal referrals are allowed,
# whether or not this is a purchase of positions ONLY not a bonus position, and
# whether or not the referid even has entries that need referrals in the downline.
$mresult1 = mysql_query($mquery1);
$mrows1 = mysql_num_rows($mresult1);
	if ($mrows1 > 0)
		{
		$ref1 = mysql_result($mresult1,0,"ref1");
		$ref2 = mysql_result($mresult1,0,"ref2");
		$ref3 = mysql_result($mresult1,0,"ref3");
		$refmemberid = mysql_result($mresult1,0,"memberid");
		if ($ref1 == 0)
			{
			$refq1 = "update matrix$matrixnumber set ref1='$memberid',ref1username='$userid' where memberid='$refmemberid'";
			$refr1 = mysql_query($refq1);
			} # if ($ref1 == 0)
		elseif ($ref2 == 0)
			{
			$refq1 = "update matrix$matrixnumber set ref2='$memberid',ref2username='$userid' where memberid='$refmemberid'";
			$refr1 = mysql_query($refq1);
			} # elseif ($ref2 == 0)
		elseif ($ref3 == 0)
			{
			$refq1 = "update matrix$matrixnumber set ref3='$memberid',ref3username='$userid' where memberid='$refmemberid'";
			$refr1 = mysql_query($refq1);
			# since all refs are filled now, the refmemberid has cycled a position.
			$refq2 = "update matrix$matrixnumber set ref1='0',ref2='0',ref3='0',ref1username='',ref2username='',ref3username='',positionsleft=0,positionscycled=positionscycled+1,owed=owed+".$$payoutname.",done='yes',cycledate=NOW() where memberid='$refmemberid'";
			$refr2 = mysql_query($refq2);
				if ($$freereentryname == "yes")
				{
				doReentry($matrixnumber,$refmemberid);
				}
			} # elseif ($ref3 == 0)
		} # if ($mrows1 > 0)
# if mquery1 was to go under a personal referid and there isn't one by the referid's username in this downline
# that still needs referrals to cycle, put under the top member.
	if ($mrows1 < 1)
		{
$mquery11 = "select * from matrix$matrixnumber where positionsleft>0 order by memberid limit 1";
$mresult11 = mysql_query($mquery11);
$mrows11 = mysql_num_rows($mresult11);
	if ($mrows11 > 0)
		{
		$ref1 = mysql_result($mresult11,0,"ref1");
		$ref2 = mysql_result($mresult11,0,"ref2");
		$ref3 = mysql_result($mresult1,0,"ref3");
		$refmemberid = mysql_result($mresult11,0,"memberid");
		if ($ref1 == 0)
			{
			$refq11 = "update matrix$matrixnumber set ref1='$memberid',ref1username='$userid' where memberid='$refmemberid'";
			$refr11 = mysql_query($refq11);
			} # if ($ref1 == 0)
		elseif ($ref2 == 0)
			{
			$refq1 = "update matrix$matrixnumber set ref2='$memberid',ref2username='$userid' where memberid='$refmemberid'";
			$refr1 = mysql_query($refq1);
			} # elseif ($ref2 == 0)
		elseif ($ref3 == 0)
			{
			$refq11 = "update matrix$matrixnumber set ref3='$memberid',ref3username='$userid' where memberid='$refmemberid'";
			$refr11 = mysql_query($refq11);
			# since all refs are filled now, the refmemberid has cycled a position.
			$refq21 = "update matrix$matrixnumber set ref1='0',ref2='0',ref3='0',ref1username='',ref2username='',ref3username='',positionsleft=0,positionscycled=positionscycled+1,owed=owed+".$$payoutname.",done='yes',cycledate=NOW() where memberid='$refmemberid'";
			$refr21 = mysql_query($refq21);
				if ($$freereentryname == "yes")
				{
				doReentry($matrixnumber,$refmemberid);
				}
			} # elseif ($ref3 == 0)
		} # if ($mrows11 > 0)
		} # if ($mrows1 < 1)
	} # if ($memberid > 1)
######################################
} # for ($i=0;$i<$positions;$i++)
?>