<?php include 'incl/headerone.php'; ?>
 <?php include 'incl/sidebar.php'; ?>
        <div class="grid_10">
		<?php
         if($_SERVER['REQUEST_METHOD']=='POST'){
            $name=mysqli_real_escape_string($db->link,$_POST['name']);
            $body=mysqli_real_escape_string($db->link,$_POST['body']); 
         if($name==""||$body=="")
            {
                echo "<span>Filled must not be empty </span>";
            }
            else{
               $query = "INSERT INTO tbl_pages(name,body)
                 VALUES('$name','$body' )";
                 $inserted_rows = $db->insert($query);
                 if ($inserted_rows) {
                 echo "<span class='success'>page Created Successfully.
                </span>";
                 }

            else {
            echo "<span class='error'>page Not creatted !</span>";
                 }
                }
                

                 }
                 
        ?>

            <div class="box round first grid">
                <h2>Add New Post</h2>

            

                <div class="block">               
                 <form action="" method="POST">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="name" />
                            </td>
                        </tr>
                     
                       
                         <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
					                	<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
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
     <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>

      <?php include 'incl/footer.php'; ?></body>
</html>
