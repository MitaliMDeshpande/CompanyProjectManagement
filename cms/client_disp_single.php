<html>
    <head style="text-align:center;padding:20px;font-size:large;"></head>
    <title>Records</title>
    <link rel="stylesheet" type="text/css" href="style.css">

            <div id = "header">
        <div class="dropdown1">
                <button class="dropbtn1">Display</button>
                <br><br><br>
                <div class="dropdown-content1">
                  <label><a href="project_disp_single.php" style="text-decoration:none;color:white;">Project</a></label>
                  <label><a href="client_disp_single.php" style="text-decoration:none;color:white;">Client</a></label>
                  <label><a href="requires_disp_single.php" style="text-decoration:none;color:white;">Requires</a></label>
                </div>
              </div>
              <button class = 'button2'><a href="logout.php">Logout</a></button>
    </div>

<?php

include("db_conn.php");
error_reporting(0);
$query = "select * from client";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total != 0)
{    
    ?>
    <table>
            <tr>
                <th>Client ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo "
        <tr>
        <td>".$result['clientId']."</td>
        <td>".$result['clientName']."</td>
        <td>".$result['email']."</td>
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
        <button class="button3" 
        style="width:400px;
        padding: 10px;
        font-size: 24px;
        border-style: ridge;
        border-radius: 5px;
        cursor: pointer;
        border-color: white;
        float: right;
        background-color: #3f415a;"><a href="clientwise_disp_single.php" style="text-decoration:none;color:white;">Show Client-wise Projects</button>
    </body>
</html>