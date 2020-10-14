<?php include 'incl/headerone.php'; ?>
 <?php include 'incl/sidebar.php'; ?>
<?php
if(!isset($_GET['catid']) ||$_GET['catid']==NULL){
    header("Location:catlist.php");
}else{
    $id=$_GET['catid'];
}

?>

    <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
      
    $name=$_POST['name'];
    $name=mysqli_real_escape_string($db->link,$name);

    if(empty($name)){
        echo "<span class='error'> Filled must not be empty </span>";
    }else{
        $query="UPDATE tbl_category set name='$name' WHERE id='$id' ";
        $result=$db->update($query);
        if($result){
          echo "<span class='success'>Update Sucessfully </span>";
        }else{
          echo "<span class='error'> Update Not Inserted  </span>";
        }
    }
}


?>

      
      <?php 
         $query="SELECT *FROM tbl_category WHERE id='$id' ";
         $result=$db->select($query);
         if($result){
        while ($cat=$result->fetch_assoc()) {
       
      ?>
                 <form action="" method="POST">
                    <table class="form">	
                     <tr>
                    
                        </tr>				
                        <tr>
                            <td>
                               
                                <input type="text" name="name" value="<?php  echo $cat['name'] ?>" />

                            </td>

                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
               <?php } ?>
               <?php } ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
   <?php include 'incl/footer.php'; ?>
</body>
</html>
