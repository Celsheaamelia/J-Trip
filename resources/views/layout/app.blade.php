<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JTrip Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #f4f6f9;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: #064E3B;
            overflow-y: auto;
            z-index: 1000;
            padding: 20px 16px;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.15);
            border-radius: 10px;
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            background: #f4f6f9;
        }

        .top-navbar {
            background: #ffffff;
            border-bottom: 1px solid #ececec;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
            padding: 14px 20px;
        }

        .brand-title {
            color: #ffffff;
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .brand-subtitle {
            color: rgba(255,255,255,0.75);
            font-size: 11px;
            margin-bottom: 16px;
        }

        .sidebar-divider {
            border: 0;
            border-top: 1px solid rgba(255,255,255,0.15);
            margin: 10px 0 18px;
            opacity: 1;
        }

        .nav-item {
            margin-bottom: 8px;
        }

        .nav-link {
            color: #ffffff;
            padding: 12px 14px;
            border-radius: 12px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            color: #ffffff;
            background: rgba(255,255,255,0.12);
        }

        .nav-link i {
            font-size: 15px;
            min-width: 18px;
        }

        .active-menu {
            font-weight: 700;
            color: #ffffff !important;
            background: rgba(255,255,255,0.22);
        }

        .content-wrapper {
            padding: 24px;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 230px;
            }

            .main-content {
                margin-left: 230px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
            }

            .main-content {
                margin-left: 0;
            }

            .content-wrapper {
                padding: 18px;
            }
        }
    </style>

    @yield('styles')
</head>

<body>

@php
    $segment = Request::segment(2);
@endphp

@include('komponen.sidebar', ['segment' => $segment])

<div class="main-content">
    <nav class="top-navbar">
        <span class="fw-bold">JTrip Admin Dashboard</span>
    </nav>

    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@yield('scripts')

</body>
</html>
