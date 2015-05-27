<?php
if($offer['tripler1_num'])
{
$matrixnumber = 1;
$won .= " ".$offer['tripler1_num']." \$" . $price1 . " Downline Position(s) ";
$count = $offer['tripler1_num'];
	while($count > 0)
	{
	$positioncount = 1;
	include "tripler_add.php";
	mysql_query("INSERT INTO prizetrans VALUES ('id', '".$userid."','".$won."','".time()."')");
	$count--;
	}
}
if($offer['tripler2_num'])
{
$matrixnumber = 2;
$won .= " ".$offer['tripler2_num']." \$" . $price2 . " Downline Position(s) ";
$count = $offer['tripler2_num'];
	while($count > 0)
	{
	$positioncount = 1;
	include "tripler_add.php";
	mysql_query("INSERT INTO prizetrans VALUES ('id', '".$userid."','".$won."','".time()."')");
	$count--;
	}
}
if($offer['tripler3_num'])
{
$matrixnumber = 3;
$won .= " ".$offer['tripler3_num']." \$" . $price3 . " Downline Position(s) ";
$count = $offer['tripler3_num'];
	while($count > 0)
	{
	$positioncount = 1;
	include "tripler_add.php";
	mysql_query("INSERT INTO prizetrans VALUES ('id', '".$userid."','".$won."','".time()."')");
	$count--;
	}
}
if($offer['tripler4_num'])
{
$matrixnumber = 4;
$won .= " ".$offer['tripler4_num']." \$" . $price4 . " Downline Position(s) ";
$count = $offer['tripler4_num'];
	while($count > 0)
	{
	$positioncount = 1;
	include "tripler_add.php";
	mysql_query("INSERT INTO prizetrans VALUES ('id', '".$userid."','".$won."','".time()."')");
	$count--;
	}
}
if($offer['tripler5_num'])
{
$matrixnumber = 5;
$won .= " ".$offer['tripler5_num']." \$" . $price5 . " Downline Position(s) ";
$count = $offer['tripler5_num'];
	while($count > 0)
	{
	$positioncount = 1;
	include "tripler_add.php";
	mysql_query("INSERT INTO prizetrans VALUES ('id', '".$userid."','".$won."','".time()."')");
	$count--;
	}
}
if($offer['tripler6_num'])
{
$matrixnumber = 6;
$won .= " ".$offer['tripler6_num']." \$" . $price6 . " Downline Position(s) ";
$count = $offer['tripler6_num'];
	while($count > 0)
	{
	$positioncount = 1;
	include "tripler_add.php";
	mysql_query("INSERT INTO prizetrans VALUES ('id', '".$userid."','".$won."','".time()."')");
	$count--;
	}
}
if($offer['tripler7_num'])
{
$matrixnumber = 7;
$won .= " ".$offer['tripler7_num']." \$" . $price7 . " Downline Position(s) ";
$count = $offer['tripler7_num'];
	while($count > 0)
	{
	$positioncount = 1;
	include "tripler_add.php";
	mysql_query("INSERT INTO prizetrans VALUES ('id', '".$userid."','".$won."','".time()."')");
	$count--;
	}
}
if($offer['tripler8_num'])
{
$matrixnumber = 8;
$won .= " ".$offer['tripler8_num']." \$" . $price8 . " Downline Position(s) ";
$count = $offer['tripler8_num'];
	while($count > 0)
	{
	$positioncount = 1;
	include "tripler_add.php";
	mysql_query("INSERT INTO prizetrans VALUES ('id', '".$userid."','".$won."','".time()."')");
	$count--;
	}
}
if($offer['tripler9_num'])
{
$matrixnumber = 9;
$won .= " ".$offer['tripler9_num']." \$" . $price9 . " Downline Position(s) ";
$count = $offer['tripler9_num'];
	while($count > 0)
	{
	$positioncount = 1;
	include "tripler_add.php";
	mysql_query("INSERT INTO prizetrans VALUES ('id', '".$userid."','".$won."','".time()."')");
	$count--;
	}
}
if($offer['tripler10_num'])
{
$matrixnumber = 10;
$won .= " ".$offer['tripler10_num']." \$" . $price10 . " Downline Position(s) ";
$count = $offer['tripler10_num'];
	while($count > 0)
	{
	$positioncount = 1;
	include "tripler_add.php";
	mysql_query("INSERT INTO prizetrans VALUES ('id', '".$userid."','".$won."','".time()."')");
	$count--;
	}
}
?>