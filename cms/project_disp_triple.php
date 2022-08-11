<html>
    <title>Records</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <body>

        <div id = "header">
        <div class="dropdown1">
      <button class="dropbtn1">Display</button>
      <br><br><br>
      <div class="dropdown-content1">
        <label><a href="project_disp_triple.php" style="text-decoration:none;color:#fff">Project</a></label>
        <label><a href="client_disp_triple.php" style="text-decoration:none;color:#fff">Client</a></label>
        <label><a href="requires_disp_triple.php" style="text-decoration:none;color:#fff">Requires</a></label>
      </div>
      
    </div>
    <div class="dropdown2">
    <button class="dropbtn2" style = "margin-left: 50px;">Insert</button>
    <br><br><br>
      <div class="dropdown-content2" style = "margin-left: 50px;">
        <label><a href="project_signup.php" style="text-decoration:none;color:#fff">Project</a></label>
        <label><a href="client_signup.php" style="text-decoration:none;color:#fff">Client</a></label>
        <label><a href="requires_signup.php" style="text-decoration:none;color:#fff">Requires</a></label>
      </div>
    </div>
    <div class="dropdown3">
    <button class="dropbtn3" style = "margin-left: 50px;">Delete</button>
    <br><br><br>
      <div class="dropdown-content3" style = "margin-left: 50px;">
        <label><a href="project_delete_form.php" style="text-decoration:none;color:#fff">Project</a></label>
        <label><a href="client_delete_form.php" style="text-decoration:none;color:#fff">Client</a></label>
        <label><a href="requires_delete_form.php" style="text-decoration:none;color:#fff">Requires</a></label>
      </div>
      
    </div>
    <div class="dropdown4">
    <button class="dropbtn4" style = "margin-left: 50px;">Update</button>
    <br><br><br>
      <div class="dropdown-content4" style = "margin-left: 50px;">
        <label><a href="project_update.php" style="text-decoration:none;color:#fff">Project</a></label>
        <label><a href="client_update.php" style="text-decoration:none;color:#fff">Client</a></label>
        <label><a href="requires_update.php" style="text-decoration:none;color:#fff">Requires</a></label>
      </div>
    </div>
    <button class = 'button2'><a href="logout.php">Logout</a></button>
</div>

<?php



include("db_conn.php");
error_reporting(0);
$query = "select * from project";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total != 0)
{    
    ?>
    <table>
            <tr>
                <th>Project ID</th>
                <th>Name of Project</th>                
            </tr>
    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo "
        <tr>
        <td>".$result['projectId']."</td>
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