<?php 
        include '../lib/session.php'; 
        session::checkSession();
        include_once '../helpers/Format.php'; 
        include_once '../lib/Database.php';
        $db = new Database();
        $fm = new Format();
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


<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
 <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <meta name="theme-color" content="#fafafa">
</head>

<body>
    <?php 
    if (isset($_GET['action']) && $_GET['action']=="logout") {
       session::destroy();
    }
    
    ?>
    
<div class="template">
<header class="headeroption clear">
    <h2 style="display: inline;" >Admin Panel</h2>
    <span class="logout">Hello <?php echo session::get('adminName');?> || <a  href="?action=logout" >Logout</a></span>
    <nav class="mainmanu clear">
        <ul>
            <li> <a href="index.php"><span> Dashboard </span></a></li>
            <!--  
            <li><a href="userprofile.php"><span> User Profile</span></a></li>
            <li><a href="changepass.php"><span> Change Password </span> </a></li>
           -->
            <li>   <a href="inbox.php"> <span> Inbox 
                    
                    </span> </a></li>
                     <!-- 
                    <li><a href="adduser.php"> Add User </a></li>
                    <li><a href="userlist.php"> User List </a></li>
                     -->
            <li><a href="/../shop/index.php"> Visit Website </a></li>
        </ul>
    </nav>
</header>
