<?php
    if(empty($_SESSION['username'])){
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please login timesheet</div>');
        redirect ('login');
        // ('login');
    }
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Absensi</title>
        <link href="<?php echo base_url()."assets/"?>css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div id="row">
                        <div class="form-group mt-4 mb-8">
                            <a href="<?php echo base_url().'absensi'?>"><button class="btn btn-primary">Absensi</button></a>
                            <a href="<?php echo base_url().'spl'?>"><button class="btn btn-primary">Over Time</button></a>
                            <a href="<?php echo base_url().'cuti'?>"><button class="btn btn-primary">Cuti</button></a>
                            <a href="<?php echo base_url().'login/logout'?>"><button class="btn btn-danger">Logout</button></a>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <?= $this->session->flashdata('message'); ?>
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Absensi</h3></div>
                                    
                                    <div class="alert alert-warning" role="alert">
                                        <div class="row mx-auto" style="width: 600px;">
                                            <h5><b>Date : </b><?= date("d-M-Y")?></h5>
                                            <h5> &nbsp; | &nbsp; </h5>
                                            <h5><b>Time : </b>&nbsp;</h5><h5 id="jam"></h5> <h5> : </h5> <h5 id="menit"></h5> <h5> : </h5> <h5 id="detik"></h5>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">
                                        <form action="<?=base_url()."absensi/save"?>" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input type="hidden" name="nik" value="<?php echo $_SESSION['username']?>">
                                            
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">Name</label>
                                                    <input class="form-control py-4" value="<?php echo $_SESSION['name']?>" id="inputFirstName" type="text" placeholder="Enter first name" readonly />
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Status</label>
                                                        <select name="status" class="form-control py">
                                                            <option value="IN">IN</option>
                                                            <option value="OUT">OUT</option>
                                                        </select>
                                                    <!-- <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" /> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Activity</label>
                                                <input name="activity" class="form-control py-4" id="inputEmailAddress" type="text" placeholder="Activity" />
                                            </div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Remarks</label>
                                                <input name="remarks" class="form-control py-4" id="inputEmailAddress" type="text" placeholder="Remarks" />
                                            </div>
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Save</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a>History Absensi</a></div>
                                        <div class="small">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Activity</th>
                                                <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($get_data as $row) {
                                                    echo "<tr>
                                                            <td>$row->time</td>
                                                            <td>$row->status</td>
                                                            <td>$row->activity</td>
                                                            <td>$row->remarks</td>
                                                         </tr>" ;       
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url()."assets/"?>js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()."assets/"?>js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()."assets/"?>js/scripts.js"></script>
    </body>
</html>
<script>
	window.setTimeout("waktu()", 1000);
 
	function waktu() {
		var waktu = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("jam").innerHTML = waktu.getHours();
		document.getElementById("menit").innerHTML = waktu.getMinutes();
		document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
    

</script>