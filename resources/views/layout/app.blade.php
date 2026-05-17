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

    <style>
    .table-footer {
        padding: 14px 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        border-top: 1px solid #f0f0f0;
        background: #fff;
    }

    .footer-text {
        font-size: 12px;
        color: #6b7280;
    }

    .pagination-wrap {
        display: flex;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }

    .page-item-ui {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 600;
        color: #666;
        background: #fff;
        border: 1px solid #ececec;
        text-decoration: none;
        line-height: 1;
    }

    .page-item-ui:hover {
        background: #e8f3ed;
        border-color: #155c43;
        color: #155c43;
        text-decoration: none;
    }

    .page-item-ui.active {
        background: #155c43;
        color: #fff;
        border-color: #155c43;
    }

    .page-item-ui.disabled {
        background: #f3f4f6;
        color: #9ca3af;
        pointer-events: none;
    }

    .page-item-ui.dots {
        border-color: transparent;
        background: transparent;
        pointer-events: none;
    }

    /* Matikan panah SVG besar bawaan Laravel/Tailwind */
    nav[role="navigation"] svg,
    .pagination svg {
        width: 14px !important;
        height: 14px !important;
    }

    @media (max-width: 768px) {
        .table-footer {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>
</head>

<body>

@php
    $segment = Request::segment(2);
@endphp

@include('komponen.sidebar', ['segment' => $segment])

<div class="main-content">
    <nav class="top-navbar">
        <span class="fw-bold">JTrip Admin</span>
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
