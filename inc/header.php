<?php include 'config/config.php'; ?>
<?php  include 'lib/database.php';?>
<?php include 'helpers/Formate.php';?>

<?php
   $db=new Database(); 
   $fm=new Formate();

  ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo TITLE; ?></title>
	<link rel="stylesheet" type="text/css" href="styless.css">
</head>
<body>
<div class="headersection template clear">
	<!-- here i will write code -->
	<?php 
       $query="SELECT *FROM tbl_logo where id='1'";
       $result=$db->select($query);
       if($result){
       while($loogs=$result->fetch_assoc()){
      ?>
<div class="logo clear">
	<img src="admin/<?php echo $loogs['logo']; ?>"alt="noimg"/>
    <h1><?php echo $loogs['title']; ?></h1>
	<p><?php echo $loogs['slogan']; ?></p>
</div>

<?php } ?>
<?php } ?>


<div class="social clear">
	<?php 
       $query="SELECT *FROM tbl_social where id='1'";
       $result=$db->select($query);
       if($result){

       	while($links=$result->fetch_assoc()){



?>
	<a href="#" target ="_blank" > <img src="images/facebook.png"/></a>
	<a href="<?php echo $links['tw']; ?>"target="_blank"><img src="images/twitter.png"/></a>
	<a href="<?php echo $links['ln']; ?>" target="_blank"><img src="images/linkidn.png"/></a>
	
<?php } ?>
<?php } ?>
</div>

<br><br>
<div class="searchbtn clear">
	<form action="search.php" method="GET">
		<input type="text" name="search" placeholder="Search Keyword">
		<input type="submit" name="submit" value="Search">
	</form>
</div>

</div>
<div class="navsection template clear">
 <ul>
 	

	<li> <a id="active" href="index.php" >Home</a></li>
	<li> <a href="#">About </a></li>
	<?php 
       $query="SELECT *FROM tbl_pages";
       $result=$db->select($query);
       if($result){

       	while($page=$result->fetch_assoc()){


	?>
	<li> <a href="detailspage.php?pageid=<?php echo $page['id']; ?>"> <?php echo $page['name']; ?> </a></li>
<?php }}?>
	
	<li> <a id="active" href="contactus.php" >Contacts</a></li>
	

</ul>
</div>
</body>
</html>
