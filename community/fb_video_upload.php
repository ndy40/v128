<!DOCTYPE HTML SYSTEM>


<html>
    <head>
		<?php include('../baseurl.php'); ?>
        <?php include('../header.php'); ?>
    </head>
    
    <body>
        <?php $id1 = 'community'; $id2 = 'fb_video_upload'; ?>
        <?php include('../body.php'); ?>
        <?php include('../menu.php'); ?>
        
       <div id="article">
			<div class="browse">
				<h2>Share your Videos with Sierraleoneheirtage.org <br> Community</h2>
				<div class="communityfblink">
					<p><a href="http://www.facebook.com/sierraleoneheritage" target="_blank">Facebook Community</a></p></div>
					
                    <div>
                <?php
				 $app_id = $AppId;// '458164160907688';
				  $app_secret = $AppSecret;//'49d12e5c8efd9f5bdc4f49db75348a3f';
				  $my_url = $baseUrl.'community/fb_video_upload.php';
				  $code = $_REQUEST["code"];
				   // auth user
				 if(empty($code)) {
					$dialog_url = 'https://www.facebook.com/dialog/oauth?client_id=' 
					. $app_id . '&redirect_uri=' . urlencode($my_url). '&scope=video_upload,publish_actions';
					echo("<script>top.location.href='" . $dialog_url . "'</script>");
				  }
				
				  // get user access_token
				  $token_url = 'https://graph.facebook.com/oauth/access_token?client_id='
					. $app_id . '&redirect_uri=' . urlencode($my_url) 
					. '&client_secret=' . $app_secret 
					. '&code=' . $code
					. '&scope=video_upload,publish_actions';
				  // response is of the format "access_token=AAAC..."
				  $access_token = substr(file_get_contents($token_url), 13);
			  
				
				if (isset($_POST['title']))
					$video_title = $_POST['title']; //"TITLE FOR THE VIDEO";
				if (isset($_POST['description']))// 
					$video_desc = $_POST['description'];//"DESCRIPTION FOR THE VIDEO";
				
				$group_id = $PageId;
				echo $video_title.' '.$video_desc ;
				$post_url = "https://graph-video.facebook.com/" . $group_id . "/videos?"
                   . "title=" . $video_title. "&description=" . $video_desc
                   . "&access_token=". $access_token. '&scope=video_upload,publish_actions';
                
				echo '<div class=box>';
				echo '<br>';
                echo '<form enctype="multipart/form-data" action=" '.$post_url.' "  
                     method="POST">';
				echo '<b>Title of Video: <input name="title" type="text" style="border:1px solid #CCC"> <br>';
				echo 'Description: &nbsp;&nbsp; <input name="description" type="text" style="border:1px solid #CCC"><br></b>';
				
                //echo 'Please choose a file:';
                echo '<input name="file" type="file"> <br>';
				
                echo '<center> <input type="submit"  value=" Upload " /></center>';
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