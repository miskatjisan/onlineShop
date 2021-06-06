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
       <h1 class="title"> COMPARE PRODUCT </h1>
 <div class=" mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
              
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Sirial</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col"> </th>
                        </tr>
                    </thead>
                     <?php 
                          //$cmrId = session::get("cmrId");
                          $getCompare = $pd->getCompareProduct($cmrId);
                          if ($getCompare) {
                            $i = 0;
                           
                            while ($result = $getCompare->fetch_assoc()) {
                             $i++; ?>

                    <tbody>
                       <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['productName']; ?></td>
                            <td >$<?php echo $result['price']; ?></td>
                            <td><img style="width: 152px;height: 90px;" src="admin/<?php echo $result['image']; ?>" /> </td>
                            <td><a href="details.php?proId=<?php echo $result['productId']; ?>">View</a></td>
                        </tr>
                      </tbody>
                    <?php } } ?>
                        </table>
                </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12 ">
                  <a href="index.php"><button class="btn btn-block btn-light " style="background: #333;color: white; padding: 10px;border-radius: 12px;font-size: 16px;  font-size: 22px; ">Continue Shopping</button></a>
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