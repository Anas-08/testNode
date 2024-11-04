<div>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    <h2>File Upload</h2>
    <br>
    <br>
    <br>

    <form action="upload" method="post" enctype="multipart/form-data" >
        @csrf
        <input type="file" name="file" >
        <br>
        <br>
        <br>
        <input type="submit" value="Upload File" >
    </form>
</div>
