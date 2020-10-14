 

<?php include 'incl/headerone.php'; ?>

 <?php include 'incl/sidebar.php'; ?>
 <?php 


if($_SERVER['REQUEST_METHOD']=='POST')
{
            $copyright=mysqli_real_escape_string($db->link,$_POST['copyright']);
         

             if($copyright=="")
            {
                echo "<span>Filled must not be empty </span>";
            }
            else{
                 $query = "UPDATE tbl_copyright set note='$copyright'
                                               
                                                where id='1'";  
                                                

              
                 $updated_rows = $db->update($query);
                 if($updated_rows){
                    echo "<span> ROw Is updated </span>";
                 }else{
                    echo "<span> Failled to update </span>";
                 }
            }


}

?>






 
        <div class="grid_10">

		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                 <form action="" method="POST">
                    <?php


            
 $query="SELECT *FROM tbl_copyright where id='1'";
 $result=$db->select($query);
 if($result){

    while($copyright=$result->fetch_assoc()){


                     ?>


                    <table class="form">					
                        <tr>
                            <td>
<input type="text" placeholder="Enter Copyright Text..." name="copyright" class="large"
 value="<?php echo $copyright['note'] ?>" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                <?php } ?>
            <?php } ?>
                    </form>
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
