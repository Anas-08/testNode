<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <h2>Form Page</h2>
    <br>
    <br>
    <br>
    <form action="upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" >
        <br>
        <br>
        <br>
        <input type="submit" value="Upload File" >
    </form>
</div>
