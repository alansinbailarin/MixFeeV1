@extends('adminlte::page')

@section('title', 'Mixfee')

@section('content_header')
    <h1>Crear tag</h1>
@stop

@section('content')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{ session('success') }}</strong>
    </div>
    
@endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tags.store']) !!}

                {{-- @include('admin.tags.partials.form') --}}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del tag']) !!}

                    @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del tag', 'readonly']) !!}

                    @error('slug')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    
                @enderror
                </div>

                <div class="form-group">
                    {{-- <label for="">Color</label>
                    <select name="color" id="" class="form-control">
                        <option value="">Seleccione un color</option>
                        <option value="red">Rojo</option>
                        <option value="yellow">Amarillo</option>
                        <option value="green">Verde</option>
                    </select> --}}
                    {!! Form::label('color', 'Color:') !!}
                    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}

                    @error('color')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    
                @enderror
                </div>

                {!! Form::submit('Crear tag', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });
    </script>
@endsection