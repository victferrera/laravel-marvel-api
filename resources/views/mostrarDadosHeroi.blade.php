@foreach($json->data->results as $data)
                <img src="{{$data->thumbnail->path.".".$data->thumbnail->extension}}" alt="foto" style="width:500px;height:250px;"> 
    <h1>Nome: {{$data->name}}</h1><br>

    <h1>Resumo</h1>
    <p>{{$data->description}}</p>
@endforeach