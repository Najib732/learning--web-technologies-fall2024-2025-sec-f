<?php
session_start();
require_once('../model/userModel.php');
if (isset($_COOKIE['flag'])) {


?>

    <html lang="en">

    <head>
        <title>User List</title>
    </head>

    <body>
        <h2>User List</h2>
        <table border=1>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            $allUsers = getAllUser();

            foreach ($allUsers as $user) {
            ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <a href='edit.php?id=<?=$user['id']; ?>'> EDIT </a> |
                        <a href="../controller/deleteCheck.php?id=<?= $user['id']; ?>">DELETE</a>
                    </td>
                </tr>

            <?php } ?>
        </table>

        <br><br>
        <a href="home.php">Back</a>
        <a href="../controller/logout.php">Logout</a>
    </body>

    </html>


<?php
} else {
    header('location: login.html');
}
?>