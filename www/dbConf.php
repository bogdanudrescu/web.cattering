<?php 
$dbhost = '192.168.0.120:3307';
$dbuser = 'root';
$dbpass = 'test';
$dbname = 'cattering';

/*$dbhost = 'localhost:3307';
$dbuser = 'root';
$dbpass = 'test';
$dbname = 'cattering';*/

/*$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'bogdan';
$dbname = 'cattering';*/

$connection = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$connection) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname);
?>
