<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
    
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>Employee New Bank & Salery</div>
		<div class="card-body">
			<form action="<?php echo base_url()?>employee_bank/update" method="POST">
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">NIK</label>
                        <input type="text"  class="form-control" name="nik" placeholder="NIK" value="<?=$get_data->nik?>" readonly>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Periode Contract</label>
						<input type="number"  class="form-control" name="periode_contract" placeholder="Periode Contract" value="<?=$get_data->contract_of_period?>">
					</div>
                    <div class="col-md-4 mb-3">
					<label for="validationDefault02">Status</label>
						<select name="status" class="form-control">
							<option <?php if($get_data->status=="active"){echo "selected";}?> value="active">Active</option>
							<option <?php if($get_data->status=="inactive"){echo "selected";}?> value="inactive">In Active</option>
						</select>
					</div>
				</div>
                
                <div class="form-row">
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Name Of Bank</label>
						<select class="form-control" name="name_of_bank">
                            <?php
                                foreach ($get_bank as $raw) {
                                    if($raw->name==$get_data->name_of_bank){
                                        echo "<option value='$raw->name' selected>$raw->name</option>";
                                    }else{
                                        echo "<option value='$raw->name'>$raw->name</option>";
                                    }
                                    
                                }
                            ?>
                        </select>
						<!-- <input type="text" name="name_of_bank" class="form-control" placeholder="Name Of Bank"> -->
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Bank Account</label>
						<input type="text" name="bank_account" class="form-control" placeholder="Bank Account" value="<?=$get_data->bank_account?>">
					</div>
                    <div class="col-md-4 mb-3">
						<label for="validationDefault02">Salary</label>
						<input type="text" name="salary" class="form-control" placeholder="Salary" value="<?=$get_data->salary?>">
					</div>
				</div>

                <div class="form-row">
					
				</div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Update Data</button>
			</form>

		</div>
	</div>
</div>