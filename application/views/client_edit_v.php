<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>Update Client</div>
		<div class="card-body">
			<form action="<?php echo base_url()?>client/update" method="POST">
			<div class="form-row">
					<input type="hidden" name="id" value="<?php echo $get_data['id'];?>" >
					<div class="col-md-6 mb-6">
						<label for="validationDefault01">Name</label>
						<input type="text" name="name" class="form-control" id="validationDefault01" placeholder="Name" value="<?php echo $get_data['name'] ?>">
					</div>
					<div class="col-md-6 mb-6">
						<label for="validationDefault02">Address</label>
						<input type="text" name="address" class="form-control" id="validationDefault02" placeholder="Address" value="<?php echo $get_data['address']?>" required>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="validationDefault01">Phone</label>
						<input type="text" name="phone" class="form-control" id="validationDefault01" placeholder="Phone" value="<?php echo $get_data['phone']?>">
					</div>
					<div class="col-md-6 mb-3">
						<label for="validationDefault02">NPWP</label>
						<input type="text" name="npwp" class="form-control" id="validationDefault02" placeholder="NPWP" value="<?php echo $get_data['npwp']?>" required>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Update Data</button>
					<button class="btn btn-danger" type="submit" onclick="history.back()">Back form</button>
                </div>
			</form>

		</div>
	</div>
</div>