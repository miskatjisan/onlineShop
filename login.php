<?php 
    include "inc/header.php";
?>
<?php 
	$login = session::get("cmrLogin");
	if ($login == true) {
	header("Location:order.php");
	}
	
?>
<?php 
	 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Login'])){
	 	$email = $fm->validation($_POST['email']);
		$password = $fm->validation(md5($_POST['password']));

	 	$costomerLog = $cmr->costomerLogin($email, $password);
	 }
?>
 <div class="top-section my-4">
       <div class="container-fluid">
           <div class="row">	
<!-- Login -->
<div class="col-md-4">
<div class="row">
<div class="col-sm-12">
<?php 
	if (isset($costomerLog)) {
		 echo $costomerLog;
		}
?>
<h1 class="title"> Login  </h1>
	<form action="" method="post">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-12 form-group">
					<label>E-mail</label>
					<input type="text" name="email" placeholder="Enter Email Address Here.." class="form-control">
				</div>
					<div class="col-sm-12 form-group">
						<label>Password</label>
						<input type="password" name="password" placeholder="Enter Password Here.." class="form-control">
						 	</div>
						 	<div class="col-sm-12 form-group">
						 		<p> If you forget your password just enter your email and <a href=""> Click Here. </a></p>
						 	</div>
						 </div>
						 	<input type="submit" name="Login" class="btn btn-lg btn-info" value=" Sign In "/>
						 </div>
						 </form>
			
		</div>
	</div>
</div>
<!-- End Login -->

		
<?php 
     if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['register'])){
     	
     		$name = $fm->validation($_POST['name']);
			$address = $fm->validation($_POST['address']);
			$city = $fm->validation($_POST['city']);
			$country = $fm->validation($_POST['country']);
			$zip = $fm->validation($_POST['zip']);
			$phone = $fm->validation($_POST['phone']);
			$email = $fm->validation($_POST['email']);
			$password = $fm->validation (md5($_POST['password']));
     	
        $costomerReg = $cmr->costomerRegistration($name ,$address, $city, $country, $zip, $phone, $email, $password);
     }
?> 
<!-- Register -->
<div class="col-md-8">
	<div class="row">
		<div class="col-sm-12">
			<?php 
				if (isset($costomerReg)) {
					echo $costomerReg;
				}
			?>
    		<h1 class="title"> REGISTRETION  </h1>
				<form action="" method="post">
					<div class="col-sm-12">
						<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" placeholder="Enter Your Name Here.." class="form-control">
					</div>				
						<div class="form-group">
							<label>Address</label>
							<textarea name="address" placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" name="city" placeholder="Enter City Name Here.." class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>country</label>
								<input type="text" name="country" placeholder="Enter Contry Name Here.." class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" name="zip" placeholder="Enter Zip Code Here.." class="form-control">
							</div>		
						</div>
											
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" name="phone" placeholder="Enter Phone Number Here.." class="form-control">
					</div>		
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" name="email" placeholder="Enter Email Address Here.." class="form-control">
					</div>	
					<div class="form-group">
						<label>Password</label>
						<input type="text" name="password" placeholder="Enter Password Here.." class="form-control" required="1">
					</div>
					<input type="submit" name="register" class="btn btn-lg btn-info" value=" Create Account " /> 					
					</div>
				</form> 			
		</div>
	</div>
</div>
<!-- End Register -->
	</div>
	</div>
	</div>

<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath."/inc/footer.php");
?>