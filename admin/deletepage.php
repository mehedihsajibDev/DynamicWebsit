<?php include '../config/config.php'; ?>
<?php  include '../lib/database.php';?>


<?php
   $db=new Database();

  ?>

  <?php
  if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL){
    echo "<script> window.location='index.php'; </script>";
  }else{
    $delid=$_GET['deleteid'];
    $delquery="DELETE FROM tbl_pages where id='$delid'";
    $delresult=$db->delete($delquery);
    if($delresult){
        echo "<script>alert('Data deleted Successfully');</script>";
    echo "<script> window.location='index.php'; </script>";
        
    }else{
        echo "not deleted";
    }
  }

  ?>