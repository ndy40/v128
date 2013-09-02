<!DOCTYPE HTML SYSTEM>
<?php include('baseurl.php'); ?>

<html>

  
    <head>
        <?php include('header.php'); ?>
       <link rel="stylesheet" href="<?php echo $assetsUrl . 'css/video-js.css' ?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $assetsUrl . 'js/colorbox/colorbox/colorbox.css' ?>" type="text/css" media="screen" />
		<script src="<?php echo $assetsUrl . 'js/colorbox/colorbox/jquery.colorbox.js'?>"></script>
    
	<script>
            $(document).ready(function(){
                $(".example7").colorbox({width:"740px", height:"580px", iframe:true});
                $("#click").click(function() {
                    $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                    return false;
                });
            });
	</script>
        <script language="JavaScript">
            var ids = new Array('1','2','3');
			var viewLarger = $item['MediaObjects'][0]['Media'];

            function switchid(id) {
                hideallids();
                showdiv(id);
            }

            function hideallids() {
                for(var i=0;i<ids.length;i++) {
                    hidediv(ids[i]);
                }
            }

            function hidediv(id) {
                if(document.getElementById) {
                    document.getElementById(id).style.display = 'none';
                } else {
                    if(document.layers) {
                        document.id.display = 'none';
                    } else {
                        document.all.id.style.display = 'none';
                    }
                }
            }

            function showdiv(id) {
                if(document.getElementById) {
                    document.getElementById(id).style.display = 'block';
                } else {
                    if(document.layers) {
                        document.id.display = 'block';
                    } else {
                        document.all.id.style.display = 'block';
                    }
                }
            }

            function switchImage(id) {
                var mainImg = $('#MediaObject').attr('src');
                var altImg = $('#MediaObject' + id).attr('src');

                // make the main image small and the other img medium
                mainImg = mainImg.replace('/medium/', '/small/');
                altImg = altImg.replace('/small/', '/medium/');

                // swap the images
                $('#MediaObject').attr('src', altImg);
                $('#MediaObject' + id).attr('src', mainImg);

                // modify the 'view larger' link to display large version of image
                var largeImg = altImg.replace('/thumbs/medium/', '/');
                $('#ViewLarger').attr('href', largeImg);
            }
        </script>
    </head>
    
    <?php $id1 = 'browse'; $id4 = 'associatedmedia'; ?>
    
    <body>
        <?php include('body.php'); ?>
        <?php include('menu.php'); ?>
    
      
        <div id="article" style="min-height:700px;">
            <div class="twoCol c">
                <div class="banner item">
                    <div class="box" style="min-height:250px;">
                        <div style="display:block;">
                        <?php
							$num = 0;
                        	if ($item['MediaObjects'][0]['MediaType'] =='Image')
								$num =0;
							else
								$num = 1;
						
						?>
                            <img id="MediaObject" src="<?php 
								echo $item['MediaObjects'][$num]['ThumbMedium']; 
							?>" />
                               
                               
                                   
                                      	 <p class="larger">
                                            <a href="<?php 
                                                echo $item['MediaObjects'][$num]['ThumbLarge']; 
                                            ?>" id="ViewLarger" class="lightbox">View larger</a>
                                    	</p>
                                   <br> <br>
									                          
                            
                            <center>
                            
                                <?php for($i=$num +1; $i<sizeof($item['MediaObjects']); $i++) : ?>
                                    <?php if(strtolower($item['MediaObjects'][$i]['MediaFileName']) != (string) 'no data') : ?>
                                    <a href="javascript:switchImage(<?php echo $i; ?>)"><img id="MediaObject<?php echo $i; ?>" src="<?php echo $item['MediaObjects'][$i]['ThumbSmall'] ?>" style="width:80px; height:80px;" /></a>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="twoCol d">
                <h3><?php echo $item['Object'] ?></h3>
                <p>
                    <?php if (strtolower($item['MediaObjects'][0]['MediaType']) == (string) 'audio') : ?>
                            <div class="box">
                                <center>
                                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="375" height="27" id="player1" name="player1">
                                        <param name="movie" value="<?php echo $baseUrl . 'player.swf?audioUrl=' . $item['MediaObjects'][0]['Media'] . '.mp3'?>" />
                                        <param name="allowfullscreen" value="true" />
                                        <param name="allowscriptaccess" value="always" />
                                        <param name="flashvars" value="file=playlist.xml&dock=true" />
                                        <embed width="375" height="27" id="player1" name="player1"type="application/x-shockwave-flash" wmode="transparent" src="<?php echo $baseUrl . 'player.swf?audioUrl=' . strtolower($item['MediaObjects'][0]['Media']) . '.mp3'?>" />
                                    </object>
                                </center>
                            </div>
                    <?php endif; ?>
                    <?php if(strlen($item['Description']) < 235) { ?>
                        <div id="1" style="display:block;">
                            <p>
                                <?php echo $item['Description'] ?>
                            </p>
                        </div>
                    <?php } else { ?>
                        <div id="3" style="display:block;">
                            <p>
                                <?php 
                              
                                    $result = preg_split('/ /', $item['Description'], -1, PREG_SPLIT_NO_EMPTY);
									for($counter=0; $counter<40 && $counter < count($result); $counter+=1) { 
										echo $result[$counter];
										echo ' ';
									}
										
											
                                ?>
                                ...[<a href="javascript:switchid(2);">more</a>]
                            </p>
                        </div>
                    <?php } ?>
                </p>
                <div id="1" style="display:none;">
                    <p>
                        <?php echo $item['Description'] ?>
                    </p>
                </div>
                <div id="2" style="display:none;">
                    <p>
                        <?php echo $item['Description'] ?>
                        <a href="javascript:switchid(3);">[less]</a>
                    </p>
                </div>
                <br />
                <div class="box">
                    <h3 class="boxedTitle">Further Information</h3>
                  
                    <ul class="furtherinfo_body" style="display:none">
                        <li><span>Object: </span><?php echo $item['Object'] ?></li>
                        <li><span>Materials: </span><?php echo $item['Materials'] ?></li>
                        <li><span>Culture Group: </span><?php echo $item['CultureGroup'] ?></li>
                        <li><span>Dimensions: </span><?php echo $item['Dimensions'] ?></li>
                        <li><span>Production Date: </span><?php echo $item['ProductionDate'] ?></li>
                        <li><span>Associated Places: </span><?php echo $item['AssociatedPlaces'] ?></li>
                        <li><span>Associated People: </span><?php echo $item['AssociatedPeople'] ?></li>
                        <li><span>Museum: </span><?php echo $item['Museum'] ?></li>
                        <li><span>Accession Number: </span><?php echo $item['AccessionNumber'] ?></li>
                    </ul>
                   
                    <p class="center"><a href="#" class="furtherinfo_view">View &#8595;</a><a href="#" class="furtherinfo_hide" style="display:none">Hide &#8593;</a></p>
                </div>
            </div> 
        
           <?php
			$page_url = "http://". $_SERVER["SERVER_NAME"].''.$_SERVER["REQUEST_URI"];
			
		   ?>
  
        <div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo $AppId; ?>";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        
        <div class="fb-like" data-href="<?php echo $page_url; ?>" data-send="true" data-width="450" data-show-faces="true" >
        </div><br/> 
            <!-- Related Items -->
            <div class="box">
                <h3 class="boxedTitle">Related Objects</h3>
                <div class="thumbBrowse">
                    <a href="#" class="left hideText">left</a>
                    <div class="thumbsContainer">
                        <div class="thumbs">
                            <?php for($i=0; $i<sizeof($related_items); $i++): ?>
                            <a href="<?php echo $baseUrl . 'index.php/item/item' . $db_type . '/index/' . bin2hex($related_items[$i]['AccessionNumber']."___". $related_items[$i]['Museum']) ?>">
                                <img src="<?php echo $related_items[$i]['MediaObjects'][0]['ThumbSmall'] ?>" alt="<?php echo $related_items[$i]['Object'] ?>" />
                            </a>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <a href="#" class="right hideText" rel="<?php echo ($baseUrl . 'index.php/item/item' . $db_type . '/ajax_get_items/' . bin2hex($item['AccessionNumber'])); ?>">right</a>
                </div>
            </div>
               
	
			<?php 
			require 'fb/src/facebook.php';
	
		
			$facebook = new Facebook(array(
			  'appId'  => '<?php echo $AppId; ?>',
			  'secret' => '<?php echo $AppSecret; ?>',
			  'perms' => 'offline_access, user_groups, publish_stream'
			));
			
			// destroy any previous sessions
			$facebook->destroySession();
			// Get User ID
			$user = $facebook->getUser();
			
			?>
           <script src="http://connect.facebook.net/en_US/all.js"></script>
			<div id="fb-root"></div>
			<script>
			  // assume we are already logged in
			  API_ID = '<?php echo $AppId; ?>';
			  PAGE_ID = '<?php echo $PageId; ?>';
			  
				FB.init({appId: API_ID, xfbml: true, cookie: true, oauth: true});
				FB.provide("UIServer.Methods",
					{ 'permissions.request' : { size : {width: 575, height: 300}, 
					url: 'connect/uiserver.php',
					transform : FB.UIServer.genericTransform }
					} );
			</script>
			<?php
	
				error_reporting(0);
				echo '<div class="fb-comments" data-href="'.$page_url.'" data-width="700" data-num-posts="10"></div>';
				//echo '<div id="itemfbpost"><fb:comments xid="'. $page_url.'" numposts="2" notify="true" width="675" href="'. $page_url.'" ></fb:comments></div>';
				//$facebook->api('458164160907688/feed', 'POST', array('message' => 'Testing...'));
				echo 'feed submited';
						?>			 
	<script>
			FB.init({appId:  API_ID, status: true, cookie: true});
			
			  window.fbAsyncInit = function() {
				/* All the events registered */
				FB.Event.subscribe('comment.create', function(response)
				{
					CurrentUrl = "<?php echo $_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'] ?>";
					ImageUrl = "<?php echo $item['MediaObjects'][0]['Media'] ?>";
					
					FB.login(function(response) {
					   if (response.authResponse) {
						 FB.api('/'+PAGE_ID, function(response) {
						 });
					   } else {
							alert ("Your comments are not shared with Facebook community either due Popup bloker on your browser or you did not authorize to do this!");
					   }
					 }, {scope: 'offline_access,publish_stream'});	
					 
					//	alert ("StreamPublish method");
					var commentQuery = FB.Data.query("SELECT text, fromid FROM comment WHERE post_fbid='" + response.commentID + "' AND object_id IN (SELECT comments_fbid FROM link_stat WHERE url='" + response.href + "')"); 
					
				var userQuery = FB.Data.query("SELECT name FROM user WHERE uid in (select fromid from {0})", commentQuery); 
				FB.Data.waitOn([commentQuery, userQuery], function () 
				{ 
					var commentRow = commentQuery.value[0]; 
					var userRow = userQuery.value[0]; 
			   streamPublish(commentRow.text,"<?php echo $item['Object'] ?>",CurrentUrl,"<?php echo $item['Description'] ?>",ImageUrl);
				}); 
				
				});
				function streamPublish(Message, ObjectName,  Href, Description, ImageUrl){ 
					//	alert ('Message : '+ Message + ' Object Name : '+ ObjectName +' HREF : '+  Href+ ' Description : '+  Description+ ' Image URL : '+ ImageUrl);
						/*FB.ui(
						  {
							method: 'feed',
							name: ObjectName,
							link: Href,
							picture:  ImageUrl,
							caption: Description ,
							description: Message,
							to: '458164160907688'//PAGE_ID
						  },
						  function(response) {
							if (response && response.post_id) {
							 // alert('Post was published.');
							} else {
							  alert('Your post is not published on Sierraleoneheritage Facebook page.');
							}
						  }
						);
*/

       
  
             //Post To WooTube Group
			var params = {};
			params['message'] = Message;
			params['name'] = ObjectName;
			params['description'] = Description;
			params['link'] = Href;
			params['picture'] = ImageUrl;
			params['caption'] = 'An object from www.sierraleoneheritage.org collection';

             FB.api('/'+PAGE_ID+'/feed', 'post', params, function(response) {
               if (!response || response.error) {
                 alert('You have to join the group first!' +ImageUrl);

              } else {
                 alert("Your comments are also shared with Sierra Leone Heritage facebook group");

               }
             });
					//alert(FB.getAuthResponse()['accessToken']);
						}
				  };

				  (function() {
					var e = document.createElement('script');
					e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
					e.async = true;
					document.getElementById('fb-root').appendChild(e);
				  }());
			</script>	
			
        </div>
	
        <?php include('footer.php'); ?>
    </body>
</html>