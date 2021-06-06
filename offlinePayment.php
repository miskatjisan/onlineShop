 <?php 
    include "inc/header.php";  
?>
<?php 
	$login = session::get("cmrLogin");
	if ($login == false) {
	header("Location:login.php");
	}	
?>
<?php 
	if (isset($_GET['orderid']) && $_GET['orderid'] == "order") {
		$cmrId = session::get("cmrId");
		$Insertorder = $cart->OrderProduct($cmrId);
		 $delData = $cart->deleteCostomerCart();
		header("Location:success.php");
	}
?>
<div class="top-section my-4">
  <div class="container-fluid">
    <div class="row">
<!-- Cart -->
<div class="col-md-7">
<div class="row">	
 <div class=" mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
              
                <table class="table table-striped" style="width:650px;">
                    <thead>
                        <tr>
                            <th scope="col">Sirial</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Total Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                     <?php 
                          $getCartPro = $cart->getCartProduct();
                          if ($getCartPro) {
                            $i = 0;
                            $sum = 0;
                            $Qnty = 0;
                            while ($result = $getCartPro->fetch_assoc()) {
                             $i++; ?>

                    <tbody>
                       <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['productName']; ?></td>
                            <td >$<?php echo $result['price']; ?></td>
                            <td ><?php echo $result['quantity']; ?></td>
                           
                            <td class="text-right">$
                              <?php 
                                  $total = $result['price'] * $result['quantity'];
                                  echo $total;
                              ?>
                                
                              </td>
                              
                            
                        </tr>
                          <?php
                              $Qnty = $Qnty + $result['quantity'];
                              $sum = $sum + $total;
                           } 
                         } 
                           ?>
                           <?php
                           $chackData = $cart->chackData();
                              if ($chackData) {
                          ?>
                        
                        <tr>
                             
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">$
                              <?php 
                                
                                echo $sum ; 

                              ?> </td>
                        </tr>
                        <tr>
                           
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Vat 10%</td>
                            <td class="text-right">$
                              <?php 
                                  $vat = $sum * 0.1;
                                  echo $vat;
                              ?> 
                              </td>
                        </tr>
                        <tr>
                            
                           
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>$
                            	<?php 
                                  $grandtotal = $sum + $vat;
                                  echo $grandtotal;
                                  session::set("grandtotal" , $grandtotal);
                                  
                               ?> 
                               </strong></td>
                        </tr>
                           <tr>
                           
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Quantity</td>
                            <td class="text-right">
                              <?php echo $Qnty;?> 
                              </td>
                        </tr>
                  <?php
                       }else{
                       echo  "<script> window.location = 'index.php'; </script>";
                      } ?>
                      </tbody>
                        </table>
                    
               
              
            </div>
        </div>
        
    </div>
</div>


	   </div>
   </div>
<!-- end -->
<!-- profile -->
<div class="col-md-5">
	<div class="row">
		<div class=" mb-4">
			<div class="col-12">
				<div class="table-responsive">

<?php 
	$id = session::get("cmrId");
	$getData = $cmr->getCustomerData($id);
		if ($getData) {
			while ($result = $getData->fetch_assoc()) {
			
?>
<table class="table table-striped" style="width: 430px;">
	<tr>
		<td colspan="3"><h4 class="h4">USER PROFILE</h4></td>
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
		<td><a href="userUpdate.php" class="btn-primary" style="padding: 10px; border-radius: 5px;"> User Update </a></td>
	
	</tr>
</table>
<?php } } ?>
  </div>
            </div>
        </div>
        </div>
        </div>

<!-- end -->
<div class="back">
		<a href="?orderid=order"> ORDER NOW </a>
	</div>

                </div>
            </div>
        </div>
<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath."/inc/footer.php");
?>       