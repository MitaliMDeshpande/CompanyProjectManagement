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
		header("Location: requires_signup.php?error=Client ID is required");
	    exit();
	}
	if(empty($ProjectId))
	{
        header("Location: requires_signup.php?error=Client Name is required");
	    exit();
	}
	if(empty($startdate))
	{
        header("Location: requires_signup.php?error=Start date is required");
	    exit();
	}
	if(empty($enddate))
	{
        header("Location: requires_signup.php?error=End date is required");
	    exit();
	}
	$date_now = date("Y-m-d"); 
	if ($date_now > $startdate) 
	{
    	header("Location: requires_signup.php?error=Start date should be greater than '$date_now' date");
		exit();
	}
	if ($startdate > $enddate) 
	{
    	header("Location: requires_signup.php?error=End date should be greater than start date");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM requires WHERE ClientId='$ClientId' && ProjectId='$ProjectId";
		
		if (mysqli_query($conn, $sql) > 0)
		{			
			header("Location: requires_signup.php?error=Record already exists");
		    exit();
		}
		else
		{
			$sql1 = "SELECT * FROM client WHERE clientId = '$ClientId'";
			$sql2 = "SELECT * FROM project WHERE projectId = '$ProjectId'";
			if(mysqli_query($conn, $sql1) > 0)			
			{
				if(mysqli_query($conn, $sql2) > 0)
				{
					$query = "INSERT INTO requires(ClientId, ProjectId, startdate, enddate) VALUES('$ClientId', '$ProjectId', '$startdate', '$enddate')";
					if (mysqli_query($conn, $query))
					{
						header("Location: requires_signup.php?success=Record has been created successfully");
						exit();
					}
					else
					{	
						header("Location: requires_signup.php?error=Failed to create record");
						exit();
					}
				}
				else
				{
					header("Location: requires_signup.php?error=Project ID does not exist, therefore record cannot be added");
					exit();
				}
			}
            else
			{
				header("Location: requires_signup.php?error=Client ID does not exist, therefore record cannot be added");
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