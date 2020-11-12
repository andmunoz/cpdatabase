<?php
    $data = get_table("Habilidades");
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
                        if ($key!="Id" && $key!="Version") {
                            echo "<th>" . $key . "</th>\n";
                        }
                    }
                ?>
            </thead>
            <tbody>
                <?php
                    foreach ($data as $row) {
                        echo "<tr>\n";
                        foreach ($keys as $key) {
                            if ($key!="Id" && $key!="Version") {
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