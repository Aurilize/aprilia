<?php
include("koneksi.php");
$email=$_POST["email"];
$password=$_POST["password"];
$hasil=mysql_query("select count(email) as jml from students where email='".$email."'
and password = '".$password."'");
$baris=mysql_fetch_array($hasil);
if(($baris["jml"]==1)){
	session_start();
	$_SESSION["email"]=$email;
	echo "<meta http-equiv=refresh content=0;url=t-st.php>";

}
else{
	if (empty($email) && empty($password)) {
    //kalau email dan passwordword kosong
    header('location:index.php?error=1');
    break;
		} else if (empty($email)) {
    //kalau email saja yang kosong
    header('location:index.php?error=2');
    break;
		} else if (empty($password)) {
    //kalau password saja yang kosong
    //redirect ke halaman index
    header('location:index.php?error=3');
    break;
		}
		else {
			header('location:index.php?error=4'); 
		}

}
?>