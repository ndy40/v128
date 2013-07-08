<!DOCTYPE HTML SYSTEM>
<?php include('baseurl.php'); ?>

<html>
    <head>
        <?php include('header.php'); ?>
    </head>
    
    <body>
		<?php $id1 = 'browse'; ?>
        <?php include('body.php'); ?>
        <?php include('menu.php'); ?>
        

        <div id="article">
            <h2>Browse collections - All</h2>
            <p>You're currently browsing all items. To search by keyword, theme, culture, museum and item category, try the <a href="<?php echo $baseUrl; ?>/search/">advanced search</a>.</p>
			
            <?php for($i=0; $i<sizeof($museum_names); $i++): ?>
            <div class="browse">
                <div class="box">
                    <h3 class="boxedTitle"><?php echo $museum_names[$i] ?></h3>
                    <div class="thumbBrowse">
                        <a href="#" class="left hideText">left</a>
                        <div class="thumbsContainer">
                            <div class="thumbs">
                                <?php for($j=0; $j<5; $j++): ?>
                                 <?php $curr_item = $museum_items[$i][$j] ?>
                                <a href="<?php echo $baseUrl . 'index.php/item/item' . $db_type . '/index/' . bin2hex($curr_item['AccessionNumber']."___". $curr_item['Museum']) ?>">
                                    <img src="<?php echo $curr_item['MediaObjects'][0]['ThumbSmall'] ?>" alt="<?php echo $curr_item['Object'] ?>" />
                                </a>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <a href="#" class="right hideText" rel="<?php echo ($baseUrl . 'index.php/browse/browse' . $db_type . '/ajax_get_objects/' . $museum_names[$i] ); ?>">right</a>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
            
            <br/>
            <p><?php //echo $this->pagination->create_links();?></p>
        </div>

        <div id="loaderHolder"></div>

        <?php include('footer.php'); ?>
    </body>
</html>