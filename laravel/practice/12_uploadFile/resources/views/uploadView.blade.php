<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
    <h2>Upload File</h2>
    <br>
    <br>
    <br>

    <form action="upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" >
        <br>
        <br>
        <br>
        <input type="submit" value="upload">
    </form>

</div>
