<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $marca = $_POST['marca'];
  $precio = $_POST['precio'];
  $kilometraje = $_POST['kilometraje'];
  $color = $_POST['color'];

  $query = "INSERT INTO autos (marca, precio, kilometraje, color) VALUES ('$marca', $precio, $kilometraje, '$color')";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Auto guardado correctamente.';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');
}

?>
