<div class="container-fluid">
                        <!-- <h1 class="mt-4">Import Log Push Workday</h1> -->
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php base_url()?>">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="<?php base_url()?>">Log Push</a></li>
                            <li class="breadcrumb-item active"><?php echo $title_page?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
								<!-- form filter -->
								
								<!-- <form method="POST" action="error_wd/process_data"> -->
                                <?php echo form_open_multipart("log_wd/process_data"); ?>
                                <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">File Data</label>
									<div class="col-sm-10">
									  <input type="file" name="file_error" accept="text/csv" class="form-control">
									</div>
								  </div>

                                  <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Data Date</label>
									<div class="col-sm-10">
									  <input type="date" class="form-control" id="date" name="data_date" >
									</div>
								  </div>

								  <div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Type Data</label>
									<div class="col-sm-10">
									  <select class="form-control form-control-sm" name="type_data">
										<option>Customer Invoice</option>
										<option>Customer Payment</option>
										<option>Supplier Invoice</option>
									  </select>
									</div>
								  </div>
								  <div class="form-group row">
									<div class="col-sm-10">
                                        <input Type="submit" class="btn btn-primary" name="import" value="Import Data">
									  <!-- <button type="submit" class="btn btn-primary" name="import">Import Data</button> -->
									</div>
								  </div>
                                  <?php echo form_close(); ?>

							</div>
                        </div>
                        <div class='row'>
                        </div>
                    </div>
<script>
$('#date').datetimepicker({
    defaultDate: new Date()
});
</script>