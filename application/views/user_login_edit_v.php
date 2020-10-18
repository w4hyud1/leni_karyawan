<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
    
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>Employee Edit Status</div>
		<div class="card-body">
			<form action="<?php echo base_url()?>user_login/update" method="POST">
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">Username</label>
						<input type="text"  class="form-control" name="username" placeholder="Periode Contract" value="<?=$get_data->username?>" readonly>
					</div>
					<div class="col-md-8 mb-3">
						<label for="validationDefault02">Name</label>
						<input type="text"  class="form-control" name="name" placeholder="Periode Contract" value="<?=$get_data->name?>">
					</div>
				</div>
				
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Level</label>
						<select name="level" class="form-control">
							<option <?php if ($get_data->level=="staff") { echo "selected"; }?> value="staff">Staff</option>
							<option <?php if ($get_data->level=="supervisor") { echo "selected"; }?> value="supervisor">Supervisor</option>
							<option <?php if ($get_data->level=="manager") { echo "selected"; }?> value="manager">Manager</option>
							<option <?php if ($get_data->level=="admin") { echo "selected"; }?> value="admin">Admin</option>
						</select>
						
						<!-- <input type="text" name="join_date" class="form-control"  placeholder="Join Date" value="<?=$get_data->level?>"> -->
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Password</label>
						<input type="text" name="password" class="form-control" placeholder="End Date" value="<?php echo $get_data->password?>">
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Status</label>
						<select name="status" class="form-control">
							<option <?php if ($get_data->status=="active") { echo "selected"; }?> value="active">Active</option>
							<option <?php if ($get_data->status=="inactive") { echo "selected"; }?> value="inactive">Inactive</option>
						</select>
						
						<!-- <input type="text" name="inactive_date" class="form-control" placeholder="Inactive Date" value="<?php echo $get_data->status?>"> -->
					</div>
				</div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Update Data</button>
			</form>

		</div>
	</div>
</div>