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
					<center>
						<?php
				//printf('%.0f', (float) '8.64E+14');
	  		  $app_id = $AppId;// '110061579084393';
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
			$graph_url = "https://graph.facebook.com/458164160907688?fields=tagged&access_token=".$access_token;
			echo $graph_url;
			$data = file_get_contents($graph_url);
			$data = json_decode($data);
			echo "Data here";
			echo "<pre>";
			print_r($data);
			echo "</pre>";
			/*echo "<br>id is: ".$data->albums->data[0]->id. "<br>";
			
			$graph_url = "https://graph.facebook.com/".$data->albums->data[0]->id."/?access_token=".$access_token;
			//echo $graph_url;
			$data = file_get_contents($graph_url);
			$data = json_decode($data);
			echo "<pre>";
			print_r($data);
			echo "</pre>";	*/
			
			  // run fql query
			  $fql_query_url = 'https://graph.facebook.com/'
				. 'fql?q=SELECT+vid+FROM+video+WHERE+album_id=10151363873140868'//.$PageId
				. '&access_token=' . $access_token;
			  $fql_query_result = file_get_contents($fql_query_url);
			  $fql_query_obj = json_decode($fql_query_result, true);
			  /*echo "<pre>";
			  print_r($fql_query_obj);
			  echo "</pre>";*/
			  
					for ($i=0;$i<count($fql_query_obj["data"]); $i++)
						{
							$val = $fql_query_obj["data"][$i]["object_id"];
							echo '<a href="';
							printf('%s%.0f%s', 'https://graph.facebook.com/', (float) $val, '/picture');
							echo  '/picture" traget="_blank">';
							echo '<div  class="box thumb"><div class="wraptocenter"><span></span>';
							echo '<img style=" border:1px solid; padding:1px;" src="';
							printf('%s%.0f%s', 'https://graph.facebook.com/', (float) $val, '/picture');
							echo '/picture?type=thumbnail"></img>';
							echo "</div></div></a>";
							if (($i+1)%12 == 0)
								echo "<br>";
						}
						
						$graph_url = "https://graph.facebook.com/OfficialSonamKapoor/albums?fields=id,link,name,cover_photo&limit=500";
						 $albums = json_decode(file_get_contents($graph_url));
						$counted = sizeof ($albums->data); // get the number of albums for later use
						echo "counted = ". $counted;

			?>
					</center>
                    
                    
                     <!-- FACEBOOK ALBUM CODE -->
    <style>
        .album { list-style: none;}
        .album li { float:left; height:150px; margin-bottom:10px; text-align:center;}
        .album a { display:block; width:150px; padding:5px; margin:5px; border: 4px solid #444;}
        .album a:hover { border: 4px solid #44d;}
    </style>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>
    //fbAlbum Script courtesy of zach@lysobey.com | http://zach.lysobey.com/projects/fbalbum
    (function($){$.fn.fbAlbum=function(f){var g=this;var h={'albumID':10150302289698306,'limit':100,'ulClass':'album','callback':'','title':true};if(f){$.extend(h,f)}var i="https://graph.facebook.com/"+h.albumID+"/photos?limit="+h.limit+"&callback=?";$.getJSON(i,function(a){var b=[];for(var c in a){for(var d in a[c]){val2=a[c][d];if(typeof(val2.source)!="undefined"){var e="";if(h.title&&val2.name){e=val2.name}b.push('<li><a class="imageLink" rel="group" href="'+val2.source+'"><img src="'+val2.picture+'" title="'+e+'"/></a></li>')}}};$('<ul />',{'class':h.ulClass,html:b.join('')}).appendTo(g);if(h.callback){h.callback()}});return this}})(jQuery);	
    $(document).ready(function() { 
        $('#FBalbum').fbAlbum({
            'albumID':10150302289698306 
        }); 
    });
    </script>
  <!-- END FACEBOOK ALBUM CODE -->
  
  <div id="FBalbum"></div> 
				</div>
			</div>

                    
        <?php include('../footer.php'); ?>
    </body>
</html>