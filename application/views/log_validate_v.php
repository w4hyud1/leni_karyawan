<div class="container-fluid">
                        <!-- <h1 class="mt-4">Customer Invoce</h1> -->
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo $title_page?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
								<form action="<?php echo base_url()?>log_wd/transfer" method="POST">
                                    <input type="submit" name="transfer" value="Transfer" class="btn btn-primary"> 
                                </form>
							</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Validate</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Type Data</th>
                                                <th>Process Data</th>
                                                <th>Severity</th>
                                                <th>Order ID</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                            foreach ($get_validate->result() as $row) {
                                                echo "<tr>
                                                        <td>$row->type_data</td>
                                                        <td>$row->process_date</td>
                                                        <td>$row->severity</td>
                                                        <td>$row->order_id</td>
                                                        <td>$row->message</td>
                                                     </tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>