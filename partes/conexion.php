<?php
try {
    $conexion = new PDO("mysql:host=localhost;dbname=ferplay", "root", "");
    // echo "Conectado correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
include 'login.php';
?>
