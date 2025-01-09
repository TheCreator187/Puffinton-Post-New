<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['comment-name']);
    $comment = htmlspecialchars($_POST['comment-text']);
    $date = date("Y-m-d H:i:s");

    $commentData = "Name: $name\nDate: $date\nComment: $comment\n\n";
    $filePath = "comments/" . time() . ".txt";

    if (!file_exists('comments')) {
        mkdir('comments', 0777, true);
    }

    file_put_contents($filePath, $commentData);
    header("Location: blog.html");
    exit();
}
?>
