<?php
include_once 'google-config.php';

if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
}
if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}
if ($gClient->getAccessToken()) {
    $gUserProfile = $google_oauthV2->userinfo->get();
    // ข้อมูลมาแล้วทำตรงนี้

        $id = $gUserProfile['id'];
        $name = $gUserProfile['name'];
        $first_name = $gUserProfile['given_name'];
        $last_name = $gUserProfile['family_name'];
        $email = $gUserProfile['email'];
        $link = $gUserProfile['link'];
        $gender = $gUserProfile['gender'];
        $locale = $gUserProfile['locale'];
        $pictureURL = $gUserProfile['picture'];

        require 'connect_db.php';
        $sql = "SELECT social_id
                FROM u13570110
                WHERE social_id = '$id';
                ";
                $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        while ($get_users = $result->fetch_assoc()) {
                            
                            //echo "Logined by Google";
                        }
                    }else{
                        $sql = "INSERT INTO u13570110(social_id,name,first_name,last_name,email,link,gender,locale,picture)
                                VALUES ('$id','$name','$first_name','$last_name','$email','$link','$gender','$locale','$pictureURL')
                        ";
                        if ($mysqli->query($sql) === TRUE) {
                            echo "Registered by Google";
                        } else {
                            echo "Error: " . $sql . "<br>" . $mysqli->error;
                        }
                    }
        $mysqli->close();


}else{
	// echo '<a href="'.$gloginUrl.'">Login with Google</a>';
}

?>