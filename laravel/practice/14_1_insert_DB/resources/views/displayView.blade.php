<h2>Dispaly Page</h2>

<br>
<br>
<br>

{{-- {{ $data }} --}}

<br>
<br>

@foreach ($data as $img )
    {{-- <img width="200px" src="{{url('storage/images/'.$img->path)}}" alt=""> --}}
    <img width="200px" src="{{'storage/images/'.$img->path}}" alt="">
@endforeach