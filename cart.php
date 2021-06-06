<?php 
    include "inc/header.php"; 
?>
<?php 
      if (isset($_GET['delCart'])) {
         $delId = preg_replace('/[^-a-zA-z0-9_]/','',$_GET['delCart']);
         $delCart = $cart->delProductByCart($delId);
      }
?>
 <div class="top-section my-4">
  <div class="container-fluid">
<?php 
      if (!isset($_GET['id'])) {
        echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
      }

?>
<?php 
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $updateCart = $cart->updateCartQuantity($cartId, $quantity);
        if ($quantity <= 0) {
         $delCart = $cart->delProductByCart($cartId);
        }
     }
?>

       <!-- cart -->

       <h1 class="title"> Top Cart </h1>
    <?php
        if (isset($updateCart)) {
           echo $updateCart;
          }
           if (isset($delCart)) {
           echo $delCart;
          } 
    ?>

 <div class=" mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
              
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Sirial</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
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
                            <td><img style="width: 40px;height: 40px;" src="admin/<?php echo $result['image']; ?>" /> </td>
                            <td><?php echo $result['productName']; ?></td>
                            <td>In stock</td>
                            <td >$<?php echo $result['price']; ?></td>
                           <td>
                            <form action="" method="post">
                            <input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>">
                            <input type="number" name="quantity" value="<?php echo $result['quantity']; ?>">
                           <input class="" type="submit" name="submit" value="Update" />
                            </form>
                            </td>
                            <td class="text-right">$
                              <?php 
                                  $total = $result['price'] * $result['quantity'];
                                  echo $total;
                              ?>
                                
                              </td>
                              
                            <td class="text-right"><a onclick="return confirm('Are You Sure To Remove Cart !')" href="?delCart=<?php echo $result['cartId']; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button></a> </td>
                        </tr>
                          <?php
                              $Qnty = $Qnty + $result['quantity'];
                              $sum = $sum + $total;
                              session::set("Qnty" , $Qnty);

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
                  <?php
                       }else{
                       echo  "<script> window.location = 'index.php'; </script>";
                      } ?>
                      </tbody>
                        </table>
                    
               
              
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                  <a href="index.php"><button class="btn btn-block btn-light " style="background: #333;color: white; padding: 10px;border-radius: 12px;font-size: 16px; text-decoration: none;">Continue Shopping</button></a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="payment.php"><button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

      
<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath."/inc/footer.php");
?>