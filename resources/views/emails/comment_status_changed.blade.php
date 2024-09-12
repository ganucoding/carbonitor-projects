<!DOCTYPE html>
<html>

<head>
    <title>Comment Status Changed</title>
</head>

<body>
    <p>Hello,</p>

    <p>The status of your comment has been changed to: <strong>{{ ucfirst($status) }}</strong>.</p>

    <p>Comment: {{ $comment->comment }}</p>

    <p>Thank you!</p>
</body>

</html>
