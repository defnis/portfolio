<?php
if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $para = 'josewaiman@gmail.com';
  $titulo = 'Mensaje desde el formulario de contacto';
  $contenido = "Nombre: $nombre\nTeléfono: $telefono\nCorreo: $correo\nTema: $tema\nMensaje: $mensaje";

  mail($para, $titulo, $contenido);

  echo 'Mensaje enviado';
}
?>


