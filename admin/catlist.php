<?php include 'incl/headerone.php'; ?>
 <?php include 'incl/sidebar.php'; ?>
        
        <div class="grid_10">
  <?php 
     if(isset($_GET['deleteid'])){
      $delid=$_GET['deleteid'];
      $query="DELETE FROM tbl_category where id='$delid'";
      $deletes=$db->delete($query);
      if($deletes){
        echo "<span class='error'> delete is succesfull </span>";
      }else{
        echo "<span> delete is failled </span>"; 
      }
     }

  ?>

            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">

					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                       $query="SELECT *FROM tbl_category";
                       $category=$db->select($query);
                       if($category){
                        $i=0;
                        while ($result=$category->fetch_assoc()) {
                            
                          $i++;

                    ?>



						<tr class="even gradeC">
							<td>  <?php echo $i; ?> </td>
							<td> <?php echo $result['name']; ?> </td>

							<td><a href="editcat.php?catid=<?php echo $result['id']; ?>">Edit</a> || <a onclick=
                "return confirm('Are you sure You want to delete')"href="?deleteid=<?php
                echo $result['id'];
                ?>">Delete</a></td>
						</tr>

                    <?php } ?>

                         <?php } ?>

					</tbody>
				</table>
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
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
      <?php include 'incl/footer.php'; ?>
</body>
</html>
