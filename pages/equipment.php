<?php
    $page    = $_GET["page"];
    $class   = $_GET["class"];
    $filters = get_table($class . "_View", array("Categoria"), NULL, "Categoria", true);
    $filter  = (isset($_GET["filter"])?$_GET["filter"]:false);
    $data    = get_table($class . "_View", NULL, ($filter?array("Categoria = '" . $filter . "'"):NULL), NULL, false);
    $base    = "page=" . $page . "&class=" . $class;
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
                        <option value="<?php echo $f["Categoria"]; ?>" <?php if ($filter == $f["Categoria"]) echo "selected"; ?>><?php echo $f["Categoria"]; ?></option>
                    <?php
                }
            ?>
        </select>
    <label>Filtro por Categoría:</label>
    </div>
    <div class="col s12 m6 l8 right-align">
        <a href="includes/export.php?format=csv&data=<?php echo $class; ?>" target="_blank" class="waves-effect red waves-light btn"><i class="material-icons left">cloud_download</i>Exportar CSV</a>
        <a href="includes/export.php?format=json&data=<?php echo $class; ?>" target="_blank" class="waves-effect red waves-light btn"><i class="material-icons left">cloud_download</i>Exportar JSON</a>
        <a href="includes/import.php?format=json&data=<?php echo $class; ?>" target="_blank" class="waves-effect red waves-light btn"><i class="material-icons left">cloud_upload</i>Importar CSV</a>
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
                        if ($key!="Id" && $key!="Descripcion" && $key!="Version" && $key!="Marca" && $key!="Modelo" && $key!="Disimulo" && $key!="Calibre" && $key!="Balas" && $key!="VD" && $key!="Precision" && $key!="Alcance" && $key!="Requisito" && $key!="Ajustes" && $key!="CP" && $key!="PDE" && $key!="Velocidad_Maxima" && $key!="Aceleracion" && $key!="Desaceleracion" && $key!="Operacion_Dificultad" && $key!="Operacion_Duracion" && $key!="Operacion_Dano" && $key!="Operacion_Costo" && $key!="Implante_Costo") {
                            echo "<th>" . $key . "</th>\n";
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
                            if ($key!="Id" && $key!="Descripcion" && $key!="Version" && $key!="Marca" && $key!="Modelo" && $key!="Disimulo" && $key!="Calibre" && $key!="Balas" && $key!="VD" && $key!="Precision" && $key!="Alcance" && $key!="Requisito" && $key!="Ajustes" && $key!="CP" && $key!="PDE" && $key!="Velocidad_Maxima" && $key!="Aceleracion" && $key!="Desaceleracion" && $key!="Operacion_Dificultad" && $key!="Operacion_Duracion" && $key!="Operacion_Dano" && $key!="Operacion_Costo" && $key!="Implante_Costo") {
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
                                                <img src="images/_No-Photo.jpg"/>
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
