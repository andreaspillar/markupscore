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
    <div class="rel1"><h1>Form Update Data</h1></div>
<div class="rel2"><a href="home.php" class="out">Back</a></div>
    <br/><br/><br/><br/><br/><br/><br/>
<center>
    <form action="" method="POST" >
    ';
  include"con_usr.php";
  $no_mhs      =$_GET['no_mhs'];
   $query = mysqli_query($koneksi, "SELECT * FROM tb_nilai  WHERE no_mhs = '$no_mhs'") or die (mysqli_error());
       if(mysqli_num_rows($query) == 0){
    echo "<b>Tidak ada data</b>";
    }else{
      while($r = mysqli_fetch_array($query)): 
    echo'
    <table>
    <tr>
      <td id="ft">NIM</td>
      <td><input type="text" name="no_mhs" value="'; echo $r['no_mhs'].'"  placeholder="NIM Mahasiswa" readonly/></td>
    </tr>
    <tr>
    <td id="ft">Nama Mahasiswa &nbsp&nbsp&nbsp&nbsp</td>
      <td><input type="text" value="'; echo $r['nama'].'" name="nama_mhs" placeholder="Nama Mahasiswa" readonly></td>
    </tr>   
    <tr>
    <td id="ft"><label for="q1">Nilai Quiz 1 </label></td>
       <td><input type="text" value="'; echo $r['q1'].'" name="q1" id="q1" placeholder="Nilai Quiz 1"></td>
    </tr>
    <tr>
    <td id="ft"><label for="q2">Nilai Quiz 2 </label></td>
       <td><input type="text" value="'; echo $r['q2'].'" name="q2" id="q2" placeholder="Nilai Quiz 2"></td>
    </tr>
    <tr>
    <td id="ft"><label for="q3">Nilai Quiz 3 </label></td>
       <td><input type="text" value="'; echo $r['q3'].'" name="q3" id="q3" placeholder="Nilai Quiz 3"></td>
    </tr>
    <tr>
    <td id="ft"><label for="ts">Nilai TTS </label></td>
       <td><input type="text" value="'; echo $r['ts'].'" name="ts" id="ts" placeholder="Nilai TTS"></td>
    </tr>
    <tr>
    <td id="ft"><label for="tas">Nilai TAS </label></td>
       <td> <input type="text" value="'; echo $r['tas'].'" name="tas" id="tas" placeholder="Nilai TAS"></td>
    </tr>
    <tr><td></td>
      <td id="bt"><input type="submit" name="update" value="Update">
      <button type="reset" value="Reset">Reset</button>
       </td>
    </tr>
    ';
  endwhile;
    echo'</table>
    </form>
    </center>
</body>
</html>';
  }
 
    function phpAlertu($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")
    </script>';
}
    
    if(isset($_POST['update'])){
    if($_POST['q1'] > 100 || $_POST['q2']  > 100 || $_POST['q3'] > 100 || $_POST['ts'] > 100 || $_POST['tas'] > 100){
    phpAlertu('Cek Inputan Nilai: Ada Nilai lebih dari 100');    
    }
    else{
    if ($_POST['q1'] < 0 || $_POST['q2']  < 0 || $_POST['q3'] < 0 || $_POST['ts'] < 0 || $_POST['tas'] < 0){
    phpAlertu('Cek Inputan Nilai: Ada Nilai kurang dari 0');
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
    $querynilai = mysqli_query($koneksi,"UPDATE tb_nilai SET q1='$q1', q2='$q2', q3='$q3', ts='$ts', tas='$tas', qto='$qto', qts='$qts', qas='$qas', nil='$ket' WHERE no_mhs='$no_mhs'") or die(mysqli_error());
  if($querynilai) {
    header('location:home.php');
   } else{
    echo "Error";
   }
    }
    }
    }
    echo'
    ';
}else{
          phpAlert('Silahkan login dahulu!');
      }
 ?>
