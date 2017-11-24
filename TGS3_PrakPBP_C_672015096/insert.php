<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")
    window.location = "login.php"</script>';
}

    session_start();
      if(isset($_SESSION['login']))
       {
        $uns = $_SESSION['login'];
        echo'
<html>
<head>
<link rel="stylesheet" href="styles/form.css" type="text/css">
</head>
<body>
<div class="rel1"><h1>Form Tambah Data</h1></div>
<div class="rel2"><a href="home.php" class="out">Back</a></div>
    <br/><br/><br/><br/><br/><br/><br/>
<center>
    <form action="" method="POST" >
    <table>
    <tr>
      <td colspan="2"><input type="text" name="no_mhs"  placeholder="NIM Mahasiswa" required onkeypress="return event.charCode >= 48 && event.charCode <= 57"/></td>
    </tr>
    <tr>
      <td colspan="2"> <input type="text" name="nama_mhs" placeholder="Nama Mahasiswa" required></td>
    </tr>   
    <tr>
       <td colspan="2"><input type="text" name="q1" placeholder="Nilai Quiz 1" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td>
    </tr>
    <tr>
       <td colspan="2"><input type="text" name="q2" placeholder="Nilai Quiz 2" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td>
    </tr>
    <tr>
       <td colspan="2"><input type="text" name="q3" placeholder="Nilai Quiz 3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td>
    </tr>
    <tr>
       <td colspan="2"><input type="text" name="ts" placeholder="Nilai TTS" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td>
    </tr>
    <tr>
       <td colspan="2"><input type="text" name="tas" placeholder="Nilai TAS" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td>
    </tr>
    <tr>
      <td></td>
      <td id="bt"><input type="submit" name="tambah" value="Tambah">
      <button type="reset" value="Reset">Reset</button>
       </td>
    </tr>
    </table>
    </form>
    </center>';
if(isset($_POST['tambah'])){
  include"con_usr.php";
  $nim   =$_POST['no_mhs'];
  $nama = $_POST['nama_mhs'];
}
    function phpAlerti($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")
    window.location = "insert.php"</script>';
    }
    if(isset($_POST['tambah'])){
    if($_POST['q1'] > 100 || $_POST['q2']  > 100 || $_POST['q3'] > 100 || $_POST['ts'] > 100 || $_POST['tas'] > 100){
    phpAlerti('Cek Inputan Nilai: Ada Nilai lebih dari 100');    
    }
    else{
    if ($_POST['q1'] < 0 || $_POST['q2']  < 0 || $_POST['q3'] < 0 || $_POST['ts'] < 0 || $_POST['tas'] < 0){
    phpAlerti('Cek Inputan Nilai: Ada Nilai kurang dari 0');
    }
    else{
    $q1  = $_POST['q1'];
    $q2  = $_POST['q2'];
    $q3  = $_POST['q3'];
    $qto = ($q1+$q2+$q3)/15;
    $ts  = $_POST['ts'];
    $qts = $ts/2.5;
    $tas  = $_POST['tas'];
    $qas = $tas/2.5;
    $to = $qto+$qts+$qas;
    if($to >= 90)
    {$ket="A";}
    else if($to > 85){
    $ket = "AB";}
    else if($to > 75){
    $ket = "B";
    }
    else if($to >= 65 ){
    $ket = "BC";
    }
    else if($to >= 55){
        $ket="C";
    }
    else if($to >= 45){
        $ket="CD";
    }
    else if($to >= 35){
        $ket="D";
    }
    else {
        $ket="E";
    }
  $querytambah = mysqli_query($koneksi,"INSERT INTO tb_mhs (no_mhs, pwd_mhs) VALUES ('$nim', '$nim')") or die(mysqli_error());
 $querynilai = mysqli_query($koneksi,"INSERT INTO tb_nilai (no_mhs, nama, q1, q2, q3, ts, tas, qto, qts, qas, nil) VALUES ('$nim', '$nama', '$q1', '$q2', '$q3', '$ts', '$tas', '$qto', '$qts', '$qas', '$ket')") or die(mysqli_error());
  if($querytambah&&$querynilai) {
    header('location:home.php');
   } else{
    echo "Error";
   }
}
}
}
echo '
</body>
</html>';
}else{
          phpAlert('Silahkan login dahulu!');
      }
 ?>
