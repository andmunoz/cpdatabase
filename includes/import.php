<?php

    require_once("common.inc.php");
    require_once("database.inc.php");
    $table = $_GET["data"];

    // TODO: create import feature
    // 
    // $fp = fopen($table . '.csv', 'w');
    // fputcsv($fp, array_keys($data[0]));
    // foreach($data as $row){
    //     fputcsv($fp, $row);
    // }
    // fclose($fp);    
    // header("Content-Description: File Transfer");
    // header("Content-Type: application/csv; ");
    // header('Content-Disposition: attachment; filename="' . $table . '.csv";');
    // readfile($table . '.csv');
    // unlink($table . '.csv');
    // exit();

?>