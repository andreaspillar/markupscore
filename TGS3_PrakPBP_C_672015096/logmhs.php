<?php
include"con_usr.php";

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")
    window.location = "loginmhs.php"</script>';
}

	if(isset($_POST["usr"]) && isset($_POST["pwd"])) {
		if(is_null ($_POST["usr"]) || is_null ($_POST["pwd"])){
            echo ("<script> alert('Username or Password Must Be Written!'); </script>");
		}
        $query = mysqli_query($koneksi, "SELECT * FROM tb_mhs ") or die (mysqli_error());
            if(mysqli_num_rows($query) == 0){
            echo "<b>Tidak ada data</b>";
            }else{
            while($r = mysqli_fetch_array($query)):
			if ($_POST["usr"] == $r['no_mhs']
			&& $_POST["pwd"] ==  $r['pwd_mhs']){
				
            session_start();
            $_SESSION['use'] = $r['no_mhs'];
            header("Location: home_mhs.php");
                
            }
            
		  else{
            phpAlert("Username or Password are Incorrect!");
	}
            endwhile;
            }
            }
    
?>