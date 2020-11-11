<?php

    require_once("common.inc.php");
    require_once("database.inc.php");

    $entities = array("Personaje", "Roles_View", "Habilidades", "Armas", "Blindaje", "Ciberequipo", "Ropa", "Equipo", "Vehiculos");
    $format = $_GET["format"];
    $data = array();
    foreach($entities as $table) {
        $data[$table] = get_table($table, NULL, NULL, "Nombre ASC", NULL, true);
    }

    if ($format == "json") {
        header ('Content-type: application/json');
        header('Content-Disposition: attachment; filename="export.json";');
        echo json_encode($data);
        exit();
    }
    else {
        $fp = fopen('export.csv', 'w');
        fputcsv($fp, array_keys($data[0]));
        foreach($data as $row){
            fputcsv($fp, $row);
        }
        fclose($fp);    
        header("Content-Description: File Transfer");
        header("Content-Type: application/csv; ");
        header('Content-Disposition: attachment; filename="export.csv";');
        readfile('export.csv');
        unlink('export.csv');
        exit();
    }

?>