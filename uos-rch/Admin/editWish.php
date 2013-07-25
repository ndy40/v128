
<?php include('../baseurl.php'); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <?php include('../header.php'); ?>
		<?php include('../baseurl.php'); ?>
		<?php $id1 = 'admin'; ?>
    	<?php include('../body.php'); ?>
		<?php include('../menu.php'); ?>

    </head>
    <body>

        <div id="article" >
        <h3><center>Edit Values</center>


            <?php
           	mysql_connect($databaseUrl, $databaseLoginId, $databaseLoginPassword);
            mysql_select_db($databaseName);

            $query = "SELECT AccessionNumber,Object,Description,Museum FROM CulturalObjects WHERE AccessionNumber = '$_GET[wishID]'";

            $result = mysql_query($query);


            $row = mysql_fetch_array($result);
            ?>
        </h3>
		<div class="box">
            <form name="Update" action="update.php" method="POST">
                <h3> Accession Number </h3><input type="text" name="Update1" value='<?php echo $row[0] ?>' size="50" style="border-style: solid; border-width: 1px; border-color: black;"/>
    
                <h3> Object </h3><input type="text" name="Update2" value='<?php echo $row[1] ?>' size="50" style="border-style: solid; border-width: 1px; border-color: black;""/> 
                <h3> Description</h3> <input type="text" name="Update3" value='<?php echo $row[2] ?>' size="50" style="border-style: solid; border-width: 1px; border-color: black;"/><br /> 
                <h3> Museum</h3> <input type="text" name="Update4" value='<?php echo $row[3] ?>' size="50" style="border-style: solid; border-width: 1px; border-color: black;"/><br /> 
    
    
                <div align="center"> <input style="width:150px; height:50px" type="submit" name="Update" value="Update"/> </div>
            </form>
    
            <input style="width:150px; height:50px" type="submit" value="Back"<a href="#" onClick="history.back();"></a>
        </div>
        </div>
        <?php include('../footer.php'); ?> 
    </body>
</html>

