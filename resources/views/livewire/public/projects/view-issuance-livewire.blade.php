<div>

    <body>
        <div class="issuance-card">
            <h4>Issuance Details</h4>

            <div class="row">
                <div class="col-md-6 section-title">PROJECT ISSUED TO</div>
                <div class="col-md-6 value">{{ $issuance->project_issued_to ?? 'Not Available' }}</div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 section-title">SERIAL NUMBER</div>
                <div class="col-md-6 value">{{ $issuance->serial_number ?? 'Not Available' }}</div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 section-title">STATUS</div>
                <div class="col-md-6 value">{{ $issuance->status ?? 'Not Available' }}</div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 section-title">NUMBER OF CREDITS</div>
                <div class="col-md-6 value">
                    {{ $issuance->quantity !== null ? number_format($issuance->quantity) : 'Not Available' }}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 section-title">PRODUCT</div>
                <div class="col-md-6 value">{{ $issuance->product ?? 'Not Available' }}</div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 section-title">MONITORING PERIOD</div>
                <div class="col-md-6 value">
                    {{ $issuance->monitoring_period_start ? \Carbon\Carbon::parse($issuance->monitoring_period_start)->format('F j, Y') : 'Not Available' }}
                    ―
                    {{ $issuance->monitoring_period_end ? \Carbon\Carbon::parse($issuance->monitoring_period_end)->format('F j, Y') : 'Not Available' }}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 section-title">ISSUANCE DATE</div>
                <div class="col-md-6 value">
                    {{ $issuance->issuance_date ? \Carbon\Carbon::parse($issuance->issuance_date)->format('F j, Y') : 'Not Available' }}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 section-title">VINTAGE</div>
                <div class="col-md-6 value">{{ $issuance->vintage ?? 'Not Available' }}</div>
            </div>

            <hr />

            @if ($issuance->eligibilities_corsia_pilot_phase)
                <div class="eligibilities">
                    <h5>Eligibilities (CORSIA Pilot Phase)</h5>
                    Yes
                </div>
                <hr />
            @endif

            @if ($issuance->attributes_emission_reduction)
                <div class="attributes">
                    <h5>Attributes (Emission Reduction)</h5>
                    Yes
                </div>
                <hr />
            @endif

            <div class="histories-table">
                <h5>History</h5>
                <table class="invisible-table">
                    <tbody>
                        @foreach ($issuance->histories_json ?? [] as $history)
                            <tr>
                                <td class="col-credits">{{ $history['credits'] ?? '' }}</td>
                                <td class="col-symbol">{{ $history['symbol'] ?? '' }}</td>
                                <td class="col-details">{{ $history['details'] ?? '' }}</td>
                            </tr>
                        @endforeach
                        @if (empty($issuance->histories_json))
                            <tr>
                                <td colspan="3" class="text-center">No Histories Available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </body>

    <style>
        .issuance-card {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }

        .issuance-card h4 {
            margin-bottom: 20px;
            font-weight: bold;
        }

        .issuance-card .section-title {
            font-weight: bold;
        }

        .issuance-card .value {
            font-weight: 500;
        }

        .issuance-card hr {
            margin: 20px 0;
        }

        .eligibilities,
        .attributes,
        .histories-table {
            margin-top: 20px;
        }

        .invisible-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .invisible-table td {
            padding: 8px;
        }

        .col-credits {
            width: 30%;
            /* Adjusted ratio */
        }

        .col-symbol {
            width: 10%;
            /* Adjusted ratio */
        }

        .col-details {
            width: 60%;
            /* Adjusted ratio */
        }

        @media (max-width: 768px) {
            .issuance-card {
                padding: 15px;
            }

            .issuance-card h4 {
                font-size: 1.5rem;
            }

            .issuance-card .section-title,
            .issuance-card .value {
                font-size: 0.875rem;
            }
        }

        @media (max-width: 480px) {
            .issuance-card {
                padding: 10px;
            }

            .issuance-card h4 {
                font-size: 1.25rem;
            }

            .issuance-card .section-title,
            .issuance-card .value {
                font-size: 0.75rem;
            }
        }
    </style>
</div>
