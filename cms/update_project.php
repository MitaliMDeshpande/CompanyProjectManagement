<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['projectId']) && isset($_POST['projectName'])) 
{
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$projectId = validate($_POST['projectId']);
	$projectName = validate($_POST['projectName']);

	if (empty($projectId)) 
	{
		header("Location: project_update.php?error=Project ID is required");
	    exit();
	}
	if(empty($projectName))
	{
        header("Location: project_update.php?error=Project Name is required");
	    exit();
	}
    else
	{
		$sql = "SELECT * FROM project WHERE projectId='$projectId'";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) == 0)
		{			
			header("Location: project_update.php?error=The Project ID do not exist in existing database, try another");
		    exit();
		}
        else
        {
            $query = "UPDATE project SET projectName='$projectName' where projectId='$projectId'";
            if (mysqli_query($conn, $query))
            {
                header("Location: project_update.php?success=Record has been updated successfully");
                exit();
            }
            else
            {
                header("Location: project_update.php?error=Failed to create record");
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