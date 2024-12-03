<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Comment Submitted - {{ $comment->project?->name }}</title>
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
        <h1>New Comment Submitted</h1>
        <p>Hello Admin,</p>
        <p>A user has submitted a new comment on your platform. The comment is currently pending review.</p>
        <p>Here are the details of the comment:</p>

        <div style="margin: 21px 0;">
            <p>User Comment:</p>
            <div class="comment">
                {!! nl2br(e($comment->comment)) !!}
            </div>
            Project Name: <span class="project-name">{{ $comment->project?->name }}</span>
        </div>

        <p>
            Please review the comment and take the necessary action. You can approve, reject, or respond to the user as
            needed.
        </p>

        <div class="footer">
            <p>All the best!</p>
        </div>
    </div>
</body>

</html>
