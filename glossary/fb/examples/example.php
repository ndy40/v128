<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require '../src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '198579593521219',
  'secret' => '6f45ae533ff7fc0b856bbcd6d13576f9',
  'perms' => 'offline_access, user_groups, publish_stream',
  'cookie' => true
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

// This call will always work since we are fetching public data.
$naitik = $facebook->api('/naitik');

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <h1>php-sdk</h1>

    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif ?>

    <h3>PHP Session</h3>
    <pre><?php print_r($_SESSION); ?></pre>

    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>


	<?php
	
	


	            try { //$user
                /*$publishStream = $facebook->api("/104060172993181/feed", 'post', array(
                    'message' => "Testing new API", 
                    'link'    => 'http://www.sierraleoneheritage.org/browse/item/index.php?id=SLNM.1946.01.02&object=Sowei%20Mask&museum=slnm',
                    'picture' => 'http://www.sierraleoneheritage.org/objects/slnm/Medium/SLNM.1946.01.02.pic1.jpg',
                    'name'    => 'Sierraleoneheritage.org',
                    'description'=> 'Sierraleoneheritage.org is comments feed'
                    )					
                );*/
				//$dialog_url = "http://www.facebook.com/dialog/oauth?client_id=198579593521219&redirect_uri=" . urlencode($my_url) . "&state=". $_SESSION['state']
				echo '<script>
				FB.login(
				if (window.open("http://www.facebook.com/login.php?api_key=198579593521219&connect_display=popup&v=1.0&next=http://www.facebook.com/connect/login_success.html&cancel_url=http://www.facebook.com/connect/login_failure.html&fbconnect=true&return_session=true&session_key_only=true&req_perms=read_stream,publish_stream,offline_access"))
					//window.open("http://www.facebook.com/connect/prompt_permissions.php?api_key=198579593521219&v=1.0&next=http://www.facebook.com/connect/login_success.html?xxRESULTTOKENxx&display=popup&ext_perm=publish_stream&enable_profile_selector=1&profile_selector_ids=104060172993181");
				);
				</script>';
			
				
				echo ($facebook->getAccessToken());
				$result = $facebook->api(
						 '/104060172993181/feed/',
						  'post',
						  array('access_token' => $facebook->getAccessToken(), 'message' =>  'Playing around with FB Graph..')
					);
					
					
			
					//$facebook->api_client->stream_publish('INSERT_STATUS_HERE',null,null,null,'104060172993181');


                //as $_GET['publish'] is set so remove it by redirecting user to the base url 
            } catch (FacebookApiException $e) {
                echo($e);
            }
            //$redirectUrl     = $fbconfig['baseurl'] . '/index.php?success=1';
           // header("Location: $redirectUrl");
	
	
	?>
	
	
  <br/>  <?php echo 'end';//$naitik['name']; ?>
  </body>
</html>
