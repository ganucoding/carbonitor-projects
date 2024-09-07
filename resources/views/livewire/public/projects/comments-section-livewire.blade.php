<div>

    <body>
        <div class="comments-container">
            <!-- Display comments -->
            <div class="comments-list">
                <h2 class="section-title">Latest Comments</h2>
                @foreach ($comments as $comment)
                    <div class="comment-card">
                        <p class="comment-header">{{ $comment->username }} ({{ $comment->email }})</p>
                        <p class="comment-text">{!! nl2br(e($comment->comment)) !!}</p>
                        <p class="comment-date">Posted on {{ $comment->created_at->format('d M Y, H:i') }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Add comment form -->
            <div class="comment-form">
                <h2 class="section-title">Add a Comment</h2>

                <div class="form-group">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" id="username" wire:model.defer="username" class="form-input">
                    @error('username')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" wire:model.defer="email" class="form-input">
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="comment" class="form-label">Comment:</label>
                    <textarea id="comment" wire:model.defer="comment" class="form-textarea"></textarea>
                    @error('comment')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button wire:click="addComment" class="submit-button">Add Comment</button>
            </div>
        </div>
    </body>

    <style>
        .comments-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .section-title {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }

        .comments-list {
            margin-bottom: 30px;
        }

        .comment-card {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .comment-header {
            margin: 0 0 5px;
            font-weight: bold;
            color: #555;
        }

        .comment-text {
            margin: 0 0 10px;
            color: #666;
        }

        .comment-date {
            margin: 0;
            font-size: 12px;
            color: #999;
        }

        .comment-form {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-input,
        .form-textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-textarea {
            min-height: 100px;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }

        .submit-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</div>
