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
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $time = $_GET['time'];
        $cmrId = $_GET['cmrId'];
        $shiftConfirm = $cart->shiftProductConfirm($id, $time, $cmrId);
        
    }
?>
 <div class="top-section my-4">
<div class="container-fluid">
<h1 class="title"> YOUR ORDER DETAILS </h1>
<div class="col-12">
            <div class="table-responsive">
              
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Sirial</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Date</th>
                            <th scope="col" class="text-center">Status</th>
                            <th> </th>
                        </tr>
                    </thead>
                     <?php 
                     	  $cmrId = session::get("cmrId");
                          $getOrder = $cart->getOrderProduct($cmrId);
                          if ($getOrder) {
                            $i = 0;
                            while ($result = $getOrder->fetch_assoc()) {
                             $i++; ?>

                    <tbody>
                       <tr style="text-align: center;">
                            <td><?php echo $i; ?></td>
                            <td><img style="width: 40px;height: 40px;" src="admin/<?php echo $result['image']; ?>" /> </td>
                            <td><?php echo $result['productName']; ?></td>
                             <td ><?php echo $result['quantity']; ?></td>
                            <td >$<?php echo $result['price']; ?> + VAT(10%)</td>
                            <td ><?php echo $fm->formatDate($result['date']); ?></td>
                            <td>
                            	<?php 
                            		if ($result['status'] == '0') {
                            			echo "Pending";
                            		}elseif ($result['status'] == '1') {
                                  echo "Shifted"; 
                                 }else {
                            			echo "Confirmed";
                            		}
                            	?> 
                            </td>  
                            
                            	<?php 
                            		if ($result['status'] == '1') { ?>
                            		 	<td class="text-right"><a href="?id=<?php echo $result['id']; ?>&time=<?php echo $result['date']; ?>&cmrId=<?php echo $result['cmrId']; ?>">Confirmed</a> </td>
                            		<?php }elseif ($result['status'] == '2') {?>
                                        <td class="text-right">Ok</td>
                               <?php }elseif ($result['status'] == '0') { ?>
                            				<td class="text-right">N/A</td>
                            			<?php } ?>	    
                        </tr>
                      </tbody>
                  <?php } } ?>
                        </table>
            </div>
        </div>

   </div>
</div>
<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath."/inc/footer.php");
?>