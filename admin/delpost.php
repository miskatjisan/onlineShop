<?php 
        include '../lib/session.php'; 
        session::checkSession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>
<?php 
        $db=new Database();
?>
<?php 
        if (!isset($_GET['delpostid']) || $_GET['delpostid'] == NULL ){
          echo  "<script> window.location = 'postList.php'; </script>";
          //header(Location:listCat.php);
        } else {
         $delpostid=   $_GET['delpostid'];
         $query = "SELECT * FROM tbl_post WHERE id = '$delpostid' " ;
         $getpost = $db->select($query);
         if ($getpost){
             while ($delImg = $getpost->fetch_assoc()){
                 $unlinkImg = $delImg['image'];
                 unlink($unlinkImg);
                 
             }
         }
             
        $delquery =" DELETE FROM tbl_post WHERE id ='$delpostid' " ;
       $delpost = $db->delete($delquery);
       if ($delpost){
           echo "<script> alert('Data Deleted Successfully');</script> ";
            echo  "<script> window.location = 'postList.php'; </script>";
      } else {
          echo "<script> alert('Data Not Deleted ');</script> ";
            echo  "<script> window.location = 'postList.php'; </script>";
      }
}
?>
