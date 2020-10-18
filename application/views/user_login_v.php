<div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo $title_page ?></li>
                        </ol>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card mb-4">
                            <div class="card-body">
								<!-- form filter -->
								<form action="<?php echo base_url()."user_login/load" ?>">
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button type="submit" class="btn btn-primary">Reload Data</button>
                                      
									</div>
								  </div>
								</form>
								<!-- form filter end -->
							</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i><?=$title_page?></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>Level</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>Level</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php
                                            foreach ($get_data as $row) {
                                                echo "<tr>
                                                        <td>$row->username</td>
                                                        <td>$row->name</td>
                                                        <td>$row->level</td>
                                                        <td>$row->password</td>
                                                        <td>$row->status</td>
                                                        <td>
                                                        <a href='".base_url()."user_login/edit/".$row->username."'> <button type='submit' class='btn btn-primary btn-sm'>Edit</button></a>
                                                        <a href='".base_url()."user_login/delete/".$row->username."'> <button type='submit' class='btn btn-danger btn-sm'>Delete</button></a>
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