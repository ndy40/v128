<?php include('../baseurl.php'); ?>
<?php

if ($_FILES["file"]["error"] > 0) {
    if ($_FILES["file"]["error"] == 4) {
        echo "Please select the file first";
    } else {
        echo " Error: " . $_FILES["file"]["error"] . "<br />";
    }
} else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"])) {
        echo $_FILES["file"]["name"] . " already exists. ";



        //To connect the database
        $con = mysql_connect($databaseUrl, $databaseLoginId, $databaseLoginPassword);
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }

        mysql_select_db($databaseName, $con);
        //upload into the server the xml file with the help of simple xml load function
        $xml = simplexml_load_file("upload/" . $_FILES["file"]["name"]);
        $a = array();
        foreach ($xml as $key0 => $value1) {
            foreach ($value1 as $key1 => $value2) {
                if ($key0 == 'Exhibition') {
                    array_push($a, $value2);
                }
            }
        }

        $query = "SELECT ExId FROM Exhibition where ExhibitionName='$a[0]'";
        //echo $query;

        $ExId = mysql_query($query);
        $FK1 = mysql_fetch_array($ExId); // retreive exhibition id

        $set = "SET FOREIGN_KEY_CHECKS=0";
        if (!mysql_query($set, $con)) {
            die('Error: ' . mysql_error());
        }
        $del1 = "Delete from Exhibition where ExId='$FK1[0]'";
        if (!mysql_query($del1, $con)) {
            die('Error: ' . mysql_error());
        }
        $del2 = "Delete from Institutions where FK_ExID='$FK1[0]'";
        if (!mysql_query($del2, $con)) {
            die('Error: ' . mysql_error());
        }
        $del4 = "Delete from CulturalObjects where FK_ExId='$FK1[0]'";
        if (!mysql_query($del4, $con)) {
            die('Error: ' . mysql_error());
        }
        $del4 = "Delete from MediaObjects where FK_ExId='$FK1[0]'";
        if (!mysql_query($del4, $con)) {
            die('Error: ' . mysql_error());
        }
        $del5 = "Delete from AssociatedMediaObjects where FK_ExId='$FK1[0]'";
        if (!mysql_query($del5, $con)) {
            die('Error: ' . mysql_error());
        }
        $del6 = "Delete from RelatedObjects where FK_ExId='$FK1[0]'";
        if (!mysql_query($del6, $con)) {
            die('Error: ' . mysql_error());
        }
        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
        echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    }
}
//To connect the database
$con = mysql_connect($databaseUrl, $databaseLoginId, $databaseLoginPassword);
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db($databaseName, $con);

//upload into the server the xml file with the help of simple xml load function
$xml = simplexml_load_file("upload/" . $_FILES["file"]["name"]);
$a = array();
foreach ($xml as $key0 => $value1) {
    foreach ($value1 as $key1 => $value2) {
        if ($key0 == 'Exhibition') {
            array_push($a, $value2);
        }
    }
}
$sql1 = "Insert into Exhibition (ExhibitionName,ExhibitionParameters) Values ('$a[0]','$a[1]')";
// echo "$sql1";
if (!mysql_query($sql1, $con)) {
    die('Error: ' . mysql_error());
}
$query = "SELECT ExId FROM Exhibition where ExhibitionName='$a[0]'";
$ExId = mysql_query($query);
$FK1 = mysql_fetch_array($ExId); // retreive exhibition id


foreach ($xml as $key0 => $value1) {
    foreach ($value1 as $key1 => $value2) {
        $arr = array();
        foreach ($value2 as $key2 => $value3) {
            array_push($arr, $value3);
        }
        if ($key0 == 'Institutions') {
            // echo '<br />';
            $sql2 = "Insert into Institutions (InstitutionName,InstitutionURL,InstitutionDescription,FK_ExID) Values ('$arr[0]', '$arr[1]','$arr[2]','$FK1[0]');";
            //echo "$sql2";
            if (!mysql_query($sql2, $con)) {
                die('Error: ' . mysql_error());
            }
        } elseif ($key0 == 'CulturalObjects') {
            // echo '<br />';
            $obj = preg_replace("/'/", " ", $arr[2]); // to control the special chracters 
            $desc = preg_replace("/'/", " ", $arr[3]);
            $cgrp = preg_replace("/'/", " ", $arr[5]);
            $dim = preg_replace("/'/", " ", $arr[6]);
            $apl = preg_replace("/'/", " ", $arr[8]);
            $appl = preg_replace("/'/", " ", $arr[9]);
            $sql3 = "Insert into CulturalObjects (AccessionNumber,ObjectType,Object,Description,Materials,CultureGroup,Dimensions,ProductionDate,AssociatedPlaces,AssociatedPeople,Museum,FK_ExId) 
                      Values ('$arr[0]', '$arr[1]','$obj', '$desc','$arr[4]', '$cgrp','$dim', '$arr[7]','$apl', '$appl','$arr[10]','$FK1[0]');";
            //echo "$sql3";

            if (!mysql_query($sql3, $con)) {
                die('Error: ' . mysql_error());
            }
        }
    }
}

// retreive exhibition id
foreach ($xml as $key0 => $value1) {
    $aa = array();
    foreach ($value1 as $key1 => $value2) {
        array_push($aa, $value2);
        if ($key0 == 'Exhibition')
            $query1 = "SELECT ExId FROM Exhibition where ExhibitionName='$aa[0]'";

        $COID = mysql_query($query1);
        $FK3 = mysql_fetch_array($COID);

        $ab = array();
        foreach ($value2 as $key2 => $value3) {
            if ($key0 == 'CulturalObjects') {
                array_push($ab, $value3);
                $query2 = "SELECT COId FROM CulturalObjects where AccessionNumber='$ab[0]'";
                $COID = mysql_query($query2);
                $FK2 = mysql_fetch_array($COID);
                foreach ($value3 as $key3 => $value4) {
                    $array = array();
                    foreach ($value4 as $key4 => $value5) {
                        array_push($array, $value5);
                    }
                    if ($key2 == 'RelatedObjects') {
                        // echo '<br />';
                        $sql4 = "Insert into RelatedObjects(Value,FK_COId,FK_ExId) Values ('$value4','$FK2[0]','$FK3[0]');";
                        //echo "$sql4";
                        if (!mysql_query($sql4, $con)) {
                            die('Error: ' . mysql_error());
                        }
                    } elseif ($key2 == 'MediaObjects') {
                        // echo '<br />';
                        $sql5 = "Insert into MediaObjects(MediaFileName,MediaTitle,MediaDescription,MediaType,FK_COId,FK_ExId) 
                             Values ('$array[0]', '$array[1]','$array[2]', '$array[3]','$FK2[0]','$FK3[0]');";
                        //echo "$sql5";
                        if (!mysql_query($sql5, $con)) {
                            die('Error: ' . mysql_error());
                        }
                    } else {
                        // echo '<br />';
                        $sql6 = "Insert into AssociatedMediaObjects (AssociatedMediaFileName,AssociatedMediaTitle,AssociatedMediaDescription,AssociatedMediaType,FK_COId,FK_ExId) 
                             Values ('$array[0]', '$array[1]','$array[2]', '$array[3]','$FK2[0]','$FK3[0]');";
                        //echo "$sql6";
                        if (!mysql_query($sql6, $con)) {
                            die('Error: ' . mysql_error());
                        }
                    }
                }
            }
        }
    }
}

mysql_close($con);
//echo '<br />';
echo 'Database Updated successfully';
?>