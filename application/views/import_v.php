<div class="container-fluid">
                        <h1 class="mt-4">Import Data Workday</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Import Data</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
								<!-- form filter -->
								
								<form>
                                <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">File Data</label>
									<div class="col-sm-10">
									  <input type="file" class="form-control" id="inputEmail3" >
									</div>
								  </div>

								  <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Payment Date</label>
									<div class="col-sm-10">
									  <input type="date" class="form-control" id="inputEmail3" >
									</div>
								  </div>
								  <div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Data</label>
									<div class="col-sm-10">
									  <select class="form-control form-control-sm">
										<option>Customer Invoice</option>
										<option>Customer Payment</option>
										<option>Supplier Invoice</option>
									  </select>
									</div>
								  </div>
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button type="submit" class="btn btn-primary">Import Data</button>
									</div>
								  </div>
								</form>
								
								<!-- form filter end -->
							</div>
                        </div>
                        <div class='row'>
                        <div class="card mb-4 col-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Customer Invoice</div>
                            <div class="card-body">
                                <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Count Order ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($count_ci->result() as $row) {
                                            echo  "<tr>
                                                        <td>$row->date</td>
                                                        <td>$row->count_order_id</td>
                                                    </tr>";
                                        };
                                    ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>


                        <div class="card mb-4 col-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Customer Payment</div>
                            <div class="card-body">
                                <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Count Order ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($count_cp->result() as $row) {
                                            echo  "<tr>
                                                        <td>$row->date</td>
                                                        <td>$row->count_order_id</td>
                                                    </tr>";
                                        };
                                    ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>


                        <div class="card mb-4 col-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Supplier Invoice</div>
                            <div class="card-body">
                                <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Count Order ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($count_si->result() as $row) {
                                            echo  "<tr>
                                                        <td>$row->date</td>
                                                        <td>$row->count_order_id</td>
                                                    </tr>";
                                        };
                                    ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>

                         </div>


                    </div>