<?php
session_start();
// =========== google =============
//include_once 'google-config.php';
include_once 'google-login.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Google Login</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<br>
	<?php 
		if(isset($_SESSION['token'])){
			?>
			<div class="profile">
				<div class="profileImage">
					<img src="<?php echo $pictureURL; ?>" alt="">
				</div>
				<div class="detail">
					<p>ID : <?php echo $id; ?></p>
					<p>Name : <?php echo $name; ?></p>				
					<p>Firstname : <?php echo $first_name; ?></p>
					<p>Lastname : <?php echo $last_name; ?></p>
					<p>Email : <?php echo $email; ?></p>
					<p>Link : <a href="<?php echo $link; ?>">Social Link</a></p>
					<p>Gender : <?php echo $gender; ?></p>
					<p>Locale : <?php echo $locale; ?></p>
				</div>

				<div class="btn">
			        <a href="logout_api.php" class="logout" id="google">
			        	Logout
			        </a>
			    <div>
			</div>
			

	        <?php


	        echo '

	        ';
    	}else{
    		echo '
			<div class="frame-login">
    			<a href="'.$gloginUrl.'" class="login" id="google">Login with Google</a>
			</div>
    		';
    	}

	 ?>

	
</body>
</html>