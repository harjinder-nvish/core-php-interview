<?php
// database
include_once('classes/database.class.php');
$dbObj  = new database();

$rows   = $dbObj->select("students");

require "html/index-datatable.php";