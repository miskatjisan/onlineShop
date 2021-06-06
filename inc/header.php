<?php 
        ob_start();


        include 'lib/session.php'; 
        session::init();
        include 'helpers/Format.php'; 
        include 'lib/Database.php';
        spl_autoload_register(function($class){
            include_once "classes/".$class.".php";
        });
        $db     = new Database();
        $fm     = new Format();
        $cat    = new Category();
        $pd     = new Product();
        $brand  = new Brand();
        $cart   = new Cart();
        $cmr   = new Costomer();
?>
<?php
  //set headers to NOT cache a page
 header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days) 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <div class="container">
        <!-- navbar-1 -->
        <nav class="navbar navbar-1 navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="asset/image/logo.png" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">
                            <i class="fas fa-shopping-cart">  </i> <span class="cart-text"> Cart <span class="text-danger"> 
                            <?php
                            $chackData = $cart->chackData();
                            if ($chackData) {
                             $gdtotal = session::get("grandtotal");
                                $Qnty = session::get("Qnty");
                                echo " $ ".$gdtotal." | Qnty :".$Qnty;
                            }else{
                                echo "(Empty)";
                            } ?> 
                            
                             </span> </span>
                        </a>
                    </li>
                   
<?php 
   if (isset($_GET['cid'])) {
   $cmrId = session::get("cmrId");
   $delData = $cart->deleteCostomerCart();
   $delCompare = $pd->deleteCompareData($cmrId);
    session::destroy();
   }
?>
                    <li class="nav-item">
                        <?php 
                           $login = session::get("cmrLogin");
                           if ($login == false) { ?>
                                <a class="nav-link" href="login.php">
                            <input type="button" value="Login" class="form-control login-btn">
                        </a>
                           <?php  } else { ?>
                       <a class="nav-link" href="?cid=<?php session::get('cmrId'); ?>">
                            <input type="button" value="Logout" class="form-control login-btn">
                        </a>
                    <?php } ?>
                    </li> 
                </ul>

            </div>
        </nav>
        <!--  navbar-2 -->
     <nav class="navbar navbar-2 navbar-expand-lg navbar-light bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">HOME</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                SERVICES
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
<?php 
    $cmrId = session::get("cmrId");
    $chkOrder = $cart->chackOrder($cmrId);
        if ($chkOrder) { ?>
            <a class="dropdown-item" href="orderDetails.php">YOUR ORDERS</a>
<?php } ?>
<?php 
    $cmrId = session::get("cmrId");
    $getCompare = $pd->getCompareProduct($cmrId);
        if ($getCompare) { ?>
     <a class="dropdown-item" href="compaire.php">COMPAIRE</a>
<?php } ?>
<?php 
    $cmrId = session::get("cmrId");
    $getWishlist = $pd->getWishlistProduct($cmrId);
        if ($getWishlist) { ?>
     <a class="dropdown-item" href="wishlist.php">WISHLIST</a>
<?php } ?>
                           
                            <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
<?php 
  $login = session::get("cmrLogin");
   if ($login == true) { ?>                        
     <li class="nav-item"><a class="nav-link" href="profile.php">PROFILE</a></li>
<?php } ?>

<?php 
$chkCart = $cart->chackData();
if ($chkCart) { ?>
   <li class="nav-item"><a class="nav-link" href="cart.php">CART</a></li>
   <li class="nav-item"><a class="nav-link" href="payment.php">PAYMENT</a></li>
<?php } ?>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="">CONTACT</a>
                        </li>
                        <li>
                       <a class="nav-link" href="" style="font-size: 16px; color: orange;"><?php echo session::get('cmrName'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 
         