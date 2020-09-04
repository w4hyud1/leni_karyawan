<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>New Karyawan</div>
		<div class="card-body">
			<form action="save" method="POST">
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">NIK</label>
						<input type="text" name="nik" class="form-control" id="validationDefault01" placeholder="NIK" value="<?php echo $get_nik_new ?>">
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Name</label>
						<input type="text" name="name" class="form-control" id="validationDefault02" placeholder="Name" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">ID Client</label>
						<select name="id_client" class="form-control">
							<?php
            foreach ($get_client as $row) {
              $id_name = $row->id." - ".$row->name;
              echo "<option value='$row->id'>$id_name</option>";
            }
          ?>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Birth Date</label>
						<input type="date" name="birth_date" class="form-control" name="birth_date" placeholder="Birth Date" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Birth Place</label>
						<input type="text" name="birth_place" class="form-control" name="birth_place" placeholder="Birth Place" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">Position</label>
						<select name="position" class="form-control">
							<?php
            foreach ($get_jabatan as $row) {
              $id_name = $row->id." - ".$row->name;
              echo "<option value='$row->name'>$id_name</option>";
            }
          ?>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault03">Gender</label>
						<input type="text" name="gender" class="form-control" placeholder="Gender" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault04">Blood Type</label>
						<input type="text" name="blood_type" class="form-control" placeholder="Blood Type" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault05">Marital Status</label>
						<select name="marital_status" class="form-control">
							<option value="Single">Single</option>
							<option value="Married">Married</option>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault03">City Zenship</label>
						<input type="text" name="cityzenship" class="form-control" placeholder="City Zenship" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault04">Number Phone</label>
						<input type="text" name="phone" class="form-control" placeholder="Phone" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault05">Religion</label>
						<select name="religion" class="form-control">
							<option value="Islam">Islam</option>
							<option value="Protestan">Protestan</option>
							<option value="Katolik">Katolik</option>
							<option value="Hindu">Hindu</option>
							<option value="Buddah">Buddah</option>
							<option value="Khonghucu">Khonghucu</option>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault03">email</label>
						<input type="email" name="email" class="form-control"  placeholder="email" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault04">ID Number</label>
						<input type="text" name="id_number" class="form-control"placeholder="ID Number" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault05">ID Type</label>
						<input type="text" name="id_type" class="form-control" placeholder="ID Type" required>
					</div>
				</div>


				<div class="form-group">
					<button class="btn btn-primary" type="submit">Submit form</button>
			</form>

		</div>
	</div>
</div>