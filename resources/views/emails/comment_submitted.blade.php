<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Submitted - {{ $comment->project?->name }}</title>
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
            margin-bottom: 20px;
            font-size: 24px;
            color: #fff;
            padding: 15px;
            border-radius: 4px;
            text-align: center;
            background-color: #F9C74F;
            /* Darker yellow */
        }

        .comment {
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #4caf98;
            border-radius: 4px;
            margin: 15px 0;
        }

        .project-name {
            font-weight: bold;
            color: #333;
            margin: 15px 0;
        }

        .footer {
            font-size: 0.9em;
            color: #666;
            margin-top: 20px;
            text-align: left;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Your Comment Has Been Submitted</h1>
        <p>Hello,</p>
        <p>Thank you for your comment! It has been submitted and is currently pending review.</p>
        <p>We will notify you via email once the status of your comment is updated.</p>

        <div style="margin: 21px 0;">
            <p>Here’s what you said:</p>
            <div class="comment">
                {!! nl2br(e($comment->comment)) !!}
            </div>
            Project Name: <span class="project-name">{{ $comment->project?->name }}</span>
        </div>

        <p>If you have any questions, feel free to reply to this email.</p>
        <p>Thank you for your contribution!</p>
        <div class="footer">
            <p>Best regards,<br><b>The Carbonitor Team</b></p>
        </div>
    </div>
</body>

</html>
