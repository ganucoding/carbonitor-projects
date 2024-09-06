<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project List with Filters and Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }

            .sticky-actions {
                position: sticky;
                right: 0;
                background: white;
                z-index: 1;
            }

            th,
            td {
                white-space: nowrap;
            }
        }

        .comment-section {
            margin-top: 10px;
        }

        .comment-item {
            margin-bottom: 10px;
        }

        .modal-dialog {
            max-width: 600px;
        }

        .icon-container {
            text-align: center;
            /* Center align the icon */
        }

        .icon-container button {
            background: transparent;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="navbar-brand fw-bold">Carbonitor</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">All Projects</h1>

        <!-- Filter and Search Bar Section -->
        <form method="GET" action="{{-- {{ route('projects.index') }} --}}">
            <div class="row mb-3">
                <div class="col-md-6">
                    <!-- Filter Section -->
                    <div class="d-flex">
                        <select name="status" class="form-select me-2" aria-label="Project Status">
                            <option value="" {{ request('status') === '' ? 'selected' : '' }}>Project Status
                            </option>
                            @foreach (\App\Enums\ProjectStatus::cases() as $projectStatus)
                                <option value="{{ $projectStatus->value }}"
                                    {{ request('status') === $projectStatus ? 'selected' : '' }}>
                                    {{ $projectStatus->label() }}
                                </option>
                            @endforeach
                        </select>
                        <select name="type" class="form-select me-2" aria-label="Project Type">
                            <option value="" {{ request('type') === '' ? 'selected' : '' }}>Project Type</option>
                            @foreach (\App\Enums\ProjectType::cases() as $projectType)
                                <option value="{{ $projectType->value }}"
                                    {{ request('type') === $projectType->value ? 'selected' : '' }}>
                                    {{ $projectType->label() }}</option>
                            @endforeach
                        </select>
                        <select name="country" class="form-select" aria-label="Country">
                            <option value="" {{ request('country') === '' ? 'selected' : '' }}>Country</option>
                            @foreach (\App\Enums\Country::cases() as $country)
                                <option value="{{ $country->value }}"
                                    {{ request('country') === $country->value ? 'selected' : '' }}>
                                    {{ $country->label() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Search Bar -->
                    <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="Search for projects..."
                            value="{{ request('search') }}" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Project Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Project Details</th>
                        <th>Status</th>
                        <th>Project Type</th>
                        <th>Country</th>
                        <th class="sticky-actions">Actions</th>
                        <th class="center-icon">Comments</th>
                    </tr>
                </thead>
                <tbody id="project-list">
                    @forelse ($projects as $project)
                        <tr data-status="{{ $project->status }}" data-type="{{ $project->type }}"
                            data-country="{{ $project->country }}">
                            <td>{{ $project->unique_id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ \App\Enums\ProjectStatus::from($project->status)->label() }}</td>
                            <td>{{ \App\Enums\ProjectType::from($project->type)->label() }}</td>
                            <td>{{ \App\Enums\Country::from($project->country)->label() }}</td>
                            <td><a href="{{ route('projects.show', $project) }}" class="btn btn-info">VIEW</a></td>
                            <td class="icon-container">
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
        <div class="d-flex justify-content-between align-items-center">
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
        <div class="modal-dialog">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
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
