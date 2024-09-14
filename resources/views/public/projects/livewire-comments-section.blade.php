<body>
    <div>
        <a href="#"></a> {{-- Don't remove this anchor tag --}}

        <div class="project-header">
            <h2>{{ $project->name }}</h2>
            <small>ID: {{ $project->unique_id }} | Region: {{ $project->country?->name }}</small>
        </div>

        @livewire('public.projects.comments-section-livewire', compact('project'))
    </div>

    <style>
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
    </style>
</body>
