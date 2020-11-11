<?php

    define("ROOT", "pages");

    function call_page($file) {
        $location = ROOT . "/" . $file;
        if (!file_exists($location)) {
            include (ROOT . "/error404.php");
            return;
        }
        include ($location);
    }

?>