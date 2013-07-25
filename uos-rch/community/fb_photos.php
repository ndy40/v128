<?php //session_unset();
session_start(); ?>
<?php include('../baseurl.php'); ?>
<!DOCTYPE HTML SYSTEM>
<html>
    <head>
        <?php include('../header.php'); ?>
    </head>
    <body>
        <?php $id1 = 'community'; $id2 = 'fb_photos'; ?>
        <?php include('../body.php'); ?>
        <?php include('../menu.php'); ?>
        <div id="article">
            <div class="browse">
                <h2>Sierra Leone Heritage Community Photo Gallery</h2>
				<div class="communityfblink"><p><a href="http://www.facebook.com/sierraleoneheritage" target="_blank">Facebook Community</a></p></div>

				<?php
				//printf('%.0f', (float) '8.64E+14');
	  		  $app_id = $AppId;//'110061579084393';
			  $app_secret = $AppSecret;//'49d12e5c8efd9f5bdc4f49db75348a3f';
			  $my_url = $baseUrl.'community/fb_photos.php';
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
			
			  // run fql query
			  $fql_query_url = 'https://graph.facebook.com/'
				. 'fql?q=SELECT+object_id+FROM+photo_tag+WHERE+subject='.$PageId
				. '&access_token=' . $access_token;
			  $fql_query_result = file_get_contents($fql_query_url);
			  $fql_query_obj = json_decode($fql_query_result, true);
			  		echo "<pre>";
					print_r($fql_query_obj);
					echo "</pre>";
					for ($i=0;$i<count($fql_query_obj["data"]); $i++)
						{
							$val = $fql_query_obj["data"][$i]["object_id"];
							echo '<a traget="_blank" href="';
							printf('%s%.0f%s', 'http://www.facebook.com/', (float) $val, '');
							echo  '" >';
							echo '<div  class="box thumb"><div class="wraptocenter"><span></span>';
							
							
							echo '<img style=" border:1px solid; padding:1px;" src="';
							printf('%s%.0f%s', 'https://graph.facebook.com/', (float) $val, '/picture');
							echo '/picture?type=thumbnail"></img>';
							echo "</div></div></a>";
							if (($i+1)%12 == 0)
								echo "<br>";
						}
			?>

			</div>
		</div>
            <a target="new"
        <?php include('../footer.php'); ?>
    </body>
</html>
