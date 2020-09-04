<div class="container-fluid">
<br>
                        <!-- <h1 class="mt-4">Log Push Workday</h1> -->
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo $title_page?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
								<!-- form filter -->
								
								<form method="GET" action="">
                                <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Order ID</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="inputEmail3" name="order_id" value="<?php if($this->input->get('order_id')==true){ echo $this->input->get('order_id');}?>" >
									</div>
								  </div>

								  <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Process Date</label>
									<div class="col-sm-10">
									  <input type="date" class="form-control" id="inputEmail3" name="process_date">
									</div>
								  </div>
								  <div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Type Data</label>
									<div class="col-sm-10">
									  <select class="form-control form-control-sm" name="type_data">
                                        <option value="all">All Type Data</option>
										<option value="Customer Invoice">Customer Invoice</option>
										<option value="Customer Payment">Customer Payment</option>
										<option value="Supplier Invoice">Supplier Invoice</option>
									  </select>
									</div>
								  </div>
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button type="submit" class="btn btn-primary">View Data</button>
									</div>
								  </div>
								</form>
								
								<!-- form filter end -->
							</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><input type='checkbox'> Select all </th>
                                                <th>Type Data</th>
                                                <th>Process Data</th>
                                                <!-- <th>Severity</th> -->
                                                <th>Order ID</th>
                                                <th>Message</th>
                                                <th>Message Detail</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Select all</th>
                                                <th>Type Data</th>
                                                <th>Process Data</th>
                                                <!-- <th>Severity</th> -->
                                                <th>Order ID</th>
                                                <th>Message</th>
                                                <th>Message Detail</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>

                                        <tbody>

                                        <?php 
                                            foreach ($get_error->result() as $row) {
                                                echo "<tr>
                                                        <td><input type='checkbox'></td>
                                                        <td>$row->type_data</td>
                                                        <td>$row->process_date</td>
                                                        <td>$row->order_id</td>
                                                        <td>$row->message</td>
                                                        <td>$row->message_details</td>
                                                        <td>$row->status</td>

                                                     </tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>