<?php



?>


<html>

<head>
    <style>
        body {
            background-color: aqua;
        }

        #table {
            position: absolute;
            top: 35%;
            left: 25%;

        }

        body {
            background-color: aqua;
        }
    </style>



</head>

<body>

    <form action="">

        <table id="table" border="2">


            <tr>
                <td>
                    name
                </td>
                <td>
                    contact no
                </td>
                <td>
                    username
                </td>
                <td>
                    password
                </td>
                <td>
                    Update
                </td>
                <td>
                    delete
                </td>
            </tr>

            <?php
            require_once('../../Model/Admin/alluser.php');
            $datas = AllUser();

            foreach ($datas as $data) {
            ?>

                <tr>
                    <td>
                        <input id="name" type="text" value=<?php echo $data['user_name'] ?>>
                    </td>

                    <td>
                        <input id="contact" type="text" value=<?php echo $data['user_contact'] ?>>
                    </td>

                    <td>
                        <input id="username" type="text" value=<?php echo $data['user_username'] ?>>
                    </td>

                    <td>

                        <input id="password" type="text" value=<?php echo $data['user_password'] ?>>

                        <input type="hidden" id="user_id" value="<?php echo $data['id']; ?>">
                    </td>
                    <td>

                        <input id="update" type="button" name="update" value="Update Name" onclick="UpdateData()">
                    </td>
                    <td>
                        <input id="delete" type="button" name="update" value="delete" onclick="DeleteData()">
                    </td>

                </tr>
            <?php } ?>
        </table>
    </form>

</body>
<script>
    function UpdateData() {

        let name = document.getElementById('name').value;
        let contact = document.getElementById('contact').value;
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;
        let id = document.getElementById('user_id').value;

     
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../controller/admin/edit.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('name=' + name + '&contact=' + contact + '&username=' + username + '&password=' + password + '&id=' + id);

    

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alart(this.responseText);
                location.reload();

            }
        };
    }


    function DeleteData() {
        let id = document.getElementById('user_id').value;

        let xhttp = new XMLHttpRequest();

        xhttp.open('POST', '../../controller/admin/delete.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');


        xhttp.send('id=' + id);

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();

            }
        };
    }
</script>







</html>