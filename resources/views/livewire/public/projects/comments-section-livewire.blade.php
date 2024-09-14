<div>

    <body>
        <div class="outer-card">
            <div class="comments-container">
                <!-- Display comments -->
                <div>
                    <h2 class="section-title">Latest Comments</h2>
                    @foreach ($comments as $comment)
                        <div class="comment-card">
                            <p class="comment-header">{{ $comment->username }} ({{ $comment->email }})</p>
                            <p class="comment-text">{!! nl2br(e($comment->comment)) !!}</p>
                            <p class="comment-date">Posted on {{ $comment->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    @endforeach
                </div>

                <br><br>

                <!-- Add comment form -->
                <div class="comment-form-card">
                    <h2 class="section-title">Add a Comment</h2>

                    <form wire:submit.prevent="addComment">
                        <div class="form-group">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" id="username" wire:model="username" class="form-input">
                            @error('username')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" wire:model="email" class="form-input">
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="comment" class="form-label">Comment:</label>
                            <textarea id="comment" wire:model="comment" class="form-textarea"></textarea>
                            @error('comment')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" wire:loading.remove class="submit-button">Add Comment</button>

                        <div wire:loading class="p-2 bg-yellow-100 border border-yellow-300 text-yellow-800 rounded-lg">
                            Your request is being processed. Please wait a moment...
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <style>
        .outer-card {
            background-color: #d9f1e96f;
            /* Light green background */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        .comments-container {
            font-family: Arial, sans-serif;
        }

        .section-title {
            font-size: 21px;
            margin-bottom: 15px;
            color: #333;
        }

        .comment-form-card {
            margin-bottom: 30px;
            background-color: #ffffff;
            /* White background for cards */
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            /* Reduced font size */
        }

        .comment-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            margin: 5px 0;
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

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-size: 14px;
            /* Reduced font size for labels */
        }

        .form-input,
        .form-textarea {
            width: 100%;
            padding: 8px;
            /* Adjusted padding for smaller font size */
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            /* Match font size to reduced form font size */
        }

        .form-textarea {
            min-height: 100px;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }

        .submit-button {
            background-color: #02B075;
            color: #fff;
            border: none;
            padding: 8px 12px;
            /* Adjusted padding for smaller font size */
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            /* Reduced font size for button */
        }

        .submit-button:hover {
            background-color: #028d59;
        }
    </style>

</div>
