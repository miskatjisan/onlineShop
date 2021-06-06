<?php 
    include "inc/header.php";
?>

        <!-- Top Section -->
        <div class="top-section my-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <?php
                                    $getIphon = $pd->latestFromIphon();
                                    if ($getIphon) {
                                        while ($result = $getIphon->fetch_assoc()) {
                                                
                                 ?>
                                <div class="media">
                                    <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" class="align-self-top mr-3 img-fluid" alt="..."></a>
                                    <div class="media-body">
                                        <h5 class="mt-0">IPhone</h5>
                                        <p><?php echo $result['productName']; ?></p>
                                        <a href="details.php?proId=<?php echo $result['productId']; ?>">
                                        <button class="btn btn-primary"> Add to Cart </button></a>
                                    </div>
                                </div>
                            <?php } } ?>
                            </div>
                            <div class="col-md-6 mb-4">
                                <?php
                                    $getSamsung = $pd->latestFromSamsung();
                                    if ($getSamsung) {
                                        while ($result = $getSamsung->fetch_assoc()) {
                                                
                                 ?>
                                <div class="media">
                                    <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" class="align-self-top mr-3 img-fluid" alt="..."></a>
                                    <div class="media-body">
                                        <h5 class="mt-0">Samsung</h5>
                                        <p><?php echo $result['productName']; ?></p>
                                        <a href="details.php?proId=<?php echo $result['productId']; ?>">
                                        <button class="btn btn-primary"> Add to Cart </button></a>
                                    </div>
                                </div>
                            <?php } } ?>
                            </div>
                            <div class="col-md-6 mb-4">
                                <?php
                                    $getCanon = $pd->latestFromCanon();
                                    if ($getCanon) {
                                        while ($result = $getCanon->fetch_assoc()) {
                                                
                                 ?>
                                <div class="media">
                                    <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" class="align-self-top mr-3 img-fluid" alt="..."></a>
                                    <div class="media-body">
                                        <h5 class="mt-0">Canon</h5>
                                        <p><?php echo $result['productName']; ?></p>
                                        <a href="details.php?proId=<?php echo $result['productId']; ?>">
                                        <button class="btn btn-primary"> Add to Cart </button></a>
                                    </div>
                                </div>
                            <?php } } ?>
                            </div>
                            <div class="col-md-6 mb-4">
                                <?php
                                    $getLG = $pd->latestFromLG();
                                    if ($getLG) {
                                        while ($result = $getLG->fetch_assoc()) {
                                                
                                 ?>
                                <div class="media">
                                    <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" class="align-self-top mr-3 img-fluid" alt="..."></a>
                                    <div class="media-body">
                                        <h5 class="mt-0">LG</h5>
                                        <p><?php echo $result['productName']; ?></p>
                                        <a href="details.php?proId=<?php echo $result['productId']; ?>">
                                        <button class="btn btn-primary"> Add to Cart </button></a>
                                    </div>
                                </div>
                            <?php } } ?>
                            </div>
                        </div>
                    </div>
                    <!-- slider -->
                    <div class="col-md-5">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="asset/image/camera.jpg" class="d-block w-100" alt="camera">
                                </div>
                                <div class="carousel-item">
                                    <img src="asset/image/phone.jpg" class="d-block w-100" alt="mobile">
                                </div>
                                <div class="carousel-item">
                                    <img src="asset/image/tv.jpg" class="d-block w-100" alt="refregarator">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature-Products -->
        <h1 class="title"> FEATURE PRODUCTS </h1>
        <div class="top-section my-4">
            <div class="container-fluid">
                <div class="row">
                     <?php 
                            $featureProduct = $pd->getFeatProduct();
                            if ($featureProduct) {
                                while ($result = $featureProduct->fetch_assoc()) {  
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
                    <?php } } ?>

                </div>


            </div>
        </div>

        <!-- New-Products -->
        <h1 class="title"> NEW PRODUCTS </h1>
        <div class="top-section my-4">
            <div class="container-fluid">
                <div class="row">
                    <?php 
                            $newProduct = $pd->getNewProduct();
                            if ($newProduct) {
                                while ($result = $newProduct->fetch_assoc()) {  
                        ?>
                    <div class="new-products   col-md-3 mb-4">
                        <div class="card">
                            <a href="details.php?proId=<?php echo $result['productId']; ?>"><img class="card-img-top" src="admin/<?php echo $result['image']; ?>" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title"> <?php echo $result['productName']; ?> </h4>
                                <h4 class="card-title">
                                    BUY= $<?php echo $result['price']; ?>
                                </h4>
                                <a href="details.php?proId=<?php echo $result['productId']; ?>" class="btn btn-primary"> Details </a>
                            </div>
                        </div>
                    </div>
                  
                <?php } } ?>


                </div>
            </div>
        </div>
    </div>

<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath."/inc/footer.php");
?>