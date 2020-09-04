<div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo $title_page ?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
								<!-- form filter -->
								<form action="<?php echo base_url()."absensi/export" ?>">
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button type="submit" class="btn btn-primary">Export Data Absensi</button>
									</div>
								  </div>
								</form>
								
								<!-- form filter end -->
							</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Karyawan</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">NIK</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">time</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Activity</th>
                                            <th scope="col">Remarks</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">NIK</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">time</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Activity</th>
                                                <th scope="col">Remarks</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $i=1;?>
                                                <tr>
                                                <?php foreach ($get_data as $raw ) { ?>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $raw->nik;?></td>
                                                <td></td>
                                                <td><?php echo $raw->date?></td>
                                                <td><?php echo $raw->time;?></td>
                                                <td><?php echo $raw->status;?></td>
                                                <td><?php echo $raw->activity;?></td>
                                                <td><?php echo $raw->remarks;?></td>
                                                </tr>
                                                <?php };?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>