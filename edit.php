<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM autos WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $marca = $row['marca'];
        $precio = $row['precio'];
        $kilometraje = $row['kilometraje'];
        $color = $row['color'];
    }
}

if (isset($_POST['update_auto'])) {
    $id = $_GET['id'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $kilometraje = $_POST['kilometraje'];
    $color = $_POST['color'];

    $query = "UPDATE autos SET marca = '$marca', precio = $precio, kilometraje = $kilometraje, color = '$color' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        $_SESSION['message'] = 'Error al actualizar el auto.';
        $_SESSION['message_type'] = 'danger';
    } else {
        $_SESSION['message'] = 'Auto actualizado exitosamente.';
        $_SESSION['message_type'] = 'success';
    }

    header('Location: index.php');
}
?>

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

      <!-- FORMULARIO PARA ACTUALIZAR UN AUTO -->
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group">
            <input type="text" name="marca" class="form-control" placeholder="Marca del Auto" value="<?php echo $marca; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="float" name="precio" class="form-control" placeholder="Precio del Auto" value="<?php echo $precio; ?>">
          </div>
          <div class="form-group">
            <input type="float" name="kilometraje" class="form-control" placeholder="Kilometraje del Auto" value="<?php echo $kilometraje; ?>">
          </div>
          <div class="form-group">
            <input type="text" name="color" class="form-control" placeholder="Color del Auto" value="<?php echo $color; ?>">
          </div>
          <button class="btn btn-success" name="update_auto">
            Actualizar
          </button>
        </form>
      </div>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
