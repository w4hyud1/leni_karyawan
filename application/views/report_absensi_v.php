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

								<form action="<?php echo base_url()?>report_abs" method="GET">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
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
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Result</button>
                                    </div>
                                </form>
								<!-- form filter end -->
							</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Activity</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Activity</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php
                                            foreach ($get_data as $row) {
                                                echo "<tr>
                                                        <td>$row->nik</td>
                                                        <td>$row->name</td>
                                                        <td>$row->date</td>
                                                        <td>$row->time</td>
                                                        <td>$row->status</td>
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