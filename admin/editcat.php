<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
<?php include '../classes/Category.php'; ?>

<?php 
        if (!isset($_GET['editcatid']) || $_GET['editcatid'] == NULL ){
          echo  "<script> window.location = 'listCat.php'; </script>";
          //header(Location:listCat.php);
        } else {
         $id = preg_replace('/[^-a-zA-z0-9_]/','',$_GET['editcatid']);
}
?>
     <article class="maincontent clear">
         <div class="content">
             <h2> Update Category </h2>
               <?php 
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $catName = $_POST['catName'];
                $catUpdate = $cat->updateCat($catName, $id);
                if ($catUpdate) {
                  echo $catUpdate;
                }
              }
            
    ?>
             <?php 
                $cat = new Category();
                $selCategory = $cat->getAllById($id);
                
                if($selCategory){
                    while ($result = $selCategory->fetch_assoc()){
             ?>
            <form action="" method="post">
                <table>
                    <tr>
                        <td> Update Category : </td>
                        <td><input type="text"  name="catName"  value="<?php echo $result['catName']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="catupdate" value="Save"></td>
                    </tr>
                    
                </table>
            </form>
                <?php }} ?>
            
        
         </div>
     </article>
  <?php include 'inc/foot.php';?>

