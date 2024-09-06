<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }

        .navbar {
            background-color: #0b7e98;
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

        .navbar-brand:hover {
            color: #e1e1e1;
        }

        .project-header {
            background: linear-gradient(135deg, #0b7e98, #005a6f);
            color: #fff;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .project-header h2 {
            font-size: 1.75rem;
            margin-bottom: 10px;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #0b7e98;
            color: #fff;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .text-muted {
            color: #6c757d;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .table-bordered th,
        .table-bordered td {
            vertical-align: middle;
        }

        .table-bordered thead th {
            background-color: #f1f3f5;
        }

        .actions-sticky {
            position: sticky;
            right: 0;
            background-color: #fff;
        }

        .mt-4 {
            margin-top: 2rem !important;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="navbar-brand fw-bold">Carbonitor</a>
        </div>
    </nav>

    <div class="container my-5">
        <div class="project-header text-center">
            <h2>{{ $project->name }}</h2>
            <small>ID: {{ $project->unique_id }} | Region:
                {{ \App\Enums\Country::from($project->country)->label() }}</small>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Project Details
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Project Developer</th>
                                        <td>{{ $project->projectDetail->project_developer }}</td>
                                    </tr>
                                    <tr>
                                        <th>Methodology</th>
                                        <td>{!! nl2br(e($project->projectDetail->methodology)) !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Standards Version</th>
                                        <td>{{ $project->projectDetail->standards_version }}</td>
                                    </tr>
                                    <tr>
                                        <th>Project Scale</th>
                                        <td>{{ $project->projectDetail->project_scale }}</td>
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
                                        <td>
                                            {{ \Carbon\Carbon::parse($project->projectDetail->crediting_period_start)->format('M d, Y') }}
                                            ―
                                            {{ \Carbon\Carbon::parse($project->projectDetail->crediting_period_end)->format('M d, Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Annual Estimated Credits</th>
                                        <td>{{ number_format($project->projectDetail->annual_estimated_credits) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Project Type</th>
                                        <td>{{ \App\Enums\ProjectType::from($project->type)->label() }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        Description
                    </div>
                    <div class="card-body">
                        <p>{!! nl2br(e($project->projectDetail->description)) !!}</p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        Summary
                    </div>
                    <div class="card-body">
                        <p>{!! nl2br(e($project->projectDetail->summary)) !!}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Sources
                    </div>
                    <div class="card-body">
                        <p>{!! nl2br(e($project->projectDetail->sources)) !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive mt-4">
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
                            <td>{{ \Carbon\Carbon::parse($issuance->issuance_date)->format('M d, Y') }}</td>
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
            <a href="{{-- {{ url($project->certification_docs_url) }} --}}" class="btn btn-info">View Certification Documents</a>
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
                            <td>{{ \Carbon\Carbon::parse($retirement->date)->format('M d, Y') }}</td>
                            <td>{{ $retirement->vintage }}</td>
                            <td>{{ $retirement->serial_number }}</td>
                            <td>{{ number_format($retirement->quantity) }}</td>
                            <td>{{ $retirement->product }}</td>
                            <td>{{ \App\Enums\RetirementStatus::from($retirement->status)->label() }}</td>
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
