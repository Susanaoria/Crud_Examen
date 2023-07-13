<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM autos WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        $_SESSION['message'] = 'Error al eliminar el auto.';
        $_SESSION['message_type'] = 'danger';
    } else {
        $_SESSION['message'] = 'Auto eliminado exitosamente.';
        $_SESSION['message_type'] = 'success';
    }

    header('Location: index.php');
}
?>
