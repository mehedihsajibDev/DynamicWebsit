<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>


   <?php 
        if(!isset($_GET['id'])||$_GET['id']==NULL){
        	//header("Location:error.php");
        	echo "id not found ";
        }else{
        	$id=$_GET['id'];
        }
   ?>

   <div class="contentsection template clear">
	<div class="maincontent clear">

		<?php

         $query="SELECT *FROM tbl_post WHERE id=$id";
		   $post=$db->select($query);
		   if($post) { 
		   	while ($result=$post->fetch_assoc()) {
		?>
	<div class="samepost clear">
		<h3> <a href="#"><?php echo $result['title']; ?></a>  </h3>
		<div class="date clear">
			<h5><?php echo $fm->formDate($result['date'])?>,By <a href="#"><?php echo $result['author']; ?> </a> </h5>
		</div>
		<img src="admin/<?php echo $result['image']; ?>" alt="post.img" >
		<?php echo $result['body']; ?>
		<div class="readmore clear">
			
		</div>
		
	</div>
<?php } ?>
<?php } else { header("Location:error.php"); }?>


	</div>

	<?php include 'inc/sidebar.php'; ?>
    <?php include 'inc/footer.php';?>