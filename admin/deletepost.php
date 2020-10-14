<?php include '../config/config.php'; ?>
<?php  include '../lib/database.php';?>
<?php include '../helpers/Formate.php';?>

<?php
   $db=new Database();

  ?>

  <?php
  if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL){
  	echo "<script> window.location='postlist.php'; </script>";
  }else{
  	$delid=$_GET['deleteid'];
  	$query="SELECT *FROM tbl_post where id='$delid'";
  	$result=$db->select($query);
  	if($result){
  		while ($delimg=$result->fetch_assoc()) {
  			$dellink=$delimg['image'];
  			unlink($dellink);
  		}
  	}
  	$delquery="DELETE FROM tbl_post where id='$delid'";
  	$delresult=$db->delete($delquery);
  	if($delresult){
  		echo "<script>alert('Data deleted Successfully');</script>";
  	echo "<script> window.location='postlist.php'; </script>";
  		
  	}else{
  		echo "not deleted";
  	}
  }

  ?>