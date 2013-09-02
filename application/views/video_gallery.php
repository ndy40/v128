<!DOCTYPE HTML SYSTEM>
<?php include('baseurl.php'); ?>

<html>
    <head>
        <title>SierraLeoneHeritage.org | Video Gallery</title>
        
        <?php include ('header.php'); ?>
        
        <link rel="stylesheet" href="<?php echo $assetsUrl . 'css/video-js.css' ?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $assetsUrl . 'js/colorbox/colorbox/colorbox.css' ?>" type="text/css" media="screen" />
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
    </head>
    
    <body>
        <?php $id1 = 'videogallery'; ?>
        <?php include('body.php'); ?>
        <?php include('menu.php'); ?>
        <div id="article" class="clearFix">
			<h2>Video Gallery</h2>
			<center>
            
            
            <?php for($i=1; $i<sizeof($filenames); $i++) : ?>
            
            <a href="<?php echo $baseUrl . 'videogallery/video.php?name=' . $filenames[$i]; ?>" class="lightbox">
                <img src="<?php echo $assetsUrl . 'objects/associated_media/video/thumbs/small/' . $filenames[$i]; ?>.jpg" />
            </a>
            <?php endfor; ?>
            <!-- This contains the hidden content for inline calls -->
            <div style='display:none'>
				<div id='inline_example1' class='videogallery1'>
                    <p><strong>This content comes from a hidden element on this page.</strong></p>
                    <p>
                        The inline option preserves bound JavaScript events and changes, and it puts the content back where it came from when it is closed.<br />
                        <a id="click" href="#" class='videogallery2'>Click me, it will be preserved!</a>
                    </p>
                    <p><strong>If you try to open a new ColorBox while it is already open, it will update itself with the new content.</strong></p>
                    <p>
                        Updating Content Example:<br />
                        <a class="example5" href="../content/flash.html">Click here to load new content</a>
                    </p>
				</div>
            </div>
			</center>
        </div>
        
        <?php include ('footer.php'); ?>
    </body>
</html>
