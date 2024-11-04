<center>

    <h1>Insert Form Data</h1>

{{-- 
    @if ($errors->any())
        @foreach ($errors->all() as $err )
            <p>
                {{ $err }}
            </p>
        @endforeach
    @endif --}}

    <form action="handleFormInsert" method="post">
        @csrf
        <table>
            <tr>
                <td>Name : </td>
                <td>
                    <input type="text" name="name" placeholder="enter name" value="{{ old('name') }}" >
                    <span> @error('name') {{ $message }} @enderror </span>
                </td>
            </tr>
            <tr>
                <td>Email : </td>
                <td>
                    <input type="email" name="email" placeholder="enter email" value="{{ old('email') }}" >
                    <span> @error('email') {{ $message }} @enderror </span>
                </td>
            </tr>
            <tr>
                <td>Mobile : </td>
                <td>
                    <input type="number" name="number" placeholder="enter number" value="{{ old('number') }}" >
                    <span> @error('number') {{ $message }} @enderror </span>
                </td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td>
                    <input type="radio" name="gender" value="male" > Male <br>
                    <input type="radio" name="gender" value="female" > Female <br>
                    <span> @error('gender') {{ $message }} @enderror </span>
                </td>
            </tr>
            <tr>
                <td>Address :</td>
                <td>
                    <textarea name="address" id="address" cols="20" rows="5"></textarea>
                    <span> @error('address') {{ $message }} @enderror </span>
                </td>
            </tr>
            <tr>
                <td>Select Course : </td>
                <td>
                    <select name="course" id="course">
                        <option value="mca">Mca</option>
                        <option value="bca">Bca</option>
                        <option value="bsc">Bsc</option>
                    </select>
                    <span> @error('course') {{ $message }} @enderror </span>  
                </td>
            </tr>
            <tr>
                <td>Hobbies : </td>
                <td>
                    <input type="checkbox" name="hobby[]" value="swimming" > Swimming <br>
                    <input type="checkbox" name="hobby[]" value="playing" > Playing <br>
                    <input type="checkbox" name="hobby[]" value="reading" > Reading <br>
                    <span> @error('hobby') {{ $message }} @enderror </span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Add User"></td>
            </tr>
        </table>
        <a href="/dispFormData">Display Data</a>
    </form>
</center>