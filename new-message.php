<?php
include "template/header.php";
include "config.php";
?>

<?php
session_start();
$showform = true;

if (isset($_POST['submit'])) {
    $showform = false;
    $username_from = $_SESSION["username"];
    $username_to = $_POST['username_to'];
    $message = $_POST['message'];
    $sql = "INSERT INTO message (username_from, username_to, message) VALUES ('$username_from','$username_to','$message')";
    $conn->query($sql);
    mysqli_close($conn);
}
?>

<?php
if ($showform) {
    ?>
    <h2>New message</h2>

    <form class="m-3" method="post" action="new-message.php">
        <label>To:</label><br>
        <input type="text" name="username_to"><br>
        <label>Message:</label><br>
        <input type="text" name="message"><br>
        <button type="submit" name="submit" class="btn btn-primary m-2">Send</button>
    </form>
    <?php
} else {
    ?>
    <h2>Message sent!</h2>
    <a href="/webprog2/inbox.php">Go back to Inbox</a>
    <?php
}
?>


<?php
include "template/footer.php";
?>
