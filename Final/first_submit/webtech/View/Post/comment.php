<?php
session_start();

if (empty($_SESSION['userid'])) {

    header('Location:../Authentication/login.html');
    exit;
} else {
    require_once('../../Model/sql.php');
    $id = $_SESSION['userid'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Example</title>
</head>

<body>
    <table border="1">

        <?php
        $post_id = $_REQUEST['post_id'];
        $comments = comment($post_id);
        if ($comments) {
            foreach ($comments as $comment) {
        ?>
                <tr>
                    <td>
                        <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                    </td>
                    <td>
                    <a href="../../Controller/Post/PostCheck.php?comment_id=<?php echo $comment['comment_id']; ?>&action=delete_comment">Delete Comment</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='2'>No comments yet.</td></tr>";
        }
        ?>


        <!-- Additional row for textarea and post button -->
        <tr>
            <td colspan="2">
                <form action="../../Controller/Post/PostCheck.php" method="POST">
                    <textarea rows="4" cols="50" name="comment" placeholder="Write your comment here..."></textarea><br>
                    <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($_REQUEST['post_id']); ?>">
                    <button type="submit" name="action" value="comment">Post Comment</button>
                </form>

            </td>
        </tr>
    </table>
</body>

</html>
<?php }?>