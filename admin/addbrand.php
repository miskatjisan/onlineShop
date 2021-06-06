<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
<?php include '../classes/Brand.php'; ?>
<?php 
        $brand = new Brand();

?>
<?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brandName = $_POST['brandName'];
        $brandinsert = $brand->brandInsert($brandName);
     }
 ?>
     <article class="maincontent clear">
         <div class="content">
             <h2> Add Brand </h2>
               <?php   
                    if (isset($brandinsert)) {
                        echo $brandinsert;
                    }
                ?>
             <form action="addbrand.php" method="post">
                <table>
                    <tr>
                        <td> Add New Brand : </td>
                        <td><input type="text"  name="brandName"  placeholder="Add New Brand.."></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="" value="Save"></td>
                    </tr>    
                </table>
            </form>
       </div>
     </article>
  <?php include 'inc/foot.php';?>
