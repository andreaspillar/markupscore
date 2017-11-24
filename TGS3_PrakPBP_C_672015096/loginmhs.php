<?php
session_start();
if(isset($_SESSION['use']))
{
    header("Location: home_mhs.php");
}
else{
?>
    <html>
    <head>
        <link rel="stylesheet" href="styles/login.css" type="text/css">
    </head>
    <center>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
        <a href="loginmhs.php" class="lm"><img src="styles/users-icon.png" width="26px" height="26px" >&nbsp;&nbsp;&nbsp;Login Mahasiswa</a><a href="login.php" class="lu"><img src="styles/user-icon-placeholder.png" width="24px" height="24px" >&nbsp;&nbsp;&nbsp;Login Dosen</a>
    <div class="rel2">
    <form action="logmhs.php" method="POST">
        <table><tr>
            <td><input type="text" name="usr" placeholder="NIM"/></td>
        </tr>
        <br/><tr>
            <td><input type="password" name="pwd" placeholder="Password"/></td>
        </tr>
    </table>
        <br/>
        <br/>
        <center><input type="submit" value="Log In"/></center>
    </form>
        untuk password gunakan nim anda
        </div>
    </center>
    </html>
<?php
}
?>