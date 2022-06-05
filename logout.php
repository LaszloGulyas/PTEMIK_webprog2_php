<?php
include "template/header.php";
include "config.php"
?>

<?php
session_start();
session_unset();
session_destroy();
$_SESSION = array();
?>

<h2>Logged out successfully!</h2>
<a href="/webprog2/index.php">Go back to login page</a>

<?php
include "template/footer.php";
?>

