<?php include 'incl/headerone.php'; ?>
 <?php include 'incl/sidebar.php'; ?>
 <?php 

if($_SERVER['REQUEST_METHOD']=='POST')
{
            $fb=mysqli_real_escape_string($db->link,$_POST['fb']);
            $tw=mysqli_real_escape_string($db->link,$_POST['tw']); 
            $ln=mysqli_real_escape_string($db->link,$_POST['ln']);
            $gp=mysqli_real_escape_string($db->link,$_POST['gp']);

             if($fb==""||$tw==""||$ln==""||$gp=="")
            {
                echo "<span>Filled must not be empty </span>";
            }
            else{
                 $query = "UPDATE tbl_social set fb='$fb',
                                                tw='$tw',                                     
                                                ln='$ln',
                                                gp='$gp'
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
                <h2>Update Social Media</h2>
                <div class="block">  

                <?php 
                 $query="SELECT *FROM tbl_social";
                 $result=$db->select($query);
                 if($result){
                    while($social=$result->fetch_assoc()){


               
                ?>             
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" placeholder="Facebook link.." class="medium" value="<?php echo $social['fb']; ?>" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" placeholder="Twitter link.." class="medium" value="<?php echo $social['tw']; ?>"  />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" placeholder="LinkedIn link.." class="medium" value="<?php echo $social['ln']; ?>"  />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp" placeholder="Google Plus link.." class="medium" value="<?php echo $social['gp']; ?>"  />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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
