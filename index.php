<?php include("db.php"); ?>
<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAJES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- FORMULARIO PARA AGREGAR UN NUEVO AUTO -->
      <div class="card card-body">
        <form action="save_auto.php" method="POST">
          <div class="form-group">
            <input type="text" name="marca" class="form-control" placeholder="Marca del Auto" autofocus>
          </div>
          <div class="form-group">
            <input type="float" name="precio" class="form-control" placeholder="Precio del Auto">
          </div>
          <div class="form-group">
            <input type="float" name="kilometraje" class="form-control" placeholder="Kilometraje del Auto">
          </div>
          <div class="form-group">
            <input type="text" name="color" class="form-control" placeholder="Color del Auto">
          </div>
          <input type="submit" name="save_auto" class="btn btn-success btn-block" value="Guardar Auto">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID del Auto</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Kilometraje</th>
            <th>Color</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM autos";
          $result_autos = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_autos)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['marca']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td><?php echo $row['kilometraje']; ?></td>
            <td><?php echo $row['color']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
