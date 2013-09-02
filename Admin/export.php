<?php
//connecting to DB
include('../baseurl.php');

$host = $databaseUrl;//host name, in this case we use localhost
$user = $databaseLoginId;//user name, in this case we use root
$pass = $databaseLoginPassword;//password, in this case we use password
$db_name = $databaseName;//declare the database that will be used

$conn = mysql_connect($host, $user, $pass)
or die('Connection Failed');//will show "Connection Failed" if the connection failed
mysql_select_db($db_name);//selecting the data base

//tables that will be exported

$tables = array("Exhibition","Institutions","CulturalObjects");

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="'.$_POST[Museum].'.xml"'); //to save the file

$query = "SELECT ExId FROM Exhibition where ExhibitionName='Brighton Museum and Art Gallery'";
$ExId = mysql_query($query);
$FK1 = mysql_fetch_array($ExId);

                  

$text ='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<'.Data.'>';

foreach($tables as $table){

               if ($table == 'Exhibition'){
                   $result = mysql_query("SELECT ExhibitionName,ExhibitionParameters FROM  Exhibition where ExId='$FK1[0]'");
	while($row=mysql_fetch_array($result)) {
		$text .=  "

		<$table>";
			foreach($row as $key => $val){
				if (!preg_match('#^\d+$#', $key, $match)){
					$text .=  "
					<$key>$val</$key>";
				}
			}
		$text .=  "
		</$table>";
	}

               }elseif ($table == 'Institutions'){
                   $result = mysql_query("SELECT InstitutionName,InstitutionURL FROM  Institutions where FK_ExID='$FK1[0]'");
                   $text .=  "

	<Institutions>";
	while($row=mysql_fetch_array($result)) {
		$text .=  "

		<Institution>";
			foreach($row as $key => $val){
				if (!preg_match('#^\d+$#', $key, $match)){
					$text .=  "
					<$key>$val</$key>";
				}
			}
		$text .=  "
		</Institution>";
	}

	$text .= "
	</Institutions>";

               }
              else
                  {
                  $result = mysql_query("SELECT AccessionNumber,ObjectType,Object,Description,Materials,CultureGroup,Dimensions,ProductionDate,AssociatedPlaces,AssociatedPeople,Museum,COId FROM  CulturalObjects where FK_ExId='$FK1[0]'");
//                  $query1 = "SELECT COID FROM CulturalObjects where FK_ExId='$FK1[0]'";
//                  $COID = mysql_query($query1);
//                  $FK2 = mysql_fetch_array($COID);
//                  echo "$FK2[0]"; 
                  $text .=  "

	<CulturalObjects>";
	while($row=mysql_fetch_array($result)) {
		$text .=  "

		<CulturalObject>";
			foreach($row as $key => $val){
				if (!preg_match('#^\d+$#', $key, $match)){
					$text .=  "
					<$key>$val</$key>";
                                                                                           }
                        }
                                                                                       
                                      $result1 = mysql_query("SELECT MediaFileName,MediaTitle,MediaDescription,MediaType FROM MediaObjects Where FK_ExId='$FK1[0]' and FK_COId='$row[COId]'");
                                       $text .=  "

                                                   <MediaObjects>";
                                                               while($row1=mysql_fetch_array($result1)) {
                                           $text .=  "

                                                               <MediaObject>";
			foreach($row1 as $key => $val){
				if (!preg_match('#^\d+$#', $key, $match)){
					$text .=  "
					<$key>$val</$key>";

				}
			}
                                                $text .=  "
                                                                    </MediaObject>";
                                               }
                                $text .=  "
                                               </MediaObjects>";
                               $result2 = mysql_query("SELECT AssociatedMediaFileName,AssociatedMediaTitle,AssociatedMediaDescription,AssociatedMediaType FROM AssociatedMediaObjects Where FK_ExId='$FK1[0]' and FK_COId='$row[COId]'");
                                       $text .=  "

                                                   <AssociatedMediaObjects>";
                                                               while($row2=mysql_fetch_array($result2)) {
                                           $text .=  "

                                                               <AssociatedMediaObject>";
			foreach($row2 as $key => $val){
				if (!preg_match('#^\d+$#', $key, $match)){
					$text .=  "
					<$key>$val</$key>";

				}
			}
                                                $text .=  "
                                                                    </AssociatedMediaObject>";
                                               }
                                $text .=  "
                                               </AssociatedMediaObjects>";	
		$result3 = mysql_query("SELECT Value FROM RelatedObjects Where FK_ExId='$FK1[0]' and FK_COId='$row[COId]'");
                                       $text .=  "

                                                   <RelatedObjects>";
                                                               while($row3=mysql_fetch_array($result3)) {
                                           $text .=  "

                                                               <RelatedObject>";
			foreach($row3 as $key => $val){
				if (!preg_match('#^\d+$#', $key, $match)){
					$text .=  "
					<$key>$val</$key>";

				}
			}
                                                $text .=  "
                                                              </RelatedObject>";
                                               }
                                $text .=  "
                                               </RelatedObjects>";	
                        
                               $text .=  "
		</CulturalObject>";
}

	$text .= "
	</CulturalObjects>";

          }    
}
	$text .= "
</Data>";
echo "$text";
mysql_close($connection);


?>