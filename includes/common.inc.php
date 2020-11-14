<?php

    define("ROOT", "pages");
    define("IMAGES", "images/item_images");
    define("NOPHOTO", "_No-Photo.jpg");

    function call_page($file) {
        $location = ROOT . "/" . $file;
        if (!file_exists($location)) {
            include (ROOT . "/error404.php");
            return;
        }
        include ($location);
    }

    function get_image($class, $id) {
        $location = IMAGES . "/" . $class . "/" . $id . ".jpg";
        if (!file_exists($location)) {
            $location = IMAGES . "/" . $class . "/" . NOPHOTO;
        }
        return $location;
    }

?>