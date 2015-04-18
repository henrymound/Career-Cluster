
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

for($x = 0; $x < count($CLUSTER_ARRAY); $x++){
    echo "There are ".getNumberInCluster($x)." careers in cluster ".$CLUSTER_ARRAY[$x].".<br />";
}
    
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

        if($data[4] == $CLUSTER_ARRAY[$clusterNumber])//$data[4] is the career cluster element
        {
            $clusterCounter++;
        }
        
        $row++;
    }
    return $clusterCounter;
    fclose($handle);
}

    
    
    
}

?>
