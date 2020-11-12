<?php
    $data = get_table("Roles_View");
?>
<div class="row">
    <div class="col s12 m12 l12">
        <blockquote>
            <h4>Maestro de Roles</h4>
        </blockquote>
    </div>
</div>
<?php
    if ($data) {
        $keys = array_keys($data[0]);
?>
<div class="row">
    <div class="col s12 m12 l12 right-align">
        <a href="includes/export.php?format=csv&data=Roles_View" target="_blank" class="waves-effect red waves-light btn"><i class="material-icons left">cloud_download</i>Exportar CSV</a>
        <a href="includes/export.php?format=json&data=Roles_View" target="_blank" class="waves-effect red waves-light btn"><i class="material-icons left">cloud_download</i>Exportar JSON</a>
    </div>
</div>
<div class="row">
<?php
    foreach ($data as $row) {
    ?>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-content">
                <span class="card-title activator"><?php echo $row["Nombre"]; ?><i class="material-icons right">more_vert</i></span>
                <table class="striped">
                    <tr><td><b><?php echo $row["Especial"]; ?></b></td></tr>
                    <?php 
                        for ($i=1; $i<=9; $i++) {
                            echo "<tr><td>" . ($row["Habilidad_" . $i]?$row["Habilidad_" . $i]:"A elección (ver descripción)") . "</td></tr>\n";
                        }
                    ?>
                </table>
            </div>
            <div class="card-reveal">
                <span class="card-title activator"><?php echo $row["Nombre"]; ?><i class="material-icons right">more_vert</i></span>
                <p><?php echo $row["Descripcion"]; ?></p>
                <p>Cantidad de Implantes Sugeridos: <?php echo $row["Implantes"]; ?></p>
            </div>
        </div>
        <div class="card-action">
            <!-- a href="#">This is a link</a -->
        </div>
    </div>
    <?php
    }
?>
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