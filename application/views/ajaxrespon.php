<?php
$server = "localhost";
$username = "root";
$password = "";
$database= "ta_leny";
$konek = mysqli_connect($server,$username,$password,$database);
/* check connection */
if (mysqli_connect_errno()) {
 printf("Connect failed: %s\n", mysqli_connect_error());
 exit();
}

$id = $_POST['id']; // Menerima NPM dari JQuery Ajax dari form
$s = mysqli_query($konek, "select * from list_cuti where id='$id'"); // Ambil nama mahasiswa berdasarkan npm yang dikirim dari jquery ajax
while ($data = mysqli_fetch_array($s)) { 
 echo $data[1]; // Print nama hasil perolehan dari query database
}
?>