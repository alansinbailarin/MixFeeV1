@extends('adminlte::page')

@section('title', 'Mixfee')

@section('content_header')
    <h1>Lista de tags</h1>
@stop

@section('content')
@if (session('deleted'))
    <div class="alert alert-danger" role="alert">
        <strong>{{ session('deleted') }}</strong>
    </div>
    
@endif
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.tags.create')}}" class="btn btn-success">Añadir tag</a>
        </div>
        <div class="card-body">
            <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td width="10px"><a class="btn btn-info btn-sm" href="{{route('admin.tags.show', $tag)}}">Ver</a></td>
                            <td width="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.tags.edit', $tag)}}">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

