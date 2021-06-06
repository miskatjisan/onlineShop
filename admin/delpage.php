<?php 
        include '../lib/session.php'; 
        session::checkSession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>

<?php 
        $db= new Database();
?>
<?php 
        if (!isset($_GET['delpageid']) || $_GET['delpageid'] == NULL ){
          echo  "<script> window.location = 'index.php'; </script>";
          //header(Location:listCat.php);
        } else {
         $delpageid=   $_GET['delpageid'];
          $delquery =" DELETE FROM tbl_page WHERE id = $delpageid " ;
       $delpage = $db->delete($delquery);
       if ($delpage){
           echo "<script> alert('Page Deleted Successfully');</script> ";
            echo  "<script> window.location = 'index.php'; </script>";
      } else {
          echo "<script> alert('Page Not Deleted ');</script> ";
            echo  "<script> window.location = 'index.php'; </script>";
      }
}
?>

