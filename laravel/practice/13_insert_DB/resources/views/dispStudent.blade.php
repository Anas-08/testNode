<center>
    <h2>Display Data</h2>
    <br>
    <br>
    <br>
    {{-- {{ $data }} --}}
    <form action="search" method="get">
        <input type="text" placeholder="search by name" name="search" value="{{ @$search }}" />
        <br>
        <br>
        <button>Search</button>
    </form>

    <form action="deleteMulti" method="post" >
        @csrf
    <table border="1" cellspacing="0px" cellpadding="12px" >
        <tr>
            <th>select</th>
            <th>Serial No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th colspan="2" >Actions</th>
        </tr>
        @foreach ($data as $stud )
            <tr>
                <td><input type="checkbox" name="ids[]" value="{{ $stud->id }}"  ></td>
                <td>{{ $stud->id }}</td>
                <td>{{ $stud->name }}</td>
                <td>{{ $stud->email }}</td>
                <td>{{ $stud->password }}</td>
                <td><button><a href="{{'/delete/'.$stud->id}}">Delete</a></button></td>
                <td><button><a href="{{'/edit/'.$stud->id}}">Edit</a></button></td>
            </tr>
        @endforeach
    </table>
    <br>
    <br>
    <button>Delete</button>
    <br>
    <br>
    </form>

    {{ $data->links() }}
</center>

<style>
    svg{
        width: 40px;
    }
    /* .relative{

        display: flex;
        align-items: center;
    } */
</style>
