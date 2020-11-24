@foreach($json->data->results as $data)
                <img src="{{$data->thumbnail->path.".".$data->thumbnail->extension}}" alt="foto" style="width:500px;height:250px;"> 
    <h1>Nome: {{$data->name}}</h1><br>

    <h1>Resumo</h1>
    <p>{{$data->description}}</p>
    <h1>Comics</h1>
    @foreach($data->comics->items as $comics)
        <p>{{$comics->name}}</p>
    @endforeach
    <h1>Series</h1>
    @foreach ($data->series->items as $series)
        <p>{{$series->name}}</p>
    @endforeach
    <h1>Stories</h1>
    @foreach ($data->stories->items as $stories)
        <p>{{$stories->name}}</p>
    @endforeach
    <h1>Events</h1>
    @foreach ($data->events->items as $events)
        <p>{{$events->name}}</p>
    @endforeach
    <h1>urls</h1>
    @foreach ($data->urls as $urls)
        <p>{{$urls->type}}</p>
        <p>{{$urls->url}}</p><br>
    @endforeach
@endforeach