@extends('adminlte::page')

@section('title', 'Mixfee')

@section('content_header')
    <a class="btn btn-success float-right" href="{{route('admin.jobs.create')}}">Publicar un nuevo trabajo</a>
    <h1>Lista de trabajos</h1>
@stop

@section('content')
    @livewire('admin.jobs-index')
@stop
