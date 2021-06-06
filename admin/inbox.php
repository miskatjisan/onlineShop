<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/Cart.php');
    $cart   = new Cart();
    $fm     = new Format();
?>
<?php 
    
    if (isset($_GET['shiftid'])) {
        $cmrId = $_GET['shiftid'];
        $time = $_GET['time'];
        //$price = $_GET['orderprice'];
        $shift = $cart->shiftProduct($cmrId, $time);
        
    }

?>
<?php 
    
    if (isset($_GET['removeid'])) {
        $cmrId = $_GET['removeid'];
        $time = $_GET['time'];
        //$price = $_GET['orderprice'];
        $delShift = $cart->delShiftProduct($cmrId, $time);
        
    }
?>
       <article class="maincontent clear">
         <div class="content">
         <div class="catoption">
             <h2> All Orders </h2>
             <?php 
                  if (isset($shift)) {
                        echo $shift;
                  } ?>

              
            <table class="mytble">
                <?php  
                  if (isset($delShift)) {
                   echo $delShift;
                  }
            
             ?>
                <tr>
                    <th>Id</th>
                    <th>Order Time</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Cmr-Id</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php 
                  
                   
                  $getOrder = $cart->getAllOrderProduct();
                if($getOrder){
                    $i= 0 ;
                    while ($result = $getOrder->fetch_assoc()){
                        $i++;
                ?>
               <tr>
                    <td><?php echo $result['productId']; ?></td>
                    <td><?php echo $fm->formatDate($result['date']); ?></td>
                    <td><?php echo $result['productName']; ?></td>
                    <td><?php echo $result['quantity']; ?></td>
                    <td>$<?php echo $result['price']; ?></td>
                    <td><?php echo $result['cmrId']; ?></td>
                    <td><a href="costomer.php?cusId=<?php echo $result['cmrId']; ?>">View Details</a></td>
                <?php if ($result['status'] == '0') { ?>
                    <td><a href="?shiftid=<?php echo $result['cmrId']; ?>&time=<?php echo $result['date']; ?>">Shifted</a></td>
                <?php } elseif($result['status'] == '1') { ?>
                      <td>Pendding</td>
                    <?php }else { ?>
                    <td><a href="?removeid=<?php echo $result['cmrId']; ?>&time=<?php echo $result['date']; ?>">Remove</a></td>
                <?php } ?>
                </tr>
                <?php } } ?>   
            </table>
         </div>
             </div>

     </article>
 <?php include 'inc/foot.php';?>
