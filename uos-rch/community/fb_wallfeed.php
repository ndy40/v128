<?php //session_unset();
session_start(); ?>
<!DOCTYPE HTML SYSTEM>
<?php include('../baseurl.php'); ?>

<html>
    <head>
        <?php include('../header.php'); ?>
    </head>
    
    <body>
        <?php $id1='community'; $id2 = 'fb_wallfeed'; ?>
        <?php include('../body.php'); ?>
        <?php include('../menu.php'); ?>
        
        <div id="article">
            <h2>Sierra Leone Heritage Community Wall</h2>
			<div class="communityfblink"><p><a href="<?php echo $group_url; ?>" target="_blank">Facebook Community</p></a></div>
                <div>
	
    			<?php
				//printf('%.0f', (float) '8.64E+14');
					  $app_id = $AppId;// '458164160907688';
					  $app_secret = $AppSecret;//'49d12e5c8efd9f5bdc4f49db75348a3f';
					  $my_url = $baseUrl.'community/fb_wallfeed.php';
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
								echo "<div class='box'   >";
								echo "<div align='center'><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'>";
								echo "<img alt='view' style='border:1px solid; max-width:150px' src='".$data->tagged->data[$i]->picture ."'></img>";
								echo "</a></div>";
								echo "<p>Shared by:<a href='http://www.facebook.com/'".$data->tagged->data[$i]->from->id.">";
								echo "<br><img src='https://graph.facebook.com/".$data->tagged->data[$i]->from->id."/picture?type=small'></img>";
								echo "<br>".$data->tagged->data[$i]->from->name."";
								echo "</a>";
								
								if (isset($data->tagged->data[$i]->message))
									echo "<br>Message: ".$data->tagged->data[$i]->message."";
								if (isset($data->tagged->data[$i]->name))
									echo "<br>Description: ". $data->tagged->data[$i]->name ;
								
								if (count($data->tagged->data[$i]->likes->data) > 0)
								{
									echo "<p><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'><b>".count($data->tagged->data[$i]->likes->data)." Likes:</b> </a></p> ";
									for ($j=0;$j< count($data->tagged->data[$i]->likes->data); $j++)
										{
											echo "<a href='http://www.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id."'>";
											echo "<img src='https://graph.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id. "/picture?type=small' alt='view' width=40px height=40px></img>";
											echo "</a>";
										}
									echo "<br><p>";
									for ($j=0;$j< count($data->tagged->data[$i]->likes->data); $j++)
										{
											echo "<a href='http://www.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id."'>";
											echo $data->tagged->data[$i]->likes->data[$j]->name;
											echo ", </a>";
										}
									echo "</p>";	
								}
								if (count($data->tagged->data[$i]->comments->data)>0)
								{
									echo "<p><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'><b>User Comments:</b>  </a></p>";
									for ($k=0; $k<count($data->tagged->data[$i]->comments->data); $k++)
									{
										echo '<p><b>'. $data->tagged->data[$i]->comments->data[$k]->from->name .'</b>: '.$data->tagged->data[$i]->comments->data[$k]->message.' </p>';
									}
									
								}
							echo "<div align='right'><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'> <p> Reply </a> </p></div>";
							echo "</div></p>";
							}
							
							
						if ($data->tagged->data[$i]->type == "link")
							{
								echo "<div class='box'   >";
								echo "<div align='center'><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'>";
								if (isset($data->tagged->data[$i]->picture ))
									echo "<img alt='view' style='border:1px solid; max-width:150px' src='".$data->tagged->data[$i]->picture ."'></img>";
								echo "</a></div>";
								echo "<p>Shared by:<a href='http://www.facebook.com/'".$data->tagged->data[$i]->from->id.">";
								echo "<br><img src='https://graph.facebook.com/".$data->tagged->data[$i]->from->id."/picture?type=small'></img>";
								echo "<br>".$data->tagged->data[$i]->from->name."";
								echo "</a>";
								if (isset($data->tagged->data[$i]->message))
									echo "<br>Message: ".$data->tagged->data[$i]->message."";
								if (isset($data->tagged->data[$i]->name))
									echo "<br>Description: ". $data->tagged->data[$i]->name ;
								
								if (count($data->tagged->data[$i]->likes->data) > 0)
								{
									echo "<p><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'><b>".count($data->tagged->data[$i]->likes->data)." Likes:</b> </a></p> ";
									for ($j=0;$j< count($data->tagged->data[$i]->likes->data); $j++)
										{
											echo "<a href='http://www.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id."'>";
											echo "<img src='https://graph.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id. "/picture?type=small' alt='view' width=40px height=40px></img>";
											echo "</a>";
										}
									echo "<br><p>";
									for ($j=0;$j< count($data->tagged->data[$i]->likes->data); $j++)
										{
											echo "<a href='http://www.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id."'>";
											echo $data->tagged->data[$i]->likes->data[$j]->name;
											echo ", </a>";
										}
									echo "</p>";	
								}
							if (count($data->tagged->data[$i]->comments->data)>0)
								{
									echo "<p><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'><b>User Comments:</b>  </a></p>";
									for ($k=0; $k<count($data->tagged->data[$i]->comments->data); $k++)
									{
										echo '<p><b>'. $data->tagged->data[$i]->comments->data[$k]->from->name .'</b>: '.$data->tagged->data[$i]->comments->data[$k]->message.' </p>';
									}
									
								}
							echo "<div align='right'><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'> <p> Reply </a> </p></div>";
							echo "</div></p>";
							
							}
							
							
							if ($data->tagged->data[$i]->type == "photo")
							{
								echo "<div class='box'   >";
								echo "<div align='center'><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'>";
								if (isset($data->tagged->data[$i]->picture ))
									echo "<img alt='view' style='border:1px solid; max-width:150px' src='".$data->tagged->data[$i]->picture ."'></img>";
								echo "</a></div>";
								echo "<p>Shared by:<a href='http://www.facebook.com/'".$data->tagged->data[$i]->from->id.">";
								echo "<br><img src='https://graph.facebook.com/".$data->tagged->data[$i]->from->id."/picture?type=small'></img>";
								echo "<br>".$data->tagged->data[$i]->from->name."";
								echo "</a>";
								if (isset($data->tagged->data[$i]->message))
									echo "<br>Message: ".$data->tagged->data[$i]->message."";
								if (isset($data->tagged->data[$i]->name))
									echo "<br>Description: ". $data->tagged->data[$i]->name ;
								
								if (count($data->tagged->data[$i]->likes->data) > 0)
								{
									echo "<p><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'><b>".count($data->tagged->data[$i]->likes->data)." Likes:</b> </a></p> ";
									for ($j=0;$j< count($data->tagged->data[$i]->likes->data); $j++)
										{
											echo "<a href='http://www.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id."'>";
											echo "<img src='https://graph.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id. "/picture?type=small' alt='view' width=40px height=40px></img>";
											echo "</a>";
										}
									echo "<br><p>";
									for ($j=0;$j< count($data->tagged->data[$i]->likes->data); $j++)
										{
											echo "<a href='http://www.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id."'>";
											echo $data->tagged->data[$i]->likes->data[$j]->name;
											echo ", </a>";
										}
									echo "</p>";	
								}
							
							if (count($data->tagged->data[$i]->comments->data)>0)
								{
									echo "<p><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'><b>User Comments:</b>  </a></p>";
									
									for ($k=0; $k<count($data->tagged->data[$i]->comments->data); $k++)
									{
										echo '<p><b>'. $data->tagged->data[$i]->comments->data[$k]->from->name .'</b>: '.$data->tagged->data[$i]->comments->data[$k]->message.' </p>';
									}
									
								}
							echo "<div align='right'><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'> <p> Reply </a> </p></div>";
							echo "</div></p>";
							}
							
							
							if ($data->tagged->data[$i]->type == "status")
							{
								echo "<div class='box'   >";
								echo "<div align='center'><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'>";
								if (isset($data->tagged->data[$i]->picture ))
									echo "<img alt='view' style='border:1px solid; max-width:150px' src='".$data->tagged->data[$i]->picture ."'></img>";
								echo "</a></div>";
								echo "<p>Shared by:<a href='http://www.facebook.com/'".$data->tagged->data[$i]->from->id.">";
								echo "<br><img src='https://graph.facebook.com/".$data->tagged->data[$i]->from->id."/picture?type=small'></img>";
								echo "<br>".$data->tagged->data[$i]->from->name."";
								echo "</a>";
								if (isset($data->tagged->data[$i]->message))
									echo "<br>Message: ".$data->tagged->data[$i]->message."";
								if (isset($data->tagged->data[$i]->name))
									echo "<br>Description: ". $data->tagged->data[$i]->name ;
								
								if (count($data->tagged->data[$i]->likes->data) > 0)
								{
									echo "<p><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'><b>".count($data->tagged->data[$i]->likes->data)." Likes:</b> </a></p> ";
									for ($j=0;$j< count($data->tagged->data[$i]->likes->data); $j++)
										{
											echo "<a href='http://www.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id."'>";
											echo "<img src='https://graph.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id. "/picture?type=small' alt='view' width=40px height=40px></img>";
											echo "</a>";
										}
									echo "<br><p>";
									for ($j=0;$j< count($data->tagged->data[$i]->likes->data); $j++)
										{
											echo "<a href='http://www.facebook.com/".$data->tagged->data[$i]->likes->data[$j]->id."'>";
											echo $data->tagged->data[$i]->likes->data[$j]->name;
											echo ", </a>";
										}
									echo "</p>";	
								}
								
							if (count($data->tagged->data[$i]->comments->data)>0)
								{
									echo "<p><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'><b>User Comments:</b>  </a></p>";
									for ($k=0; $k<count($data->tagged->data[$i]->comments->data); $k++)
									{
										echo '<p><b>'. $data->tagged->data[$i]->comments->data[$k]->from->name .'</b>: '.$data->tagged->data[$i]->comments->data[$k]->message.' </p>';
									}
									
								}
							echo "<div align='right'><a target='_blank' href='".$data->tagged->data[$i]->actions[0]->link ."'> <p> Reply </a> </p></div>";
							echo "</div></p>";
							}
						}
					
					/*echo "<br>Data here";
					echo "<pre>";
					print_r($data);
					echo "</pre>";*/
		
					?>
	

<?php include('../footer.php'); ?>   
</body>
</html>
