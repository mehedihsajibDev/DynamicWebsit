<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<div class="contentsection template clear">
	<div class="maincontent clear">
<?php
if(!isset($_GET['pageid']) ||$_GET['pageid']==NULL){
  echo "nothing found";
    //header("Location:catlist.php");
}else{

    $id=$_GET['pageid'];
}

?>
		<?php
         $query="SELECT *FROM tbl_pages where id=$id";
       
   $post=$db->select($query);
   if($post) { 
   	while ($result=$post->fetch_assoc()) {
		?>
	<div class="samepost clear">
		<h3> <?php echo $result['name']; ?> </h3>
		<p><?php echo $result['body']; ?></p>
		
	</div>

<?php } ?>
<?php } ?>





	</div>
	<?php include 'inc/sidebar.php'; ?>
    <?php include 'inc/footer.php';  ?>
    