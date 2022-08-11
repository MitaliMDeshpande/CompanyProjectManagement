<html>
    <head style="text-align:center;padding:20px;font-size:large;"></head>
    <title>Records</title>
    <style type="text/css">
        tr
        {
            color: white;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">

        <body>

        <div id = "header">
        <div class="dropdown1">
      <button class="dropbtn1">Display</button>
      <br><br><br>
      <div class="dropdown-content1">
        <label><a href="project_disp_single.php" style="text-decoration:none;color:#fff">Project</a></label>
        <label><a href="client_disp_single.php" style="text-decoration:none;color:#fff">Client</a></label>
        <label><a href="requires_disp_single.php" style="text-decoration:none;color:#fff">Requires</a></label>
      </div>
      
    </div>
    
    <button class = 'button2'><a href="logout.php">Logout</a></button>
</div>

<?php

include("db_conn.php");
error_reporting(0);
$query = "select requires.ClientId,client.clientName,requires.ProjectId,project.NameOfProject from client, project, requires where client.clientId = requires.ClientId and requires.ProjectId = project.projectId order by client.clientName;";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total != 0)
{    
    ?>
    <table>
            <tr>
                <th>Client ID</th>
                <th>Client Name</th>
                <th>Project ID</th>
                <th>Name of Project</th>
            </tr>
    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo "
        <tr>
        <td>".$result['ClientId']."</td>
        <td>".$result['clientName']."</td>
        <td>".$result['ProjectId']."</td>
        <td>".$result['NameOfProject']."</td>
        </tr>
        ";
    }
}
else
{
    echo "No records found";
}

?>
        </table>

    </body>
</html>