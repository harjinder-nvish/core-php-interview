<?php
// database
include_once ('constants.php');
include_once ('classes/database.class.php');
$dbObj = new database();

// all subject for dropdown
$subjects = $dbObj->selectAll('students_subjects'); 

// param 1 tablename
// param 2 LIMIT
$rows = $dbObj->select("students", "100");

$where = '';
if (isset($data['name']) && $data['name'] != '')
{
    $where .= ' AND name LIKE "%' . $data['name'] . '%"';
}
if (isset($data['standard']) && count($data['standard']) > 0)
{
    $ids = implode(',', $data['standard']);
    if ($ids)
    {
        $where .= ' AND standard IN (' . $ids . ')';
    }
}
if (isset($data['subject']) && count($data['subject']) > 0)
{
    foreach ($data['subject'] as $row)
    {
        if ($row != '')
        {
            $where .= " AND FIND_IN_SET('" . $row . "',subject)";
        }
    }
}

require "html/index.php";
?>