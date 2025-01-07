<?php
session_start();

require_once('../model/sql.php');

?>




<html>

<head>
    <title>Report Post</title>
</head>

<body>
    <h1>Report Post</h1>

    <form method="POST" action="../controller/postcheck/reportcheck.php">
        <label>
            <input type="radio" name="report" value="Sexual activities"> Sexual Activities
        </label><br>
        <label>
            <input type="radio" name="report" value="Harassment"> Harassment
        </label><br>
        <label>
            <input type="radio" name="report" value="Fake info"> Fake Info
        </label><br>
        <textarea name="textreport"></textarea><br>

        <input type="hidden" name="postid" value="<?php echo $_REQUEST['post_id']; ?>">
        <button type="submit" name="submit"> submit</button>
    </form>
</body>

</html>
