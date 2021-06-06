<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
  <article class="maincontent clear">
         <div class="content">
             <div class="addArticle">
             <h2> Add New Page </h2>
                       <?php  
                       if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                              
                             $name = mysqli_real_escape_string($db->link,  $_POST['name']);
                              $body = mysqli_real_escape_string($db->link,  $_POST['body']);
                      
                             // validation...
            
                            if( $name == "" || $body == ""   ){
                          echo "<span class = 'error'> File Must Not Be Empty ! </span> ";
                            }
                        $query= "INSERT INTO   tbl_page( name, body) VALUES( '$name' , '$body')" ;
                        $inserted_rows = $db->insert($query);
                        if($inserted_rows){
                            echo "<span class='success' > New Page Create Sucessfully . </span>";
                        } else {
                            echo "<span class='error' > sorry! New Page Not Created . </span>";
                        }
                     
                            }
                      
             ?>
             <form action="addpage.php" method="post">
                <table>
                       <tr>
                        <td> Page Name: </td>
                        <td><input type="text" name="name" placeholder="Enter Your Title..."></td>
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
                        <td></td>
                        <td><input type="submit" name="pageupdate" value="Create"></td>
                    </tr>
                    
                </table>
            </form>
           </div>
         </div>
     </article>
  <?php include 'inc/foot.php';?>

