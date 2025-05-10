<?php include 'partes/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="partes/estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferplay</title>
</head>
<body>
    <div class="conteiner">
        <?php include 'partes/barra.html'; ?>
        <div class="main">
            <div class="pantalla">
                <div class="adapto"></div>
            </div>
            <div class="controlfor">

            
                <h3>Control</h3>

                <?php
                // Consulta combinada nombre + link
                include 'partes/control.php';
                ?>

                <script>
                    // Esperamos a que cargue el DOM
                    document.addEventListener("DOMContentLoaded", () => {
                        const botones = document.querySelectorAll(".canal-boton");
                        const contenedor = document.querySelector(".adapto");

                        botones.forEach(boton => {
                            boton.addEventListener("click", () => {
                                const link = boton.dataset.link;
                                contenedor.innerHTML = `<iframe src="${link}" frameborder="0" width="100%" height="430px"></iframe>`;
                            });
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</body>
</html>
