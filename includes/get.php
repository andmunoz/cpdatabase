<?php

    require_once("common.inc.php");
    require_once("database.inc.php");
    $table = $_GET["data"];

    $data = get_table($table, NULL, NULL, "Nombre ASC", NULL, true);

    header ('Content-type: application/json');
    echo "{ \"" . $table . "\":" . json_encode($data) . " }";
    exit();

?>