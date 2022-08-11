<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="insert.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>          

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Roll number</label>
          <?php if (isset($_GET['rollnumber'])) { ?>
               <input type="text" 
                      name="rollnumber" 
                      placeholder="Roll number"
                      value="<?php echo $_GET['rollnumber']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="rollnumber" 
                      placeholder="Roll number"><br>
          <?php }?>

          <label>Marks</label>
          <?php if (isset($_GET['marks'])) { ?>
               <input type="text" 
                      name="marks" 
                      placeholder="Marks"
                      value="<?php echo $_GET['marks']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="marks" 
                      placeholder="Marks"><br>
          <?php }?>

     	<!-- <label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br> -->

     	<button type="submit">Sign Up</button>
          <!-- <a href="index.php" class="ca">Already have an account?</a> -->
     </form>
</body>
</html>