<!DOCTYPE HTML SYSTEM>
<?php include('../baseurl.php'); ?>

<html>
    <head>
        <?php include('../header.php'); ?>
    </head>
    
    <body>
			<OBJECT CLASSID="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" WIDTH="640" HEIGHT="480" CODEBASE="http://www.apple.com/qtactivex/qtplugin.cab">
				<PARAM name="SRC" VALUE="<?php echo $_GET["name"] ?>">
				<PARAM name="AUTOPLAY" VALUE="true">
				<PARAM name="CONTROLLER" VALUE="false">
				<EMBED SRC="<?php echo $_GET["name"] ?>" WIDTH="640" HEIGHT="480" AUTOPLAY="true" CONTROLLER="false" PLUGINSPAGE="http://www.apple.com/quicktime/download/">
				</EMBED>
			</OBJECT>
    </body>
</html>