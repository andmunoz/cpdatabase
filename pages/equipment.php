<?php
    $page    = $_GET["page"];
    $class   = $_GET["class"];
    $filters = get_table($class . "_View", array("Tipo"), NULL, "Tipo", true);
    $filter  = (isset($_GET["filter"])?$_GET["filter"]:false);
    $order   = (isset($_GET["orderby"])?$_GET["orderby"]:false);
    $data    = get_table($class . "_View", NULL, ($filter?array("Tipo = '" . $filter . "'"):NULL), ($order?$order:NULL), false);
    $base    = "page=" . $page . "&class=" . $class;
    $columns = array("Id", "Nombre", "Tipo", "Categoria", "Disponibilidad", "Dano", "Peso", "Costo");
?>
<div class="row">
    <div class="col s12 m12 l12">
        <blockquote>
            <h4>Maestro de <?php echo $class; ?></h4>
        </blockquote>
    </div>
</div>
<div class="row">
    <div class="input-field col s12 m6 l4">
        <select onChange="window.location.href='?<?php echo $base ?>&filter=' + this.value;">
            <option value="" <?php if (!$filter) echo "selected"; ?>>Todas</option>
            <?php
                foreach ($filters as $f) {
                    ?>
                        <option value="<?php echo $f["Tipo"]; ?>" <?php if ($filter == $f["Tipo"]) echo "selected"; ?>><?php echo $f["Tipo"]; ?></option>
                    <?php
                }
            ?>
        </select>
    <label>Filtro por Tipo:</label>
    </div>
    <div class="col s12 m6 l8 right-align">
        <a href="includes/export.php?format=csv&data=<?php echo $class; ?>" target="_blank" class="waves-effect red waves-light btn"><i class="material-icons left">cloud_download</i>Exportar CSV</a>
        <a href="includes/export.php?format=json&data=<?php echo $class; ?>" target="_blank" class="waves-effect red waves-light btn"><i class="material-icons left">cloud_download</i>Exportar JSON</a>
    </div>
</div>
<?php
    if ($data) {
        $keys = array_keys($data[0]);
?>
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
                <th>&nbsp;</th>
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
                        ?>
                            <td>
                                <a class="waves-effect waves-light btn modal-trigger" href="#modal<?php echo $row["Id"]; ?>">
                                    <i class="material-icons">chevron_right</i>
                                </a>

                                <div id="modal<?php echo $row["Id"]; ?>" class="modal">
                                    <div class="modal-content">
                                        <h4><?php echo $row["Nombre"]; ?></h4>
                                        <p><?php echo $row["Descripcion"]; ?></p>
                                        <div class="row">
                                            <div class="col s6 m6 l6">
                                                <table class="striped">
                                                    <tbody>
                                                        <?php
                                                            foreach ($keys as $key) {
                                                                if ($key!="Id" && $key!="Nombre" && $key!="Descripcion" && $key!="Version") {
                                                                    echo "<tr><td>" . $key . "</td><td>" . $row[$key] . "</td></tr>\n";
                                                                }
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col s6 m6 l6">
                                                <img src="<?php echo get_image($class, $row["Id"]); ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                    </div>
                                </div>
                            </td>
                        <?php
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
