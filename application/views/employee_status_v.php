<div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo $title_page ?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
								<!-- form filter -->
                                <?= $this->session->flashdata('message'); ?>
								<form action="<?php echo base_url()."employee_status/add"?> ">
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button type="submit" class="btn btn-primary">New Data</button>
									</div>
								  </div>
								</form>
								<form action="<?php echo base_url()?>employee_status" method="GET">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationDefault02">Filter By Status</label>
                                           <select name='status' class="form-control" id="validationDefault02">
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                                <option value="cek">Cek</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Result</button>
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
                                                <th>NIK</th>
                                                <th>Name</th>
                                                <th>Period Contract</th>
                                                <th>Join Date</th>
                                                <th>End Date</th>
                                                <th>Inactive Date</th>
                                                <th>Cuti</th>
                                                <th>Status</th>
                                                <th>Edit | Delete</th>
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
                                                <th>Cuti</th>
                                                <th>Status</th>
                                                <th>Edit | Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php
                                            foreach ($get_data as $row) {
                                                echo "<tr>
                                                        <td>$row->nik</td>
                                                        <td>$row->name</td>
                                                        <td>$row->contract_of_period</td>
                                                        <td>$row->join_date</td>
                                                        <td>$row->end_date</td>
                                                        <td>$row->inactive_date</td>
                                                        <td>$row->cuti</td>
                                                        <td>$row->status</td>
                                                        <td>
                                                            <a href='".base_url()."employee_status/edit/".$row->nik."'> <button type='submit' class='btn btn-primary btn-sm'>Edit</button></a>
                                                            <a href='".base_url()."employee_status/delete/".$row->nik."'> <button type='submit' class='btn btn-danger btn-sm'>Delete</button></a>
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