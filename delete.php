<?php
    include_once("koneksi.php");
    $id = $_GET['id'];
    $result = mysqli_query($conn, "DELETE FROM customer WHERE id='$id'");
    header("Location:indexx.php");
?>