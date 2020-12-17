<?php
include('connection.php');
$base64_string = $_POST['image'];
$username = $_POST['username'];
$password = $_POST["password"];
$sql = "select username, password from data_user where username ='".$username."'and password ='".$password."'";
$query = mysqli_query($koneksi, $sql);
$flag = mysqli_num_rows($query);

if($flag >= 1){

    $image_name = "C:\\Users\\Dell\\Desktop\\PWEB\\xampp\\htdocs\\quizpweb\\foto\\".$username;

    if (!file_exists($image_name)) {
         if (!mkdir($image_name)) {
            $m=array('msg' => "REJECTED, cant create folder");
             echo json_encode($m);
            return;
        }
    }

    $fi = new FilesystemIterator($image_name, FilesystemIterator::SKIP_DOTS);
    $fileCount = iterator_count($fi)+1;
    $data = explode(',', $base64_string);
    $fullName = $image_name."\\X__".$fileCount."_". date("YmdHis") .".png";
    $ifp = fopen($fullName, "wb");
    fwrite($ifp, base64_decode($data[1]));
    fclose($ifp);
    if (!$ifp){
        $m=array('msg' => "REJECTED, ".$fullName."not saved");
        echo json_encode($m);
        return;}

    $fi = new FilesystemIterator($image_name, FilesystemIterator::SKIP_DOTS);
    $fileCount = iterator_count($fi);
    $m = array('msg' => "Successful"." total(".$fileCount.")");
    echo json_encode($m);
    
    //menulis kedalam log data
    $sql = "insert into log (username) values('$username')";
    $query = mysqli_query($koneksi, $sql);
}
//jika flag == 0 maka tidak sesui dan gambar tidak masuk
else 
    echo "invalid username or password";

?>
