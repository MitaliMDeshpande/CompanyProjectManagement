<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['ProjectId']) && isset($_POST['ClientId'])) 
{
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$ClientId = validate($_POST['ClientId']);
	$ProjectId = validate($_POST['ProjectId']);

	if (empty($ClientId)) 
	{
		header("Location: requires_delete_form.php?error=Client ID is required");
	    exit();
	}	

	if (empty($ProjectId)) 
	{
		header("Location: requires_delete_form.php?error=Project ID is required");
	    exit();
	}	 
	else
	{	
        $sql = "SELECT * FROM requires WHERE ClientId = '$ClientId' AND ProjectId='$ProjectId'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) 
		{		
            $query = "DELETE FROM requires WHERE ClientId = '$ClientId' AND ProjectId='$ProjectId'";

			if (mysqli_query($conn, $query))
			{
				header("Location: requires_delete_form.php?success=Your account has been deleted successfully");
				exit();
			}	
			else
            {
                header("Location: requires_delete_form.php?error=Error occurred during deletion");
		        exit();
            }
		}
		else
		{
            header("Location: requires_delete_form.php?error=The record does not exist, therefore cannot be deleted");
		    exit();			
		}
	}	
}
else
{
	header("Location: index.php");
	exit();
}