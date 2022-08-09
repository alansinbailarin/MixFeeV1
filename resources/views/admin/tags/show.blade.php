@extends('adminlte::page')

@section('title', 'Mixfee')

@section('content_header')
    <h1>Tag {{$tag->name}}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p class="font-weight-bold">Nombre del tag: <p>{{$tag->name}}</p></p>
        <p class="font-weight-bold">Slug del tag: <p>{{$tag->slug}}</p></p>
        <p class="font-weight-bold">Fecha de creacion: <p>{{$tag->created_at}}</p></p>
    </div>
</div>
@stop

