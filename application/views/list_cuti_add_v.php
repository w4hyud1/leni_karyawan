<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>New List Client</div>
		<div class="card-body">
			<form action="<?php echo base_url()?>list_cuti/save" method="POST">
				<div class="form-row">
					<input type="hidden" name="id">
					<div class="col-md-6 mb-6">
						<label for="validationDefault01">Name</label>
						<input type="text" name="name" class="form-control" id="validationDefault01" placeholder="Name">
					</div>
					<div class="col-md-6 mb-6">
						<label for="validationDefault02">Count Cuti</label>
						<input type="number" name="count_cuti" class="form-control" id="validationDefault02" placeholder="Count Cuti" required>
					</div>
				</div>

				<div class="form-row">
				</div>
        		<br/>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Save form</button>
					<button class="btn btn-danger" type="submit" onclick="history.back()">Back form</button>
                </div>
			</form>

		</div>
	</div>
</div>