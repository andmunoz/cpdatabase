<?php

    define("DBFILE", "./Cyberpunk.db");

    function get_table($table_name, $columns = NULL, $conditions = NULL, $order_by = NULL, $distinct = NULL, $numbers = NULL) {
        $query = "SELECT " . ($distinct?"DISTINCT ":"") . ($columns?implode(',', $columns):"*")
               . " FROM " . $table_name . " "
               . ($conditions?"WHERE " . implode(' AND ', $conditions):"")
               . ($order_by?"ORDER BY " . $order_by:"");
        $result = null;
        $db = new PDO('sqlite:' . DBFILE);
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
        return $result;
    }

    function get_table_row($table, $id) {
        return get_table($table, NULL, "id = " . $id);
    }

?>
