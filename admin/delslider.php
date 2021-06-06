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
        if (!isset($_GET['sliderid']) || $_GET['sliderid'] == NULL ){
          echo  "<script> window.location = 'sliderlist.php'; </script>";
          //header(Location:listCat.php);
        } else {
         $delsliderid=   $_GET['sliderid'];
         $query = "SELECT * FROM tbl_slider WHERE id = '$delsliderid' " ;
         $getslider = $db->select($query);
         if ($getslider){
             while ($delImg = $getslider->fetch_assoc()){
                 $unlinkImg = $delImg['image'];
                 unlink($unlinkImg);
                 
             }
         }
             
        $delquery =" DELETE FROM tbl_slider WHERE id ='$delsliderid' " ;
       $delslider = $db->delete($delquery);
       if ($delslider){
           echo "<script> alert('Slider Deleted Successfully');</script> ";
            echo  "<script> window.location = 'sliderlist.php'; </script>";
      } else {
          echo "<script> alert('Slider Not Deleted ');</script> ";
            echo  "<script> window.location = 'sliderlist.php'; </script>";
      }
}
?>

