<?php
include("db.php");
$title = '';
$descripcion = ':';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tarea WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $titulo = $row['titulo'];
    $descripcion = $row['descripcion'];
  }
}

if (isset($_POST['actualizar'])) {
  $id = $_GET['id'];
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];

  $query = "UPDATE tarea set titulo = '$titulo', descripcion = '$descripcion' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Tarea actualizada exitosamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
          <div class="mb-3">
            <input type="text" name="titulo" value="<?php echo $titulo;?>" class="form-control" placeholder="Actualiza el título">
          </div>
          <div class="mb-3">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Actualiza la descripción"><?php echo $descripcion;?></textarea>
          </div>
          <div class="d-grid gap-2">
            <button class="btn btn-success" name="actualizar">
              Actualizar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>