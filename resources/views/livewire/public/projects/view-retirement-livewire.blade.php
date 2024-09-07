<div>
    <div class="details-container">
        <h4>Retirement Details</h4>

        <div class="row">
            <div class="col-md-6 section-title">RETIREMENT DATE</div>
            <div class="col-md-6 value">
                {{ $retirement->date ? \Carbon\Carbon::parse($retirement->date)->format('M d, Y') : 'Not Available' }}
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6 section-title">RETIREMENT NOTE</div>
            <div class="col-md-6 value">{{ $retirement->note ?? 'Not Available' }}</div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6 section-title">USING ENTITY</div>
            <div class="col-md-6 value">{{ $retirement->using_entity ?? 'Not Available' }}</div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6 section-title">USE CASE</div>
            <div class="col-md-6 value">{{ $retirement->use_case ?? 'Not Available' }}</div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6 section-title">USE CASE AUTHORISATION</div>
            <div class="col-md-6 value">{{ $retirement->use_case_authorisation ?? 'Not Available' }}</div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6 section-title">CORRESPONDING ADJUSTMENT</div>
            <div class="col-md-6 value">{{ $retirement->corresponding_adjustment ?? 'Not Available' }}</div>
        </div>
    </div>

    <style>
        .details-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        .details-container h4 {
            margin-bottom: 20px;
            font-weight: bold;
        }

        .details-container .row {
            border-bottom: 1px solid #00CCCC;
            padding: 10px 0;
        }

        .details-container .section-title {
            font-weight: bold;
        }

        .details-container .value {
            font-style: italic;
            text-align: right;
        }

        .details-container hr {
            margin: 20px 0;
        }

        @media (max-width: 768px) {
            .details-container {
                padding: 15px;
            }

            .details-container h4 {
                font-size: 1.5rem;
            }

            .details-container .section-title,
            .details-container .value {
                font-size: 0.875rem;
            }
        }

        @media (max-width: 480px) {
            .details-container {
                padding: 10px;
            }

            .details-container h4 {
                font-size: 1.25rem;
            }

            .details-container .section-title,
            .details-container .value {
                font-size: 0.75rem;
            }
        }
    </style>
</div>
