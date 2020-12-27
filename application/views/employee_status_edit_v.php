<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
    
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>Employee Edit Status</div>
		<div class="card-body">
			<form action="<?php echo base_url()?>employee_status/update" method="POST">
				<div class="form-row">
				<input type="hidden"  name="nik" value="<?=$get_data->nik?>">
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">NIK - Name</label>
						<input type="text"  class="form-control" name="periode_contract" placeholder="Periode Contract" value="<?=$get_data->name?>" readonly>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Periode Contract</label>
						<input type="number"  class="form-control" name="periode_contract" placeholder="Periode Contract" value="1">
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Join Date</label>
						<input type="date" name="join_date" class="form-control"  placeholder="Join Date" value="<?=$get_data->join_date?>">
					</div>
				</div>
				
				<div class="form-row">
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">End Date</label>
						<input type="date" name="end_date" class="form-control" placeholder="End Date" value="<?php echo $get_data->end_date?>">
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Inactive Date</label>
						<input type="date" name="inactive_date" class="form-control" placeholder="Inactive Date" value="<?php echo $get_data->inactive_date?>">
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Inactive Reason</label>
						<input type="text" name="inactive_reason" class="form-control" placeholder="Inactive Reason" value="<?php echo $get_data->inactive_reason?>">
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Status</label>
						<select name="status" class="form-control">
							<option value="Active">Active</option>
							<option value="Active">Inactive</option>
							<option value="Active">Cancel</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Update Data</button>
			</form>

		</div>
	</div>
</div>