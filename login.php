<?php
session_start();
// Conectar a la base de datos (cambia las credenciales según tu configuración)
$conexion = new mysqli("localhost", "root", "", "MYP2");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

print_r($_POST);

// Recibir datos del formulario de inicio de sesión
$nombre = $_POST["nombre"];
$password = $_POST["password"];

// Buscar al usuario en la base de datos
$consulta = "SELECT  nombre, password FROM usuarios WHERE nombre = '$nombre'";
echo $consulta;
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    if (password_verify($password, $fila["password"])) {
        // Inicio de sesión exitoso
        $_SESSION["usuarios"] = $email;
        header("Location: perfil2.html"); // Redirige a una página de panel o dashboard
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Nombre de usuario no encontrado.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
