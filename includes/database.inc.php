<?php

    define("DBFILE", getcwd() . "/includes/data/Cyberpunk.db");

    function get_table($table_name, $columns = NULL, $conditions = NULL, $order_by = NULL, $distinct = NULL, $numbers = NULL) {
        $query = "SELECT " . ($distinct?"DISTINCT ":"") . ($columns?implode(',', $columns):"*")
               . " FROM " . $table_name . " "
               . ($conditions?"WHERE " . implode(' AND ', $conditions):"")
               . ($order_by?"ORDER BY " . $order_by:"");
        $result = null;
        try {
            $db = new PDO('sqlite:' . DBFILE, null, null, array(PDO::ATTR_PERSISTENT => true));
            $data = $db->query($query);
            if ($data) {
                $data = $data->fetchAll();
                $result = array();
                foreach($data as $row) {
                    $new_row = array();
                    $i = 0;
                    foreach($row as $key => $value) {
                        if (!is_numeric($key)) {
                            $new_key = ($numbers?($i<10?'0':'') . $i . '_':'') . $key;
                            $new_row[$new_key] = $value;
                            $i++;
                        }
                    }
                    array_push($result, $new_row);
                }
            }
            $db = null;
        } catch (Exception $ex) {
            echo "<br/>Error message: " . $ex->getMessage() . " (" . DBFILE . ")";
        }
        return $result;
    }

    function get_table_row($table, $id) {
        return get_table($table, NULL, "id = " . $id);
    }

?>
