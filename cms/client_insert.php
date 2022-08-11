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
		header("Location: client_signup.php?error=Client ID is required");
	    exit();
	}
	if(empty($clientName))
	{
        header("Location: client_signup.php?error=Client Name is required");
	    exit();
	}
	if(empty($email))
	{
        header("Location: client_signup.php?error=Email is required");
	    exit();
	}
	else
	{
		$sql = "SELECT * FROM client WHERE clientId='$clientId'";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0)
		{			
			header("Location: client_signup.php?error=The Client ID is taken, try another");
		    exit();
		}
		else
		{
            $query = "INSERT INTO client(clientId, clientName, email) VALUES('$clientId', '$clientName', '$email')";
			if (mysqli_query($conn, $query))
			{
				header("Location: client_signup.php?success=Record has been created successfully");
				exit();
			}
			else
			{
				header("Location: client_signup.php?error=Failed to create record");
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