<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/dark-mode.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/gpa_cal/index.css') }}">
    <title>Oragon</title>
    <link rel="icon" href="{{ asset('upload/logo.png') }}">
</head>

<style>
    html {
        position: relative;
        min-height: 100%;
    }
    body {
        margin-bottom: 60px; /* Margin bottom by footer height */
    }
    footer {
        position: absolute;
        bottom: 0;
        width: 99%;
        height: 60px; /* Set the fixed height of the footer here */
    }
</style>

<body>
    <!-- Include the header -->
    @include('user.body.header')
    <!-- End of navbar -->

    {{-- Yield part --}}
    @yield('user')
    {{-- End of Yield part --}}

    <!-- Include custom JavaScript files -->
    <script src="{{ asset('frontend/switch.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    {{-- GPA Calculator Script --}}
    <script src="{{ asset('frontend/gpa_cal/main.js') }}"></script>

    <script>
        $(document).ready(function () {
            $(".menu_btn").click(function () {
                $(".sidebar").addClass("active");
                $(".menu_btn").css("visibility", "hidden");
            });

            $(".close_btn").click(function () {
                $(".sidebar").removeClass("active");
                $(".menu_btn").css("visibility", "visible");
            });
        });
    </script>
</body>
</html>
