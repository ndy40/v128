<!DOCTYPE HTML SYSTEM>
<?php include('../baseurl.php'); ?>

<html>
    <head>
        <?php include('../header.php'); ?>
        <script src="http://connect.facebook.net/en_US/all.js#appId=198579593521219&amp;xfbml=1"></script>
    </head>
    
    <body>
        <?php $id1 = 'community';  $id2 = 'fb_members'; ?>
        <?php include('../body.php'); ?>
        <?php include('../menu.php'); ?>
        
        <div id="article">
           <h2>Community Members </h2>
          <?php
	  		  $app_id = $AppId;//'110061579084393';
			  $app_secret = $AppSecret;//'49d12e5c8efd9f5bdc4f49db75348a3f';
			  $my_url = $baseUrl.'community/fb_members.php';
			
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
				. 'fql?q=SELECT+uid+FROM+group_member+WHERE+gid=473379929370894'
				. '&access_token=' . $access_token;
			  $fql_query_result = file_get_contents($fql_query_url);
			  $fql_query_obj = json_decode($fql_query_result, true);
			
			//$query_result = file_get_contents($photos);
			 //echo '<br><img src="'.$photo.'"></img>';
			  // display results of fql query
			  /*echo '<pre>';
			  print_r("query results:");
			  print_r($fql_query_obj);
			  echo '</pre>';*/
				 // echo "Count of fql_query_obj". count($fql_multiquery_obj);
				//  echo count($fql_query_obj);
					
					echo "<div class='box' ><span>";
					for ($i=0;$i<count($fql_query_obj["data"]); $i++)
						{
							$picture= 'https://graph.facebook.com/'. $fql_query_obj["data"][$i]["uid"].'/picture';
							$profile_url = 'http://www.facebook.com/'. $fql_query_obj["data"][$i]["uid"];
							//$query_result = file_get_contents($photos);
							echo '<a href="'.$profile_url. '" target="_blank" >';
							echo '<img style="border:1px solid; padding:10px;"src="'.$picture.'"></img>';
							echo '</a> ';
							
						}
						echo '</span></div>';
						
					
			?>
						
                            
               <!--
				<center>
					<div class="fb-like-box" data-href="http://www.facebook.com/pages/Sierra-Leone-Heritage/104060172993181" data-width="700" data-height="1000" data-show-faces="true" data-stream="true" data-header="false"></div>
				</center>
               -->
              
			</p>
        </div>

        
        <?php include('../footer.php'); ?>
    </body>
</html>
