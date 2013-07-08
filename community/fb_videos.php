<!DOCTYPE HTML SYSTEM>


<html>
    <head>
		<?php include('../baseurl.php'); ?>
        <?php include('../header.php'); ?>
    </head>
    
    <body>
        <?php $id1 = 'community'; $id2 = 'fb_video'; ?>
        <?php include('../body.php'); ?>
        <?php include('../menu.php'); ?>
        
        
        
        
        <div id="article">
			<div class="browse">
				<h2>Sierra Leone Heritage Community Video Gallery</h2>
				<div class="communityfblink">
					<p><a href="http://www.facebook.com/sierraleoneheritage" target="_blank">Facebook Community</a></p></div>
					
			<?php
				//printf('%.0f', (float) '8.64E+14');
	  		  $app_id = $AppId;// '458164160907688';
			  $app_secret = $AppSecret;//'49d12e5c8efd9f5bdc4f49db75348a3f';
			  $my_url = $baseUrl.'community/fb_videos.php';
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
			
			//100004884553801
			$graph_url = "https://graph.facebook.com/".$PageId."?fields=tagged&limit=100&access_token=".$access_token;
			//echo $graph_url;
			$data = file_get_contents($graph_url);
			$data = json_decode($data);
			for ($i=0;$i<count($data->tagged->data); $i++)
				{
				if ($data->tagged->data[$i]->type == "video")
					{
				
						echo "<div style='font-size: 9pt;' >";
						
						
						echo "<a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'>";
						echo "<div  class='box thumb' style= 'border-width: 1px; border-style: dashed; border-color:black;'  ><div class='wraptocenter'>";
						echo "<img alt='view' style='border:1px solid; max-width:150px' src='".$data->tagged->data[$i]->picture ."'></img>";
						echo "</div></div></a>";
						
						echo "<a href='http://www.facebook.com/'".$data->tagged->data[$i]->from->id.">";
						echo "<div class='box' style='height:140px;'><span>";
						echo "<div class='box thumb' style='height:50px; width:50px; float:left'> ";
						echo "<img src='https://graph.facebook.com/".$data->tagged->data[$i]->from->id."/picture?type=small'></img></div>";
						echo " ".$data->tagged->data[$i]->from->name."(sharer)<br><br>";
						echo "</a>";
						
						echo "Message: ".$data->tagged->data[$i]->message."<br><br>Description: ". $data->tagged->data[$i]->name.  "<br><br>";
						
						if (count($data->tagged->data[$i]->likes->data) > 0)
						{
							echo count($data->tagged->data[$i]->likes->data)." Likes: ";
							for ($j=0;$j< count($data->tagged->data[$i]->likes->data); $j++)
								{
									echo "<a href='http://www.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id."'>";
									echo $data->tagged->data[$i]->likes->data[$j]->name;
									echo ", </a>";
								}
								echo "<br><br>";
							for ($j=0;$j< count($data->tagged->data[$i]->likes->data); $j++)
								{
									echo "<div class='box thumb' style='height:40px; width:40px; float:left'> ";
									echo "<a href='http://www.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id."'>";
									echo "<img src='https://graph.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id. "/picture?type=small' alt='view' width=40px height=40px></img>";
									//echo $data->tagged->data[$i]->likes->data[$j]->name.", ";
									echo "</a></div>";
								}
						}
						echo "</span></div>";
						
						echo "</div>";
					}//echo "<video width='320' height='240' controls src='".$data->tagged->data[$i]->source ."'></video>";	
				/*else if ($data->tagged->data[$i]->type == "photo")		
					echo "<br><img width='320' height='240' src='".$data->tagged->data[$i]->picture ."'></img>";*/		
				}
			
			/*echo "<br>Data here";
			echo "<pre>";
			print_r($data);
			echo "</pre>";*/

			?>
					
                    
    		
	</div>
             
                    
        <?php include('../footer.php'); ?>
    </body>
</html>