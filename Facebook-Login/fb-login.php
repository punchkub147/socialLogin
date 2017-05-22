<?php
 
 if(isset($accessToken)){
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        
          // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
        
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        
        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    
    // Redirect the user back to the same page if url has "code" parameter in query string
    if(isset($_GET['code'])){
        header('Location: ./');
    }
    
    // Getting user facebook profile info
    try {
        $profileRequest = $fb->get('/me?fields=id,name,first_name,last_name,email,link,gender,locale,picture');
        $fbUserProfile = $profileRequest->getGraphNode()->asArray();

        $id = $fbUserProfile['id'];
        $name = $fbUserProfile['name'];
        $first_name = $fbUserProfile['first_name'];
        $last_name = $fbUserProfile['last_name'];
        $email = $fbUserProfile['email'];
        $link = $fbUserProfile['link'];
        $gender = $fbUserProfile['gender'];
        $locale = $fbUserProfile['locale'];
        $picture = $fbUserProfile['picture'];
        $pictureURL = $picture['url'];

        require 'connect_db.php';
        $sql = "SELECT social_id
                FROM 13570110
                WHERE social_id = '$id';
                ";
                $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        while ($get_users = $result->fetch_assoc()) {
                            
                            //echo "Logined by Facebook";
                        }
                    }else{
                        $sql = "INSERT INTO 13570110(social_id,name,first_name,last_name,email,link,gender,locale,picture)
                                VALUES ('$id','$name','$first_name','$last_name','$email','$link','$gender','$locale','$pictureURL')
                        ";
                        if ($mysqli->query($sql) === TRUE) {
                            echo "Registered by Facebook";
                        } else {
                            echo "Error: " . $sql . "<br>" . $mysqli->error;
                        }
                    }
        $mysqli->close();

    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    // ข้อมูลมาแล้วทำตรงนี้
    
}else{
    $fbloginUrl = $helper->getLoginUrl($fbRedirectURL, $fbPermissions);
    // echo '<a href="'.$fbloginUrl.'">Login with Facebook</a>';
}


?>
