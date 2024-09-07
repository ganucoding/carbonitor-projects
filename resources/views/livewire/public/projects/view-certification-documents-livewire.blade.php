<div>

    <body>
        <div class="container">
            <h1>{{ $project->name }}</h1>

            <div>
                <h5>Certification Documents</h5>
                @foreach ($project->certificationDocuments->groupBy('folder_id') as $folderId => $documents)
                    <div class="folder">
                        <h6>{{ $documents->first()->folder?->name ?? 'Uncategorised' }}</h6>
                        <ul>
                            @foreach ($documents as $document)
                                <li>
                                    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">
                                        {{ $document->file_name ?? 'Untitled' }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </body>

    <style>
        h1 {
            background: linear-gradient(135deg, #02B075, #028d59);
            color: #fff;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            font-weight: 600;
        }

        h5 {
            font-size: 1.25rem;
            color: #333;
            margin-bottom: 1rem;
            font-weight: 600;
            border-bottom: 2px solid #02B075;
            padding-bottom: 0.5rem;
        }

        .folder {
            margin-bottom: 1rem;
            padding: 0.5rem 0;
        }

        .folder h6 {
            background-color: #02B075;
            color: #fff;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            margin: 0;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-block;
            transition: font-weight 0.2s, font-size 0.2s;
        }

        .folder h6.enlarged {
            font-size: 1rem;
            /* Slightly larger font size */
            font-weight: 700;
            /* Bolder font weight */
        }

        .folder ul {
            list-style: none;
            padding: 0;
            margin: 0.5rem 0 0;
        }

        .folder ul li {
            margin-bottom: 0.5rem;
        }

        .folder a {
            color: #02B075;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .folder a:hover {
            color: #028d59;
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 0.5rem;
            }

            h1 {
                font-size: 1.5rem;
                padding: 1rem;
            }

            .folder h6 {
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
            }

            .folder a {
                font-size: 0.75rem;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.25rem;
                padding: 0.75rem;
            }

            .folder h6 {
                font-size: 0.625rem;
                padding: 0.25rem 0.5rem;
            }

            .folder a {
                font-size: 0.625rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const folders = document.querySelectorAll('.folder');

            folders.forEach(folder => {
                const folderName = folder.querySelector('h6');
                const links = folder.querySelectorAll('a');

                links.forEach(link => {
                    link.addEventListener('mouseover', () => {
                        folderName.classList.add('enlarged');
                    });
                    link.addEventListener('mouseout', () => {
                        folderName.classList.remove('enlarged');
                    });
                });
            });
        });
    </script>
</div>
