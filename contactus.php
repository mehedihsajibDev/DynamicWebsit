<?php include 'inc/header.php'; ?>

<?php 

if($_SERVER['REQUEST_METHOD']=='POST'){
//validation
	$fname=$fm->validation($_POST['fname']);
	$lname=$fm->validation($_POST['lname']);
	$email=$fm->validation($_POST['email']);
	$body=$fm->validation($_POST['fname']);
	
	$fname=mysqli_real_escape_string($db->link,$fname);
	$lname=mysqli_real_escape_string($db->link,$lname);
	$email=mysqli_real_escape_string($db->link,$email);
	$body=mysqli_real_escape_string($db->link,$body);
	$error="";
	if(empty($fname)){
		$error="first name must not be empty";
	}elseif (empty($lname)) {
	$error="last name must not be empty";
	}elseif (empty($email)) {
		$error="email must not be empty";
	}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error="Invalid email address";
	}
	elseif (empty($body)) {
		$error="body must not be empty";
	}
	else{
	$msg="okk";
     
	}
}
?>


<div class="contentsection template clear">
	<div class="maincontent clear">
	<form action="" method="POST">
		<?php
		if(isset($error)){
			echo "<span style='color:red'>$error</span>";
		} if (isset($msg)) {
			echo "<span style='color:red'>$msg</span>";
		}
		?>
		<table>
			<tr>
				<td>Your First Name:</td>
				<td><input type="text" name="fname" placeholder="firstname"></td>
			</tr>
			<tr>
				<td>Your Last Name:</td>
				<td><input type="text" name="lname" placeholder="Lastname"></td>
			</tr>
			
			<tr>
				<td>Your Email:</td>
				<td><input type="Email" name="email" placeholder="Email"></td>
			</tr>
			<tr>
				<td>body</td>
				<td>
					
				<textarea> 

				</textarea>
				</td>
			
			</tr>
               <tr>
               	<td>
               		
               	</td>
				
				<td><input type="submit" name="submit" value="submit"></td>
			</tr>

		</table>
	</form>
	</div>
</div>

<?php include 'inc/footer.php';  ?>

	




