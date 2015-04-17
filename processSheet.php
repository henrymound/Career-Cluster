<?php 

$spreadsheet_url="https://docs.google.com/spreadsheets/d/1xCSMLMurBLSYvn5g3GmtinkDvmRdYxjQrysFr0IMtMQ/export?format=csv";

if(!ini_set('default_socket_timeout',    15)) {
    echo "<!-- unable to change socket timeout -->";

    if (($handle = fopen($spreadsheet_url, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $spreadsheet_data[]=$data;
            }
        }
        fclose($handle);
}

else
    die("Problem reading csv");

?>