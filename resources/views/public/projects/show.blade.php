<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
            box-sizing: border-box;
        }

        .project-header {
            background: linear-gradient(135deg, #02B075, #028d59);
            color: #fff;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
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
            background-color: #fff;
        }

        .card-header {
            background-color: #02B075;
            color: #fff;
            font-weight: bold;
            padding: 1rem;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #dee2e6;
            padding: 0.75rem;
            text-align: left;
        }

        .table thead th {
            background-color: #e0f2e9;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .text-muted {
            color: #6c757d;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            color: #fff;
            background-color: #02B075;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
        }

        .btn:hover {
            background-color: #028d59;
        }

        .text-center {
            text-align: center;
        }

        .actions-sticky {
            position: sticky;
            right: 0;
            background-color: #fff;
            z-index: 0;
        }

        .mt-4 {
            margin-top: 2rem;
        }

        .map-container {
            position: relative;
            width: 100%;
            padding-top: 56.25%;
            /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
            border-radius: 8px;
            background: #ddd;
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        @media (min-width: 768px) {
            .row {
                display: flex;
                flex-wrap: wrap;
                margin: -15px;
            }

            .col-md-8,
            .col-md-4 {
                padding: 15px;
                box-sizing: border-box;
            }

            .col-md-8 {
                flex: 0 0 66.66667%;
                max-width: 66.66667%;
            }

            .col-md-4 {
                flex: 0 0 33.33333%;
                max-width: 33.33333%;
            }

            .card-body {
                padding: 30px;
                /* Added more padding for desktop view */
                padding: 30px;
                /* Added more padding for desktop view */
            }
        }
    </style>
</head>

<body>
    <a href="#"></a> {{-- Don't remove this anchor tag --}}

    <div class="container">
        <div class="project-header">
            <h2>{{ $project->name }}</h2>
            <small>ID: {{ $project->unique_id }} | Region: {{ $project->country?->name }}</small>
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
                                <table class="table">
                                    @if ($project->projectDetail?->project_developer)
                                        <tr>
                                            <th>Project Developer</th>
                                            <td>{{ $project->projectDetail->project_developer }}</td>
                                        </tr>
                                    @endif
                                    @if ($project->projectDetail?->project_validator)
                                        <tr>
                                            <th>Project Validator</th>
                                            <td>{{ $project->projectDetail->project_validator }}</td>
                                        </tr>
                                    @endif
                                    @if ($project->projectDetail?->methodology)
                                        <tr>
                                            <th>Methodology</th>
                                            <td>{!! nl2br(e($project->projectDetail->methodology)) !!}</td>
                                        </tr>
                                    @endif
                                    @if ($project->projectDetail?->standards_version)
                                        <tr>
                                            <th>Standards Version</th>
                                            <td>{{ $project->projectDetail->standards_version }}</td>
                                        </tr>
                                    @endif
                                    @if ($project->projectDetail?->project_scale)
                                        <tr>
                                            <th>Project Scale</th>
                                            <td>{{ $project->projectDetail->project_scale }}</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                    @if ($project->projectDetail?->product)
                                        <tr>
                                            <th>Product</th>
                                            <td>{{ $project->projectDetail->product }}</td>
                                        </tr>
                                    @endif
                                    @if ($project->projectDetail?->crediting_period_start && $project->projectDetail?->crediting_period_end)
                                        <tr>
                                            <th>Crediting Period</th>
                                            <td>
                                                {{ \Carbon\Carbon::parse($project->projectDetail->crediting_period_start)->format('M d, Y') }}
                                                ―
                                                {{ \Carbon\Carbon::parse($project->projectDetail->crediting_period_end)->format('M d, Y') }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($project->projectDetail?->annual_estimated_credits)
                                        <tr>
                                            <th>Annual Estimated Credits</th>
                                            <td>
                                                {{ number_format($project->projectDetail->annual_estimated_credits) }}
                                                @if ($project->projectDetail->metric)
                                                    ({{ $project->projectDetail->metric->name }})
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($project->projectType?->name)
                                        <tr>
                                            <th>Project Type</th>
                                            <td>{{ $project->projectType->name }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>Compliance</th>
                                        <td>{{ $project->projectDetail?->compliance ? 'Yes' : 'No' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @if ($project->projectDetail?->description)
                    <div class="card mb-3">
                        <div class="card-header">
                            Description
                        </div>
                        <div class="card-body">
                            <p>{!! nl2br(e($project->projectDetail->description)) !!}</p>
                        </div>
                    </div>
                @endif

                @if ($project->projectDetail?->summary)
                    <div class="card mb-3">
                        <div class="card-header">
                            Summary
                        </div>
                        <div class="card-body">
                            <p>{!! nl2br(e($project->projectDetail->summary)) !!}</p>
                        </div>
                    </div>
                @endif

                @if ($project->projectDetail?->sources_label && $project->projectDetail?->sources)
                    <div class="card">
                        <div class="card-header">
                            Sources
                        </div>
                        <div class="card-body">
                            <p>
                                <a href="{{ $project->projectDetail->sources }}" target="_blank"
                                    rel="noopener noreferrer" style="color: blue;">
                                    {{ $project->projectDetail->sources_label }}
                                </a>
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-4">
            @if ($project->projectDetail?->google_maps_embed_code)
                <h5>Location</h5>
                <div class="map-container">
                    {!! $project->projectDetail->google_maps_embed_code !!}
                </div>
            @endif
        </div>

        <div class="table-responsive mt-4">
            <h5>Issuances List</h5>
            @livewire('public.projects.projects-listing.issuances-table-livewire', compact('project'))
        </div>

        <div class="mt-4">
            <a href="{{ route('projects.viewCertificationDocumentsLivewire', $project) }}" class="btn"
                target="_blank" rel="noopener noreferrer">
                View Certification Documents
            </a>
        </div>

        <div class="table-responsive mt-4">
            <h5>Retirements List</h5>
            @livewire('public.projects.projects-listing.retirements-table-livewire', compact('project'))
        </div>

        <div class="mt-10">
            @livewire('public.projects.comments-section-livewire', compact('project'))
        </div>
    </div>
</body>

</html>
