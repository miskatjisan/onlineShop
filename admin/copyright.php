<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
     <article class="maincontent clear">
         <div class="content">
             <h2> Update Copyright Text </h2>
              <?php   
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $note = $fm->validation($_POST['note']);
                $note = mysqli_real_escape_string($db->link, $note);
                if (empty($note)){
                    echo "<span class='error'> Field Must Not Be Empty ! </span>";
                } else {
                    $query = "UPDATE   tbl_copyright  SET note = '$note' WHERE id = '1' ";
                   $copyright =  $db-> update($query);
                   if ($copyright){
                       echo "<span class='success'> Data Update Successfuly . </span>";
                   } else {
                        echo "<span class='error'> Data Not Updated . </span>";
                   }
                }
        }
    ?>
                     <?php 
                $query= " SELECT * FROM   tbl_copyright  WHERE  id ='1'  ORDER BY id DESC";
               $copyright= $db->select($query);
                if($copyright){
                    while ($result = $copyright->fetch_assoc()){
              
             ?>
             <form action="" method="post">
                <table>
                    <tr>
                        <td> Copyright : </td>
                        <td><input type="text" name="note" value="<?php echo $result['note'] ; ?>"></td>
                    </tr>
               
                    <tr>
                        <td></td>
                        <td><input type="submit" name="userupdate" value="Update"></td>
                    </tr>
                    
                </table>
            </form>
                <?php }} ?>   
         </div>
     </article>
 <?php include 'inc/foot.php';?>