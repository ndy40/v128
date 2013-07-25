<!DOCTYPE HTML SYSTEM>
<?php include('../baseurl.php'); ?>

<html>
    <head>
        <?php include('../header.php'); ?>
        <script src="http://connect.facebook.net/en_US/all.js#appId=198579593521219&amp;xfbml=1"></script>
    </head>
     <body>
        <?php $id1 = 'community'; ?>
        <?php include('../body.php'); ?>
        <?php include('../menu.php'); ?>
        
        <div id="article">
            <h2>Sierra Leone Heritage Community</h2>
			<div class="communityfblink"><p><a href="<?php echo $group_url; ?>" target="_blank">Facebook Community</a></p></div>
            <p>
                <div id="fb-root"></div>
            </p>
            <p align="justify">
                You can become part of SierraLeoneHeritage.org by subscribing to Facebook and clicking 'Like' on the 
                <a href="http://www.facebook.com/pages/Sierra-Leone-Heritage/104060172993181" target="_blank"> Sierra Leone Heritage community page</a>. 
                This will enable you to leave comments, participate in discussions, upload photos and videos, and share your interest in Sierra Leonean 
                culture and heritage with other like minded people. This digital resource recognises that different people have different knowledges and 
                experiences of cultural traditions, practices, performances, objects and sites. By integrating the social networking features of Facebook 
                into the resource, we hope that SierraLeoneHeritage.org will provide a forum for bringing these differently-situated knowledges together.
                So, whether you are Sierra Leonean or not, whether an academic or a cultural performer, a carver or a museum curator, a traditional healer
                or a tourist, you are welcome to join the community, contribute your knowledge, and help us to learn from each other.
            </p>
            <p>
            <h3> From the Community... </h3>
             <?php
                // Group wall feed 
                $html = "";
                $url = "https://facebook-rss.herokuapp.com/rss/473379929370894";
                $html = getFeed($url);
                
				function getFeed($feed_url) {
                    //pull the feed contents
                    $content = file_get_contents($feed_url);
					//$content = str_replace($content,"]]>","");
					//file_put_contents("a.txt", $content);
					//$content = str_replace('<![CDATA[<table>','<table>',$content);
					//$content = str_replace('</table>]]>','</table>',$content);
                    $x = new SimpleXmlElement($content);
                    //discern between atom and rss feeds
					
                    if($x->entry){ //atom					
						
                        foreach($x->entry as $entry) {
                            echo '<div style="border-width: 1px; border-style: dotted; border-color:black; width:700px; " >';
                            if ($entry->content) 
                                {
								//$entry->content = str_replace('<![CDATA[','',$entry->content);
//									$entry->content = str_replace(']]>','',$entry->content);
								$content_temp = $entry->content;
								if (strstr($content_temp,'<hr />'))
                                {
                                  //  $content_temp = str_replace('<hr />','<div style="border-width: 1px; border-style: dashed; border-color:green; width:400px; " >',$content_temp);
                                    echo $content_temp .'';
                                }
                                else
                                    echo $content_temp .'';
                                
                                echo '<div align="right" style="padding-right:5px"> <i><a href="'. $entry->link->attributes()->href .  '" > <p>Add your comment </p></a> </i> </div>';
                                }
                            //if ($entry->author)
                                //echo 'By: '. $entry->author->name;
                            echo '<br/> ';
                            echo '</div>';
                            echo '<br/>';
                        }
                    }
                    
                }
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
