<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
<?php 
        if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL ){
          echo  "<script> window.location = ' index.php '; </script>";
          //header(Location:listCat.php);
        } else {
         $id =   $_GET['pageid'];
}
?>
     <article class="maincontent clear">
         <div class="content">
                     <?php 
                $query= " SELECT * FROM  tbl_page WHERE  id ='$id'  ";
               $page = $db->select($query);
                if($page){
                    while ($result = $page->fetch_assoc()){
                            
             ?>
             <h2> <?php echo $result['name'] ; ?></h2>
                <?php }} ?> 
               <?php   
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = $_POST['name'];
                $body = $_POST['body'];
                $name = mysqli_real_escape_string($db->link, $name);
                $body = mysqli_real_escape_string($db->link, $body);
                if ( $name == "" || $body == "" ){
                    echo "<span class='error'> Field Must Not Be Empty ! </span>";
                } else {
                    $query = "UPDATE  tbl_page SET name = '$name' , body = ' $body' WHERE id = '$id' ";
                   $pageupdate =  $db-> update($query);
                   if ($pageupdate){
                       echo "<span class='success'> Data Update Successfuly . </span>";
                   } else {
                        echo "<span class='error'> Data Not Updated . </span>";
                   }
                }
        }
    ?>
             <?php 
                $query= " SELECT * FROM  tbl_page WHERE  id ='$id'  ";
               $page = $db->select($query);
                if($page){
                    while ($result = $page->fetch_assoc()){
                        
                 
             ?>
             <form action="" method="post">
                <table>
                       <tr>
                        <td> Page Name: </td>
                        <td><input type="text" name="name" value="<?php echo $result['name'] ; ?>"></td>
                    </tr>
                     <tr>
                        <td> Content: </td>
                        <td>
                        <textarea name="body"><?php echo $result['body'] ; ?></textarea>
                <script>
                        CKEDITOR.replace( 'body' );
                </script>
                   </td>
                    </tr>
                      <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="pageupdate" value="Update">
                            <span class="button"><a onclick="return confirm('Are You Sure To Delete This Page..! ') ; " href="delpage.php?delpageid=<?php  echo $result['id'] ;  ?>">Delete</a></span>
                        </td>
                    </tr>
                    
                </table>
            </form>
                <?php }} ?>
            
        
         </div>
     </article>
  <?php include 'inc/foot.php';?>

