<?php
$MySqlHostname = "localhost"; //the name of your host - if its local leave it as is.
$MySqlUsername = "phpsites_demotri"; //the username to your database.
$MySqlPassword = "KGW,%X3S13PBRTaM#E"; //the password to your database.
$MySqlDatabase = "phpsites_demotripler"; //the name of your database.
$dblink=MYSQL_CONNECT($MySqlHostname, $MySqlUsername, $MySqlPassword) or die("Could not connect to database");
@mysql_select_db("$MySqlDatabase") or die( "Could not select database");
?>