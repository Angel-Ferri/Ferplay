<?php
$linkcanal = $conexion->query("SELECT nombre, link, icono FROM `recopilacion`");
foreach ($linkcanal as $index => $canal) {
    $nombre = htmlspecialchars($canal['nombre']);
    $link = htmlspecialchars($canal['link']);
    $icono = htmlspecialchars($canal['icono']);

    echo "<button data-link='$link'>";
    echo '<div class="opcanal">
            <p>'.$nombre.'</p>
            <img src="'.$icono.'" alt="Icono">
        </div>';
    echo "</button>";
}
?>
