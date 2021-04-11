<?php include("db.php") ?>

<?php include("includes/header.php")?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <?php if(isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php session_unset();} ?>

      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="mb-3">
            <input type="text" name="titulo" class="form-control" placeholder="Titulo de tarea" autofocus>
          </div>
          <div class="mb-3">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de tarea"></textarea>
          </div>
          <div class="d-grid gap-2">
            <input type="submit" class="btn btn-success" name="save_task" value="Guardar tarea">
          </div>
        </form>
      </div>
      
      </div>
      <div class="col-md-8">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Título</th>
              <th>Descripción</th>
              <th>Fecha creación</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $query = "SELECT * FROM tarea";
              $resultado_tareas = mysqli_query($conn, $query);

              while($row = mysqli_fetch_array($resultado_tareas))  { ?>
                <tr>
                  <td><?php echo $row['titulo']?></td>
                  <td><?php echo $row['descripcion']?></td>
                  <td><?php echo $row['fecha_creacion']?></td>
                  <td>
                    <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-secondary">
                      <i class="fas fa-marker"></i>
                    </a>
                    <a href="delete_task.php?id=<?php echo $row['id'];?>" class="btn btn-danger">
                      <i class="far fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
              
              <?php } ?>
          </tbody>
        </table>
    </div>
  </div>

</div>

<?php include("includes/footer.php")?>