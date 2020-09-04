<div class="container-fluid">
	<br>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
		<li class="breadcrumb-item active"><?php echo $title_page?></li>
	</ol>
    
    <?php 
        foreach($get_data as $data){}
        
    ?>
	<div class="card mb-4">
		<div class="card-header"><i class="fas fa-table mr-1"></i>New Karyawan</div>
		<div class="card-body">
			<form action="<?php echo base_url()?>karyawan/update" method="POST">
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">NIK</label>
						<input type="text" name="nik" class="form-control" id="validationDefault01" placeholder="NIK" value="<?php echo $data->nik;?>">
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Name</label>
						<input type="text" name="name" class="form-control" id="validationDefault02" placeholder="Name" value="<?php echo $data->name?>" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">ID Client</label>
						<select name="id_client" class="form-control">
							<?php
								foreach ($get_client as $row) {
									$id_name = $row->id." - ".$row->name;
									if($row->id == $data->id_client){
										echo "<option value='$row->id' selected>$id_name</option>";	
									}else{
										echo "<option value='$row->id'>$id_name</option>";
									}	
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Birth Date</label>
						<input type="date" name="birth_date" class="form-control" name="birth_date" placeholder="Birth Date" value="<?php echo $data->birth_date?>" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Birth Place</label>
						<input type="text" name="birth_place" class="form-control" name="birth_place" placeholder="Birth Place" value="<?php echo $data->birth_place?>" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">Position</label>
						<select name="position" class="form-control">
							<?php
								foreach ($get_jabatan as $row) {
									$id_name = $row->id." - ".$row->name;
									if($row->id==$data->position){
										echo "<option value='$row->name' selected>$id_name</option>";
									}else{
										echo "<option value='$row->name'>$id_name</option>";
									}
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault03">Gender</label>
						<input type="text" name="gender" class="form-control" placeholder="Gender" value="<?php echo $data->gender?>" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault04">Blood Type</label>
						<input type="text" name="blood_type" class="form-control" placeholder="Blood Type" value="<?php echo $data->blood_type?>" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault05">Marital Status</label>
						<select name="marital_status" class="form-control">
							<?php 
								if($data->marital_status=='Single'){
									echo "<option selected value='Single'>Single</option>";
									echo "<option value='Married'>Married</option>";
								}else{
									echo "<option value='Single'>Single</option>";
									echo "<option selected value='Married'>Married</option>";
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault03">City Zenship</label>
						<input type="text" name="cityzenship" class="form-control" placeholder="City Zenship" value="<?php echo $data->cityzenship?>" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault04">Number Phone</label>
						<input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $data->phone?>" required>
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
						<input type="email" name="email" class="form-control"  placeholder="email" value="<?php echo $data->email?>" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault04">ID Number</label>
						<input type="text" name="id_number" class="form-control"placeholder="ID Number" value="<?php echo $data->id_number?>" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault05">ID Type</label>
						<input type="text" name="id_type" class="form-control" placeholder="ID Type" value="<?php echo $data->id_type?>" required>
					</div>
				</div>


				<div class="form-group">
					<button class="btn btn-primary" type="submit">Update Data</button>
			</form>

		</div>
	</div>
</div>