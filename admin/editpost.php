<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
  <?php
  if (!isset($_GET['editpostid']) || $_GET['editpostid'] == NULL ){
          echo  "<script> window.location = 'postList.php'; </script>";
          //header(Location:listCat.php);
        } else {
         $postid=   $_GET['editpostid'];
}
?>
  <article class="maincontent clear">
         <div class="content">
             <div class="addArticle">
             <h2> Update Post </h2>
                       <?php  
                       if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                            
                             $title = mysqli_real_escape_string($db->link,  $_POST['title']);
                             $cat = mysqli_real_escape_string($db->link,  $_POST['cat']);
                              $body = mysqli_real_escape_string($db->link,  $_POST['body']);
                             $tags = mysqli_real_escape_string($db->link,  $_POST['tags']);
                             $author = mysqli_real_escape_string($db->link,  $_POST['author']);
                             $userid = mysqli_real_escape_string($db->link,  $_POST['userid']);
                             // validation...
                             $permited    = array('jpg' , 'jpeg' , 'png' , 'gif');
                            $file_name   = $_FILES['image']['name'];
                            $file_size      = $_FILES['image']['size'];
                            $file_temp    = $_FILES['image']['tmp_name'];

                            $div                  = explode('.' , $file_name);
                            $file_ext           = strtolower(end($div)) ;
                            $uniqe_image   = substr(md5(time()) , 0 , 10).'.'. $file_ext ;
                            $upload_image = "upload/".$uniqe_image;
                            if($title == "" || $cat == "" || $body == "" || $tags == "" || $author == ""  ){
                          echo "<span class = 'error'> File Must Not Be Empty ! </span> ";
                            } else {
                            if(!empty( $file_name  )){
                            if ($file_size>1048576) {
                            echo "<span class='error' > image size should be less then 1MB . </span>";
                            }elseif (in_array($file_ext , $permited) ===false) {
                               echo "<span class='error' >you can only upload :-".implode(' , ', $permited)."  </span>";
                            } else {
                                
                            
                            
                       move_uploaded_file( $file_temp , $upload_image);
                      
                        $query = " UPDATE tbl_post SET   title = '$title',  cat = '$cat', image = '$upload_image', body = '$body', tags = '$tags', author = '$author , userid = '$userid ' WHERE id =  '$postid' ";
                        $updated_rows = $db->update($query);
                        if($updated_rows){
                            echo "<span class='success' >  updated Data sucessfully . </span>";
                        } else {
                            echo "<span class='error' > sorry! updated Data unsucessful . </span>";
                        }
                     
                            }
                }
                           
                        else {
                               $query = " UPDATE tbl_post SET  title = '$title',  cat = '$cat', body = '$body', tags = '$tags', author = '$author', userid  = '$userid'   WHERE id =  '$postid' ";
                        $updated_rows = $db->update($query);
                        if($updated_rows){
                            echo "<span class='success' >  updated Data sucessfully . </span>";
                        } else {
                            echo "<span class='error' > sorry! updated Data unsucessful . </span>";
                        }
                           
                       }
                       }
                       
                        }
             ?>
             <?php 
                        $query = "SELECT * FROM tbl_post WHERE id = '$postid' " ;
                       $editpost = $db->select($query);
                       if($editpost){
                           while ($postresult = $editpost->fetch_assoc()){
                               

             ?>
             <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td> Title: </td>
                        <td><input type="text" name="title" value="<?php echo $postresult['title'] ; ?>"></td>
                    </tr>
                     <tr>
                        <td> Category: </td>
                        <td>
                            <select name="cat" >
                               <option value="Select Category"> Select Category </option>
                               <?php 
                                    $query = " SELECT * FROM  tbl_catagory ";
                                   $category = $db->select($query);
                                   if ($category){
                                       while ($result = $category->fetch_assoc()){
                                       
                               ?>
                            
                                <option
                                    
                                       <?php
                               if ($postresult['cat'] == $result['id'] ){ ?>
                               selected = "selected"
                               <?php } ?>
                                    value="<?php echo $result['id'];?>"> <?php echo $result['name'];?> </option>
                                   <?php }} ?>
                            </select>
                        </td>
                    </tr>
                       <tr>
                        <td> Upload Image: </td>
                        <td>
                       <img src=" <?php echo $postresult['image'];?> " height="80px" width="200px"/> <br/>
                             
                        <input type="file" name="image"></td>
                    </tr>
                        <tr>
                        <td> Content: </td>
                        <td>
                        <textarea name="body"> <?php echo $postresult['body'];?>  </textarea>
                        
                <script>
                        CKEDITOR.replace( 'body' );
                </script>
                   </td>
                    </tr>
                     <tr>
                        <td> Tags: </td>
                        <td><input type="text" name="tags" value="<?php echo $postresult['tags'] ; ?>"></td>
                    </tr>
                     <tr>
                        <td> Author: </td>
                        <td><input type="text" name="author" value="<?php echo  $postresult['author'] ; ?>">
                            <input type="hidden" name="userid" value="<?php echo  $postresult['userId'] ; ?>">
                        </td>
                    </tr>
                      <tr>
                        <td></td>
                        <td><input type="submit" name="catupdate" value="Save"></td>
                    </tr>
                    
                </table>
            </form>
                       <?php }} ?>
           </div>
         </div>
     </article>
  <?php include 'inc/foot.php';?>
