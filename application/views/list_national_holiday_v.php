<div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo $title_page?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
								<!-- form filter -->
                                <?= $this->session->flashdata('message'); ?>
								<form action="<?php echo base_url()."list_national_holiday/add"?>">
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button href='list_national_holiday/add' class="btn btn-primary" >New Data</button>
									</div>
								  </div>
								</form>
								
								<!-- form filter end -->
							</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data List National holiday</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name Holiday</th>
                                                <th>Date</th>
                                                <th>Edit | Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name Holiday</th>
                                                <th>Date</th>
                                                <th width="200px">Edit | Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php
                                            foreach ($get_all->result() as $row) {
                                                echo "<tr>
                                                        <td>$row->name_holiday</td>
                                                        <td>$row->date</td>
                                                        <td>
                                                            <a href='".base_url()."list_national_holiday/edit/".$row->id."'> <button type='submit' class='btn btn-primary btn-sm'>Edit</button></a>
                                                            <a href='".base_url()."list_national_holiday/delete/".$row->id."'> <button type='submit' class='btn btn-danger btn-sm'>Delete</button></a>
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