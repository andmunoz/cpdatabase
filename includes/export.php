<?php

    require_once("common.inc.php");
    require_once("database.inc.php");
    $format = $_GET["format"];
    $table = $_GET["data"];

    $data = get_table($table, NULL, NULL, "Nombre ASC");

    if ($format == "json") {
        header ('Content-type: application/json');
        echo "{ \"" . $table . "\":" . json_encode($data) . " }";
        // header('Content-Disposition: attachment; filename="' . $table . '.json";');
        exit();
    }
    else {
        $fp = fopen($table . '.csv', 'w');
        fputcsv($fp, array_keys($data[0]));
        foreach($data as $row){
            fputcsv($fp, $row);
        }
        fclose($fp);    
        header("Content-Description: File Transfer");
        header("Content-Type: application/csv; ");
        header('Content-Disposition: attachment; filename="' . $table . '.csv";');
        readfile($table . '.csv');
        unlink($table . '.csv');
        exit();
    }

?>