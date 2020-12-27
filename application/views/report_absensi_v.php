<div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo $title_page ?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
								<!-- form filter -->
								<form action="<?php echo base_url()."report_abs/export" ?>">
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button type="submit" class="btn btn-primary">Export Data Absensi</button>
                                      
									</div>
								  </div>
								</form>

								<!-- <form action="<?php echo base_url()?>report_abs" method="GET">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="validationDefault02">Name</label>
                                           <select name='nik' class="form-control" id="validationDefault02">
                                                <?php
                                                    foreach ($get_nik as $row) {
                                                        echo "<option value='$row->nik'>$row->name  -  $row->nik </option>";    
                                                    }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Status</label>
                                                        <select name="status" class="form-control py">
                                                            <option value="IN">IN</option>
                                                            <option value="OUT">OUT</option>
                                                        </select>
                                                     <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" /> -->
                                                    <!-- </div>
                                                </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Result</button>
                                    </div>
                                </form> -->
								<!-- form filter end -->
                                <form action="<?=base_url()."report_abs/generate_abs"?>" method="POST">
                                <div class="form-row">
                                                <div class="col-md-6">
                                                <label for="validationDefault02">Name</label>
                                                    <select name='nik' class="form-control" id="validationDefault02">
                                                            <?php
                                                                foreach ($get_nik as $row) {
                                                                    echo "<option value='$row->nik'>$row->name  -  $row->nik </option>";    
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Date</label>
                                                    <input class="form-control" type="date" name="date" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- <div class="form-group"> -->
                                                    <button class="btn btn-primary" type="submit">Result</button>
                                                <!-- </div> -->
                                            </div>
							</div>
                            </form>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data</div>
                            <div class="card-body">
                                <!-- Detail start -->
                                <table>
                                    <tr>
                                        <td>Duration</td>
                                        <td>:</td>
                                        <td><?php echo date('F Y',strtotime($info_absensi->date)) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>:</td>
                                        <td><?php echo $info_absensi->name?> </td>
                                    </tr>
                                    <tr>
                                        <td>Position</td>
                                        <td>:</td>
                                        <td><?php echo $info_absensi->position?> </td>
                                    </tr>
                                    <tr>
                                        <td>Client Name</td>
                                        <td>:</td>
                                        <td><?php echo $info_absensi->client_name?> </td>
                                    </tr>
                                </table>
                                <hr/>
                                <!-- detail end                  -->
                                <div class="table-responsive">
                                    <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                                    <table class="table-sm table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <!-- <th>NIK</th>
                                                <th>Name</th> -->
                                                <th>Date</th>
                                                <th>Day</th>
                                                <th>Clock In</th>
                                                <th>Clock Out</th>
                                                <th>Activity</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <!-- <th>NIK</th>
                                                <th>Name</th> -->
                                                <th>Date</th>
                                                <th>Day</th>
                                                <th>Clock In</th>
                                                <th>Clock Out</th>
                                                <th>Activity</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php
                                            foreach ($get_data as $row) {
                                                echo "<tr>
                                                        <td>$row->date</td>
                                                        <td>$row->day</td>
                                                        <td>$row->clock_in</td>
                                                        <td>$row->clock_out</td>
                                                        <td>$row->activity</td>
                                                        <td>$row->remarks</td>
                                                    </tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>