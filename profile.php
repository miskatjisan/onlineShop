<?php 
    include "inc/header.php";
?>

<?php 
	$login = session::get("cmrLogin");
	if ($login == false) {
	header("Location:login.php");
	}
	
?>

<div class="top-section my-4">
<div class="container-fluid">
<?php 
	$id = session::get("cmrId");
	$getData = $cmr->getCustomerData($id);
		if ($getData) {
			while ($result = $getData->fetch_assoc()) {
			
?>
<table class="tbl1">
	<tr>
		<td colspan="3"><h2 class="h2">USER PROFILE</h2></td>
	</tr>
	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?php echo $result['name']; ?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php echo $result['address']; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $result['email']; ?></td>
	</tr>
	<tr>
		<td>Phone Number</td>
		<td>:</td>
		<td><?php echo $result['phone']; ?></td>
	</tr>
	<tr>
		<td>City</td>
		<td>:</td>
		<td><?php echo $result['city']; ?></td>
	</tr>
	<tr>
		<td>Country</td>
		<td>:</td>
		<td><?php echo $result['country']; ?></td>
	</tr>
	<tr>
		<td>Zip Code</td>
		<td>:</td>
		<td><?php echo $result['zip']; ?></td>
	</tr>
	
	
	<tr>
		<td></td>
		<td></td>
		<td><a href="userUpdate.php" class="btn-primary"> User Update </a></td>
	
	</tr>
</table>
<?php } } ?>
</div>
</div>

<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath."/inc/footer.php");
?>