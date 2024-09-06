<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project List with Filters and Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #0b7e98;
        }

        .navbar-brand {
            color: #ffffff;
        }

        .navbar-brand:hover {
            color: #e9ecef;
        }

        .container {
            margin-top: 30px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table thead th {
            background-color: #0b7e98;
            color: #ffffff;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .icon-container {
            text-align: center;
        }

        .icon-container button {
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .modal-dialog {
            max-width: 600px;
        }

        .comment-section {
            margin-top: 10px;
        }

        .comment-item {
            margin-bottom: 10px;
        }

        .form-select,
        .form-control {
            border-radius: 0.375rem;
        }

        input[name="search"] {
            flex: 1;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            flex-shrink: 0;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #117a8b;
            border-color: #10707f;
        }

        .card {
            border: none;
            border-radius: 0.375rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #0b7e98;
            color: #ffffff;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="navbar-brand fw-bold">Carbonitor</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">All Projects</h1>

        <!-- Filter and Search Bar Section -->
        <form method="GET" action="{{-- {{ route('projects.index') }} --}}">
            <div class="d-flex flex-wrap gap-2 mb-3 align-items-center">
                <!-- Filter Options -->
                <div class="d-flex gap-2 me-3 flex-grow-1">
                    <select name="status" class="form-select" aria-label="Project Status">
                        <option value="" {{ request('status') === '' ? 'selected' : '' }}>Project Status</option>
                        @foreach (\App\Models\ProjectStatus::all() as $projectStatus)
                            <option value="{{ $projectStatus->id }}"
                                {{ request('type') == $projectStatus->id ? 'selected' : '' }}>
                                {{ $projectStatus->name }}
                            </option>
                        @endforeach
                    </select>
                    <select name="type" class="form-select" aria-label="Project Type">
                        <option value="" {{ request('type') === '' ? 'selected' : '' }}>Project Type</option>
                        @foreach (\App\Models\ProjectType::all() as $projectType)
                            <option value="{{ $projectType->id }}"
                                {{ request('type') == $projectType->id ? 'selected' : '' }}>
                                {{ $projectType->name }}
                            </option>
                        @endforeach
                    </select>
                    <select name="country" class="form-select" aria-label="Country">
                        <option value="" {{ request('country') === '' ? 'selected' : '' }}>Country</option>
                        @foreach (\App\Models\Country::all() as $country)
                            <option value="{{ $country->id }}"
                                {{ request('country') == $country->id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Search Bar and Button -->
                <div class="d-flex">
                    <input name="search" type="text" class="form-control me-2" placeholder="Search for projects..."
                        value="{{ request('search') }}" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <!-- Project Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project Details</th>
                        <th>Status</th>
                        <th>Project Type</th>
                        <th>Country</th>
                        <th class="text-center">Actions</th>
                        <th class="text-center">Comments</th>
                    </tr>
                </thead>
                <tbody id="project-list">
                    @forelse ($projects as $project)
                        <tr data-status="{{ $project->status }}" data-type="{{ $project->type }}"
                            data-country="{{ $project->country }}">
                            <td>{{ $project->unique_id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->projectStatus?->name }}</td>
                            <td>{{ $project->projectType?->name }}</td>
                            <td>{{ $project->country?->name }}</td>
                            <td class="text-center"><a href="{{ route('projects.show', $project) }}"
                                    class="btn btn-info">View</a></td>
                            <td class="text-center icon-container">
                                <button class="btn btn-secondary" onclick="openCommentModal(this)"><i
                                        class="fas fa-comment"></i></button>
                                <div class="comment-section"
                                    data-comments='[{"username":"Alice","email":"alice@example.com","comment":"Great project!"},{"username":"Bob","email":"bob@example.com","comment":"Looking forward to updates!"}]'>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No projects found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Section -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <span id="project-count">{{ $projects->firstItem() }}-{{ $projects->lastItem() }} of
                    {{ $projects->total() }}</span>
            </div>
            <nav aria-label="Page navigation example">
                {{ $projects->links('pagination::bootstrap-5') }}
            </nav>
        </div>
    </div>

    <!-- Comment Modal -->
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Comments</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="comments-list" class="mb-3"></div>
                    <form id="commentForm">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function openCommentModal(button) {
            const row = button.closest('tr');
            const comments = row.querySelector('.comment-section').getAttribute('data-comments');
            const commentsList = JSON.parse(comments);

            const commentsDiv = document.getElementById('comments-list');
            commentsDiv.innerHTML = '';

            commentsList.forEach(comment => {
                const commentElement = document.createElement('div');
                commentElement.className = 'comment-item';
                commentElement.innerHTML =
                    `<strong>${comment.username}</strong> (${comment.email}): ${comment.comment}`;
                commentsDiv.appendChild(commentElement);
            });

            const commentModal = new bootstrap.Modal(document.getElementById('commentModal'));
            commentModal.show();
        }

        document.getElementById('commentForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const comment = document.getElementById('comment').value;

            const newComment =
                `<div class="comment-item"><strong>${username}</strong> (${email}): ${comment}</div>`;
            document.getElementById('comments-list').insertAdjacentHTML('beforeend', newComment);

            document.getElementById('commentForm').reset();
        });
    </script>
</body>

</html>
