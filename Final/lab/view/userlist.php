<?php
    session_start();
    require_once('../model/userModel.php');
    if(isset($_COOKIE['flag'])){

    // $users = [
    //     ['id'=>1, 'username'=>'alamin', 'email'=>'alamin@aiub.edu', 'password'=>123],
    //     ['id'=>2, 'username'=>'xyz', 'email'=>'alamin@aiub.edu', 'password'=>123],
    //     ['id'=>3, 'username'=>'abc', 'email'=>'alamin@aiub.edu', 'password'=>123],
    //     ['id'=>4, 'username'=>'pqr', 'email'=>'alamin@aiub.edu', 'password'=>123]
    // ];
?>

<html lang="en">
<head>
    <title>User List</title>
</head>
<body>
    <h2>User List</h2>
    <?php
    $result = getAllUser();
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- Add more columns if needed -->
                </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } 
    else {
        echo "No users found.";
    }
    ?>
    <br><br>
    <a href="home.php">Back</a> |
    <a href="logout.php">Logout</a>
</body>
</html>


<?php
    }else{
        header('location: login.html'); 
    }
?>

