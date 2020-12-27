<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>New Data Cuti</div>
		<div class="card-body">
			<form action="<?php echo base_url()?>report_spl/update" method="POST">
				<div class="form-row">
					<input type="hidden" name="id" value="<?php echo $get_data['id']?>" >
					<div class="col-md-6 mb-6">
						<label for="validationDefault01">Name</label>
                        <input type="text" name="name" class="form-control" id="validationDefault02" value="<?php echo $get_data['name']?>" readonly>
					</div>
					<div class="col-md-6 mb-6">
						<label for="validationDefault02">Date</label>
						<input type="date" name="date" class="form-control" id="validationDefault02" value="<?php echo $get_data['date']?>" readonly>
					</div>
				</div>

                <div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="validationDefault01">Clock In</label>
						<input type="text" name="activity" class="form-control" id="validationDefault02" value="<?php echo $get_data['clock_in']?>" readonly>
					</div>

					<div class="col-md-6 mb-3">
						<label for="validationDefault02">Clock Out</label>
						<input type="text" name="remarks" class="form-control" id="validationDefault02" value="<?php echo $get_data['clock_out']?>" readonly>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="validationDefault01">Activity</label>
						<input type="text" name="activity" class="form-control" id="validationDefault02" value="<?php echo $get_data['activity']?>" required>
					</div>

					<div class="col-md-6 mb-3">
						<label for="validationDefault02">Total Hour</label>
						<input type="number" name="total_hour" class="form-control" id="validationDefault02" value="<?php echo $get_data['total_hour']?>">
					</div>
				</div>
        		
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Update form</button>
					<button class="btn btn-danger" type="submit" onclick="history.back()">Back form</button>
                </div>
			</form>

		</div>
	</div>
</div>