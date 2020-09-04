<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>Update Jabatan</div>
		<div class="card-body">
			<form action="<?php echo base_url()?>position/update" method="POST">
				<div class="form-row">
					<input type="hidden" name="id" value="<?php echo $get_data['id']?>">
					<div class="col-md-12 mb-3">
						<label for="validationDefault02">Name</label>
						<input type="text" name="name" class="form-control" id="validationDefault02" placeholder="Name" value="<?php echo $get_data['name']?>" required>
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