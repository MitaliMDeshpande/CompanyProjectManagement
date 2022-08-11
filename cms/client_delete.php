<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['clientId'])) 
{
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$clientId = validate($_POST['clientId']);

	if (empty($clientId)) 
	{
		header("Location: client_delete_form.php?error=Client ID is required");
	    exit();
	}	 
	else
	{	
        $sql = "SELECT * FROM client WHERE clientId='$clientId'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) 
		{		
            $query = "DELETE FROM client WHERE clientId='$clientId'";

			if (mysqli_query($conn, $query))
			{
				header("Location: client_delete_form.php?success=Your account has been deleted successfully");
				exit();
			}	
			else
            {
                header("Location: client_delete_form.php?error=Error occurred during deletion");
		        exit();
            }
		}
		else
		{
            header("Location: client_delete_form.php?error=The record does not exist, therefore cannot be deleted");
		    exit();			
		}
	}	
}
else
{
	header("Location: index.php");
	exit();
}