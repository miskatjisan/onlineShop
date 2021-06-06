<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
   <?php if (!session::get('userRole')== '0') {
       echo  "<script> window.location = 'index.php'; </script>";
   }
     ?>
     <article class="maincontent clear">
         <div class="content">
             <h2> Add User Profile </h2>
   <?php   
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $fm->validation($_POST['username']);
       $password = $fm->validation(md5($_POST['password'])) ;
        $email = $fm->validation($_POST['email']);
       $role = $fm->validation($_POST['role']);
       
        $username = mysqli_real_escape_string($db->link, $username);
        $password = mysqli_real_escape_string($db->link, $password);
         $email = mysqli_real_escape_string($db->link, $email);
          $role = mysqli_real_escape_string($db->link, $role);
         
                if (empty($username) || empty($password) || empty($email) || empty($role) ){
                    echo "<span class='error'> Field Must Not Be Empty ! </span>";
                } else {
                
                 $mailquery = "SELECT * FROM  tbl_user WHERE email = '$email' LIMIT 1";
                 $mailchack=$db->select($mailquery);
                if($mailchack != false){
                     echo "<span class='error'> Email Already Exist ! </span>";
                } else {
                    $query = "INSERT INTO  tbl_user  ( username, password, email, role) VALUE ('$username','$password',  '$email' ,'$role' )";
                   $userInsert =  $db-> insert($query);
                   if ($userInsert){
                       echo "<span class='success'> User Created  Successfuly . </span>";
                   } else {
                        echo "<span class='error'> User Not Created . </span>";
                   }
                }
        }
                }
    ?>
             <form action="adduser.php" method="post">
                <table>
                    <tr>
                        <td> Username : </td>
                        <td>
                            <input type="text"  name="username"  placeholder="Type The Username..">
                        </td>
                    </tr>
                    <td> Password : </td>
                        <td>
                            <input type="text"  name="password"  placeholder="Type The Password..">
                        </td>
                    </tr>
                    <td> Email : </td>
                        <td>
                            <input type="text"  name="email"  placeholder="Type The Valid Email..">
                        </td>
                    </tr>
                    <td> User Roll : </td>
                        <td>
                            <select  name="role" >
                                <option> Select User Roll </option>
                                <option value="0" > admin </option>
                                <option value="1" > author </option>
                                <option value="2" > editor </option>
                                <option value="3" > host </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="usercreate" value="Create"></td>
                    </tr>
                    
                </table>
            </form>
       
            
        
         </div>
     </article>
  <?php include 'inc/foot.php';?>

