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

<?php 
include_once("koneksi.php");
$id = $_GET["id"];
$query = mysqli_query($conn, "SELECT * FROM customer WHERE id='$id'");
while($customer = mysqli_fetch_array($query)){
    $namaDepan = $customer['first_name'];
    $namaBelakang = $customer['last_name'];
    $surel = $customer['email'];
    $noTlp = $customer['phone'];
    $alamat = $customer['address'];
}
?>

<body>
		<div class="container"> <br /> <br />
			<form id="customerForm" action="prosestambah.php" method="post">
				<table class="table table-striped">
						<tr>
							<td>first name</td>
							<td><input type="text" name="first_name" data-name="First Name" class="required"></td>
						</tr>
						<tr>
							<td>last name</td>
							<td><input type="text" name="last_name" data-name="Last Name" class="required"></td>
						</tr>
						<tr>
							<td>email</td>
							<td><input type="text" name="email" data-name="Email" class="required"></td>
						</tr>
						<tr>
							<td>phone</td>
							<td><input type="text" name="phone" data-name="Phone" class="required"></td>
						</tr>
						<tr>
							<td>address</td>
							<td><input type="text" name="address" data-name="Address" class="required"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="Submit" value="tambah" class="btn btn-danger"></td>
						</tr>
				</table>
			</form>
		</div>

		<script>
			$(document).ready(function() {
				$('#customerForm').submit(function(e) {
					e.preventDefault(); 
					$('.error').remove();

					$('.required').each(function() {
						if ($(this).val() === '') {
							var columnName = $(this).data('name');
							
							$(this).after('<span class="error">' + columnName + ' is required</span>');
							$(this).css('border-color', 'red');
						}
					});

					if ($('.error').length === 0) {
						$(this).unbind('submit').submit();
					}
				});

				$('.required').keyup(function() {
					$(this).next('.error').remove();
					$(this).css('border-color', '');
				});
			});
		</script>
	</body>
</html>
