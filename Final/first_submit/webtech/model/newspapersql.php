<?php
function getNewsPosts()
{ 
    $con = getConnection();
    $id = $_SESSION['userid'];

    $sql = "SELECT id FROM userdata WHERE id_status = 'news'";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        mysqli_close($con);
        return false;
    }

    $newsid = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $newsid[] = $row['id'];
    }

    mysqli_close($con);

    if (empty($newsid)) {
        return [];
    }

    $posts = [];

    foreach ($newsid as $newsId) {
        $sql = "SELECT * FROM posts WHERE userid = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $newsId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $posts[] = $row;
        }
    }

    mysqli_close($con);

    return $posts;
}
?>