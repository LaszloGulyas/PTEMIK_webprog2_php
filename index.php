<?php
include "template/header.php";
include "config.php"
?>

<h2>Welcome</h2>

<form class="m-3" method="post" action="/webprog2/inbox.php">
    <label>Username</label><br>
    <input type="text" name="username"><br>
    <label>Password</label><br>
    <input type="password" name="password"><br>
    <button class="btn btn-primary m-2" type="submit" name="login" value="login">Login</button>
    <button class="btn btn-primary m-2" type="submit" name="register" value="register">Register</button>
</form>


<?php
include "template/footer.php";
?>
