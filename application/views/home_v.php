
<div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <!-- <li class="breadcrumb-item active"></li> -->
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
								<!-- form filter -->
								<!-- <p>Welcome to the HRD Portal</p> -->
								
								<div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Primary Count <?php echo $employee_all->jml?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="<?php echo base_url()?>employee_status">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">Warning Count <?php echo $employee_warning->jml?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="<?php echo base_url()?>employee_status">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">Success Count <?php echo $employee_success->jml?> </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">Danger Count <?php echo $employee_danger->jml?> </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="<?php echo base_url()?>employee_status">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							</div>
                        </div>
                        <!-- <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                            <div class="card-body">
            
                            </div>
                        </div>
                    </div> -->

                    <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Employee Status</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Name</th>
                                                <th>Period Contract</th>
                                                <th>Join Date</th>
                                                <th>End Date</th>
                                                <th>Inactive Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Name</th>
                                                <th>Period Contract</th>
                                                <th>Join Date</th>
                                                <th>End Date</th>
                                                <th>Inactive Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                             foreach ($get_data as $row) {
                                                if($row->inactive_date<>"0000-00-00"){
                                                    $status = "Inactive";
                                                }else{
                                                    $status = "Active";
                                                }
                                                echo "<tr>
                                                        <td>$row->nik</td>
                                                        <td>$row->name</td>
                                                        <td>$row->contract_of_period</td>
                                                        <td>$row->join_date</td>
                                                        <td>$row->end_date</td>
                                                        <td>$row->inactive_date</td>
                                                        <td>$status</td>
                                                    </tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>