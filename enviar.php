
<?php $conn=@mysqli_connect("localhost","root","","MYP2") or die("No se pudo conectar al servidor");

//se arma el array POST
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$localidad=$_POST['localidad'];
$comentario=$_POST["comentario"];

$destino="mail@mail.com,mail2@mail.com";
$asunto="Contacto desde el sitio";
$mensaje="Nombre: ".$nombre." Email: ".$email." Localidad: ".$localidad." Mensaje: ".$comentario;

$tabla = "contactos";
$conexion=mysqli_connect("localhost","root","","MYP2") or die("No se pudo conectar al servidor");
$bbdd=mysqli_select_db($conexion,'MYP2') or die("No se puedo seleccionar la base de datos elegida");

$consulta=mysqli_query("INSERT INTO contactos VALUES
 ('','$nombre','$email','$localidad','$comentario')",$conexion);

$pedido = "INSERT INTO `contactos`(id, nombre,email,localidad,comentario) VALUES ('','$nombre','$email','$localidad','$comentario');";
$consulta=mysqli_query($conexion,$pedido) or die(mysqli_error());


?>
