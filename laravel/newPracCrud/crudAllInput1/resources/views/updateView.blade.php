<?php 
    $hobb = explode(",",$data->hobby);
?>
<center>
    <h1>Edit Page</h1>
    <br>
    <br>
    <br>

    <form action="/edit/{{$data->id}}" method="post" >
        @csrf
        <table>
            <tr>
                <td>Name : </td>
                <td><input type="text" placeholder="enter name" name="name" value="{{$data->name}}" ></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><input type="email" placeholder="enter email" name="email" value="{{$data->email}}"  ></td>
            </tr>
            <tr>
                <td>Mobile Number : </td>
                <td><input type="text" placeholder="enter number" name="number" value="{{ $data->number }}" ></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" placeholder="enter password" name="password" value="{{ $data->password }}" ></td>
            </tr>  
            <tr>
                <td>Dob : </td>
                <td><input type="date" placeholder="enter date" name="date" value="{{ $data->dob }}" ></td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td>
                    <input type="radio" name="gender" value="male" {{ $data->gender == 'male' ? 'checked' : '' }} > Male <br>
                    <input type="radio" name="gender" value="female" {{ $data->gender == 'female' ? 'checked' : '' }} > Female <br>
                </td>
            </tr>
            <tr>
                <td>Address : </td>
                <td> <textarea name="address" id="address" cols="20" rows="2" placeholder="enter address" >{{ $data->address }}</textarea> </td>
            </tr>
            <tr>
                <td>Course : </td>
                <td>
                    <select name="course" id="course">
                        <option value="mca" {{ $data->course == 'mca' ? 'selected' : '' }} >Mca</option>
                        <option value="bca" {{ $data->course == 'bca' ? 'selected' : '' }} >Bca</option>
                        <option value="msc" {{ $data->course == 'msc' ? 'selected' : '' }} >Msc</option>
                        <option value="pgdca" {{ $data->course == 'pgdca' ? 'selected' : '' }} >Pgdca</option>
                        <option value="ml" {{ $data->course == 'ml' ? 'selected' : '' }} >Ml</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hobby : </td>
                <td>
                    <input type="checkbox" name="hobby[]" value="swimming" {{ in_array('swimming', $hobb) ? 'checked' : '' }}  > Swimming <br>
                    <input type="checkbox" name="hobby[]" value="playing" {{ in_array('playing', $hobb) ? 'checked' : '' }} > Playing <br>
                    <input type="checkbox" name="hobby[]" value="reading" {{ in_array('reading', $hobb) ? 'checked' : '' }} > Reading <br>
                </td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Edit Data" ></td>
            </tr>

        </table>
    </form>


</center>