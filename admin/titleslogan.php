<?php include 'incl/headerone.php'; ?>
 <?php include 'incl/sidebar.php'; ?>
   
<?php 

if($_SERVER['REQUEST_METHOD']=='POST'){
            $title=mysqli_real_escape_string($db->link,$_POST['title']);
            $slogan=mysqli_real_escape_string($db->link,$_POST['slogan']); 
                     
                //......upload img///
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
        
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;


            if($title==""||$slogan==""||$file_name=="")
            {
                echo "<span>Filled must not be empty </span>";
            }

            
               
            elseif ($file_size >1048567) 
                   {
                    echo "<span class='error'>Image Size should be less then 1MB!
                   </span>";
                    } 
            elseif (in_array($file_ext, $permited) === false)
                   {
                   echo "<span class='error'>You can upload only:-"
                  .implode(', ', $permited)."</span>";
                   } 
              else {
                 move_uploaded_file($file_temp, $uploaded_image);
                 $query = "UPDATE tbl_logo set title='$title',
                                                slogan='$slogan',                                     
                                                logo='$uploaded_image'
                                                 where id='1'";  
                                                

              
                 $updated_rows = $db->update($query);

                 if ($updated_rows) {
                 echo "<span class='success'>Data Updated Successfully.
                </span>";
                 }

            else {
            echo "<span class='error'>Data Not Updated !</span>";
                 }

                 }
              
}




?>


               <div class="grid_10">

                  <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">      

                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">	
                    <?php 
                     $query="SELECT *FROM tbl_logo";
                     $result=$db->select($query);
                     if($result){

                        while($logo=$result->fetch_assoc()){


                    ?>				
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Website Title..."  name="title" class="medium" value="<?php echo $logo['title']; ?>" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Website Slogan..." name="slogan" class="medium" value="<?php echo $logo['slogan']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="<?php echo $logo['logo']; ?>"  alt="nothing" height="40px" width="40px"/>
                            </td>
                        </tr>
						   <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                            
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                                 </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
       <p>
         &copy; Copyright <a href="http://trainingwithliveproject.com">Training with live project</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>
