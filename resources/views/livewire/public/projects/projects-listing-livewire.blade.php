<div>
    @if (session()->has('success'))
        <!-- Popup Alert -->
        <div id="popup" class="popup">
            <div class="popup-content">
                <p>{{ session('success') }}</p>
                <button onclick="document.getElementById('popup').style.display='none';"
                    class="popup-close">Close</button>
            </div>
        </div>
    @endif

    <div class="header-container md:px-[63px]">
        <h3 class="title">Projects List</h3>
        <a href="/admin/login" class="btn">
            Admin Login
        </a>
    </div>

    <div class="md:px-[63px]">
        {{ $this->table }}
    </div>

    <style>
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
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

        /* Popup Styles */
        .popup {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
            text-align: center;
        }

        .popup-close {
            background-color: #02B075;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            margin-top: 10px;
        }

        .popup-close:hover {
            background-color: #028d59;
        }
    </style>
</div>
