<?php
session_start();
// =========== facebook ===========
include_once('fb-config.php');
include_once('fb-login.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facebook Login</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php 
		if(isset($_SESSION['facebook_access_token'])){

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
			        <a href="logout_api.php" class="logout" id="facebook">
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
    			<a href="'.$fbloginUrl.'" class="login" id="facebook">Login with Facebook</a>
			</div>
    		';
    	}

	 ?>

	
</body>
</html>