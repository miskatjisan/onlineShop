<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
<?php include '../classes/Brand.php'; ?>
<?php 
        
        $brand = new Brand();
        
        if (isset($_GET['delbrandid'])) {
          $id = $_GET['delbrandid'];
          $deleteBrand = $brand->DeleteBrand($id);
          }      
?>
 <article class="maincontent clear">
         <div class="content">
             <h2> Brand List </h2>
             <?php 
               
                if (isset($deleteBrand)) {
                  echo $deleteBrand;
                  }
                
             ?>
          <table class="mytble">
                <tr>
                    <th width="20%">Serial No.</th>
                    <th width="50%">Category</th>
                    <th width="30%">Action</th>
                </tr>
                 <?php
                      $brandList =  $brand->getAll();
                      if ($brandList){
                      $i = 0;
                      while ($result = $brandList->fetch_assoc()){
                      $i++
                  ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['brandName']; ?></td>
                    <td><a href="editbrand.php?editbrandid=<?php echo $result['brandId']; ?>">Edit</a>||<a onclick=" return confirm('Are You Sure To Delete ! ')" href="?delbrandid=<?php echo $result['brandId']; ?>">Delete</a></td>
                 </tr>
                    <?php }} ?>
            </table>
            </div>
     </article>
  <?php include 'inc/foot.php'; ?>
