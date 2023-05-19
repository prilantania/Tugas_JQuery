<?php
    include "koneksi.php";

    $query = mysqli_query($conn, "SELECT * FROM customer");
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Data Customer</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    </head>

    <body>
        <div class="container"> <br /> <br />
            <a class="btn btn-success" href="tambah.php">Tambah Customer</a> <br /> <br />
            <table id="customerTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Alamat</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><a class="btn btn-info" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                            <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <script>
            $(document).ready(function() {
                $('#customerTable').DataTable();
            });
        </script>


    </body>
</html>
