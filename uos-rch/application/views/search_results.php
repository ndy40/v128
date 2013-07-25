<!DOCTYPE html>
<?php include('baseurl.php') ?>
<html>
    <head>
        <?php include('header.php'); ?>
    </head>
    
    <body>
        <?php $id1 = 'search'; ?>
        <?php include('body.php'); ?>
        <?php include('menu.php'); ?>
        
        <div id="article">
            <h2>Search results</h2> <p>(<?php echo $total_found; ?> items found)</p>
            
            <p class="shuntRight">
                <?php echo $this->pagination->create_links(); ?>
            </p>
            
            <div id="results">
                <?php foreach($found_objects as $object) : 
				
				?>
                <div class="box" id="searchresultsbox">
                    <div id="resultspage">
                        <table>
                            <tr>
                                <td valign="top">
                                    <a href="<?php echo $baseUrl . 'index.php/item/item' . $db_type . '/index/' . bin2hex($object['AccessionNumber']. '___'.$object['Museum']) ?>"><img src="<?php echo strtolower($object['MediaObjects'][0]['ThumbSmall']); ?>"/></a>
                                </td>
                                <td>
                                    <a href="<?php echo $baseUrl . 'index.php/item/item' . $db_type . '/index/' . bin2hex($object['AccessionNumber']. '___'.$object['Museum']) ?>"><h1><?php echo $object['Object']; ?></h1></a>
                                    <p>
                                        <b>Accession Number: </b><?php echo $object['AccessionNumber']; ?><br/>
                                        <b>Museum: </b><?php echo $object['Museum']; ?><br/><br />

                                        <?php 
                                            $upto = 25;
                                            $result = preg_split('/ /', $object['Description'], -1, PREG_SPLIT_NO_EMPTY);
                                            for($counter = 0; $counter < min($upto, sizeof($result)); $counter += 1) {
                                                echo $result[$counter];
                                                echo ' ';
                                            }
                                        ?>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <br />
            <p align="right">
                <?php echo $this->pagination->create_links(); ?>
            </p>
        </div>
        <?php include('footer.php'); ?>
    </body>
</html>
