<?php include 'layouts/home-header.php';
    include '../../Controllers/DiaryGetController.php';
     ?>
 <body>
 <?php
    include 'inc/navbar.php'; 
    if(isset($_SESSION['logged_user'])){
    ?>

    <!-- MODAL -->
    <div class="modal" id="createDiary">
    	<div class="modal-dialog modal-lg">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h4 class="modal-title">
    					Create Diary
    				</h4>
    				<button class="close" data-dismiss="modal">
    					<span>&times;</span>
    				</button>
    			</div>
    			<div class="modal-body">
    				<form method="post" action="../../Controllers/DiaryController.php">
    					<div class="form-group">
    						<label>Diary Label</label>
    						<input type="text" name="diaryLabel" class="form-control" placeholder="Diary Label">
    					</div>
    			</div>
    			<div class="modal-footer">
    				<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    				<button name="addDiary" class="btn btn-primary">Save</button>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- END MDAL -->

    <!-- EDIT MODAL -->
    	<div class="modal" id="editDiary">
    		<div class="modal-dialog modal-lg">
    			<div class="modal-content">
    				<div class="modal-header">
    					<h4 class="modal-title">
    						Edit Diary
    					</h4>
    					<button class="close" data-dismiss="modal">
    						<span>&times;</span>
    					</button>
    				</div>
    				<div class="modal-body">
    					<form method="post" action="../../Controllers/DiaryController.php">
    						<div class="form-group">
    							<label>Diary Label</label>
    							<input type="text" name="diaryLabel" class="form-control" placeholder="Diary Label" id="diaryLabel">
    						<input type="hidden" name="diaryId" id="diaryId">
    						</div>
    				</div>
    				<div class="modal-footer">
    					<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    					<button class="btn btn-primary" name="updateDiary">Update</button>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    <!-- END -->
    <!-- DELETE MODAL -->
    	<div class="modal" id="deleteDiary">
    		<div class="modal-dialog">
    			<div class="modal-content">
    				<div class="modal-header">
    					<h4 class="modal-title">
    						Delete Diary
    					</h4>
    					<button class="close" data-dismiss="modal">
    						<span>&times;</span>
    					</button>
    				</div>
    				<div class="modal-body">
    					<p>Are you sure you want to delete <span id="delDiaryLabel"></span>?</p>
    					<form method="post" action="../../Controllers/DiaryController.php">
    						<input type="hidden" name="diaryId" id="delDiaryId">
    				</div>
    				<div class="modal-footer">
    					<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    					<button class="btn btn-primary" name="deleteDiary">Yes</button>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    <!-- END MODAL -->

    <div class="container-fluid">
    	<div class="d-flex mt-2">
    		<div class="flex-grow-1">
    			<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#createDiary">Create diary</button>
    		</div>
    		<div class="flex-grow-1 justify-content-end d-flex">
    			<input type="text" name="search" placeholder="Search" class="form-control search-box" id="searchDiary">
    		</div>
    	</div>
    	<div class="d-flex flex-row flex-wrap mt-2" id="diaryList">
    		<?php foreach($data as $diary){
    			?>
<div class="card card-list">
    			<div class="d-flex flex-column">
    				<div class="flex-grow-1">
    					<img src="../assets/images/bg.jpg" class="card-image">
    				</div>
    				<div class="flex-column p-2 d-flex flex-grow-1">
    					<span>
    						<h4><?php echo $diary['diary_label']; ?></h4>
    						</span>
    					<small>Created by: <strong><?php echo $ownerData['owner_firstname'].' '.$ownerData['owner_lastname']; ?></strong></small>
    					<div class="d-flex flex-row flex-wrap">
    						<div class="flex-grow-1">
    						<small>
    					<?php echo date('l, M d, Y', strtotime($diary['diary_datecreated'])); ?>
    					</small>
    						</div>
    						<div class="flex-grow-1 justify-content-end d-flex">
                                <button type="button" class="btn btn-info btn-sm">View</button>
                                <button type="button" class="btn btn-warning btn-sm" onclick="editDiary('<?php echo $diary['diary_id']; ?>')">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteDiary('<?php echo $diary['diary_id']; ?>')">Delete</button>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    			<?php
    		}
    		?>
    		
    	</div>
    	<!-- <div class="list-group align-items-center mt-2"> -->
    		<!-- <div class="align-items-end d-flex justify-content-end w-50">
    			<div class="form-group w-100">
    			<div class="d-flex flex-row flex-wrap justify-content-end">
    				<div class="align-items-center d-flex flex-grow-1 justify-content-end w-60 mr-2">
    				<label>Filter by</label>
    				</div>
    				<div class="d-flex flex-grow-1">
    				<select class="form-control w-100">
    				<option>Date</option>
    			</select>
    				</div>
    			</div>
    			</div>
    		</div> -->
    	<!-- <a href="#" class="list-group-item list-group-item-action flex-column align-items-start w-50">
    		<div class="d-flex w-100 justify-content-between">
    			<h5 class="mb-1">Title</h5>
    			<small>3 days ago</small>
    		</div>
    		<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    		<small>By yours truly</small>
    	</a>
    </div> -->
    </div>
    <?php }else{
        header('location:../../index.php');
    }
    ?>
    </body>
    <script type="text/javascript">
    	function editDiary(id){
    			$.ajax({
    			url: '../../Controllers/DiaryGetOneController.php',
    			type: 'get',
    			data: {id: id},
    			dataType: 'json',
    			cache: false,
    			success: function(res){
    				$('#diaryLabel').val(res.diary_label);
    				$('#diaryId').val(res.diary_id);
    			}
    		});
    		$('#editDiary').modal('show');
    	}

    	function deleteDiary(id){
    			$.ajax({
    			url: '../../Controllers/DiaryGetOneController.php',
    			type: 'get',
    			data: {id: id},
    			dataType: 'json',
    			cache: false,
    			success: function(res){
    				$('#delDiaryLabel').text(res.diary_label);
    				$('#delDiaryId').val(res.diary_id);
    			}
    		});
    		$('#deleteDiary').modal('show');
    	}

        /*
        TODO
        $(function(){
            $('#searchDiary').keyup(function(){
                var text = $(this).val();
            });
        });*/
    </script>
    </html>