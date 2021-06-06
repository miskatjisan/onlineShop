<?php include 'inc/head.php'; ?>
<?php include 'inc/leftside.php';?>
     <article class="maincontent clear">
         <div class="content">
             <h2> Update Password </h2>
            <form action="" method="get">
                <table>
                    <tr>
                        <td> Old Password : </td>
                        <td><input type="text" name="oldpass" placeholder="Please Enter Youe Old Password... "></td>
                    </tr>
                    <tr>
                        <td> New Password : </td>
                        <td><input type="text" name="newpass" placeholder="Please Enter Youe New Password..."></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="changepass" value="update"></td>
                    </tr>
                    
                </table>
            </form>
         </div>
     </article>
 <?php include 'inc/foot.php';?>
