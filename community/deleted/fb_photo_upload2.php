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
	 				
				 
				  $access_token = $_SESSION['access_token'];
				  
			  $group_id = "458164160907688";
				
				echo "before:";
				//upload photo
				if (isset($_POST['title']))
					echo "title is : ".$_POST['title']; //"TITLE FOR THE VIDEO";
				
					echo "file ". $_FILES["file"]["name"];
					$file= $_FILES["file"]["name"];
					$args = array(
					   'message' => $_POST['title'],
					);
					$args[basename($file)] = realpath($file);
					echo "<br>".$args[basename($file)]."<br>";
					$ch = curl_init();
					$url = 'https://graph.facebook.com/'.$group_id.'/photos?access_token='.$access_token;
					echo $url;
					
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_HEADER, false);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
					$data = curl_exec($ch);
					//returns the photo id
					print_r(json_decode($data,true));
				
					
					?>
					 </div>
      </div>
      </div>          
</div>        
<?php include('../footer.php'); ?>
    </body>
</html>