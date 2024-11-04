<div>
    <h1>Data From Api</h1>

    {{ print_r($data) }}

    <center>
        <table border="1" cellpadding="12px" cellspacing="0px" >
            <tr>
                <td>User Id : <span> {{ $data->userId }} </span></td> 
                <td>Id : <span> {{ $data->id }} </span></td>
                <td>Title : <span> {{ $data->title }} </span></td>
            </tr>
         

        </table>
    </center>
    <!-- When there is no desire, all things are at peace. - Laozi -->
</div>
