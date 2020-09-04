<div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo $title_page ?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
								<!-- form filter -->
								<form action="<?php echo base_url()."karyawan/add" ?>">
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button type="submit" class="btn btn-primary">New Data</button>
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
                                                <th>Gender</th>
                                                <th>Birth Date</th>
                                                <th>Position</th>
                                                <th>Edit | Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Birth Date</th>
                                                <th>Position</th>
                                                <th>Edit | Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php
                                            foreach ($get_all as $row) {
                                                echo "<tr>
                                                        <td>$row->nik</td>
                                                        <td>$row->name</td>
                                                        <td>$row->gender</td>
                                                        <td>$row->birth_date</td>
                                                        <td>$row->position</td>
                                                        <td>
                                                            <a href='".base_url()."karyawan/edit/".$row->nik."'> <button type='submit' class='btn btn-primary'>Edit</button></a>
                                                            <a href='".base_url()."karyawan/delete/".$row->nik."'> <button type='submit' class='btn btn-primary'>Delete</button></a>
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