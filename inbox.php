<?php
include "template/header.php";
include "config.php"
?>

<?php
session_start();
if (isset($_POST["username"]) && isset($_POST["password"]) && array_key_exists("login", $_POST)) {
    $sql = "SELECT id, username, password FROM user WHERE username = '" . $_POST["username"] . "'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    $_SESSION["loggedin"] = false;
    if ($count > 0) {
        if ($_POST["password"] === $row["password"]) {
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $_POST["username"];
        }
    }

}

if (isset($_POST["username"]) && isset($_POST["password"]) && array_key_exists("register", $_POST)) {
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = $_POST["username"];

    $username = $_SESSION["username"];
    $password = $_POST["password"];
    $sql = "INSERT INTO user (username, password) VALUES ('$username','$password')";
    $conn->query($sql);
}

if ($_SESSION["loggedin"]) {
    $username= $_SESSION["username"];

    $sql = "SELECT id, username_from, message FROM message WHERE username_to LIKE '$username'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <h2>Inbox</h2>
    <a href="new-message.php">Send Message</a>
    <a href="/webprog2/logout.php">Logout</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">From</th>
            <th scope="col">Message</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($result as $row): array_map('htmlentities', $row); ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username_from']; ?></td>
                <td><?php echo $row['message']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php
} else {
?>
<h2>Login failed!</h2>
<a href="/webprog2/index.php">Go back to login page</a>
<?php
}
include "template/footer.php";
?>
