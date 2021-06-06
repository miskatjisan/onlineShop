<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
  <?php
  if (!isset($_GET['sliderid']) || $_GET['sliderid'] == NULL ){
          echo  "<script> window.location = 'sliderlist.php'; </script>";
          //header(Location:listCat.php);
        } else {
         $sliderid=   $_GET['sliderid'];
}
?>
  <article class="maincontent clear">
         <div class="content">
             <div class="addArticle">
             <h2> Update Slider </h2>
                       <?php  
                       if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                            
                             $title = mysqli_real_escape_string($db->link,  $_POST['title']);
                            
                             // validation...
                             $permited    = array('jpg' , 'jpeg' , 'png' , 'gif');
                            $file_name   = $_FILES['image']['name'];
                            $file_size      = $_FILES['image']['size'];
                            $file_temp    = $_FILES['image']['tmp_name'];

                            $div                  = explode('.' , $file_name);
                            $file_ext           = strtolower(end($div)) ;
                            $uniqe_image   = substr(md5(time()) , 0 , 10).'.'. $file_ext ;
                            $upload_image = "upload/".$uniqe_image;
                            if($title == ""   ){
                          echo "<span class = 'error'> File Must Not Be Empty ! </span> ";
                            } else {
                            if(!empty( $file_name  )){
                            if ($file_size>1048576) {
                            echo "<span class='error' > image size should be less then 1MB . </span>";
                            }elseif (in_array($file_ext , $permited) ===false) {
                               echo "<span class='error' >you can only upload :-".implode(' , ', $permited)."  </span>";
                            } else {
                                
                            
                            
                       move_uploaded_file( $file_temp , $upload_image);
                      
                        $query = " UPDATE tbl_slider SET   title = '$title', image = '$upload_image' WHERE id =  '$sliderid' ";
                        $updated_rows = $db->update($query);
                        if($updated_rows){
                            echo "<span class='success' > Slider updated  sucessfully . </span>";
                        } else {
                            echo "<span class='error' > sorry! Slider Not Updated . </span>";
                        }
                     
                            }
                }
                           
                        else {
                               $query = " UPDATE tbl_slider SET  title = '$title'  WHERE id =  '$sliderid' ";
                        $updated_rows = $db->update($query);
                        if($updated_rows){
                            echo "<span class='success' > Slider updated  sucessfully . </span>";
                        } else {
                            echo "<span class='error' > sorry! Slider Not  updated . </span>";
                        }
                           
                       }
                       }
                       
                        }
             ?>
             <?php 
                        $query = "SELECT * FROM  tbl_slider WHERE id = '$sliderid' " ;
                       $editslider = $db->select($query);
                       if($editslider){
                           while ($result = $editslider->fetch_assoc()){
                               

             ?>
             <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td> Title: </td>
                        <td><input type="text" name="title" value="<?php echo $result['title'] ; ?>"></td>
                    </tr>
              
                       <tr>
                        <td> Upload Image: </td>
                        <td>
                       <img src=" <?php echo $result['image'];?> " height="80px" width="200px"/> <br/>
                             
                        <input type="file" name="image"></td>
                    </tr>
                        
                      <tr>
                        <td></td>
                        <td><input type="submit" name="sliderupdate" value="Update"></td>
                    </tr>
                    
                </table>
            </form>
                       <?php }} ?>
           </div>
         </div>
     </article>
  <?php include 'inc/foot.php';?>
