<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['clientId']) && isset($_POST['clientName']) && isset($_POST['email'])) 
{
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$clientId = validate($_POST['clientId']);
	$clientName = validate($_POST['clientName']);
	$email = validate($_POST['email']);

	if (empty($clientId)) 
	{
		header("Location: client_update.php?error=Client ID is required");
	    exit();
	}
	if(empty($clientName))
	{
        header("Location: client_update.php?error=Client Name is required");
	    exit();
	}
	if(empty($email))
	{
        header("Location: client_update.php?error=Email is required");
	    exit();
	}
    else
	{
		$sql = "SELECT * FROM client WHERE clientId='$clientId'";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) == 0)
		{			
			header("Location: client_update.php?error=The Client ID do not exist in existing database, try another");
		    exit();
		}
        else
        {
            $query = "UPDATE client SET clientName='$clientName', email='$email' where clientId='$clientId'";
            if (mysqli_query($conn, $query))
            {
                header("Location: client_update.php?success=Record has been updated successfully");
                exit();
            }
            else
            {
                header("Location: client_update.php?error=Failed to create record");
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