<html>
    <head>
        <?php include('../header.php'); ?>
		<?php include('../baseurl.php'); ?>
		<?php $id1 = 'admin'; ?>
    	<?php include('../body.php'); ?>
		<?php include('../menu.php'); ?>

    </head>
    <body>
    	        
        
        <div id="article" >
            <table border="1" bordercolorlight="#666666" >
    
                <h3><center>Search  Result</center></h3>
    
                <?php
                mysql_connect($databaseUrl, $databaseLoginId, $databaseLoginPassword);
                mysql_select_db($databaseName);
                $query = "SELECT AccessionNumber,Museum,Object,Description FROM CulturalObjects WHERE AccessionNumber LIKE '%$_POST[Search]%'
                UNION
                SELECT AccessionNumber,Museum,Object,Description FROM CulturalObjects WHERE ObjectType LIKE '%$_POST[Search]%'
                UNION
              SELECT AccessionNumber,Museum,Object,Description  FROM CulturalObjects WHERE Object LIKE '%$_POST[Search]%'
                UNION
              SELECT AccessionNumber,Museum,Object,Description FROM CulturalObjects WHERE Description LIKE '%$_POST[Search]%'
                UNION
              SELECT AccessionNumber,Museum,Object,Description  FROM CulturalObjects WHERE Materials LIKE '%$_POST[Search]%'
                UNION
              SELECT AccessionNumber,Museum,Object,Description  FROM CulturalObjects WHERE Dimensions LIKE '%$_POST[Search]%'
                UNION
              SELECT AccessionNumber,Museum,Object,Description  FROM CulturalObjects WHERE ProductionDate LIKE '%$_POST[Search]%'
                 UNION
              SELECT AccessionNumber,Museum,Object,Description  FROM CulturalObjects WHERE AssociatedPlaces LIKE '%$_POST[Search]%'
                 UNION
              SELECT AccessionNumber,Museum,Object,Description  FROM CulturalObjects WHERE AssociatedPeople LIKE '%$_POST[Search]%'
                 UNION
              SELECT AccessionNumber,Museum,Object,Description  FROM CulturalObjects WHERE Museum LIKE '%$_POST[Search]%'
              UNION
              SELECT AccessionNumber,Museum,Object,Description  FROM CulturalObjects WHERE CultureGroup LIKE '%$_POST[Search]%'";
    
                $result = mysql_query($query);
                echo "
                <tr>
                <th>AccessionNumber</th>
                <th>Museum</th>
                <th>Object</th>
                <th>Description</th>
				<th></th>
                </tr>";
                while ($row = mysql_fetch_array($result)):
                   
                    echo "<td>" . $row[0] . "</td>";
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td>" . $row[3]  . "</td>";
    
                    $wishID = $row[0];
    
                    //The loop is left open
                    ?>
                    <td>
                        <form name="editWish" action="editWish.php" method="GET">
                            <input type="hidden" name="wishID" value="<?php echo $wishID; ?>"/>
                            <input type="submit" name="editWish" value="Edit"/>
                        </form>
                    </td>
                    <?php
                    echo "</tr>\n";
                endwhile;
                mysqli_free_result($result);
                echo "";
                ?>
             </table>
             
            <form name="backToMainPage" action="index.php">
                <input type="submit" value="Back To Main Page"/>
            </form>
            </div>
            <?php include('../footer.php'); ?> 
    </body>
</html>