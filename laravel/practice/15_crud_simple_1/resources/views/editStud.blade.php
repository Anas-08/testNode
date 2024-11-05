<center>
    <br>
    <br>
    <h2>Edit Student</h2>
    <br>
    <br>
   
    <form action="/update/{{$data->id}}" method="post" enctype="multipart/form-data">
        @csrf
        
        <table>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name" placeholder="enter name" value="{{$data->name}}" /> </td>
            </tr>
            <tr>
                <td>Address : </td>
                <td><textarea name="address" id="address" cols="20" rows="4" placeholder="enter address" >{{ $data->address }}</textarea> </td>
            </tr>
            <tr>
                <td>Course : </td>
                <td>
                    <select name="course" id="course" >
                        <option value="mca" {{ $data->course == 'mca' ? 'selected' : '' }} >Mca</option>
                        <option value="bca" {{ $data->course == 'bca' ? 'selected' : '' }} >Bca</option>
                        <option value="msc" {{ $data->course == 'msc' ? 'selected' : '' }} >Msc</option>
                        <option value="ml" {{ $data->course == 'ml' ? 'selected' : '' }} >Ml</option>
                    </select>
                </td>
            </tr>
    
            <tr>
                <td>Mobile : </td>
                <td><input type="text" name="mobile" placeholder="enter mobile" value="{{ $data->mobile }}" /></td>
            </tr>

            <tr>
                <td>Gender : </td>
                <td>
                    <input type="radio" name="gender" value="male" {{ $data->gender == 'male' ? 'checked' : '' }}  >Male <br>
                    <input type="radio" name="gender" value="female" {{ $data->gender == 'female' ? 'checked' : '' }} >Female <br>
                </td>
            </tr>

            <tr>
                <td>Upload Img : </td>
                <td>
                    @if ($data->image)
                        <img src="{{ asset('storage/images/'.$data->image) }}" alt="" width="100px" >
                    @endif
                    <br>
                    <input type="file" name="file" >
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button>Edit</button>
                    <a href="/studentDisp">Back</a>
                </td>
            </tr>
        </table>
    </form>

</center>