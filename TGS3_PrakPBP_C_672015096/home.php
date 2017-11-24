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
<link rel="stylesheet" href="styles/home.css" type="text/css">
</head>
<body>
<div class="rel1"><h1>Selamat Datang, '.$uns.'</h1></div>
<div class="rel2"><a href="outdsn.php" class="out">Log Out</a></div>
<center><br/><br/><br/><br/><br/><br/>
<p><b>Silahkan tambahkan atau ubah form penilaian</b></p>
<form action="" method="POST" >'        
?>
<?php
  include "con_usr.php";
  $query = mysqli_query($koneksi, "SELECT * FROM tb_nilai ") or die (mysqli_error());
       if(mysqli_num_rows($query) == 0){
    echo '
        <b>Tidak ada data</b><br/>
        <a href="insert.php">Tambahkan</a>
    ';
    }else{
    echo '
 <table id="mhs">
 <tr>
  <th>NIM</th>
  <th>Nama</th>
  <th>Quiz 1</th>
  <th>Quiz 2</th>
  <th>Quiz 3</th>
     <th>Total Quiz</th>
     <th>TTS</th>
     <th>Total TTS</th>
     <th>TAS</th>
     <th>Total TAS</th>
     <th>Nilai Aksara</th>
     <th colspan="2">Pilihan</th>
 </tr>
 '?>
  <?php
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr style="text-align:center">
  <td><?php echo $r['no_mhs'] ?></td>
  <td><?php echo $r['nama'] ?></td>
  <td><?php echo $r['q1'] ?></td>
  <td><?php echo $r['q2'] ?></td>
  <td><?php echo $r['q2'] ?></td>
     <td><?php echo $r['qto'] ?></td>
     <td><?php echo $r['ts'] ?></td>
     <td><?php echo $r['qts'] ?></td>
     <td><?php echo $r['tas'] ?></td>
     <td><?php echo $r['qas'] ?></td>
     <td><?php echo $r['nil'] ?></td>
     <td><a href="update.php?no_mhs=<?php echo $r['no_mhs']?>" class="upt">Update</a></td>
     <td><a href="delete.php?no_mhs=<?php echo $r['no_mhs']?>" class="dl">Delete</a></td>
 </tr>
 <?php
  endwhile;
echo '
</table>
</form>
</center><br/><br/>
<a href="insert.php" class="plz">Tambahkan</a>';
  }
 ?>
<?php
    echo '
</body>
</html>';
} else{
          phpAlert('Anda belum masuk. Silahkan masuk terlebih dahulu');
      }

?>