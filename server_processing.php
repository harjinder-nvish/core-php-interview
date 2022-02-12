<?php
include_once ('classes/database.class.php');

$dbObj = new database();

// values from datable
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($dbObj->conn, $_POST['search']['value']); // Search value
// where
$whereQuery = " ";
if ($searchValue != '')
{
    $whereQuery = " and (name like '%" . $searchValue . "%' or 
        standard like '%" . $searchValue . "%' or 
        subject like'%" . $searchValue . "%' ) ";
}

// Total number of records without filtering
$totalRecords = $dbObj->getRowCount("students", '');

// Fetch records
$data = $dbObj->selectByWhere('students', $whereQuery);

// Total number of record with filtering
$totalRecordwithFilter = count($data);

// response to ajax
$response = array(
    "draw" => intval($draw) ,
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);

