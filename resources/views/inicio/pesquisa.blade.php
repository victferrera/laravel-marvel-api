@extends('template.layout1')
@section('conteudo')
<form method="get" action="{{route('callApi')}}">
<div class="search-box">
    <input name="nomeHeroi" type="text" placeholder="Digite o nome do herói"/><span></span>
</div>
@endsection