<!-- resources/views/layouts/sidebar.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Layout</title>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script defer src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</head>
<body>
    <div class="col-3 p-5 d-flex flex-column sidenav">
        <div class="logo">
            <img src="{{ asset('images/TrikGo-logo.png') }}" alt="Logo TrikGo"/>
            <h1 class="">TrikGo</h1>
        </div>
        <a class="row mt-5 tab {{ $activeLink === 'dashboard' ? 'active' : '' }}" href="/dashboard">
                <img src="{{ asset('images/dashboard.png') }}">
                <h5 class="m-0">Dashboard</h5>
        </a>
        <a class="row mt-4 tab {{ $activeLink === 'drivers' ? 'active' : '' }}" href="/drivers">
            <img src="{{ asset('images/driver-icon.png')}}" >
            <h5 class="m-0">Drivers</h5>
        </a>
        {{-- <a class="row mt-4 tab {{ $activeLink === 'staff' ? 'active' : '' }}" href="../views/staff.html">
                <img src="{{ asset('images/staff-icon.png') }}">
                <h5 class="m-0">Staff</h5>
        </a> --}}
        <a class="row mt-4 tab {{ $activeLink === 'passengers' ? 'active' : '' }}" href="/passengers">
                <img src="{{ asset('images/user-icon.ico') }}">
                <h5 class="m-0">Passengers</h5>
        </a>
        <a class="row mt-4 tab {{ $activeLink === 'analytics' ? 'active' : '' }}" href="/analytics">
            <img src="{{ asset('images/analytics-icon.png' )}}">
            <h5 class="m-0">Analytics</h5>
        </a>
        {{-- <a class="row mt-4 tab {{ $activeLink === 'transactions' ? 'active' : '' }}">
            <img src="{{ asset('images/transaction-icon.png ') }}">
            <h5 class="m-0">Transactions</h5>
        </a> --}}


        <li class="" style="list-style: none">
            <a class="row mt-4 tab" href="" id="navbarDropdownMenuLink"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('images/transaction-icon.png') }}">
                <h5 class="m-0">Transaction</h5>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item {{ $activeLink === 'driver' ? 'active' : '' }}" href="/transactions/drivers">Driver</a>
                <a class="dropdown-item {{ $activeLink === 'passenger' ? 'active' : '' }}" href="/transactions/passengers">Passenger</a>
            </div>
        </li>
        <a class="row mt-4 tab {{ $activeLink === 'goal' ? 'active' : '' }}" href="#">
            <img src="{{ asset('images/goal-icon.png' )}}">
            <h5 class="m-0">TODA Goals</h5>
        </a>



        <div class="container d-flex justify-content-between mt-5">
            <a class="row mt-4 settings mt-5" href="../views/user.html">
                <img src="{{ asset('/images/user-icon.ico ') }}">
            </a>
            <a class="row mt-4 settings mt-5" href="../views/logout.html">
                <img src="{{ asset('images/logout-icon.png ') }}">
            </a>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js   "
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>
</html>
