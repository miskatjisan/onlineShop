<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
<?php include '../classes/Category.php'; ?>
<?php 
        $cat = new Category();

?>
<?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];
        $catinsert = $cat->catInsert($catName);
     }
 ?>
     <article class="maincontent clear">
         <div class="content">
             <h2> Add Category </h2>
               <?php   
                    if (isset($catinsert)) {
                        echo $catinsert;
                    }
                ?>
             <form action="addCat.php" method="post">
                <table>
                    <tr>
                        <td> Add New Category : </td>
                        <td><input type="text"  name="catName"  placeholder="Add New Category.."></td>
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
