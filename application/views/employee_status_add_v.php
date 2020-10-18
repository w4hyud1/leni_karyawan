<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
    
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>Employee New Status</div>
		<div class="card-body">
			<form action="<?php echo base_url()?>employee_status/save" method="POST">
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">NIK</label>
                        <select class="form-control" name="nik">
                            <?php
                                foreach ($get_list as $raw) {
                                    echo "<option value='$raw->nik'>$raw->nik - $raw->name</option>";
                                }
                            ?>
                        </select>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Periode Contract</label>
						<input type="number"  class="form-control" name="periode_contract" placeholder="Periode Contract" value="1">
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Join Date</label>
						<input type="date" name="join_date" class="form-control"  placeholder="Join Date">
					</div>
				</div>

				<div class="form-row">
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">End Date</label>
						<input type="date" name="end_date" class="form-control" placeholder="End Date">
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Inactive Date</label>
						<input type="date" name="inactive_date" class="form-control" placeholder="Inactive Date">
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Inactive Reason</label>
						<input type="text" name="inactive_reason" class="form-control" placeholder="Inactive Reason">
					</div>
				</div>

                <div class="form-row">
					
				</div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">New Data</button>
					<button class="btn btn-primary" >Back</button></button>
			</form>

		</div>
	</div>
</div>