<?php
## page to show members who have already cycled from downlines.
include "config.php";
if (isset($_GET["referid"]))
{
$referid = $_GET["referid"];
}
if ($showcycledalreadypage != "yes")
{
$goto = $domain . "?referid=" . $referid;
@header("Location: " . $goto);
exit;
}
if ($showcycledalreadypage == "yes")
{
include "header.php";
include "style.php";
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><br><div class="heading">Already Cycled</div></td></tr>
<tr><td colspan="2"><br>
<div style="text-align: center;">
<?php
$query1 = "select * from pages where name='Already Cycled Page'";
$result1 = mysql_query($query1);
$line1 = mysql_fetch_array($result1);
$htmlcode = $line1["htmlcode"];
include "banners.php";
echo $htmlcode;
?>
</div> 
</td></tr>
<tr><td colspan="2" align="center">
<table cellpadding="5" cellspacing="10" border="0" align="center" width="100">
<?php
# if only one downline, center it instead of having two columns.
if (($matrixenabled1 == "yes") and ($matrixenabled2 != "yes") and ($matrixenabled3 != "yes") and ($matrixenabled4 != "yes") and ($matrixenabled5 != "yes") and ($matrixenabled6 != "yes") and ($matrixenabled7 != "yes") and ($matrixenabled8 != "yes") and ($matrixenabled9 != "yes") and ($matrixenabled10 != "yes") and ($selldownline1 == "yes") and ($selldownline2 != "yes") and ($selldownline3 != "yes") and ($selldownline4 != "yes") and ($selldownline5 != "yes") and ($selldownline6 != "yes") and ($selldownline7 != "yes") and ($selldownline8 != "yes") and ($selldownline9 != "yes") and ($selldownline10 != "yes"))
{
$countq = "select * from matrix1 where done=\"yes\"";
$countr = mysql_query($countq);
$total = mysql_num_rows($countr);
$first = $total-$showhowmanypositionsperdownline;
$q = "select * from matrix1 where done=\"yes\" order by memberid limit $first,$showhowmanypositionsperdownline";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
if ($rows > 0)
	{
?>
<tr><td align="center" colspan="2">
<table align="center" border="0" cellpadding="2" cellspacing="2" bgcolor="#999999" width="500">
<tr><td align="center"><b>Cycled <?php echo $price1 ?> Downline</b></td></tr>
<?php
while ($rowz = mysql_fetch_array($r))
{
$username = $rowz["username"];
?>
<tr style="background: #eeeeee;"><td align="center"><?php echo $username ?></td></tr>
<?php
}
?>
</table>
</td></tr>
<?php
	}
}
#################################################
else
{
$odd = "";
$even = "";
if (($matrixenabled1 == "yes") and ($selldownline1 == "yes"))
	{
	$countq = "select * from matrix1 where done=\"yes\"";
	$countr = mysql_query($countq) or die(mysql_error());
	$total = mysql_num_rows($countr);
	if ($total <= $showhowmanypositionsperdownline)
		{
	$q = "select * from matrix1 where done=\"yes\" order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	if ($total > $showhowmanypositionsperdownline)
		{
	$first = $total-$showhowmanypositionsperdownline;
	$q = "select * from matrix1 where done=\"yes\" order by memberid limit $first,$showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$odd .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$odd .= "<tr><td align=\"center\"><b>Cycled \$" . $price1 . " Downline</b></td></tr>";
	while ($rowz = mysql_fetch_array($r))
	{
	$username = $rowz["username"];
	$odd .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">" . $username . "</td></tr>";
	}
	#########
	if ($rows < $showhowmanypositionsperdownline)
	{
	$rowstoadd = $showhowmanypositionsperdownline-$rows;
	for ($i=1;$i<=$rowstoadd;$i++)
		{
		$odd .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">&nbsp;</td></tr>";
		}
	}
	$odd .= "</table><br><br>";
		}
	} # if (($matrixenabled1 == "yes") and ($selldownline1 == "yes"))
######################################
if (($matrixenabled2 == "yes") and ($selldownline2 == "yes"))
	{
	$countq = "select * from matrix2 where done=\"yes\"";
	$countr = mysql_query($countq);
	$total = mysql_num_rows($countr);
	if ($total <= $showhowmanypositionsperdownline)
		{
	$q = "select * from matrix2 where done=\"yes\" order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	if ($total > $showhowmanypositionsperdownline)
		{
	$first = $total-$showhowmanypositionsperdownline;
	$q = "select * from matrix2 where done=\"yes\" order by memberid limit $first,$showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$even .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$even .= "<tr><td align=\"center\"><b>Cycled \$" . $price2 . " Downline</b></td></tr>";
	while ($rowz = mysql_fetch_array($r))
	{
	$username = $rowz["username"];
	$even .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">" . $username . "</td></tr>";
	}
	#########
	if ($rows < $showhowmanypositionsperdownline)
	{
	$rowstoadd = $showhowmanypositionsperdownline-$rows;
	for ($i=1;$i<=$rowstoadd;$i++)
		{
		$even .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">&nbsp;</td></tr>";
		}
	}
	$even .= "</table><br><br>";
		}
	} # if (($matrixenabled2 == "yes") and ($selldownline2 == "yes"))
######################################
if (($matrixenabled3 == "yes") and ($selldownline3 == "yes"))
	{
	$countq = "select * from matrix3 where done=\"yes\"";
	$countr = mysql_query($countq);
	$total = mysql_num_rows($countr);
	if ($total <= $showhowmanypositionsperdownline)
		{
	$q = "select * from matrix3 where done=\"yes\" order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	if ($total > $showhowmanypositionsperdownline)
		{
	$first = $total-$showhowmanypositionsperdownline;
	$q = "select * from matrix3 where done=\"yes\" order by memberid limit $first,$showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$odd .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$odd .= "<tr><td align=\"center\"><b>Cycled \$" . $price3 . " Downline</b></td></tr>";
	while ($rowz = mysql_fetch_array($r))
	{
	$username = $rowz["username"];
	$odd .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">" . $username . "</td></tr>";
	}
	#########
	if ($rows < $showhowmanypositionsperdownline)
	{
	$rowstoadd = $showhowmanypositionsperdownline-$rows;
	for ($i=1;$i<=$rowstoadd;$i++)
		{
		$odd .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">&nbsp;</td></tr>";
		}
	}
	$odd .= "</table><br><br>";
		}
	} # if (($matrixenabled3 == "yes") and ($selldownline3 == "yes"))
######################################
if (($matrixenabled4 == "yes") and ($selldownline4 == "yes"))
	{
	$countq = "select * from matrix4 where done=\"yes\"";
	$countr = mysql_query($countq);
	$total = mysql_num_rows($countr);
	if ($total <= $showhowmanypositionsperdownline)
		{
	$q = "select * from matrix4 where done=\"yes\" order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	if ($total > $showhowmanypositionsperdownline)
		{
	$first = $total-$showhowmanypositionsperdownline;
	$q = "select * from matrix4 where done=\"yes\" order by memberid limit $first,$showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$even .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$even .= "<tr><td align=\"center\"><b>Cycled \$" . $price4 . " Downline</b></td></tr>";
	while ($rowz = mysql_fetch_array($r))
	{
	$username = $rowz["username"];
	$even .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">" . $username . "</td></tr>";
	}
	#########
	if ($rows < $showhowmanypositionsperdownline)
	{
	$rowstoadd = $showhowmanypositionsperdownline-$rows;
	for ($i=1;$i<=$rowstoadd;$i++)
		{
		$even .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">&nbsp;</td></tr>";
		}
	}
	$even .= "</table><br><br>";
		}
	} # if (($matrixenabled4 == "yes") and ($selldownline4 == "yes"))
######################################
if (($matrixenabled5 == "yes") and ($selldownline5 == "yes"))
	{
	$countq = "select * from matrix5 where done=\"yes\"";
	$countr = mysql_query($countq);
	$total = mysql_num_rows($countr);
	if ($total <= $showhowmanypositionsperdownline)
		{
	$q = "select * from matrix5 where done=\"yes\" order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	if ($total > $showhowmanypositionsperdownline)
		{
	$first = $total-$showhowmanypositionsperdownline;
	$q = "select * from matrix5 where done=\"yes\" order by memberid limit $first,$showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$odd .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$odd .= "<tr><td align=\"center\"><b>Cycled \$" . $price5 . " Downline</b></td></tr>";
	while ($rowz = mysql_fetch_array($r))
	{
	$username = $rowz["username"];
	$odd .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">" . $username . "</td></tr>";
	}
	#########
	if ($rows < $showhowmanypositionsperdownline)
	{
	$rowstoadd = $showhowmanypositionsperdownline-$rows;
	for ($i=1;$i<=$rowstoadd;$i++)
		{
		$odd .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">&nbsp;</td></tr>";
		}
	}
	$odd .= "</table><br><br>";
		}
	} # if (($matrixenabled5 == "yes") and ($selldownline5 == "yes"))
######################################
if (($matrixenabled6 == "yes") and ($selldownline6 == "yes"))
	{
	$countq = "select * from matrix6 where done=\"yes\"";
	$countr = mysql_query($countq);
	$total = mysql_num_rows($countr);
	if ($total <= $showhowmanypositionsperdownline)
		{
	$q = "select * from matrix6 where done=\"yes\" order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	if ($total > $showhowmanypositionsperdownline)
		{
	$first = $total-$showhowmanypositionsperdownline;
	$q = "select * from matrix6 where done=\"yes\" order by memberid limit $first,$showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$even .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$even .= "<tr><td align=\"center\"><b>Cycled \$" . $price6 . " Downline</b></td></tr>";
	while ($rowz = mysql_fetch_array($r))
	{
	$username = $rowz["username"];
	$even .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">" . $username . "</td></tr>";
	}
	#########
	if ($rows < $showhowmanypositionsperdownline)
	{
	$rowstoadd = $showhowmanypositionsperdownline-$rows;
	for ($i=1;$i<=$rowstoadd;$i++)
		{
		$even .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">&nbsp;</td></tr>";
		}
	}
	$even .= "</table><br><br>";
		}
	} # if (($matrixenabled6 == "yes") and ($selldownline6 == "yes"))
######################################
if (($matrixenabled7 == "yes") and ($selldownline7 == "yes"))
	{
	$countq = "select * from matrix7 where done=\"yes\"";
	$countr = mysql_query($countq);
	$total = mysql_num_rows($countr);
	if ($total <= $showhowmanypositionsperdownline)
		{
	$q = "select * from matrix7 where done=\"yes\" order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	if ($total > $showhowmanypositionsperdownline)
		{
	$first = $total-$showhowmanypositionsperdownline;
	$q = "select * from matrix7 where done=\"yes\" order by memberid limit $first,$showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$odd .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$odd .= "<tr><td align=\"center\"><b>Cycled \$" . $price7 . " Downline</b></td></tr>";
	while ($rowz = mysql_fetch_array($r))
	{
	$username = $rowz["username"];
	$odd .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">" . $username . "</td></tr>";
	}
	#########
	if ($rows < $showhowmanypositionsperdownline)
	{
	$rowstoadd = $showhowmanypositionsperdownline-$rows;
	for ($i=1;$i<=$rowstoadd;$i++)
		{
		$odd .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">&nbsp;</td></tr>";
		}
	}
	$odd .= "</table><br><br>";
		}
	} # if (($matrixenabled7 == "yes") and ($selldownline7 == "yes"))
######################################
if (($matrixenabled8 == "yes") and ($selldownline8 == "yes"))
	{
	$countq = "select * from matrix8 where done=\"yes\"";
	$countr = mysql_query($countq);
	$total = mysql_num_rows($countr);
	if ($total <= $showhowmanypositionsperdownline)
		{
	$q = "select * from matrix8 where done=\"yes\" order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	if ($total > $showhowmanypositionsperdownline)
		{
	$first = $total-$showhowmanypositionsperdownline;
	$q = "select * from matrix8 where done=\"yes\" order by memberid limit $first,$showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$even .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$even .= "<tr><td align=\"center\"><b>Cycled \$" . $price8 . " Downline</b></td></tr>";
	while ($rowz = mysql_fetch_array($r))
	{
	$username = $rowz["username"];
	$even .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">" . $username . "</td></tr>";
	}
	#########
	if ($rows < $showhowmanypositionsperdownline)
	{
	$rowstoadd = $showhowmanypositionsperdownline-$rows;
	for ($i=1;$i<=$rowstoadd;$i++)
		{
		$even .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">&nbsp;</td></tr>";
		}
	}
	$even .= "</table><br><br>";
		}
	} # if (($matrixenabled8 == "yes") and ($selldownline8 == "yes"))
######################################
if (($matrixenabled9 == "yes") and ($selldownline9 == "yes"))
	{
	$countq = "select * from matrix9 where done=\"yes\"";
	$countr = mysql_query($countq);
	$total = mysql_num_rows($countr);
	if ($total <= $showhowmanypositionsperdownline)
		{
	$q = "select * from matrix9 where done=\"yes\" order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	if ($total > $showhowmanypositionsperdownline)
		{
	$first = $total-$showhowmanypositionsperdownline;
	$q = "select * from matrix9 where done=\"yes\" order by memberid limit $first,$showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$odd .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$odd .= "<tr><td align=\"center\"><b>Cycled \$" . $price9 . " Downline</b></td></tr>";
	while ($rowz = mysql_fetch_array($r))
	{
	$username = $rowz["username"];
	$odd .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">" . $username . "</td></tr>";
	}
	#########
	if ($rows < $showhowmanypositionsperdownline)
	{
	$rowstoadd = $showhowmanypositionsperdownline-$rows;
	for ($i=1;$i<=$rowstoadd;$i++)
		{
		$odd .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">&nbsp;</td></tr>";
		}
	}
	$odd .= "</table><br><br>";
		}
	} # if (($matrixenabled9 == "yes") and ($selldownline9 == "yes"))
######################################
if (($matrixenabled10 == "yes") and ($selldownline10 == "yes"))
	{
	$countq = "select * from matrix10 where done=\"yes\"";
	$countr = mysql_query($countq);
	$total = mysql_num_rows($countr);
	if ($total <= $showhowmanypositionsperdownline)
		{
	$q = "select * from matrix10 where done=\"yes\" order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	if ($total > $showhowmanypositionsperdownline)
		{
	$first = $total-$showhowmanypositionsperdownline;
	$q = "select * from matrix10 where done=\"yes\" order by memberid limit $first,$showhowmanypositionsperdownline";
	$r = mysql_query($q);
		}
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$even .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$even .= "<tr><td align=\"center\"><b>Cycled \$" . $price10 . " Downline</b></td></tr>";
	while ($rowz = mysql_fetch_array($r))
	{
	$username = $rowz["username"];
	$even .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">" . $username . "</td></tr>";
	}
	#########
	if ($rows < $showhowmanypositionsperdownline)
	{
	$rowstoadd = $showhowmanypositionsperdownline-$rows;
	for ($i=1;$i<=$rowstoadd;$i++)
		{
		$even .= "<tr style=\"background:#eeeeee;\"><td align=\"center\">&nbsp;</td></tr>";
		}
	}
	$even .= "</table><br><br>";
		}
	} # if (($matrixenabled10 == "yes") and ($selldownline10 == "yes"))
######################################
?>
<tr><td align="center" valign="top"><?php echo $odd ?></td><td align="center" valign="top"><?php echo $even ?></td></tr>
<?php
} # else
?>
</table>
</td></tr>
</table>
<?php
include "footer.php";
} # if ($showcycledalreadypage == "yes")
?>