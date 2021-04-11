<?php

include("db.php");

if (isset($_POST["save_task"])) {
  $titulo = $_POST["titulo"];
  $descripcion = $_POST["descripcion"];

  $query = "INSERT INTO tarea(titulo, descripcion) VALUE ('$titulo', '$descripcion')";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    $_SESSION['message'] = 'No se pudo guardar tarea';
    $_SESSION['message_type'] = 'danger';
    die("Falló consulta");
  };

  $_SESSION['message'] = 'Tarea Guardada Exitosamente';
  $_SESSION['message_type'] = 'success';

  header("Location: index.php");
}

?>