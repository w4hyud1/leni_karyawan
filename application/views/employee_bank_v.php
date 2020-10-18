<div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo $title_page ?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <?= $this->session->flashdata('message'); ?>
								<form action="<?php echo base_url()."employee_bank/add"?> ">
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button type="submit" class="btn btn-primary">New Data</button>
									</div>
								  </div>
								</form>
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
                                                <th>Name Bank</th>
                                                <th>Bank Account</th>
                                                <th>Salary</th>
                                                <th>Contract Period</th>
                                                <th>Status</th>
                                                <th>Edit | Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Name</th>
                                                <th>Name Bank</th>
                                                <th>Bank Account</th>
                                                <th>Salary</th>
                                                <th>Contract Period</th>
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
                                                        <td>$row->name_of_bank</td>
                                                        <td>$row->bank_account</td>
                                                        <td>$row->salary</td>
                                                        <td>$row->contract_of_period</td>
                                                        <td>$row->status</td>
                                                        <td>
                                                            <a href='".base_url()."employee_bank/edit/".$row->nik."'> <button type='submit' class='btn btn-primary btn-sm'>Edit</button></a>
                                                            <a href='".base_url()."employee_bank/delete/".$row->nik."'> <button type='submit' class='btn btn-danger btn-sm'>Delete</button></a>
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