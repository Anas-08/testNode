<div>
    <h1>Profile Page</h1>


    @if(session('username'))
        <h2>Welcome, {{ session('username') }}</h2>
    @else
        {{-- {{ redirect('login') }} --}}
        <h2>No User Found</h2>
    @endif

    <a href="logout">Logout</a>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</div>
