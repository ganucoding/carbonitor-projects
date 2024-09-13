<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment {{ ucfirst($comment->status) }} - {{ $comment->project?->name }}</title>
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
        }

        .status-approved {
            background-color: #4CAF50;
            /* Green for approved */
        }

        .status-rejected {
            background-color: #f44336;
            /* Red for rejected */
        }

        .status {
            font-weight: bold;
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
        }

        .comment {
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #4caf98;
            border-radius: 4px;
            margin: 15px 0;
        }

        .project-name {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin: 15px 0;
        }

        .footer {
            font-size: 0.9em;
            color: #666;
            margin-top: 20px;
            text-align: center;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="{{ $comment->status == 'approved' ? 'status-approved' : 'status-rejected' }}">
            Your Comment on Project "{{ $comment->project?->name }}" Has Been {{ ucfirst($comment->status) }}
        </h1>
        <p>Hi there,</p>
        <p>We wanted to let you know that your recent comment has been
            <span class="status" style="background-color: {{ $comment->status == 'approved' ? '#4CAF50' : '#f44336' }};">
                {{ ucfirst($comment->status) }}
            </span>.
        </p>

        <div style="margin: 21px 0px;">
            <p>Here’s what you said:</p>
            <div class="comment">
                {{ $comment->comment }}
            </div>
            <p class="project-name">Project Name: {{ $comment->project?->name }}</p>
        </div>

        <p>If you have any questions or need further assistance, feel free to reply to this email.</p>
        <p>Thank you for being a valued member of our community!</p>
        <div class="footer">
            <p>Best regards,<br>Carbonitor Team</p>
        </div>
    </div>
</body>

</html>
