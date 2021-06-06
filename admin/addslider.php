<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>



  <article class="maincontent clear">
         <div class="content">
             <div class="addArticle">
             <h2> Add New Slider </h2>
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
                            $upload_image = "upload/Slider_Image/".$uniqe_image;
                            if( $title == ""   ){
                          echo "<span class = 'error'> File Must Not Be Empty ! </span> ";
                            }elseif ($file_size>1048576) {
                            echo "<span class='error' > image size should be less then 1MB . </span>";
                            }elseif (in_array($file_ext , $permited) ===false) {
                               echo "<span class='error' >you can only:-".implode(' , ', $permited)."  </span>";
                            } else {
                                
                            
                            
                       move_uploaded_file( $file_temp , $upload_image);
                        $query= "INSERT INTO   tbl_slider( title,  image ) VALUES('$title',  '$upload_image' )" ;
                        $inserted_rows = $db->insert($query);
                        if($inserted_rows){
                            echo "<span class='success' > Slider inserted  sucessfully . </span>";
                        } else {
                            echo "<span class='error' > sorry! Slider Not inserted . </span>";
                        }
                     
                            }
                       }
             ?>
             <form action="addslider.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td> Title: </td>
                        <td><input type="text" name="title" placeholder="Enter Your Title..."></td>
                    </tr>
              
                       <tr>
                        <td> Upload Image: </td>
                        <td><input type="file" name="image"></td>
                    </tr>
                        
                      <tr>
                        <td></td>
                        <td><input type="submit" name="sliderupdate" value="Save"></td>
                    </tr>
                    
                </table>
            </form>
           </div>
         </div>
     </article>
  <?php include 'inc/foot.php';?>

