<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
<?php include '../classes/Brand.php'; ?>
<?php 
         $brand = new Brand();
?>
<?php 
        if (!isset($_GET['editbrandid']) || $_GET['editbrandid'] == NULL ){
          echo  "<script> window.location = 'brandList.php'; </script>";
          //header(Location:listCat.php);
        } else {
        $id = preg_replace('/[^-a-zA-z0-9_]/','',$_GET['editbrandid']);
}
?>
     <article class="maincontent clear">
         <div class="content">
             <h2> Update Brand </h2>
               <?php 
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $brandName = $_POST['brandName'];
                $brandUpdate = $brand->updateBrand($brandName, $id);
                if ($brandUpdate) {
                  echo $brandUpdate;
                }
              }
            
    ?>
             <?php 
              $selBrand = $brand->getAllById($id);
                
                if($selBrand){
                    while ($result = $selBrand->fetch_assoc()){
             ?>
            <form action="" method="post">
                <table>
                    <tr>
                        <td> Update Brand : </td>
                        <td><input type="text"  name="brandName"  value="<?php echo $result['brandName']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="brandupdate" value="Save"></td>
                    </tr>
                    
                </table>
            </form>
                <?php }} ?>
            
        
         </div>
     </article>
  <?php include 'inc/foot.php';?>

