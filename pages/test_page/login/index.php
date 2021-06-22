<!DOCTYPE html>
<html lang="GE">
<head>
	<title>ბიზნესისა და ტექნოლოგიების აკადემია</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="backgroundcolor">
<div class="auth-bindermaya">
	<div class="wrappermaya">
		<div class="identationmaya">
			<img src="../img/bta.png" width="80" class="imgmaya">
			 <div class="academymaya">
				<p class="titlemaya">Academy of Business and Technology</p>
				<h1 class="title2maya">ბიზნესისა და ტექნოლოგიების აკადემია</h1>
			</div><!-- and of academy -->
		</div><!-- // end of .identation -->
		<form class="authenticationmaya" action="#" method="post">
			<fieldset>
				<div class="authomaya">
					<h1 class="authomaya">ავტორიზაცია</h1>
				</div><!--and of autho -->
				<legend>ავტორიზაცია : სამომხმარებლო მონაცემები</legend>
				<div class="rowmaya">
					<label for="username">მომხმარებელი</label>
					<input type="text" name="username" id="username" placeholder="ID">
				</div>
				<div class="rowmaya">
					<label for="pwd">პაროლი</label>
					<input type="password" name="pwd" id="pwd" placeholder="Password">
				</div>
				<a type="submit" class="buttonmaya" href="<?php echo BASE_URL; ?>student_page/index.php?student=1">შესვლა</a>
			</fieldset>
		</form>
	</div><!-- // end of .wrapper -->
</div><!-- // end of .auth-binder --
</body>
</html>