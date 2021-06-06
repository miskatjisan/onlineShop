<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
<?php include '../classes/Brand.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Product.php'; ?>
<?php 
      $pd = new Product();
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $productinsert = $pd->productInsert($_POST , $_FILES);
     }
?>

  <article class="maincontent clear">
         <div class="content">
             <div class="addArticle">
             <h2> Add New Product </h2>
            <?php 
                if (isset($productinsert)){
                 echo $productinsert;
                }
            ?>
             <form action="addProduct.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td> Product Name: </td>

                        <td><input type="text" name="productName" placeholder="Enter Your Product Name..."></td>
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
                              
                                <option value=" <?php echo $result['catId']; ?> "> <?php echo $result['catName']; ?> </option>
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
                                <option value="<?php echo $result['brandId']; ?>"> <?php echo $result['brandName']; ?> </option>
                                  <?php  }} ?>
                            </select>
                        </td>
                    </tr>
                   
                        <tr>
                        <td> Content: </td>
                        <td>
                        <textarea name="body"></textarea>
                <script>
                        CKEDITOR.replace( 'body' );
                </script>
                   </td>
                    </tr>
                     <tr>
                        <td> Price: </td>
                        <td><input type="text" name="price" placeholder="Enter Your Product Price..."></td>
                    </tr>
                        <tr>
                        <td> Upload Image: </td>
                        <td><input type="file" name="image"></td>
                    </tr>
                         <td> Product Type: </td>
                        <td>
                            <select name="type" >
                               <option value="Select Type"> Select Type </option>
                              
                                <option value="0"> Featured </option>
                                <option value="1"> General </option>
                                  
                            </select>
                        </td>
                    </tr>
                 
                      <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Save"></td>
                    </tr>
                    
                </table>
            </form>
           </div>
         </div>
     </article>
  <?php include 'inc/foot.php';?>
