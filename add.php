<?php
// database
include_once ('classes/database.class.php');
$dbObj = new database();

$title = "Add Record";
$_SESSION['flash-msg'] = ""; // setting up flash message and siplayed on listing page
if (isset($_GET['id']))
{
    $title = "Update Record";
    $row = $dbObj->selectById("students", $_GET['id']);
}

$subjects = $dbObj->selectAll('subjects'); // all subject for dropdown
// check form is submitted
if (isset($_POST['submit']))
{
    try
    {
        unset($_POST['submit']); // unset submit to prevent go to mysql error
        // checking for update or add
        if ($_POST['student_id'] > 0)
        {
            // update
            $response = $dbObj->update("students", $_POST);
            $_SESSION['flash-msg'] = "Record updated successfully.";
        }
        else
        {
            // insert
            unset($_POST['student_id']);
            $response = $dbObj->insert("students", $_POST);
            $_SESSION['flash-msg'] = "New record added successfully.";
        }

        if ($response)
        {
            header("location: index.php");
            exit();
        }
        else
        {
            throw new exception("something wrong");
        }
    }
    catch(Exception $e)
    {
        // handling global Exception
        echo $e->getMessage() . ' at line ' . getLine();
        die;

    }
}

require_once "html/add.php";
?>