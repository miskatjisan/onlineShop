<?php 
    include "inc/header.php";
?>
<?php 
        if (!isset($_GET['catId']) || $_GET['catId'] == NULL ){
          echo  "<script> window.location = '404.php'; </script>";
          //header(Location:listCat.php);
        } else {
         $id = preg_replace('/[^-a-zA-z0-9_]/','',$_GET['catId']);
       }
?>
 <?php 
     $getCatname = $cat->getAllById($id);
      if ($getCatname) {
        while ($result = $getCatname->fetch_assoc()) {  
?>
<h1 class="title"> <?php echo $result ['catName'];?> </h1>
<?php } }?>
        <div class="top-section my-4">
            <div class="container-fluid">
                <div class="row">
                     <?php 
                            $getCatProduct = $pd->getProductByCat($id);
                            if ($getCatProduct) {
                                while ($result = $getCatProduct->fetch_assoc()) {  
                        ?>
                    <div class="feature-products col-md-3 mb-4">
                        <div class="card">
                            <a href="details.php?proId=<?php echo $result['productId']; ?>"><img class="card-img-top" src="admin/<?php echo $result['image']; ?>" alt="Card image cap"></a>
                            <div class="card-body">
                                <h4 class="card-title"> <?php echo $result['productName']; ?> </h4>
                                <p class="card-text"><?php echo $fm->textShorten($result['body'] ,30); ?></p>
                                <h4 class="card-title">
                                    BUY= $<?php echo $result['price']; ?>
                                </h4>
                                <a href="details.php?proId=<?php echo $result['productId']; ?>" class="btn btn-primary"> Details </a>
                            </div>
                        </div>
                    
                    </div>
                    <?php } }else{
                    	echo "<p class='error'>Products Are Not Available Right Now ! Product Will Be Comming Soon . </p>";
                    	//header("Location:404.php");
                    } ?>

                </div>


            </div>
        </div>
<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath."/inc/footer.php");
?>