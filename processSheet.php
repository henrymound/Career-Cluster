
<?php 

$CLUSTER_ARRAY = array(
    
     "Agriculture, Food and Natural Resources",
     "Architecture and Construction",
     "Arts, A/V Technology and Communications",
     "Business, Management and Administration",
     "Education and Training",
     "Finance",
     "Government and Public Administration",
     "Health Science",
     "Hospitality and Tourism",
     "Human Services",
     "Information Technology",
     "Law, Public Safety and Security",
     "Manufacturing",
     "Marketing, Sales and Service",
     "Science, Technology, Engineering and Mathematics",
     "Transportation, Distribution and Logistics"
    
);

echo getAddressSummary(1);
    
// if (($handle = fopen($csvFile, "r")) !== FALSE) {
//     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//         $num = count($data);
//         echo "<p> $num fields in line $row: <br /></p>\n";
//         $row++;
//         for ($c=0; $c < $num; $c++) {
//             echo $data[$c] . "<br />\n";
//         }
//     }
//     fclose($handle);
// }


function getNumberInCluster($clusterNumber){
    
    $csvFile = 'https://docs.google.com/spreadsheets/d/1xCSMLMurBLSYvn5g3GmtinkDvmRdYxjQrysFr0IMtMQ/export?format=csv';
    $row = 1;
    
    $clusterCounter = 0;
    global $CLUSTER_ARRAY;

    if (($handle = fopen($csvFile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);

        //echo "<p> $num fields in line $row: <br /></p>\n";

        if($data[6] == $CLUSTER_ARRAY[$clusterNumber])//$data[6] is the career cluster column
        {
            $clusterCounter++;
        }
        
        $row++;
    }
    return $clusterCounter;
    fclose($handle);
}

    
    
    
}
function getNumberInClusterSummary(){
    
for($x = 0; $x < count($CLUSTER_ARRAY); $x++){
    echo "There are ".getNumberInCluster($x)." careers in cluster ".$CLUSTER_ARRAY[$x].".<br />";
}
    
}

function getAddressSummary($dataRow){
    
    $ADDRESS_ARRAY = array();
    
    $csvFile = 'https://docs.google.com/spreadsheets/d/1xCSMLMurBLSYvn5g3GmtinkDvmRdYxjQrysFr0IMtMQ/export?format=csv';
    $row = 1;
    
    $clusterCounter = 0;
    global $CLUSTER_ARRAY;

    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            
            if($data[2] != "")
                array_push($ADDRESS_ARRAY, $data[1]."</br>".$data[2]."<br />".$data[4]." ".$data[5].", ".$data[3]."<br />");
            else
                array_push($ADDRESS_ARRAY, $data[1]."</br>".$data[4]." ".$data[5].", ".$data[3]."<br />");
            //Address line 1, break, Address line 2, city state, comma, zip
        }
    fclose($handle);
    
    return($ADDRESS_ARRAY[$dataRow]);
    return(count($ADDRESS_ARRAY));
}

    
    
    
}

?>
