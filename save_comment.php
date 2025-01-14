<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['comment-name']);
    $comment = htmlspecialchars($_POST['comment-text']);
    $date = date('Y-m-d H:i:s');

    // Save the comment to a file or database
    // For simplicity, we'll save it to a file
    $commentData = "Name: $name\nComment: $comment\nDate: $date\n\n";
    file_put_contents('comments.txt', $commentData, FILE_APPEND | LOCK_EX);

    // Redirect back to the blog page
    header('Location: blog.html');
    exit();
} else {
    // Method not allowed
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
