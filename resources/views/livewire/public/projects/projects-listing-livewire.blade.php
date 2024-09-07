<div>
    <div class="header-container">
        <h3 class="title">Our Projects</h3>
        <a href="/admin/login" class="btn">
            Admin Login
        </a>
    </div>
    {{ $this->table }}

    <style>
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            /* Adds space between the header and the table */
        }

        .title {
            margin: 0;
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
    </style>
</div>
