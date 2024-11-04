<div>
    <h1>Profile Page</h1>

    @if(session('username'))
        <h2>Welcome, {{ session('username') }} </h2>
    @else
        {{-- <h2>No user Found</h2> --}}
        {{ redirect('login') }}
    @endif

    <br>
    <br>
    <br>
    <a href="/logout">Logout</a>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
</div>
