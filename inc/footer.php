

</div>
<div class="footersection template clear">
	<ul>

	<li> <a id="active" href="#" >Home</a></li>
	<li> <a href="About.html">About </a></li>
	<li> <a id="active" href="#" >Home</a></li>
	<li> <a href="About.html">About </a></li>

</ul>
<?php 
 $query="SELECT *FROM tbl_copyright where id='1'";
 $result=$db->select($query);
 if($result){

 	while($copyright=$result->fetch_assoc()){


?>
	<h2>&copy:<?php echo $copyright['note']; ?></h2>
<?php } ?>
<?php } ?>
</div>
</body>
</html>