<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
<?php include '../classes/Brand.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Product.php'; ?>

<?php 
        if (!isset($_GET['editproid']) || $_GET['editproid'] == NULL ){
          echo  "<script> window.location = 'productList.php'; </script>";
          //header(Location:listCat.php);
        } else {
         $id = preg_replace('/[^-a-zA-z0-9_]/','',$_GET['editproid']);
       }
?>
<?php 
      $pd = new Product();

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $productupdate = $pd->productUpdate($_POST , $_FILES , $id);
     }
?>

  <article class="maincontent clear">
         <div class="content">
             <div class="addArticle">
             <h2> Edit Product </h2>
            <?php 
                if (isset($productupdate)){
                 echo $productupdate;
                }
            ?>
            <?php 
              $getproduct = $pd->getAllById($id);
              if ($getproduct) {
                while ($value = $getproduct->fetch_assoc()) {
                 ?>
             <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td> Product Name: </td>

                        <td><input type="text" name="productName" value ="<?php echo $value['productName']; ?>"></td>
                    </tr>
                     <tr>
                        <td> Category: </td>
                       <td>
                         <select name="catId" >
                          
                               <option value="Select Category"> Select Category </option>
                            <?php 
                            $cat = new Category();
                            $catList =  $cat->getAll();
                              if ($catList){
                              while ($result = $catList->fetch_assoc()){
                             ?>
                             <option
                             <?php 
                                  if ($value['catId'] == $result['catId']){ ?>
                                    selected = 'selected';
                                  <?php } ?>value=" <?php echo $result['catId']; ?> "> <?php echo $result['catName']; ?> </option>
                                <?php }} ?>
                               </select>
                        </td>
                      
                    </tr>
                        <tr>
                        <td> Brands: </td>
                        <td>
                            <select name="brandId" >
                               <option value="Select Brands"> Select Brands </option>
                            <?php
                              $brand = new Brand();
                              $brandList =  $brand->getAll();
                              if ($brandList){
                              while ($result = $brandList->fetch_assoc()){
                            ?>
                                <option 
                                 <?php 
                                  if ($value['brandId'] == $result['brandId']){ ?>
                                    selected = 'selected';
                                  <?php } ?> value="<?php echo $result['brandId']; ?>"> <?php echo $result['brandName']; ?> </option>
                                  <?php  }} ?>
                            </select>
                        </td>
                    </tr>
                   
                        <tr>
                        <td> Content: </td>
                        <td>
                        <textarea name="body"><?php echo $value['body']; ?></textarea>
                <script>
                        CKEDITOR.replace( 'body' );
                </script>
                   </td>
                    </tr>
                     <tr>
                        <td> Price: </td>
                        <td><input type="text" name="price" value="<?php echo $value['price']; ?>"></td>
                    </tr>
                        <tr>
                         <td> Upload Image: </td>
                          <td><img src="<?php echo $value['image']; ?>" alt="" height="80px" width="200px"/> <br/>
                        <input type="file" name="image"></td>
                    </tr>
                    <tr>
                         <td> Product Type: </td>
                        <td>
                            <select name="type" >
                               <option value="Select Type"> Select Type  </option>
                               <?php if ($value['type'] == 0) {?>
                                <option selected = 'selected' value="0"> Featured </option>
                                <option value="1"> General </option>
                              <?php }else{ ?>
                                   <option selected = 'selected'  value="1"> General </option>
                                   <option value="0"> Featured </option>
                                <?php } ?>     
                            </select>
                        </td>
                    </tr>
                   <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Update"></td>
                    </tr>
                    
                </table>
            </form>
          <?php } } ?>
           </div>
         </div>
     </article>
  <?php include 'inc/foot.php';?>
