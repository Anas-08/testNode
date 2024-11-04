<div>
    <h1>Api Data</h1>

    {{ print_r($data) }}
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->

    <ul>
        <li>
            <span>User id : </span> <span><b> {{ $data->userId }} </b></span>
        </li>
         <li>
            <span> Id : </span> <span><b> {{ $data->id }} </b></span>
        </li>
        <li>
            <span> Title : </span> <span><b> {{ $data->title }} </b></span>
        </li> 
        <li>
            <span>Completed : </span> <span><b> {{ $data->completed }} </b></span>
        </li>
    </ul>

</div>
