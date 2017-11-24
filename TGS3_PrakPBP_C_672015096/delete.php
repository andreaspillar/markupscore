<?php
  include"con_usr.php";
  $no_mhs    =$_GET['no_mhs'];
  $querydel = mysqli_query($koneksi,"DELETE FROM tb_nilai WHERE no_mhs='$no_mhs'") or die(mysqli_error());
  $delmhs = mysqli_query($koneksi,"DELETE FROM tb_mhs WHERE no_mhs='$no_mhs'") or die(mysqli_error());
  if($querydel) {
    header('location:home.php');
   } else{
    echo "Error";
   }
 ?>