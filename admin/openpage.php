<?php include 'incl/headerone.php'; ?>
 <?php include 'incl/sidebar.php'; ?>
        <div class="grid_10">

<?php
if(!isset($_GET['pageid']) ||$_GET['pageid']==NULL){
  echo "nothing found";
    //header("Location:catlist.php");
}else{

    $id=$_GET['pageid'];
}

?>

		<?php
         if($_SERVER['REQUEST_METHOD']=='POST'){
            $name=mysqli_real_escape_string($db->link,$_POST['name']);
            $body=mysqli_real_escape_string($db->link,$_POST['body']); 
         if($name==""||$body=="")
            {
                echo "<span>Filled must not be empty </span>";
            }
            else{
               $query = "UPDATE tbl_pages set name='$name',
                body='$body'
                WHERE id='$id' ";
                 $updated_rows = $db->update($query);
                 if ($updated_rows) {
                 echo "<span class='success'>page update Successfully.
                </span>";
                 }

            else {
            echo "<span class='error'>page Not updated !</span>";
                 }
                }
                

                 }
                 
        ?>

            <div class="box round first grid">
                <h2>Add New Post</h2>

            

                <div class="block">               
                 <form action="" method="POST">
                  <?php 

                   $query="SELECT *FROM tbl_pages where id=$id";
                   $result=$db->select($query);
                   if($result){

                    while ($datapage=$result->fetch_assoc()) {

                    
                  ?>
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $datapage['name'] ?>" />
                            </td>
                        </tr>
                     
                       
                         <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"> 
                                <?php echo $datapage['body'] ?>                                  
                                </textarea>
                            </td>
                        </tr>
					                	<tr>
                            <td></td>
                            <td>
                                 <input type="submit" name="submit" Value="Update" />
                          
                                 <a onclick="return confirm('Are you sure you want delete?');" 
                                 href="deletepage.php?deleteid=<?php echo $datapage['id'] ?>">Delete
                               </a>
                            </td>
                        </tr>
                    </table>
                  <?php }} ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
     <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>

      <?php include 'incl/footer.php'; ?>
    </body>
</html>
