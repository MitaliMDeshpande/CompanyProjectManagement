<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
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
     <form action="requires_insert.php" method="post" style="margin-left : auto;margin-top: auto; margin-right: auto; margin-bottom: auto;">
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>          

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Client ID</label>
          <?php if (isset($_GET['ClientId'])) { ?>
               <input type="text" 
                      name="ClientId"                       
                      value="<?php echo $_GET['ClientId']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="ClientId" ><br>
          <?php }?>

          <label>Project ID</label>
          <?php if (isset($_GET['ProjectId'])) { ?>
               <input type="text" 
                      name="ProjectId" 
                      value="<?php echo $_GET['ProjectId']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="ProjectId" ><br>
          <?php }?>

          <label>Start date</label>
          <?php if (isset($_GET['startdate'])) { ?>
               <input type="date" 
                      name="startdate" 
                      value="<?php echo $_GET['startdate']; ?>"><br>
          <?php }else{ ?>
               <input type="date" 
                      name="startdate" ><br>
          <?php }?>

          <label>End date</label>
          <?php if (isset($_GET['enddate'])) { ?>
               <input type="date" 
                      name="enddate"                  
                      value="<?php echo $_GET['enddate']; ?>"><br>
          <?php }else{ ?>
               <input type="date" 
                      name="enddate" ><br>

          <?php }?>     	

     	<button type="submit">Insert</button>          
     </form>
</body>
</html>