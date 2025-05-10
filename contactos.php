<?php
    include 'partes/conexion.php';

    session_start(); // Iniciar la sesión

    if (isset($_POST['start'])) {  
        // Verifica si se ha enviado el formulario
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email AND password = :password");
        $stmt->execute(['email' => $email, 'password' => $password]);
        
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['email'] = $user['email'];
            header("Location: controlador.php");
            exit();
        }
        else {
            echo '<script>
                alert("No se pudo iniciar, revisar la contraseña o el email.");
                window.location.href = "contactos.php";
            </script>';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
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
        <a class='cuadros-a' href="https://www.linkedin.com/in/angel-ferri-668612359/" target="_blank">
            <div class="cuadros">
                <img src="partes/img-contactos/linkedin.png" class="contacto" alf="Linkedin">
                <h3 class="h3-a" >Visita mi Perfil</h3>

            </div>
        </a>
        <a class='cuadros-a' href="https://github.com/Angel-Ferri" target="_blank">
            <div class="cuadros">
                <img src="partes/img-contactos/github.webp" class="contacto" alf="Github">
                <h3 class="h3-a">Visita mi Repositorio</h3>

            </div>
        </a>
            <dialog class="miModal" id="miModal">
                <form  class="login" method="post">
                <h1><u>Admin</u></h1>
                    <label>Correo:<input type="text" name="email" require></label>
                    <label>Contraseña:<input type="text" name="password" require></label>
                    <input type="submit" value="Iniciar Sesion" name="start">
                </form>
                <button onclick="this.parentNode.close()"  class='boton'>Cerrar</button>
            </dialog>

        </div>
        <footer>
        <button onclick="document.getElementById('miModal').showModal()" class='boton'>LOGIN ADMIN</button>

        </footer>
    </div>
</body>
</html>