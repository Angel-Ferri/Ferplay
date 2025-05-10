<?php
$stmt = $conexion->prepare("SELECT nombre, link, id, icono FROM recopilacion WHERE email = :email");
$stmt->execute(['email' => $email]);
$links = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo '<div class="Controlador-muestro">';

if (count($links) > 0) {
    foreach ($links as $link) {
        echo '<h3>Nombre: </h3><p>' . $link['nombre']. '</p>';
        echo '<img src="'.$link['icono'].'" alt="Icono">';
        echo '<h3>Link: </h3><a href="'.$link['link'].'"><p>' . $link['link'] . '</p></a>';
        echo '<form method="post" onsubmit="return confirmarEliminacion();" style="display:inline;">
                <input type="hidden" name="ideliminar" value="' . $link['id'] . '">
                <input type="submit" value="Eliminar">
              </form><br>';
    }
echo '</div>';

}else {
    echo '<div class="Controlador-muestro">';
    echo '<h3 class="no-carga">No hay links cargados</h3>';
    echo '<img src="partes/img/triste.png" alt="Mono Triste">';
    echo '</div>';
}
?>

<?php
// Lógica de eliminación
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ideliminar'])) {
    $ideliminar = $_POST['ideliminar'];
    $conexion->query("DELETE FROM recopilacion WHERE id = '$ideliminar'");
    // Opcional: redirigir para evitar reenviar el form si se refresca
    header("Location: controlador.php");
    exit;
}
?>