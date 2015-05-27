<?php
session_start();
# admin control file for viewing, adding, removing, and editing positions in each downline.
include "../config.php";
if( session_is_registered("alogin") ) {
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
?>
<script language="JavaScript">
 function Inverse(form)
   {
    len = form.elements.length;
    var i=0;
    for( i=0; i<len; i++)
    {
     if (form.elements[i].type=='checkbox' )
     {
      form.elements[i].checked = !form.elements[i].checked;
     }
    }
	return false;
   }		
</script>
<style type="text/css">
<!--
div.pagination {
	padding: 3px;
	margin: 3px;
}
div.pagination a {
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #eeeeee;
	text-decoration: none;
	color: #000099;
}
div.pagination a:hover, div.pagination a:active {
	border: 1px solid #808080;
	color: #000;
}
div.pagination span.current {
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #808080;	
	font-weight: bold;
	background-color: #808080;
	color: #FFF;
	}
div.pagination span.disabled {
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #EEE;
	color: #DDD;
	}
-->
</style>
<?php
#######################################
if($_POST['submit'] == "Delete")
{
	foreach($id as $each)
	{
	$delq = "delete from tripler_transactions where id='$each'";
	$delr = mysql_query($delq);
	}
$show = "<div align=\"center\" style=\"color: #ff0000;\">Transaction Record(s) Deleted</div><br>";
}
#######################################
include "../header.php";
include "../style.php";
?>
<table>
<tr>
<td width="15%" valign=top><br>
<?php
include "adminnavigation.php";
?>
</td>
<td  valign="top" align="center"><br>
<?php
echo "<p align=\"center\"><H2>Downline Payment Transaction History</H2></p>";
$query = "select * from tripler_transactions order by dateadded desc";
$result = mysql_query ($query) or die(mysql_error());
$totalrows = mysql_num_rows($result);
if ($totalrows < 1)
{
echo "<br><center><p><b>No Transactions are in the system yet.</b></center></p>";
}
if ($totalrows > 0)
{
################################################################ Sabrina - paging code
		$pagesize = 50;
		$adjacents = 5;
		$page = (empty($_GET['p']) || !isset($_GET['p']) || !is_numeric($_GET['p'])) ? 1 : $_GET['p'];
		$s = ($page-1) * $pagesize;
		$query1 = $query ." LIMIT $s, $pagesize";
		$resultexclude=mysql_query($query1);
		$numrows = @mysql_num_rows($resultexclude);
		if($numrows == 0){
			$query1 = $query ." LIMIT $pagesize";
			$resultexclude=mysql_query($query1);
		}
		$count = 0;
		$pagetext = "";
		echo "<b> Total Transactions:" . $totalrows . "</b><br><br>";

		if($totalrows > $pagesize){ // show the page bar
			$pagecount = ceil($totalrows/$pagesize);
			$pagetext .= "<div class='pagination'> ";
			if($page>$adjacents){ //show start link
				$pagetext .= "<a href='?p=".(1)."' title='start'> << start </a>";
			}
			if($page>1){ //show previous link
				$pagetext .= "<a href='?p=".($page-1)."' title='previous page'> < previous </a>";
			}
			for($i=1;$i<=$pagecount;$i++)
			{
					if($page == $i)
					{
						$left = $page-$adjacents;
						while ($left < $page)
						{
						if ($left > 0)
						{
						$pagetext .= "<a href='?p=".$left."'>".$left."</a>";
						}
						$left = $left+1;
						}
					$pagetext .= "<span class='current'>".$i."</span>";
					}
					$right = $page+$adjacents;
					if (($i > $page) and ($i <= $right))
					{
					$pagetext .= "<a href='?p=".$i."'>".$i."</a>";
					}
			}
			if($page<$pagecount){ //show next link
				$pagetext .= "<a href='?p=".($page+1)."' title='next page'> next > </a>";
			}
			if($page<$pagecount-$adjacents){ //show end link
				$pagetext .= "<a href='?p=".($pagecount)."' title='last'> last >> </a>";
			}
			$pagetext .= " </div><br>";
		}
################################################################
?>
<style type="text/css">
<!--
td {
color: #000000;
font-size: 12px;
font-weight: normal;
font-family: Tahoma, sans-serif;
}
-->
</style>
<table align="center" border="0" width="90%">
<tr><td valign="top" align="center">
<?php
if ($show != "")
{
echo $show;
}
?>
<table align=center><tr><td><?php echo $pagetext ?></td></tr></table>
<form action="tripler_transactions.php" method="post" name="transactions">
<table width="90%" cellpadding="4" cellspacing="2" border="0" align="center" bgcolor="#999999">
<tr bgcolor="#eeeeee">
<td align="center"></td>
<td align="center">ID</td>
<td align="center">Userid</td>
<td align="center">Transaction ID</td>
<td align="center">Quantity</td>
<td align="center">Item</td>
<td align="center">Date</td>
<td align="center">Amount</td>
</tr>
<?php
$bgcount = 0;
while ($line = mysql_fetch_array($resultexclude))
{
$id = $line["id"];
$userid = $line["userid"];
$transaction = $line["transaction"];
$quantity = $line["quantity"];
$item = $line["item"];
$paid = $line["paid"];
$dateadded = $line["dateadded"];
if (($dateadded == 0) or ($dateadded == ""))
	{
	$showdateadded = "";
	}
else
	{
	$showdateadded = formatDate($dateadded);
	}
if ($bgcount == 0)
	{
	$bgcolor = "#d3d3d3";
	}
if ($bgcount != 0)
	{
	$bgcolor = "#eeeeee";
	}
?>
<tr bgcolor="<?php echo $bgcolor ?>">
<td align="center"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>
<td align="center"><?php echo $id ?></td>
<td align="center"><?php echo $userid ?></td>
<td align="center"><?php echo $transaction ?></td>
<td align="center"><?php echo $quantity ?></td>
<td align="center"><?php echo $item ?></td>
<td align="center"><?php echo $showdateadded ?></td>
<td align="center">$<?php echo $paid ?></td>
<?php
if ($bgcount == 0)
	{
	$bgcount = 1;
	}
if ($bgcount != 0)
	{
	$bgcount = 0;
	}
} # while ($line = mysql_fetch_array($pnresult))
?>
</table>
<br>
<p align="center"><input type="button" onclick="return Inverse(document.transactions);" value="Inverse"><input type="submit" name="submit" value="Delete"></form></p>
<br>
<table align=center><tr><td><?php echo $pagetext ?></td></tr></table>
<?php
} # if ($totalrows > 0)
include "../footer.php";
exit;
}
else
{
include "../header.php";
include "../style.php";
echo "Unauthorised Access!";
?>
</td></tr></table></td></tr></table>
<?php
include "../footer.php";
exit;
}
?>