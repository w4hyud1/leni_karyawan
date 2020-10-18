<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
    
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>Employee New Bank & Salery</div>
		<div class="card-body">
			<form action="<?php echo base_url()?>employee_bank/save" method="POST">
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
						<input type="number"  class="form-control" name="periode_contract" placeholder="Periode Contract">
					</div>
                    <div class="col-md-4 mb-3">
					<label for="validationDefault02">Status</label>
						<select name="status" class="form-control">
							<option value="active">Active</option>
							<option value="inactive">In Active</option>
						</select>
					</div>
				</div>
                
                <div class="form-row">
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Name Of Bank</label>
						<select class="form-control" name="name_of_bank">
                            <?php
                                foreach ($get_bank as $raw) {
                                    echo "<option value='$raw->name'>$raw->name</option>";
                                }
                            ?>
                        </select>
						<!-- <input type="text" name="name_of_bank" class="form-control" placeholder="Name Of Bank"> -->
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Bank Account</label>
						<input type="text" name="bank_account" class="form-control" placeholder="Bank Account">
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Salary</label>
						<input type="text" name="salary" class="form-control" placeholder="Salary" disable>
					</div>
				</div>

                <div class="form-row">
					
				</div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">New Data</button>
			</form>

		</div>
	</div>
</div>