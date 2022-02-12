<?php
include_once ('classes/database.class.php');

$dbObj = new database();

$result = array();
if (isset($_REQUEST['search']) && $_REQUEST['search'] == true)
{
    $where = '';
    if (isset($_REQUEST['name']) && $_REQUEST['name'] != '')
    {
        $where .= ' AND name LIKE "%' . $_REQUEST['name'] . '%"';
    }
    if (isset($_REQUEST['standard']) && count($_REQUEST['standard']) > 0)
    {
        $ids = implode(',', $_REQUEST['standard']);
        if ($ids)
        {
            $where .= ' AND standard IN (' . $ids . ')';
        }
    }
    if (isset($_REQUEST['subject']) && count($_REQUEST['subject']) > 0)
    {
        foreach ($_REQUEST['subject'] as $row)
        {
            if ($row != '')
            {
                $where .= " AND FIND_IN_SET('" . $row . "',subject)";
            }
        }
    }
    $result = $dbObj->selectByWhere('students', $where);
}

echo json_encode($result);
?>