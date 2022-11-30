@extends('adminlte::page')

@section('title', 'Mixfee')

@section('content_header')
    <h1>Categoria {{$category->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p class="font-weight-bold">Nombre de la categoria: <p>{{$category->name}}</p></p>
            <p class="font-weight-bold">Slug de la categoria: <p>{{$category->slug}}</p></p>
            <p class="font-weight-bold">Descripcion de la categoria: <p>{{$category->description}}</p></p>
            <p class="font-weight-bold">Fecha de creacion: <p>{{$category->created_at}}</p></p>
        </div>
    </div>
@stop

