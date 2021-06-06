<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/Costomer.php');
?>
<?php 
        if (!isset($_GET['cusId']) || $_GET['cusId'] == NULL ){
          echo  "<script> window.location = 'inbox.php'; </script>";
          //header(Location:listCat.php);
        } else {
         $id = preg_replace('/[^-a-zA-z0-9_]/','',$_GET['cusId']);
}
?>
     <article class="maincontent clear">
         <div class="content">
             <h2> Customer Details </h2>
               <?php 
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                echo  "<script> window.location = 'inbox.php'; </script>";
              }
            
    ?>
             <?php 
                $cmr   = new Costomer();
                $customerDetails = $cmr->getCustomerData($id);
                if($customerDetails){
                    while ($result = $customerDetails->fetch_assoc()){
             ?>
            <form action="" method="post">
                <table>
                    <tr>
                        <td> Customer Name : </td>
                        <td><input type="text" readonly="readonly"  name="name"  value="<?php echo $result['name']; ?>"></td>
                    </tr>
                     <tr>
                        <td> Customer Address : </td>
                        <td><input type="text" readonly="readonly"  name="address"  value="<?php echo $result['address']; ?>"></td>
                    </tr>
                     <tr>
                        <td> Customer City : </td>
                        <td><input type="text" readonly="readonly"  name="city"  value="<?php echo $result['city']; ?>"></td>
                    </tr>
                     <tr>
                        <td> Customer Country : </td>
                        <td><input type="text" readonly="readonly"  name="country"  value="<?php echo $result['country']; ?>"></td>
                    </tr>
                     <tr>
                        <td> Customer Zipcode : </td>
                        <td><input type="text" readonly="readonly"  name="zip"  value="<?php echo $result['zip']; ?>"></td>
                    </tr>
                     <tr>
                        <td> Costomer Phone : </td>
                        <td><input type="text"  name="phone"  value="<?php echo $result['phone']; ?>"></td>
                    </tr>
                      <tr>
                        <td> Costomer Email : </td>
                        <td><input type="text" readonly="readonly"  name="email"  value="<?php echo $result['email']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="catupdate" value="Ok"></td>
                    </tr>
                    
                </table>
            </form>
                <?php }} ?>
            
        
         </div>
     </article>
  <?php include 'inc/foot.php';?>

