<?php include 'incl/headerone.php'; ?>
 <?php include 'incl/sidebar.php'; ?>
        
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%"> No</th>
							<th width="15%">Posts</th>
							<th width="20%">Description</th>
							<th width="5%">Category</th>
							<th width="10%">Image</th>
                           <th width="10%">Author</th>
                            <th width="10%">Tags</th>
                            <th width="10%">Date</th>
                            <th width="10%">Action</th>


						</tr>
					</thead>
					<tbody>

						<?php 
                                $query="SELECT tbl_post.*,tbl_category.name FROM tbl_post INNER JOIN
                                tbl_category ON tbl_post.cat=tbl_category.id
                                ORDER BY tbl_post.title DESC";
                                $result=$db->select($query);
                                if($result){
                                  $i=0;
                                	while($posts=$result->fetch_assoc()){

                                    $i++;
                        
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $posts['title']; ?></td>
							<td><?php  echo $fm->textShorten ($posts['body'],10); ?></td>
						
							 <td><?php echo $posts['name']; ?></td>

							 <td> <img src="<?php echo $posts['image']; ?>"
							 height="40px" width="60px" /> </td>

							<td><?php  echo $posts['author']; ?></td>


							<td><?php  echo $posts['tags']; ?></td>

							<td><?php  echo $fm->formDate($posts['date']); ?></td>
							<td class="center"> 4</td>
							<td><a href="editpostlist.php?epostid=<?php echo $posts['id']; ?>">Edit</a> || <a onclick=
     "return confirm('Are you sure You want to delete')"href="deletepost.php?deleteid=<?php
                            echo $posts['id']; ?>">Delete</a></td>
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
