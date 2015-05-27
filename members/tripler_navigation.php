<?php
if ((($matrixenabled1 == "yes") and ($selldownline1 == "yes")) or (($matrixenabled2 == "yes") and ($selldownline2 == "yes")) or (($matrixenabled3 == "yes") and ($selldownline3 == "yes")) or (($matrixenabled4 == "yes") and ($selldownline4 == "yes")) or (($matrixenabled5 == "yes") and ($selldownline5 == "yes")) or (($matrixenabled6 == "yes") and ($selldownline6 == "yes")) or (($matrixenabled7 == "yes") and ($selldownline7 == "yes")) or (($matrixenabled8 == "yes") and ($selldownline8 == "yes")) or (($matrixenabled9 == "yes") and ($selldownline9 == "yes")) or (($matrixenabled10 == "yes") and ($selldownline10 == "yes")))
{
#############################################################
$orderurl = "tripler_order.php";
$ordertitle = "<b>Buy Positions</b>";
$tripler_orderbutton = ereg_replace("~TRIPLER_BUTTON_URL~", $orderurl, $tripler_button);
$tripler_orderbutton = ereg_replace("~TRIPLER_BUTTON_TITLE~", $ordertitle, $tripler_orderbutton);
echo $tripler_orderbutton;
#############################################################
$statsurl = "tripler_memberstats.php";
$statstitle = "<b>Downline Stats</b>";
$tripler_statsbutton = ereg_replace("~TRIPLER_BUTTON_URL~", $statsurl, $tripler_button);
$tripler_statsbutton = ereg_replace("~TRIPLER_BUTTON_TITLE~", $statstitle, $tripler_statsbutton);
echo $tripler_statsbutton;
#############################################################
if (($matrixenabled1 == "yes") and ($selldownline1 == "yes"))
{
$matrixurl1 = "tripler_downlines.php?m=1";
$matrixtitle1 = "<b>\$".$price1." Downline #1</b>";
$tripler_downline_button1 = ereg_replace("~TRIPLER_BUTTON_URL~", $matrixurl1, $tripler_button);
$tripler_downline_button1 = ereg_replace("~TRIPLER_BUTTON_TITLE~", $matrixtitle1, $tripler_downline_button1);
echo $tripler_downline_button1;
}
if (($matrixenabled2 == "yes") and ($selldownline2 == "yes"))
{
$matrixurl2 = "tripler_downlines.php?m=2";
$matrixtitle2 = "<b>\$".$price2." Downline #2</b>";
$tripler_downline_button2 = ereg_replace("~TRIPLER_BUTTON_URL~", $matrixurl2, $tripler_button);
$tripler_downline_button2 = ereg_replace("~TRIPLER_BUTTON_TITLE~", $matrixtitle2, $tripler_downline_button2);
echo $tripler_downline_button2;
}
if (($matrixenabled3 == "yes") and ($selldownline3 == "yes"))
{
$matrixurl3 = "tripler_downlines.php?m=3";
$matrixtitle3 = "<b>\$".$price3." Downline #3</b>";
$tripler_downline_button3 = ereg_replace("~TRIPLER_BUTTON_URL~", $matrixurl3, $tripler_button);
$tripler_downline_button3 = ereg_replace("~TRIPLER_BUTTON_TITLE~", $matrixtitle3, $tripler_downline_button3);
echo $tripler_downline_button3;
}
if (($matrixenabled4 == "yes") and ($selldownline4 == "yes"))
{
$matrixurl4 = "tripler_downlines.php?m=4";
$matrixtitle4 = "<b>\$".$price4." Downline #4</b>";
$tripler_downline_button4 = ereg_replace("~TRIPLER_BUTTON_URL~", $matrixurl4, $tripler_button);
$tripler_downline_button4 = ereg_replace("~TRIPLER_BUTTON_TITLE~", $matrixtitle4, $tripler_downline_button4);
echo $tripler_downline_button4;
}
if (($matrixenabled5 == "yes") and ($selldownline5 == "yes"))
{
$matrixurl5 = "tripler_downlines.php?m=5";
$matrixtitle5 = "<b>\$".$price5." Downline #5</b>";
$tripler_downline_button5 = ereg_replace("~TRIPLER_BUTTON_URL~", $matrixurl5, $tripler_button);
$tripler_downline_button5 = ereg_replace("~TRIPLER_BUTTON_TITLE~", $matrixtitle5, $tripler_downline_button5);
echo $tripler_downline_button5;
}
if (($matrixenabled6 == "yes") and ($selldownline6 == "yes"))
{
$matrixurl6 = "tripler_downlines.php?m=6";
$matrixtitle6 = "<b>\$".$price6." Downline #6</b>";
$tripler_downline_button6 = ereg_replace("~TRIPLER_BUTTON_URL~", $matrixurl6, $tripler_button);
$tripler_downline_button6 = ereg_replace("~TRIPLER_BUTTON_TITLE~", $matrixtitle6, $tripler_downline_button6);
echo $tripler_downline_button6;
}
if (($matrixenabled7 == "yes") and ($selldownline7 == "yes"))
{
$matrixurl7 = "tripler_downlines.php?m=7";
$matrixtitle7 = "<b>\$".$price7." Downline #7</b>";
$tripler_downline_button7 = ereg_replace("~TRIPLER_BUTTON_URL~", $matrixurl7, $tripler_button);
$tripler_downline_button7 = ereg_replace("~TRIPLER_BUTTON_TITLE~", $matrixtitle7, $tripler_downline_button7);
echo $tripler_downline_button7;
}
if (($matrixenabled8 == "yes") and ($selldownline8 == "yes"))
{
$matrixurl8 = "tripler_downlines.php?m=8";
$matrixtitle8 = "<b>\$".$price8." Downline #8</b>";
$tripler_downline_button8 = ereg_replace("~TRIPLER_BUTTON_URL~", $matrixurl8, $tripler_button);
$tripler_downline_button8 = ereg_replace("~TRIPLER_BUTTON_TITLE~", $matrixtitle8, $tripler_downline_button8);
echo $tripler_downline_button8;
}
if (($matrixenabled9 == "yes") and ($selldownline9 == "yes"))
{
$matrixurl9 = "tripler_downlines.php?m=9";
$matrixtitle9 = "<b>\$".$price9." Downline #9</b>";
$tripler_downline_button9 = ereg_replace("~TRIPLER_BUTTON_URL~", $matrixurl9, $tripler_button);
$tripler_downline_button9 = ereg_replace("~TRIPLER_BUTTON_TITLE~", $matrixtitle9, $tripler_downline_button9);
echo $tripler_downline_button9;
}
if (($matrixenabled10 == "yes") and ($selldownline10 == "yes"))
{
$matrixurl10 = "tripler_downlines.php?m=10";
$matrixtitle10 = "<b>\$".$price10." Downline #10</b>";
$tripler_downline_button10 = ereg_replace("~TRIPLER_BUTTON_URL~", $matrixurl10, $tripler_button);
$tripler_downline_button10 = ereg_replace("~TRIPLER_BUTTON_TITLE~", $matrixtitle10, $tripler_downline_button10);
echo $tripler_downline_button10;
}
} #
?>