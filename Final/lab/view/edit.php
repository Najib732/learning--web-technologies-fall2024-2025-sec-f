<?php
session_start();
if (isset($_COOKIE['flag'])) {

    if (isset($_REQUEST['id'])) {
        echo $_REQUEST['id'];
        $id = $_REQUEST['id'];
    }

?>

    <html>

    <head>
        <title>Signup</title>
    </head>

    <body>
        <h2> Edit User </h2>
        <form method="post" action="../controller/editCheck.php?id=<?= $id; ?>" enctype="">
            name:<input type="text" name="name" value="" /> <br><br>
            Password: <input type="password" name="password" value="" /> <br><br>
            Email: <input type="email" name="email" value="" /> <br>
            <input type="submit" name="submit" value="Update" />
        </form>
    </body>

    </html>

<?php
} else {
    header('location: login.html');
}
?>