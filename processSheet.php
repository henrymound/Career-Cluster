
<?php 

function readCSV($csvFile, $lineNumber){
	$file_handle = fopen($csvFile, 'r');
	while (!feof($file_handle) ) {
		$line_of_text[] = fgetcsv($file_handle, 1024);
	}
	fclose($file_handle);
//	return $line_of_text;
    return $line_of_text[$lineNumber];

}


// Set path to CSV file
$csvFile = 'https://docs.google.com/spreadsheets/d/1xCSMLMurBLSYvn5g3GmtinkDvmRdYxjQrysFr0IMtMQ/export?format=csv';

$csv = readCSV($csvFile, 1);

    echo '<pre>';
    print_r($csv);
    echo '</pre>';

?>
