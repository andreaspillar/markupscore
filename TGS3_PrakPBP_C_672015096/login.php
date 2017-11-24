<?php
session_start();
if(isset($_SESSION['login']))
{
    header("Location: home.php");
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
        <a href="loginmhs.php" class="lu"><img src="styles/users-icon.png" width="26px" height="26px" >&nbsp;&nbsp;&nbsp;Login Mahasiswa</a><a href="login.php" class="lm"><img src="styles/user-icon-placeholder.png" width="24px" height="24px" >&nbsp;&nbsp;&nbsp;Login Dosen</a>
    <div class="rel2">
    <form action="logchk.php" method="POST">
        <table><tr>
            <td><input type="text" name="usr" placeholder="NIP"/></td>
        </tr>
        <br/><tr>
            <td><input type="password" name="pwd" placeholder="Password"/></td>
        </tr>
    </table>
        <br/>
        <br/>
        <center><input type="submit" value="Log In"/></center>
    </form>
    </div>
    </center>
    </html>
<?php
}
?>