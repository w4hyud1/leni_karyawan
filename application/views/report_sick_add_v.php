<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>New Data Cuti</div>
		<div class="card-body">
			<form action="<?php echo base_url()?>report_sick/save" method="POST">
				<div class="form-row">
					<input type="hidden" name="id">
					<div class="col-md-6 mb-6">
						<label for="validationDefault01">Name</label>
                        <select name="nik" class="form-control">
                            <?php
                                foreach ($get_data_employee->result() as $row) {
                                    $no = 1;
                                    echo "<option value='$row->nik'>$row->name - $row->nik</option>";    
                                }
                            ?>
                        </select>
					</div>
					<div class="col-md-6 mb-6">
						<label for="validationDefault02">Date</label>
						<input type="date" name="date" class="form-control" id="validationDefault02" required>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="validationDefault01">Activity</label>
						<input type="text" name="activity" class="form-control" id="validationDefault02" required>
					</div>

                    <!-- <div class="col-md-6 mb-3">
						<label for="validationDefault02">count cuti</label>
						<input type="text" name="auto_count" id="auto_count" class="form-control" placeholder="auto_count" required>
					</div> -->

					<div class="col-md-6 mb-3">
						<label for="validationDefault02">Remarks</label>
						<input type="text" name="remarks" class="form-control" id="validationDefault02">
					</div>
				</div>
        		
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Save form</button>
					<button class="btn btn-danger" type="submit" onclick="history.back()">Back form</button>
                </div>
			</form>

		</div>
	</div>
</div>