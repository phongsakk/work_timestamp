<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'db_work_io';

$condb = mysqli_connect(
    $dbhost,
    $dbuser,
    $dbpass,
    $dbname
) or die("Error: " . mysqli_error($condb));
mysqli_query($condb, "SET NAMES 'utf8' ");
date_default_timezone_set('Asia/Bangkok');
