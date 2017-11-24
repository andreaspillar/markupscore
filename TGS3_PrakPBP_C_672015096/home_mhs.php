<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")
    window.location = "loginmhs.php"</script>';
}

    session_start();
      if(isset($_SESSION['use']))
       {
        $uns = $_SESSION['use'];
        echo'<html>
<head>
<link rel="stylesheet" href="styles/home.css" type="text/css">
</head>
<body>
<div class="rel1"><h1>Selamat Datang, '.$uns.'</h1></div>
<div class="rel2"><a href="outmhs.php" class="out">Log Out</a></div>
<center><br/><br/><br/><br/><br/><br/>';
include "con_usr.php";
  $query = mysqli_query($koneksi, "SELECT * FROM tb_nilai where no_mhs = '$uns'") or die (mysqli_error());
       if(mysqli_num_rows($query) == 0){
    echo '
        <b>Tidak ada data</b><br/>
    ';
    }else{
           $r = mysqli_fetch_array($query);
           echo'<p><b>'.$r['nama'].'</b></p>';
       }
echo'

<form action="" method="POST" >'        
?>

<?php
  include "con_usr.php";
  $query = mysqli_query($koneksi, "SELECT * FROM tb_nilai where no_mhs = '$uns'") or die (mysqli_error());
       if(mysqli_num_rows($query) == 0){
    echo '
        <b>Tidak ada data</b><br/>
    ';
    }else{
    echo '
    <table id="mhs" >
 <tr>
  <th>Quiz 1</th>
  <th>Quiz 2</th>
  <th>Quiz 3</th>
     <th>Total Quiz</th>
     <th>TTS</th>
     <th>Total TTS</th>
     <th>TAS</th>
     <th>Total TAS</th>
     <th>Nilai Aksara</th>
 </tr>
    
    '?>
  <?php
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr style="text-align:center">
  <td><?php echo $r['q1'] ?></td>
  <td><?php echo $r['q2'] ?></td>
  <td><?php echo $r['q2'] ?></td>
     <td><?php echo $r['qto'] ?></td>
     <td><?php echo $r['ts'] ?></td>
     <td><?php echo $r['qts'] ?></td>
     <td><?php echo $r['tas'] ?></td>
     <td><?php echo $r['qas'] ?></td>
     <td><?php echo $r['nil'] ?></td>
 </tr>
 <?php
  endwhile;
  }
 ?>
<?php
    echo '
</table>
</form>
</center>
</body>
</html>';
}else {
          phpAlert('Anda belum masuk. Silahkan masuk terlebih dahulu');
      }
?>