<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Status Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4CAF50;
        }

        p {
            margin: 0 0 10px;
        }

        .status {
            font-weight: bold;
        }

        .comment {
            background-color: #f9f9f9;
            padding: 10px;
            border-left: 4px solid #4CAF50;
            border-radius: 4px;
            margin: 10px 0;
        }

        .footer {
            font-size: 0.9em;
            color: #666;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Comment Status Update</h1>
        <p>Hi there,</p>
        <p>We wanted to let you know that your comment has been <span
                class="status">{{ ucfirst($comment->status) }}</span>.</p>
        <p>Here’s what you said:</p>
        <div class="comment">
            {{ $comment->comment }}
        </div>
        <p>If you have any questions or need further assistance, feel free to reply to this email.</p>
        <p>Thank you for being a valued member of our community!</p>
        <div class="footer">
            <p>Best regards,<br>Carbonitor</p>
        </div>
    </div>
</body>

</html>
