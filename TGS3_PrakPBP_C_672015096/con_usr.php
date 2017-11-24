<?php
 $host = "localhost";
 $user = "root";
 $pass = "";
 $db   = "db_usr";
 $koneksi = mysqli_connect($host, $user, $pass, $db);
 if(mysqli_connect_errno()){
  echo "Gagal Terhubung ".mysqli_connect_error();
 }
 else
 {
     
 }
 ?>