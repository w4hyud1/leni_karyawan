<div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo $title_page ?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
								<!-- form filter -->
								<form action="<?php echo base_url()."approve_spl/add" ?>">
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button type="submit" class="btn btn-primary">New Data Over Time</button>
									</div>
								  </div>
								</form>
								<!-- form filter end -->

                                <!-- <form action="<?=base_url()."report_spl/"?>" method="GET">
                                <div class="form-row">
                                                <div class="col-md-6">
                                                <label for="validationDefault02">Name</label>
                                                    <select name='nik' class="form-control" id="validationDefault02">
                                                            <?php
                                                                foreach ($list_employee as $row) {
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
                                                
                                                    <button class="btn btn-primary" type="submit">Result</button>
                                                
                                            </div>
                                </div>
                                </form>-->
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
                                                <th>Clock</th>
                                                <th>Total Hours</th>
                                                <th>Activity</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Clock</th>
                                                <th>Total Hours</th>
                                                <th>Activity</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php
                                            foreach ($get_data as $row) {
                                                echo "<tr>
                                                        <td>$row->nik</td>
                                                        <td>$row->name</td>
                                                        <td>$row->date</td>
                                                        <td>$row->clock_in - $row->clock_out</td>
                                                        <td>$row->total_hour</td>
                                                        <td>$row->activity</td>
                                                        <td>$row->status</td>
                                                        <td>
                                                            <a href='".base_url()."approve_spl/edit/".$row->id."'> <button type='submit' class='btn btn-info btn-sm'>Edit</button></a>
                                                            <a href='".base_url()."approve_spl/approve/".$row->id."'> <button type='submit' class='btn btn-success btn-sm'>Approve</button></a>
                                                            <a href='".base_url()."approve_spl/cancel/".$row->id."'> <button type='submit' class='btn btn-danger btn-sm'>Cancel</button></a>
                                                        </td>
                                                    </tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>