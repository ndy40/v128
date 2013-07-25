<!DOCTYPE HTML SYSTEM>
<?php include('baseurl.php'); ?>

<html>
    <head>
        <?php include ( 'header.php'); ?>
        
        <link rel="stylesheet" href="<?php echo $assetsUrl . 'css/video-js.css' ?>" type="text/css" media="screen" />
        
        <script src="<?php echo $assetsUrl . 'js/video.js' ?>" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
            // Add VideoJS to all video tags on the page when the DOM is ready
            VideoJS.setupAllWhenReady();
        </script>
    </head>
        
    <body>
        <?php $id1 = 'home'; ?>
        <?php include('body.php'); ?>
        <?php include('menu.php'); ?>
        
        <div id="article" class="clearFix">
            <div id="homeSlideshow">
                <ul>
                    <li>
                        <img src="<?php echo $assetsUrl; ?>images/banners/1.jpg" alt="" />
                        <span>Sande society dancers, Tuiyor, Fiama Chiefdom, Kono District</span>
                    </li>
                    <li>
                        <img src="<?php echo $assetsUrl; ?>images/banners/2.jpg" alt="" />
                        <span>Mural depicting Manga Sewa, Falaba, Solimana Chiefdom, Koinadugu District</span>
                    </li>
                    <li>
                        <img src="<?php echo $assetsUrl; ?>images/banners/3.jpg" alt="" />
                        <span>Ruins of the 'slave fort' on Bunce Island in the Sierra Leone River</span>
                    </li>
                    <li>
                        <img src="<?php echo $assetsUrl; ?>images/banners/4.jpg" alt="" />
                        <span>Ndoli jowei and elders, Moyambawo, Kori Chiefdom, Moyamba District</span>
                    </li>
                    <li>
                        <img src="<?php echo $assetsUrl; ?>images/banners/5.jpg" alt="" />
                        <span>Plantain Island, site of slave barracoons associated with John Newton, author of 'Amazing Grace'</span>
                    </li>
                    <li>
                        <img src="<?php echo $assetsUrl; ?>images/banners/6.jpg" alt="" />
                        <span>Members of the Firestone community, Mountain Cut, Freetown</span>
                    </li>
                    <li>
                        <img src="<?php echo $assetsUrl; ?>images/banners/7.jpg" alt="" />
                        <span>Mathoma masquerade, National Dance Troupe of Sierra Leone</span>
                    </li>
                </ul>
                
                <a href="#" class="control play hideText" title="Play slideshow">Play slideshow</a>
		<a href="#" class="control pause hideText" title="Pause slideshow">Pause slideshow</a>
            </div>
            
            <div>
                <div id="hometicketbox">
                    <a href="<?php echo $baseUrl; ?>museum/"><div id="hometicket1"></div></a>
                </div>
                <div id="hometicketbox">
                    <a href="<?php echo $baseUrl . 'index.php/search/search' . $db_type; ?>"><div id="hometicket2"></div></a>
                </div>
                <div id="hometicketbox">
                    <a href="<?php echo $baseUrl; ?>sites/monuments/"><div id="hometicket3"></div></a>
                </div>
                <div id="hometicketboxlast">
                    <a href="<?php echo $baseUrl; ?>shukublai/"><div id="hometicket4"></div></a>
                </div>
            </div>
            
            <div>
                <div id="homecollectionbox">
                    <div class="box" id="homelastboxheight">
                        <h3 class="boxedTitle">From the Collection...</h3>
                        
                        <div id="homecollectionsubbox1">
                            <div id="homecollectionsubbox2">
                                <div id="homecollectionsubbox3">
                                    <a href="<?php echo $baseUrl . 'index.php/item/item' . $db_type . '/index/' . bin2hex($object['AccessionNumber'].'___'. $object['Museum']) ?>">
                                        <img height=80px width=80px src ="<?php echo $object['MediaObjects'][0]['ThumbMedium']; ?>" />
                                    </a>
                                </div>
                                <a href="<?php echo $baseUrl . 'index.php/item/item' . $db_type . '/index/' . bin2hex($object['AccessionNumber'].'___'. $object['Museum']) ?>">
                                    <br/>
                                    <h1 style="line-height:100%;"><?php echo $object['Object']; ?></h1>
                                    <br/>
                                </a>
                                <p>
                                    <?php echo $object['AccessionNumber']; ?>
                                    <br/>
                                    <?php echo $object['Museum']; ?>
                                </p>
                                <p>
                                    <?php	
                                        //Description code
                                        $upto = 25;
                                        $displaytext ="";

                                        $result = preg_split('/ /', $object['Description'], -1, PREG_SPLIT_NO_EMPTY);
                                        $arlength = count($result);

                                        if($arlength > $upto) {
                                            for($counter=0; $counter<$upto; $counter+=1)
                                                $displaytext = $displaytext .' ' .$result[$counter];
                                            echo $displaytext. ' ...[<a href="' . $baseUrl . 'index.php/item/item' . $db_type . '/index/' . bin2hex($object['AccessionNumber'] .'___'.$object['Museum']) .'">more</a>]';
                                        } else {
                                            echo $object['Description'];
                                            echo ' <a href="' . $baseUrl . 'index.php/item/item' . $db_type . '/index/' . bin2hex($object['AccessionNumber'].'___'. $object['Museum']) .'">...[more]</a>';
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                   
                    </div>
                </div>
            
                <div id="homevideochannelbox">
                    <div class="box" id="homelastboxheight">
                        <h3 class="boxedTitle" id="homevideochannelboxtitleheight">
							<div id="homevideochanneltitle1">Video Channel</div>
                            <div id="homevideochanneltitle2"><a href="<?php echo $baseUrl . 'index.php/video/gallery' ?>">More Videos</a></div>
                        </h3>

                        <script type="text/javascript">
                            // Must come after the video.js library
                            // Add VideoJS to all video tags on the page when the DOM is ready
                            VideoJS.setupAllWhenReady();
                        </script>

						<br>
						<center>
                        <div class="video-js-box">
                            <!-- Using the Video for Everybody Embed Code http://camendesign.com/code/video_for_everybody -->
                            <video id="example_video_1" class="video-js"  width="312" height="200" controls preload="auto" poster="<?php echo $assetsUrl . 'objects/associated_media/video/thumbs/large/' . $video_filename . '.jpg' ?>">
                                <source src="<?php echo $assetsUrl . 'objects/associated_media/video/' . $video_filename . '.ogv' ?>" type='video/ogg;  codecs="theora, vorbis"' />
                                <source src="<?php echo $assetsUrl . 'objects/associated_media/video/' . $video_filename . '.flv' ?>" type='video/flv;  codecs="avc1.42E01E, mp4a.40.2"' />
                                <source src="<?php echo $assetsUrl . 'objects/associated_media/video/' . $video_filename . '.mp4' ?>" type='video/mp4;  codecs="avc1.42E01E, mp4a.40.2"' /> 

                                <!-- Flash Fallback. Use any flash video player here. Make sure to keep the vjs-flash-fallback class. -->
                                <object id="flash_fallback_1" class="vjs-flash-fallback"  width="312" height="200"  type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
                                    <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
                                    <param name="allowfullscreen" value="true" />
                                    <param name="flashvars" value='config={"playlist":["<?php echo $assetsUrl . 'objects/associated_media/video/thumbs/large/' . $video_filename . '.jpg' ?>", {"url": "<?php echo $assetsUrl . 'objects/associated_media/video/' . $video_filename . '.flv' ?>","autoPlay":false,"autoBuffering":true}]}' />

                                    <!-- Image Fallback. Typically the same as the poster image. -->
                                    <img src="<?php echo $assetsUrl . 'objects/associated_media/video/thumbs/large/' . $video_filename . '.jpg' ?>"  width="312" height="200" alt="Poster Image" title="No video playback capabilities." /> 
                                </object>
                            </video>

                            <!-- Download links provided for devices that can't play video in the browser.
                            <p class="vjs-no-video"><strong>No Video? :</strong>
                                Please download HTML5 compatible browser or flash player for your browser.
                            </p> -->
                        </div>
						</center>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include ( 'footer.php'); ?>
    </body>
</html>