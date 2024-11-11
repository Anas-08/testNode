<?php $hobb = explode(",",$data->hobby); ?>
<center>
    <br>
    <br>
    <h2>Edit Data</h2>
    <br>
    <br>
    {{ print_r($data) }}
    <form action="{{ '/edit/'.$data->id}}" method="post" enctype="multipart/form-data" >
        @csrf
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
                <td>Mobile : </td>
                <td><input type="text" placeholder="enter mobile" name="mobile" value="{{ $data->mobile }}"  ></td>
            </tr>
            <tr>
                <td>Address : </td>
                <td><textarea name="address" id="address" cols="21" rows="2">{{ $data->address }}</textarea></td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td>
                    <input type="radio" name="gender" value="male" {{ $data->gender == 'male' ? 'checked' : '' }} >Male <br>
                    <input type="radio" name="gender" value="female" {{ $data->gender == 'female' ? 'checked' : '' }}  >Female <br>
                </td>
            </tr>
           
            <tr>
                <td>Course : </td>
                <td>
                    <select name="course" id="course">
                        <option value="mca" {{ $data->course == 'mca' ? 'selected' : '' }} >MCA</option>
                        <option value="bca" {{ $data->course == 'bca' ? 'selected' : '' }} >BCA</option>
                        <option value="msc" {{ $data->course == 'msc' ? 'selected' : '' }} >MSC</option>
                        <option value="ml" {{ $data->course == 'ml' ? 'selected' : '' }} >ML</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hobbies : </td>
                <td>
                    <input type="checkbox" name="hobby[]" value="swimming" {{ in_array('swimming', $hobb) ? 'checked' : '' }} >Swimming <br>
                    <input type="checkbox" name="hobby[]" value="reading" {{ in_array('reading', $hobb) ? 'checked' : '' }} >Reading <br>
                    <input type="checkbox" name="hobby[]" value="playing" {{ in_array('playing', $hobb) ? 'checked' : '' }} >Playing <br>
                </td>
            </tr>
            <tr>
                <td>Choose File : </td>  
                <td>
                    @if($data->image)
                        <img src="{{ asset('storage/images/'.$data->image) }}" alt="" width="100px" >
                        {{-- <img src="{{ Storage::url('images/'.$data->image) }}" alt="" width="100px" > --}}
                    @endif
                    <br>

                    <input type="file" name="file" >
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button>Edit</button></td>
            </tr>
        </table>
    </form>
</center>