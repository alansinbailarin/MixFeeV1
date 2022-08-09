@extends('adminlte::page')

@section('title', 'Mixfee')

@section('content_header')
    <h1>{{$job->title}}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p class="font-weight-bold">Nombre del trabajo: <p>{{$job->title}}</p></p>
        <p class="font-weight-bold">Slug del trabajo: <p>{{$job->slug}}</p></p>
        <p class="font-weight-bold">Fecha de creacion: <p>{{$job->created_at}}</p></p>
        <p class="font-weight-bold">Descripcion: <p>{{$job->description}}</p></p>
        <p class="font-weight-bold">Compañia: <p>{{$job->company}}</p></p>
        <p class="font-weight-bold">Pagina web: <p>{{$job->company_url}}</p></p>
        <p class="font-weight-bold">Ubicacion: <p>{{$job->location}}</p></p>
        <p class="font-weight-bold">Correo electrónico: <p>{{$job->company_email}}</p></p>
        <p class="font-weight-bold">Numero de telefono: <p>{{$job->company_phone}}</p></p>
        <p class="font-weight-bold">Status 1 = borrador y 2 = publicado: <p>{{$job->status}}</p></p>
        <p class="font-weight-bold">Rango de salario: <p>{{$job->salary}}</p></p>
        <p class="font-weight-bold">Beneficios: <p>{{$job->benefices}}</p></p>
        <p class="font-weight-bold">Requisitos: <p>{{$job->requisites}}</p></p>
        <p class="font-weight-bold">Responsabilidades: <p>{{$job->responsabilities}}</p></p>
        <p class="font-weight-bold">Requerimientos: <p>{{$job->requirements}}</p></p>
        <p class="font-weight-bold">Sobre la empresa: <p>{{$job->about}}</p></p>
        <p class="font-weight-bold">Tipo de trabajo: <p>{{$job->type}}</p></p>
        <p class="font-weight-bold">Pertenece a la categoria: <p>{{$job->category->name}}</p></p>
    </div>
</div>
@stop
