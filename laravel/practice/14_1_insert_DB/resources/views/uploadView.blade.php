<h1>Upload Image Page</h1>

<br>
<br>
<br>

<form action="upload" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" >
    <br>
    <br>
    <button>Upload Image</button>

</form>