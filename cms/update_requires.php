<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['ClientId']) && isset($_POST['ProjectId']) && isset($_POST['startdate']) && isset($_POST['enddate'])) 
{
    function validate($data){       
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $ClientId = validate($_POST['ClientId']);
    $ProjectId = validate($_POST['ProjectId']);
    $startdate = validate($_POST['startdate']);
    $enddate = validate($_POST['enddate']);

    if (empty($ClientId)) 
    {
        header("Location: requires_update.php?error=Client ID is required");
        exit();
    }
    if(empty($ProjectId))
    {
        header("Location: requires_update.php?error=Client Name is required");
        exit();
    }
    if(empty($startdate))
    {
        header("Location: requires_update.php?error=Start date is required");
        exit();
    }
    if(empty($enddate))
    {
        header("Location: requires_update.php?error=End date is required");
        exit();
    }
    if ($startdate > $enddate) 
    {
        header("Location: requires_update.php?error=End date should be greater than start date");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM requires WHERE ClientId='$ClientId' and ProjectId='$ProjectId' and startdate = '$startdate'";
        
        if (mysqli_query($conn, $sql) == 0)
        {           
            header("Location: requires_update.php?error=Record does not exist");
            exit();
        }
        else
        {
            $query = "UPDATE requires SET enddate='$enddate' where clientId='$ClientId' and projectId = '$ProjectId'  and startdate = '$startdate'";
            if (mysqli_query($conn, $query))
            {
                header("Location: requires_update.php?success=Record has been updated successfully");
                exit();
            }
            else
            {
                header("Location: requires_update.php?error=Failed to create record");
                exit();
            }
        }
    }   
}
else
{
    header("Location: index.php");
    exit();
}