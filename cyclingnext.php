<?php
## page to show members who are next in line to cycle from the downlines.
include "config.php";
if (isset($_GET["referid"]))
{
$referid = $_GET["referid"];
}
if ($showcyclingnextpage != "yes")
{
$goto = $domain . "?referid=" . $referid;
@header("Location: " . $goto);
exit;
}
if ($showcyclingnextpage == "yes")
{
include "header.php";
include "style.php";
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><br><div class="heading">Next To Cycle</div></td></tr>
<tr><td colspan="2"><br>
<div style="text-align: center;">
<?php
$query1 = "select * from pages where name='Next To Cycle Page'";
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
$q = "select * from matrix1 where positionsleft>0 order by memberid limit $showhowmanypositionsperdownline";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
if ($rows > 0)
	{
$bgcolor = "#eeeeee";
?>
<tr><td align="center" colspan="2">
<table align="center" border="0" cellpadding="2" cellspacing="2" bgcolor="#999999" width="500">
<tr><td align="center"><b>Next To Cycle In $<?php echo $price1 ?> Downline</b></td></tr>
<?php
while ($rowz = mysql_fetch_array($r))
{
$username = $rowz["username"];
?>
<tr style="background: <?php echo $bgcolor ?>;"><td align="center"><?php echo $username ?></td></tr>
<?php
	if ($bgcolor == "#eeeeee")
	{
	$bgcolor = "#ffffff";
	}
	if ($bgcolor != "#eeeeee")
	{
	$bgcolor = "#eeeeee";
	}
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
	$q = "select * from matrix1 where positionsleft>0 order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$odd .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$odd .= "<tr><td align=\"center\"><b>Next To Cycle In \$" . $price1 . " Downline</b></td></tr>";
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
	$q = "select * from matrix2 where positionsleft>0 order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$even .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$even .= "<tr><td align=\"center\"><b>Next To Cycle In \$" . $price2 . " Downline</b></td></tr>";
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
	$q = "select * from matrix3 where positionsleft>0 order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$odd .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$odd .= "<tr><td align=\"center\"><b>Next To Cycle In \$" . $price3 . " Downline</b></td></tr>";
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
	$q = "select * from matrix4 where positionsleft>0 order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$even .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$even .= "<tr><td align=\"center\"><b>Next To Cycle In \$" . $price4 . " Downline</b></td></tr>";
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
	$q = "select * from matrix5 where positionsleft>0 order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$odd .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$odd .= "<tr><td align=\"center\"><b>Next To Cycle In \$" . $price5 . " Downline</b></td></tr>";
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
	$q = "select * from matrix6 where positionsleft>0 order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$even .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$even .= "<tr><td align=\"center\"><b>Next To Cycle In \$" . $price6 . " Downline</b></td></tr>";
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
	$q = "select * from matrix7 where positionsleft>0 order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$odd .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$odd .= "<tr><td align=\"center\"><b>Next To Cycle In \$" . $price7 . " Downline</b></td></tr>";
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
	$q = "select * from matrix8 where positionsleft>0 order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$even .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$even .= "<tr><td align=\"center\"><b>Next To Cycle In \$" . $price8 . " Downline</b></td></tr>";
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
	$q = "select * from matrix9 where positionsleft>0 order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$odd .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$odd .= "<tr><td align=\"center\"><b>Next To Cycle In \$" . $price9 . " Downline</b></td></tr>";
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
	$q = "select * from matrix10 where positionsleft>0 order by memberid limit $showhowmanypositionsperdownline";
	$r = mysql_query($q);
	$rows = mysql_num_rows($r);
	if ($rows > 0)
		{
	$even .= "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"#999999\" width=\"300\">";
	$even .= "<tr><td align=\"center\"><b>Next To Cycle In \$" . $price10 . " Downline</b></td></tr>";
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
} # if ($showcyclingnextpage == "yes")
?>