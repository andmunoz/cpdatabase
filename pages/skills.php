<?php
    $filters = get_table("Habilidades", array("Atributo"), NULL, "Atributo", true);
    $filter  = (isset($_GET["filter"])?$_GET["filter"]:false);
    $order   = (isset($_GET["orderby"])?$_GET["orderby"]:false);
    $data    = get_table("Habilidades", NULL, ($filter?array("Atributo = '" . $filter . "'"):NULL), ($order?$order:NULL), true);
    $base    = "page=skills";
    $columns = array("Id", "Nombre", "Atributo", "Dificultad", "Descripcion");
?>
<div class="row">
    <div class="col s12 m12 l12">
        <blockquote>
            <h4>Maestro de Habilidades</h4>
        </blockquote>
    </div>
</div>
<?php
    if ($data) {
        $keys = array_keys($data[0]);
?>
<div class="row">
    <div class="input-field col s12 m6 l4">
        <select onChange="window.location.href='?<?php echo $base ?>&filter=' + this.value;">
            <option value="" <?php if (!$filter) echo "selected"; ?>>Todas</option>
            <?php
                foreach ($filters as $f) {
                    ?>
                        <option value="<?php echo $f["Atributo"]; ?>" <?php if ($filter == $f["Atributo"]) echo "selected"; ?>><?php echo $f["Atributo"]; ?></option>
                    <?php
                }
            ?>
        </select>
        <label>Filtro por Atributo:</label>
    </div>
    <div class="col s12 m12 l12 right-align">
        <a href="includes/export.php?format=csv&data=Habilidades" target="_blank" class="waves-effect red waves-light btn"><i class="material-icons left">cloud_download</i>Exportar CSV</a>
        <a href="includes/export.php?format=json&data=Habilidades" target="_blank" class="waves-effect red waves-light btn"><i class="material-icons left">cloud_download</i>Exportar JSON</a>
    </div>
</div>
<div class="row">
    <div class="col s12 m12 l12">
        <table class="highlight">
            <thead>
                <?php
                    foreach ($keys as $key) {
                        if (array_search($key, $columns)) {
                            echo "<th>" . ($order == $key . " ASC"?"<a href=\"?" . $base . "&filter=" . $filter . "&orderby=" . $key . " DESC\">" . $key . "<i class=\"small material-icons\">arrow_drop_up</i></a>":"<a href=\"?" . $base . "&filter=" . $filter . "&orderby=" . $key . " ASC\">" . $key . "<i class=\"small material-icons\">arrow_drop_down</i></a>") . "</th>\n";
                        }
                    }
                ?>
            </thead>
            <tbody>
                <?php
                    foreach ($data as $row) {
                        echo "<tr>\n";
                        foreach ($keys as $key) {
                            if (array_search($key, $columns)) {
                                echo "<td>" . $row[$key] . "</td>\n";
                            }
                        }
                        echo "</tr>\n";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    }
    else {
?>
<div class="row">
    <div class="col s12 m12 l12">
        No hay resultados disponibles
    </div>
</div>
<?php
    }
?>