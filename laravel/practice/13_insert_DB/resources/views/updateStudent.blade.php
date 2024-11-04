<center>
    <div>
        <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
        <h2>Update Student Data</h2>
    
        <br>
        <br>
        <br>

        <form action="/updateStudent/{{$data->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="put" >
            <table>
                <tr>
                    <td>Name : </td>
                    <td><input type="text" placeholder="enter name" name="name" value="{{ $data->name }}" ></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="email" placeholder="enter email" name="email" value="{{ $data->email }}" ></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="password" placeholder="enter password" name="password" value="{{ $data->password }}" ></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Update Student" ></td>
                    <td><a href="/studentDisp">Back</a></td>
                </tr>
            </table>
        </form>
    
    </div>
    
</center>