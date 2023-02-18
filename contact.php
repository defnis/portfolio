<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recoger los datos del formulario
  $nombre = $_POST["nombre"];
  $telefono = $_POST["telefono"];
  $correo = $_POST["correo"];
  $tema = $_POST["tema"];
  $mensaje = $_POST["mensaje"];

  // Validar los datos
  $errores = array();
  if (empty($nombre)) {
    $errores[] = "El nombre es obligatorio.";
  }
  if (empty($telefono)) {
    $errores[] = "El número telefónico es obligatorio.";
  }
  if (empty($correo)) {
    $errores[] = "La dirección de correo es obligatoria.";
  } else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "La dirección de correo no es válida.";
  }
  if (empty($tema)) {
    $errores[] = "El tema es obligatorio.";
  }
  if (empty($mensaje)) {
    $errores[] = "El mensaje es obligatorio.";
  }

  // Enviar el correo electrónico si no hay errores
  if (empty($errores)) {
    $destinatario = "josewaiman@gmail.com";
    $asunto = "Nuevo mensaje de contacto";
    $cuerpo = "Nombre: $nombre\n" .
              "Teléfono: $telefono\n" .
              "Correo electrónico: $correo\n" .
              "Tema: $tema\n" .
              "Mensaje:\n$mensaje";
    $cabeceras = "From: $nombre <$correo>" . "\r\n" .
                 "Reply-To: $correo" . "\r\n" .
                 "X-Mailer: PHP/" . phpversion();

    if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
      // Mostrar un mensaje de éxito
      echo "<p>Su mensaje ha sido enviado correctamente. Me pondre en contacto con usted lo antes posible.</p>";
    } else {
      // Mostrar un mensaje de error
      echo "<p>Lo siento, ha habido un error al enviar su mensaje. Por favor, inténtelo de nuevo más tarde.</p>";
    }
  } else {
    // Mostrar los errores de validación
    echo "<ul>";
    foreach ($errores as $error) {
      echo "<li>$error</li>";
    }
    echo "</ul>";
  }
}
?>


