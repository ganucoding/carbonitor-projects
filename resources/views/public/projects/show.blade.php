<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .project-header {
            background-color: #004e60;
            color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }

        .project-header h2 {
            font-size: 1.5rem;
            margin-bottom: 0;
        }

        .project-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }

        .project-info table {
            margin-bottom: 0;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .actions-sticky {
            position: sticky;
            right: 0;
            background-color: #fff;
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold">Carbonitor</a>
        </div>
    </nav>

    <div class="container my-5">
        <div class="project-header text-center">
            <h2>{{ $project->projectDetail->title }}</h2>
            <small>ID: {{ $project->projectDetail->id }} | Region: {{ $project->projectDetail->region }}</small>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="project-info">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Project Developer</th>
                                    <td>{{ $project->projectDetail->developer }}</td>
                                </tr>
                                <tr>
                                    <th>Methodology</th>
                                    <td>{{ $project->projectDetail->methodology }}</td>
                                </tr>
                                <tr>
                                    <th>Standards Version</th>
                                    <td>{{ $project->projectDetail->standards_version }}</td>
                                </tr>
                                <tr>
                                    <th>Project Scale</th>
                                    <td>{{ $project->projectDetail->scale }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Product</th>
                                    <td>{{ $project->projectDetail->product }}</td>
                                </tr>
                                <tr>
                                    <th>Crediting Period</th>
                                    <td>{{ $project->projectDetail->crediting_period }}</td>
                                </tr>
                                <tr>
                                    <th>Annual Estimated Credits</th>
                                    <td>{{ $project->projectDetail->annual_estimated_credits }}</td>
                                </tr>
                                <tr>
                                    <th>Project Type</th>
                                    <td>{{ $project->projectDetail->project_type }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <p class="fw-bold">Description:</p>
                <p>{{ $project->projectDetail->description }}</p>
                <p class="fw-bold">Summary:</p>
                <p>{{ $project->projectDetail->summary }}</p>
                <p class="fw-bold">Sources:</p>
                <p>{{ $project->projectDetail->sources }}</p>
            </div>
        </div>

        <div class="table-responsive">
            <h5>Issuance List</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Vintage</th>
                        <th>Quantity</th>
                        <th>Product</th>
                        <th>Issuance Date</th>
                        <th class="text-center actions-sticky">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($project->issuances as $issuance)
                        <tr>
                            <td>{{ $issuance->vintage }}</td>
                            <td>{{ $issuance->quantity }}</td>
                            <td>{{ $issuance->product }}</td>
                            <td>{{ $issuance->issuance_date->format('Y-m-d') }}</td>
                            <td class="text-center">
                                <!-- Actions can be added here -->
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">There are no issuances.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="{{ url($project->certification_docs_url) }}" class="btn btn-info">View Certification Documents</a>
        </div>

        <div class="table-responsive mt-4">
            <h5>Retirements</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Vintage</th>
                        <th>Serial Number</th>
                        <th>Quantity</th>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Note</th>
                        <th class="text-center actions-sticky">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($project->retirements as $retirement)
                        <tr>
                            <td>{{ $retirement->date->format('Y-m-d') }}</td>
                            <td>{{ $retirement->vintage }}</td>
                            <td>{{ $retirement->serial_number }}</td>
                            <td>{{ $retirement->quantity }}</td>
                            <td>{{ $retirement->product }}</td>
                            <td>{{ \App\Enums\ProjectStatus::from($retirement->status)->label() }}</td>
                            <td>{{ $retirement->note }}</td>
                            <td class="text-center">
                                <!-- Actions can be added here -->
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">There are no credits.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
