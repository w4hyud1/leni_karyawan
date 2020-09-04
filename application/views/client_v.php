<div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo $title_page?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
								<!-- form filter -->
								<form action="<?php echo base_url()."client/add"?>">
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button href='client/add' class="btn btn-primary" >New Data</button>
									</div>
								  </div>
								</form>
								
								<!-- form filter end -->
							</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Position</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name Client</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>NPWP</th>
                                                <th>Edit | Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name Client</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>NPWP</th>
                                                <th width="200px">Edit | Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php
                                            foreach ($get_all->result() as $row) {
                                                echo "<tr>
                                                        <td>$row->name</td>
                                                        <td>$row->address</td>
                                                        <td>$row->phone</td>
                                                        <td>$row->npwp</td>
                                                        <td>
                                                            <a href='".base_url()."client/edit/".$row->id."'> <button type='submit' class='btn btn-primary'>Edit</button></a>
                                                            <a href='".base_url()."client/delete/".$row->id."'> <button type='submit' class='btn btn-primary'>Delete</button></a>
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