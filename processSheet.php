
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


    echo getNumberInCluster(5);
    
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
    //  1'Agriculture, Food and Natural Resources'
    //  2'Architecture and Construction'
    //  3'Arts, A/V Technology and Communications'
    //  4'Business, Management and Administration'
    //  5'Education and Training'
    //  6'Finance'
    //  7'Government and Public Administration'
    //  8'Health Science'
    //  9'Hospitality and Tourism'   
    //  10'Human Services'
    //  11'Information Technology'
    //  12'Law, Public Safety and Security'
    //  13'Manufacturing'
    //  14'Marketing, Sales and Service'
    //  15'Science, Technology, Engineering and Mathematics'
    //  16'Transportation, Distribution and Logistics'
    
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
