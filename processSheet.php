
<?php 

$LATLANGPAIR_ARRAY = array();
$NAME_ARRAY = array();
$ADDRESS_ARRAY = array();
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


     getLatLangArray();
     displayMap();
    

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
function getAddress($item){
    
    $ADDRESS_ARRAY = array();
    
    $csvFile = 'https://docs.google.com/spreadsheets/d/1xCSMLMurBLSYvn5g3GmtinkDvmRdYxjQrysFr0IMtMQ/export?format=csv';
    $row = 0;
    
    $clusterCounter = 0;
    global $CLUSTER_ARRAY;

    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if($row == $item){
                if($data[2] != "")
                    return($data[1]."</br>".$data[2]."<br />".$data[4]." ".$data[5].", ".$data[3]."<br />");
                else
                    return($data[1]."</br>".$data[4]." ".$data[5].", ".$data[3]."<br />");
                //Address line 1, break, Address line 2, city state, comma, zip
            }
            $row++;
        }
    fclose($handle);

}

    
    
    
}
function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }else{
        return false;
    }
}
function getCareerName($career){
    
    
    $csvFile = 'https://docs.google.com/spreadsheets/d/1xCSMLMurBLSYvn5g3GmtinkDvmRdYxjQrysFr0IMtMQ/export?format=csv';
    $row = 0;
    
    $clusterCounter = 0;
    global $CLUSTER_ARRAY;

    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if($row == $career){
                    return("\"".$data[0]."\"");
                //Address line 1, break, Address line 2, city state, comma, zip
            }
            $row++;
          
        }
    fclose($handle);

}
    
}
function getCareerCluster($career){
    
    
    $csvFile = 'https://docs.google.com/spreadsheets/d/1xCSMLMurBLSYvn5g3GmtinkDvmRdYxjQrysFr0IMtMQ/export?format=csv';
    $row = 0;
    
    $clusterCounter = 0;
    global $CLUSTER_ARRAY;

    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if($row == $career){
                    return("\"".$data[6]."\"");
                //Address line 1, break, Address line 2, city state, comma, zip
            }
            $row++;
          
        }
    fclose($handle);

}
    
}
function getNumberOfCareers(){
    
     
    $csvFile = 'https://docs.google.com/spreadsheets/d/1xCSMLMurBLSYvn5g3GmtinkDvmRdYxjQrysFr0IMtMQ/export?format=csv';
    $row = 1;
    
    $clusterCounter = 0;
    global $CLUSTER_ARRAY;

    if (($handle = fopen($csvFile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n"
        $clusterCounter++;
        $row++;
    }
    return $clusterCounter;
    fclose($handle);
}
}
function getCareerInfo($career){
    
    $toReturn = "";
    $arrayItem = getAddressSummary($career);
    
    $toReturn = $toReturn.getCareerName($career)."<br />";
    $toReturn = $toReturn.$arrayItem;
    $toReturn = $toReturn.geocode($arrayItem)[0].", ".geocode($arrayItem)[1]."<br />";
    
    return $toReturn;

    
}
function getLatLangArray(){
    
    global $LATLANGPAIR_ARRAY;
    $ADDRESS_ARRAY = array();
    
    $csvFile = 'https://docs.google.com/spreadsheets/d/1xCSMLMurBLSYvn5g3GmtinkDvmRdYxjQrysFr0IMtMQ/export?format=csv';
    $row = 0;
    
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
    }
    fclose($handle);
    
    echo $ADDRESS_ARRAY[$i];
    
    for($i = 0; $i < getNumberOfCareers(); $i++){
            array_push($LATLANGPAIR_ARRAY, geocode($ADDRESS_ARRAY[$i])[0].", ".geocode($ADDRESS_ARRAY[$i])[1]."");
            //echo $LATLANGPAIR_ARRAY[$i-1];
    }

    
}

function displayMap(){
    
    global $LATLANGPAIR_ARRAY;
    global $NAME_ARRAY;
    global $ADDRESS_ARRAY;
    
    $htmlToPrint = 
        "
            <!DOCTYPE html>
                <html>
                  <head>
                    <meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=no\">
                    <meta charset=\"utf-8\">
                    <title>Simple markers</title>
                    <style>
                      html, body, #map-canvas {
                        height: 100%;
                        margin: 0px;
                        padding: 0px
                      }
                    </style>
                    <script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true\"></script>
                    <script>
                    
                function initialize() {
                  var myLatlng = new google.maps.LatLng(41.299666,-73.339068);
                  var mapOptions = {
                    zoom: 10,
                    center: myLatlng
                  }
                  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);";
                  
                 for($i = 1; $i < (getNumberOfCareers()); $i++){
                     
                     $name = getCareerName($i);
                     $address = getAddress($i);
                     $career = getCareerCluster($i);
                     
                     $name = str_replace(array("\n", "\t", "\r"), '', $name);
                     $address = str_replace(array("\n", "\t", "\r"), '', $address);
                     $career = str_replace(array("\n", "\t", "\r"), '', $career);
                     $htmlToPrint = $htmlToPrint."
                     
                            var name = ".$name.";
                            var address = \"".$address."\";
                            var career = ".$career.";
                     
                            var infowindow".$i." = new google.maps.InfoWindow({
                                  content: '<h3>'+name+' - '+career+'</h3><br />'+address+'' 
                                });
                     
                             var marker".$i." = new google.maps.Marker({
                             position: new google.maps.LatLng(".$LATLANGPAIR_ARRAY[$i]."),
                             map: map,
                             title: name
                                });
                                
                             google.maps.event.addListener(marker".$i.", 'click', function() {
                                infowindow".$i.".open(map,marker".$i.");
                                });
                        ";
                 }
                 
                        
                $htmlToPrint = $htmlToPrint."  
                }
                
                google.maps.event.addDomListener(window, 'load', initialize);
                
                    </script>
                  </head>
                  <body>
                    <div id=\"map-canvas\"></div>
                  </body>
                </html>
                
                ";
                
    

        print($htmlToPrint);
    
    
}

?>