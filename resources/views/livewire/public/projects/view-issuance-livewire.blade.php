<div>
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

        .issuance-details {
            margin-bottom: 1rem;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .issuance-details h6 {
            margin: 0 0 0.5rem;
            font-size: 1.125rem;
            font-weight: 600;
            color: #333;
        }

        .issuance-details p {
            margin: 0 0 0.5rem;
            font-size: 1rem;
            color: #555;
        }

        .issuance-details .label {
            font-weight: 600;
            color: #02B075;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
                padding: 1rem;
            }

            .issuance-details h6 {
                font-size: 1rem;
            }

            .issuance-details p {
                font-size: 0.875rem;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.25rem;
                padding: 0.75rem;
            }

            .issuance-details h6 {
                font-size: 0.875rem;
            }

            .issuance-details p {
                font-size: 0.75rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // No specific script needed for this simple view
        });
    </script>

    <body>
        <div class="container">
            <h1>Issuance Details</h1>

            <div class="issuance-details">
                <h5>Issuance Information</h5>
                <h6>Project ID</h6>
                <p>{{ $issuance->project_id }}</p>

                <h6>Vintage</h6>
                <p>{{ $issuance->vintage ?? 'Not Available' }}</p>

                <h6>Quantity</h6>
                <p>{{ $issuance->quantity ?? 'Not Available' }}</p>

                <h6>Product</h6>
                <p>{{ $issuance->product ?? 'Not Available' }}</p>

                <h6>Issuance Date</h6>
                <p>{{ $issuance->issuance_date ? \Carbon\Carbon::parse($issuance->issuance_date)->format('F j, Y') : 'Not Available' }}
                </p>

                <h6>Issued To</h6>
                <p>{{ $issuance->project_issued_to ?? 'Not Available' }}</p>

                <h6>Serial Number</h6>
                <p>{{ $issuance->serial_number ?? 'Not Available' }}</p>

                <h6>Status</h6>
                <p>{{ $issuance->status ?? 'Not Available' }}</p>

                <h6>Monitoring Period Start</h6>
                <p>{{ $issuance->monitoring_period_start ?? 'Not Available' }}</p>

                <h6>Monitoring Period End</h6>
                <p>{{ $issuance->monitoring_period_end ?? 'Not Available' }}</p>

                <h6>Eligibilities (CORSIA Pilot Phase)</h6>
                <p>{{ $issuance->eligibilities_corsia_pilot_phase ? 'Yes' : 'No' }}</p>

                <h6>History</h6>
                <p>{{ $issuance->history ?? 'No History Available' }}</p>
            </div>
        </div>
    </body>
</div>
