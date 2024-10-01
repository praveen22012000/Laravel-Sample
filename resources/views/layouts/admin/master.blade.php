<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts/admin/_meta')
@include('layouts/admin/_style')

@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body id="page-top">

    <div id="wrapper">

        @include('layouts/admin/_sidebar')
            <div id="content-wrapper" class="d-flex flex-column">

                    <div id="content">

                        @include('layouts/admin/_header')

                        @yield('header')
                        @yield('content')

                    </div>

                        @include('layouts/admin/_footer')

            </div>

    </div>
    @include('layouts/admin/_logout')
    @include('layouts/admin/_script')
</body>

</html>


 
