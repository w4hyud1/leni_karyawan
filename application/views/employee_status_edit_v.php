<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
    
    <?php 
        foreach($get_data as $data){}
        
    ?>
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>Employee Edit Status</div>
		<div class="card-body">
			<form action="<?php echo base_url()?>karyawan/update" method="POST">
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">NIK</label>
						<input type="text" name="nik" class="form-control" id="validationDefault01" placeholder="NIK" value="<?php echo $data->nik;?>" readonly>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Name</label>
						<input type="text" name="name" class="form-control" id="validationDefault02" placeholder="Name" value="<?php echo $data->name?>" readonly>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">Position</label>
						<input type="text" name="position" class="form-control" id="validationDefault02" placeholder="Position" value="<?php echo $data->position?>" readonly>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Join Date</label>
						<input type="date" name="join_date" class="form-control" name="join_date" placeholder="Join Date" value="<?php echo $data->birth_date?>" required>
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">End Date</label>
						<input type="date" name="end_date" class="form-control" name="end_date" placeholder="End Date" value="<?php echo $data->birth_date?>" required>
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Inactive Date</label>
						<input type="date" name="inactive_date" class="form-control" name="inactive_date" placeholder="Inactive Date" value="<?php echo $data->birth_date?>" required>
					</div>
				</div>

                <div class="form-row">
					<div class="col-md-12 mb-3">
						<label for="validationDefault02">Remarks</label>
						<input type="text" name="remarks" class="form-control" name="remarks" placeholder="Remarks" value="" required>
					</div>
				</div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Update Data</button>
			</form>

		</div>
	</div>
</div>