<?php 
        include '../lib/session.php'; 
        session:: checkLogin();
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>
<?php 
        $db=new Database();
        $fm= new Format();
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

  <meta name="theme-color" content="#fafafa">
</head>

<body>
   
<section class="login clear">
         <?php   
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $email = $fm->validation($_POST['email']);
      $email = mysqli_real_escape_string($db->link, $email);
     if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
            echo "<span class='error'> Invalid Email Address ! </span>";
     }else{
         $mailquery = "SELECT * FROM  tbl_user WHERE email = '$email' LIMIT 1";
         $mailchack=$db->select($mailquery);
                if($mailchack != false){
       
                    while ($value = $mailchack->fetch_assoc()){
                        $userid = $value['id'];
                        $username = $value['username'];
                    }
                        $text = substr($email, 0,3);
                        $rand = rand(10000 , 99999);
                        $newpass = "$text$rand";
                        $password = md5($newpass);
                        $updatequery = "UPDATE  tbl_user SET password = '$password' WHERE id = '$userid' ";
                        $passupdate =  $db-> update($updatequery);
                        
                        $to = "$email";
                        $from = "miskaturrahmanjisan@gmail.com";
                        $header = "From: $from \n";
                        $headers .= 'MIME-Version: 1.0'."\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                        $subject = "Your Password";
                        $message = "Your Username Is ".$username." Your Password Is ".$newpass."Please Click The Link <a href='http://jisanbd.saburbd.com/blog/admin/login.php'>jisanbd.saburbd.com/blog/admin/login.php<a/> To Visit Website To  Login .";
                        $sendmail= mail($to, $subject, $message,  $headers);
                        if ($sendmail){
                            echo "<span class='success'> Please Cheack Your Email . !! </span>";
                        } else {
                             echo "<span class='error'> Email Not Sent !! </span>";
                        }
                }  else {
                echo "<span class='error'> This Email Not Exist !! </span>";
            }
        }
    }
    ?>
    <h2> Admin Login </h2>

    <form action="forgotpass.php" method="post">
       <div>
        <lable> Email </lable>
        <input type="text" name="email"  placeholder="Please Enter Your Email..">
        </div>
         
        <div>
            <input type="submit" name="forgotpasssend" value="Send">
        </div>
          <span class="forgot_password">
       <a href="login.php">Login<a/>  
    </span>
    </form>
  
</section>
  
</body>

</html>

