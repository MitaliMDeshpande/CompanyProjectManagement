<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['projectId'])) 
{
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$projectId = validate($_POST['projectId']);

	if (empty($projectId)) 
	{
		header("Location: project_delete_form.php?error=project ID is required");
	    exit();
	}	 
	else
	{	
        $sql = "SELECT * FROM project WHERE projectId='$projectId'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) 
		{		
            $query = "DELETE FROM project WHERE projectId='$projectId'";

			if (mysqli_query($conn, $query))
			{
				header("Location: project_delete_form.php?success=Your account has been deleted successfully");
				exit();
			}	
			else
            {
                header("Location: project_delete_form.php?error=Error occurred during deletion");
		        exit();
            }
		}
		else
		{
            header("Location: project_delete_form.php?error=The record does not exist, therefore cannot be deleted");
		    exit();			
		}
	}	
}
else
{
	header("Location: index.php");
	exit();
}