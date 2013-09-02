<?php session_start(); ?>
<!DOCTYPE HTML SYSTEM>


<html>
    <head>
		<?php include('../baseurl.php'); ?>
        <?php include('../header.php'); ?>
    </head>
    
    <body>
        <?php $id1 = 'community'; $id2 = 'fb_photo_upload'; ?>
        <?php include('../body.php'); ?>
        <?php include('../menu.php'); ?>
        
       <div id="article">
			<div class="browse">
				<h2>Share your Phtos with Sierraleoneheirtage.org <br> Community</h2>
				<div class="communityfblink">
					<p><a href="http://www.facebook.com/sierraleoneheritage" target="_blank">Facebook Community</a></p></div>
					
                    <div>
                   <?php
			 		$app_id = $AppId;// '458164160907688';
				  $app_secret = $AppSecret;//'49d12e5c8efd9f5bdc4f49db75348a3f';
				  $my_url = $baseUrl.'community/fb_photo_upload.php';
				  $code = $_REQUEST["code"];
				   // auth user
				 if(empty($code)) {
					$dialog_url = 'https://www.facebook.com/dialog/oauth?client_id=' 
					. $app_id . '&redirect_uri=' . urlencode($my_url) ;
					echo("<script>top.location.href='" . $dialog_url . "'</script>");
				  }
				
				  // get user access_token
				  $token_url = 'https://graph.facebook.com/oauth/access_token?client_id='
					. $app_id . '&redirect_uri=' . urlencode($my_url) 
					. '&client_secret=' . $app_secret 
					. '&code=' . $code;
				  // response is of the format "access_token=AAAC..."
				  $access_token = substr(file_get_contents($token_url), 13);
				  
				 // Show photo upload form to user and post to the Graph URL
				 $graph_url= "https://graph.facebook.com/".$PageId."/photos?"
				 . "access_token=" .$access_token;
		
				echo '<div class=box>';
				echo '<br>';
				echo '<form enctype="multipart/form-data" action="'.$graph_url .' "method="POST">';
				echo '<b>Photo Description: <input name="message" type="text" style="border:1px solid #CCC"> <br>';
				echo '<input name="source" type="file"><br/><br/>';
				echo '<input type="submit" value="Upload"/><br/>';
				echo '</form>';
				echo '</div>';
			  
				?>
                
                </div>
      </div>
      </div>          
</div>        
<?php include('../footer.php'); ?>
    </body>
</html>