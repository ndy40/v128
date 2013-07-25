<!DOCTYPE HTML SYSTEM>
	<?php include('../baseurl.php'); ?>
    <?php include('../header.php'); ?>
       <?php $page_url = $baseUrl. "index.php/video/gallery/"; ?>    
	   <?php $filename = strtolower($_GET["name"]); ?>   
        
         <div class="video-js-box">
            <video id="example_video_1" class="video-js" width="640" height="480" controls preload="auto">
<source src= "<?php echo $assetsUrl . 'objects/associated_media/video/' . $filename .'.ogv' ?>" type='video/ogg; codecs="theora, vorbis"' />
                <source src= "<?php echo $assetsUrl . 'objects/associated_media/video/' . $filename .'.flv' ?>" type='video/flv; codecs="avc1.42E01E, mp4a.40.2"' />
                <source src= "<?php echo $assetsUrl . 'objects/associated_media/video/' . $filename .'.mp4' ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
                <!-- Flash Fallback. Use any flash video player here. Make sure to keep the vjs-flash-fallback class. -->
                <object id="flash_fallback_1" class="vjs-flash-fallback" width="640" height="480" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
                    <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
                    <param name="allowfullscreen" value="true" />
                    <param name="flashvars" value='config={"playlist":[{"url": "<?php echo $baseUrl ?>assets/objects/associated_media/video/<?php echo $filename; ?>.flv","autoPlay":false,"autoBuffering":true}]}' />    
                    <!-- Image Fallback. Typically the same as the poster image. -->
                    <img src="<?php echo $assetsUrl . 'objects/associated_media/video/thumbs/large/' . $filename . '.jpg' ?>" width="640" height="264" alt="Poster Image" title="No video playback capabilities." class="lightbox"/>
                </object>
            </video>
        </div>
        
