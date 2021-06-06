<?php 
    include "inc/header.php";
?>
<?php 
        if (isset($_GET['proId'])){
         $id = preg_replace('/[^-a-zA-z0-9_]/','',$_GET['proId']);
       }
?>
<?php 
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
      	$quantity = $_POST['quantity'];
        $addCart = $cart->addToCart($quantity , $id);
     }
?>
<?php 
      //$cmrId = session::get("cmrId");
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compaire'])){
        $productId = $_POST['productId'];
        $insertCompaire = $pd->insertCompaireData($productId , $cmrId);
     }
?>
<?php 
      //$cmrId = session::get("cmrId");
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])){
        $insertWish = $pd->insertWishlistData($id , $cmrId);
     }
?>

        <div class="top-section my-4">
            <div class="container-fluid">
                <div class="row">
                	<?php 
                    	$getProduct = $pd->getSingleProduct($id);
                    	if ($getProduct) {
                    		while ($result = $getProduct->fetch_assoc()) {
                    ?>
                    <div class="col-md-9">
                    	
                    	
                       <div class="media">
                                    <img src="admin/<?php echo $result['image']; ?>" class="align-self-top mr-3 img-fluid imgPro" alt="...">
                                    <div class="media-body">
                                        <h5 class="mt-0 h5"><?php echo $result['productName']; ?></h5>
                                      
                                        <div>
                                        	<span> Price :</span> 
                                      		<span class="h5"> $<?php echo $result['price']; ?> </span>
                                        </div>
                                        <div>
                                        	<span> Category :</span> 
                                      		<span class="h5"> <?php echo $result['catName']; ?> </span>
                                        </div>
                                        <div>
                                        	<span> Brand :</span> 
                                      		<span class="h5"> <?php echo $result['brandName']; ?> </span>
                                        </div>
                                        <div class="add-cart">
                                        	<form action="" method="post">
                                        	<input type="number" class="buyfield" name="quantity" value="1">
                                        	<input type="submit" class="btn btn-primary" name="submit" value="Buy Now">
                                        	</form>
                                          <span>   
                                        <?php 
                                          if (isset($addCart)) {
                                               echo $addCart;
                                              }
                                        ?>
                                       </span>
                                        <?php 
                                          if (isset($insertCompaire)) {
                                               echo $insertCompaire;
                                              }
                                        ?>
                                        </div>
                                          <?php 
                                          if (isset($insertWish)) {
                                               echo $insertWish;
                                              }
                                        ?>
                                <?php 
                                   $login = session::get("cmrLogin");
                                     if ($login == true) { ?>  
                                       <div class="add-cart">
                                        <form action="" method="post">
                                          <input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId']; ?>">
                                          <input type="submit" class="btn btn-primary wishlist" name="compaire" value="Add To Compare">
                                        </form>
                                        <form action="" method="post">
                                          <input type="submit" class="btn btn-primary wishlist" name="wishlist" value="Save To List">
                                        </form>
                                       </div> 
                                       <?php } ?> 
                                    </div>

                                </div>
                              	
                        <h2 class="h2"> Product Details </h2>
                        <p class="p"> <?php echo $result['body']; ?></p>
                    
                    </div>
                <?php } } ?>
                    <!-- Category -->
                    <div class="col-md-3">
                  		<div class="container-fluid">
                  			<h2 class="h2"> CATEGORIES </h2>
                    <?php
                          $getAll = $cat->getAll();
                          if ($getAll) {
                            while ($value = $getAll->fetch_assoc()) {
                    ?>      
                  			 <ul>
                  			 	<li>
                  			 		<a href="puductByCat.php?catId=<?php  echo $value['catId']; ?>"><?php echo $value['catName']; ?></a>
                  			 	</li>
                  			
                  			 </ul>
                    <?php } } ?>

                  		</div>
                    </div>
                </div>
            </div>
        </div>
<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath."/inc/footer.php");
?>