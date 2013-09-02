<!DOCTYPE HTML SYSTEM>
<?php include('../baseurl.php'); ?>

<html>
    <head>
        <?php include('../header.php'); ?>
    </head>
    
    <body>
        <?php $id1 = 'community'; $id2 = 'wallfeed'; ?>
        <?php include('../body.php'); ?>
        <?php include('../menu.php'); ?>
        
        <div id="article">
            <h2>Sierra Leone Heritage Community Wall</h2>
			<div class="communityfblink"><p><a href="http://www.facebook.com/sierraleoneheritage" target="_blank">Facebook Community</p></a></div>
                <div>
                    <?php 
                        error_reporting(E_ERROR | E_PARSE);

						global $baseUrl;
						global $_SESSION, $_REQUEST;
						$app_id = "441476852570053";
						$app_secret = "4be40f9897bd061e6a44e78d0b2b0817";
						$WallFeed_url = $baseUrl. "/community/fb_wallfeed.php";
						$code = $_REQUEST["code"];
                        
                        if(empty($code)) {
                            $_SESSION['state'] = md5(uniqid(rand(), TRUE)); //CSRF protection
                            $dialog_url = "http://www.facebook.com/dialog/oauth?client_id=" . $app_id . "&redirect_uri=" . urlencode($WallFeed_url) . "&state=" . $_SESSION['state'];
                            echo("<script> top.location.href='" . $dialog_url . "'</script>");
                        }
                        
                        if(!$_SESSION['state']) {
                            $_SESSION['state'] = md5(uniqid(rand(), TRUE)); //CSRF protection
                            $dialog_url = "http://www.facebook.com/dialog/oauth?client_id=" . $app_id . "&redirect_uri=" . urlencode($WallFeed_url) . "&state=" . $_SESSION['state'];
                        }
                        
                        $token_url = "https://graph.facebook.com/oauth/access_token?client_id=" . $app_id . "&redirect_uri=" . 
                                $WallFeed_url . "&client_secret=" . $app_secret . "&code=" . $code;
                        $response = file_get_contents($token_url);
                        $params = null;
                        parse_str($response, $params);
                        $graph_url = "https://graph.facebook.com/me?" . $response;
                        $user = json_decode(file_get_contents($graph_url));
                        
                        $id = "104060172993181"; // id of the group defined in baseURL.php file
                        $url = "https://graph.facebook.com/".$id."/feed?". $response;
                        $out = json_decode(file_get_contents($url));
                        
                        echo'</div>';
							for ($i = 0; $i<20; /*sizeof($out->data);*/ $i++) {
                            $message=$out->data[$i]->message;
                            if($out->data[$i]->picture) {
                                echo '<div >';
                                echo '<div class="community floatleft">';
                                $time = substr($out->data[$i]->updated_time, 0, 10);
                    ?>
                    <div class="box communityblogwide">
                        <div class="community blogthumblarge">
                            <a href="<?php echo $out->data[$i]->link; ?>">
                                <img class="community blogimg" src="<?php echo $out->data[$i]->picture; ?>" />
                            </a>
                        </div>
                        <div class="community blogwide">
							<div class="community blogcommentlarge">
								<p>
									<b><?php echo $out->data[$i]->from->name; ?> [<?php echo $time; ?>]</b> :
									<?php
										if($message <> "")
											echo $message;
										else
											echo $out->data[$i]->caption. ' ';
										echo $out->data[$i]->description;
										if($out->data[$i]->likes->count > 1)
											echo '<br/><p align="right"><i>'. $out->data[$i]->likes->count  .' people like it  </i></p>';
										else if($out->data[$i]->likes->count > 0)
											echo '<br/><p align="right"><i>'. $out->data[$i]->likes->count  .' person likes it  </i></p>';
									?>
								</p>
							</div>
                        </div>
                        <div class="community blogwide">
                            <?php 
                                if(sizeof($out->data[$i]->comments->data) > 0) {
                                    echo '<div align="right"><div class="box communityblognarrow" align="left"><p><b><u>Other comments: </u></b></p>';
                                    
                                    for($j = 0; $j<sizeof($out->data[$i]->comments->data); $j++) {
                                        echo '<div class="community blogcommentsmall"><div class="community blogthumbsmall"><img src="http://graph.facebook.com/'. 
                                                $out->data[$i]->comments->data[$j]->from->id . '/picture"></div><p><b> '.
                                                $out->data[$i]->comments->data[$j]->from->name . ' </b>: '.
                                                $out->data[$i]->comments->data[$j]->message . '</p></div>';
                                    }
                                    
                                    echo '</div></div>';
                                }
                            ?>
                        </div>
                    </div>
                    </div>
                    </div>
                <?php 
                    } else {
                        echo '<div>';
                        echo '<div class="community floatleft">';
                        $time = substr($out->data[$i]->updated_time, 0, 10);
                ?>
            <div class="box communityblogwide">
                <div class="community blogthumblarge">
                    <a href="http://www.facebook.com/pages/Sierra-Leone-Heritage/104060172993181">
                        <img class="community blogimg" src="http://graph.facebook.com/<?php echo $out->data[$i]->from->id; ?>/picture" />
                    </a>
                </div>
                <div class="community blogwide">
					<div class="community blogcommentlarge">
						<p>
							<b><?php echo $out->data[$i]->from->name; ?> [<?php echo $time; ?>] </b>:
							<?php 
								if($message <> "")
									echo $message;
								else 
									echo $out->data[$i]->caption . ' ';
								
								echo $out->data[$i]->description;
								if($out->data[$i]->likes->count > 1) 
									echo '<br/><p align="right"><i>'. $out->data[$i]->likes->count  .' people like it  </i></p>';
								else if($out->data[$i]->likes->count > 0) 
									echo '<br/><p align="right"><i>'. $out->data[$i]->likes->count  .' person likes it  </i></p>';
							?>
						</p>
					</div>
                </div>
                <div class="community blogwide">
                    <?php 
                    if(sizeof($out->data[$i]->comments->data) > 0) {
                        echo '<div align="right"><div class="box communityblognarrow" align="left"><p><b><u>Other comments: </u></b></p>';
                        for($j = 0; $j<sizeof($out->data[$i]->comments->data); $j++) {
                            echo '<div class="community blogcommentsmall"><div class="community blogthumbsmall"><img src="http://graph.facebook.com/'. 
                                    $out->data[$i]->comments->data[$j]->from->id . '/picture"></div><p><b> '.
                                    $out->data[$i]->comments->data[$j]->from->name . ' </b>: '.
                                    $out->data[$i]->comments->data[$j]->message . '</p></div>';
                        }
                        
                        echo '</div></div>';
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <?php 
            }
        }
    ?>
</div>
</div>
 
<?php include('../footer.php'); ?>   
</body>
</html>
