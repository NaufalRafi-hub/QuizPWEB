<?php 

$koneksi = mysqli_connect("localhost","root","","quizpweb");
 
// Check connection
if (!$koneksi){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>