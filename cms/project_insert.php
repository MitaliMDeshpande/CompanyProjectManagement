<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['proId']) && isset($_POST['proName'])) 
{
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$proId = validate($_POST['proId']);
	$proName = validate($_POST['proName']);

	if (empty($proId)) 
	{
		header("Location: project_signup.php?error=Project ID is required");
	    exit();
	}
	if(empty($proName))
	{
        header("Location: project_signup.php?error=Project Name is required");
	    exit();
	}
	else
	{
		$sql = "SELECT * FROM project WHERE projectId ='$proId'";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0)
		{			
			header("Location: project_signup.php?error=The Project ID is taken, try another");
		    exit();
		}
		else
		{
            $query = "INSERT INTO project(projectId, NameOfProject) VALUES('$proId', '$proName')";
			if (mysqli_query($conn, $query))
			{
				header("Location: project_signup.php?success=Record has been created successfully");
				exit();
			}
			else
			{
				header("Location: project_signup.php?error=Failed to create record");
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