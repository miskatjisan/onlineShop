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
	
	<h1 class="title"> CHOOSE PAYMENT OPTION </h1>
	<div class="payment">
	<a href="offlinePayment.php"> OFFLINE PAYMENT </a>
	<a href="onlinePayment.php"> ONLINE PAYMENT </a>
	</div>
	<div class="back">
		<a href="cart.php"> PREVIOUS </a>
	</div>
	</div>
</div>
<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath."/inc/footer.php");
?>