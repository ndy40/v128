
<?php include('../baseurl.php'); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php include('../header.php'); ?>
    </head>
    <body>

        <?php include('../body.php'); ?>
       
<?php
//To connect the database
$con = 	mysql_connect($databaseUrl, $databaseLoginId, $databaseLoginPassword);
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db($databaseName, $con);
$val1=$_POST[Update1];
$val2=$_POST[Update2];
$val3=$_POST[Update3];
$val4=$_POST[Update4];
$query = "UPDATE CulturalObjects
SET AccessionNumber ='$val1',Object='$val2',Description='$val3',Museum='$val4'
WHERE AccessionNumber='$val1'";


 if (!mysql_query($query, $con)) {
                die('Error: ' . mysql_error());
            }



?>
        <h3><center>Updated Successfully </center>
  <input type="submit" value="Back"<a href="#" onClick="history.back();"></a
  
            ></h3>
 <?php include('../footer.php'); ?> 
    </body>
</html>