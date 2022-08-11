<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>   
		<form action="login.php" method="post" style="background: #fff; margin-left: 350px; margin-top: 100px;">
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Username</label>
     	<input type="text" name="uname"><br>

     	<label>Password</label>
     	<input type="password" name="password"><br>

     	<button type=margin-left: 350px style="cursor : pointer;">LOGIN</button>
     	</form>

</body>
</html>